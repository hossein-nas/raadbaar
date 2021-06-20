<?php
/*  Load classes */
require(get_theme_file_path() . "/inc/classes/get_related_vehicles.php");

/* Loading utility functions */
require_once(get_theme_file_path() . '/inc/util_funcs.php');
require_once(get_theme_file_path() . '/inc/define_actions.php');
require_once(get_theme_file_path() . '/inc/raadbaar_setting_section.php');
require_once(get_template_directory() . '/inc/order_page.php');
require_once(get_theme_file_path() . '/inc/order_list_table.php');
require_once(get_template_directory() . '/inc/mail.php');
require_once(get_template_directory() . '/inc/rest_routes.php');
require_once(get_theme_file_path() . '/inc/attach_custom_post_type_to_tag_archive.php');
require_once(get_theme_file_path() . '/inc/remove_thumbnail_hardcoded_dimensions.php');
require_once(get_theme_file_path() . '/inc/add_badge_to_orders_menu.php');
require_once(get_theme_file_path() . '/inc/order_metabox.php');
require_once(get_theme_file_path() . '/inc/number_box_shortcode.php');
require_once(get_theme_file_path() . '/inc/dequeue_scripts.php');

function add_cors_http_header()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Expose-Headers: Content-Length, X-JSON");
    header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: *");
}
add_action('init', 'add_cors_http_header');

function raadbaar_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

    register_nav_menu('header-menu-location', 'منوبار اصلی بالای وبسایت');
    register_nav_menu('footer-menu-main', 'منوبار اصلی پایین وبسایت');
    register_nav_menu('footer-menu-secondary', 'منوبار ثانویه پایین وبسایت');
}

add_action('after_setup_theme', 'raadbaar_setup');

function inject_scripts()
{
    $manifest_file= get_theme_file_uri('js/manifest.js');
    $vendor_file = get_theme_file_uri('js/vendor.js');
    $js_file = get_theme_file_uri('js/main.js');
    $css_file = get_theme_file_uri('css/main.css');
    wp_enqueue_script('manifest-script', $manifest_file, null, '1.0.7', true);
    wp_enqueue_script('vendor-scripts', $vendor_file, ['manifest-script'], '1.0.7', true);
    wp_enqueue_script('main_script', $js_file, ['vendor-scripts'], '1.0.7', true);
    wp_enqueue_style('main_styles', $css_file, null, '1.0.7', 'all');

    $data = array(
        'root_url' => get_site_url(),
        'theme_root_url' => get_theme_file_uri(),
        'nonce' => wp_create_nonce('wp_rest'),
    );

    wp_add_inline_script('main_script', 'var wp_data = ' . json_encode($data), 'before');
}
add_action('wp_enqueue_scripts', 'inject_scripts');



/*
Handy Functions
*/
function en_number($number)
{
    $en = array("0","1","2","3","4","5","6","7","8","9");
    $fa = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
    return str_replace($fa, $en, $number);
}
function fa_number($number)
{
    $en = array("0","1","2","3","4","5","6","7","8","9");
    $fa = array("۰","۱","۲","۳","۴","۵","۶","۷","۸","۹");
    return str_replace($en, $fa, $number);
}

add_action('admin_menu', 'change_media_label');
function change_media_label()
{
    global $menu, $submenu;
}

function hn_pagination()
{
    global $wp_query;

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ));
    if (is_array($pages)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<ul class="pagination-links">';
        foreach ($pages as $page) {
            echo "<li class=\"page\">$page</li>";
        }
        echo '</ul>';
    }
}


function extract_term_ancestors($_id, $tax)
{

    // here extracting related terms from <db.terms>
    $terms = wp_get_post_terms($_id, $tax);

    // here extracting terms id
    $terms_id= array_map(function ($item) {
        return $item->term_id;
    }, $terms);

    $ret  = array_merge([], $terms_id);
    foreach ($terms_id as $term_id) {
        $ancestor = get_ancestors($term_id, 'vehicles_cat');
        if (!empty($ancestor)) {
            $ret = array_merge($ret, $ancestor);
        }
    }

    return array_reverse(array_unique($ret));
}

function ancestors_term_li($_id, $tax, $first_item_class = 'root')
{
    $terms_arr = extract_term_ancestors($_id, $tax);

    foreach ($terms_arr as $index => $term) {
        $_term = get_term($term, $tax, ARRAY_A);
        $_class= $index == 0 ? $first_item_class: '';
        echo "<li class=\"$_class\">{$_term['name']}</li>";
    }
}


function customize_main_menu($items)
{
    foreach ($items as $item) {
        if (in_array('menu-item-home', $item->classes)) {
            $item->title = '<span class="nav-icon"><i class="bi bi-house-door-fill"></i></span>'. $item->title ;
            echo '</pre>';
            continue;
        }
        if (in_array('menu-item-has-children', $item->classes)) {
            $item->url= '#';
            $item->title = $item->title . '<span class="arrow"><i class="bi bi-caret-down-fill"></i></span>';
            continue;
        }
    }
    return $items;
}

add_filter('wp_nav_menu_objects', 'customize_main_menu');


function rb_pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }

    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }

    if (1 != $pages) {
        echo "<section id='Pagination'>\n\n<ul class='pagination-links'>";
        if ($paged > 2 && $paged > $range+1 && $showitems < $pages) {
            echo "<li class='page'><a href='".get_pagenum_link(1)."' aria-label='Previous'><span aria-hidden='true'>&laquo;</span></a></li>";
        }
        if ($paged > 1 && $showitems < $pages) {
            echo "<li class='page'><a href='".get_pagenum_link($paged - 1)."' aria-label='Previous'><span aria-hidden='true'>&lsaquo;</span></a></li>";
        }


        for ($i=1; $i <= $pages; $i++) {
            if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                echo ($paged == $i)? "<li class='page current'><a href='".get_pagenum_link($i)."'>".$i."</a></li>" : "<li class='page'><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
            }
        }

        if ($paged < $pages && $showitems < $pages) {
            echo "<li class='page'><a href='".get_pagenum_link($paged + 1)."' aria-label='Previous'><span aria-hidden='true'>&rsaquo;</span></a></li>";
        }
        if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) {
            echo "<li class='page'><a href='".get_pagenum_link($pages)."' aria-label='Previous'><span aria-hidden='true'>&raquo;</span></a></li>";
        }
        echo "</ul>\n</section>";
    }
}
