<?php
require_once( get_theme_file_path() . '/inc/raadbaar_setting_section.php');
require_once( get_template_directory() . '/inc/order_page.php');
require_once( get_theme_file_path() . '/inc/order_list_table.php');
require_once( get_template_directory() . '/inc/mail.php');
require_once( get_template_directory() . '/inc/rest_routes.php');
require_once( get_theme_file_path() . '/inc/attach_custom_post_type_to_tag_archive.php');
require_once( get_theme_file_path() . '/inc/remove_thumbnail_hardcoded_dimensions.php');
require_once( get_theme_file_path() . '/inc/add_badge_to_orders_menu.php');

function add_cors_http_header(){
    header("Access-Control-Allow-Origin: *");
}
add_action('init','add_cors_http_header');

function raadbaar_setup(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support('title-tag');

    register_nav_menu('header-menu-location', 'منوبار اصلی بالای وبسایت');
    register_nav_menu('footer-menu-main', 'منوبار اصلی پایین وبسایت');
    register_nav_menu('footer-menu-secondary', 'منوبار ثانویه پایین وبسایت');
}

add_action('after_setup_theme', 'raadbaar_setup');

function inject_scripts(){
    wp_enqueue_script('main_script', get_theme_file_uri('js/main.js'), null, '1.0', true);
    wp_enqueue_style('main_styles', get_theme_file_uri('css/main.css'));

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

add_action( 'admin_menu', 'change_media_label' );
function change_media_label(){
    global $menu, $submenu;
}

function hn_pagination() {

    global $wp_query;

    if ( $wp_query->max_num_pages <= 1 ) return; 

$big = 999999999; // need an unlikely integer

$pages = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type'  => 'array',
) );
if( is_array( $pages ) ) {
    $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
    echo '<ul class="pagination-links">';
    foreach ( $pages as $page ) {
        echo "<li class=\"page\">$page</li>";
    }
    echo '</ul>';
}
}


function extract_term_ancestors($_id, $tax){

    // here extracting related terms from <db.terms>
    $terms = wp_get_post_terms($_id, $tax);

    // here extracting terms id
    $terms_id= array_map(function($item){
        return $item->term_id;
    }, $terms);

    $ret  = array_merge([], $terms_id);
    foreach($terms_id as $term_id){
        $ancestor = get_ancestors($term_id, 'vehicles_cat');
        if( !empty( $ancestor) ){
            $ret = array_merge($ret, $ancestor);
        }
    }

    return array_reverse(array_unique($ret));
}

function ancestors_term_li($_id, $tax, $first_item_class = 'root'){
    $terms_arr = extract_term_ancestors($_id, $tax);

    foreach($terms_arr as $index => $term ){
        $_term = get_term($term, $tax, ARRAY_A);
        $_class= $index == 0 ? $first_item_class: '';
        echo "<li class=\"$_class\">{$_term['name']}</li>";
    }
}


function customize_main_menu($items){
    foreach( $items as $item){
        if(in_array('menu-item-home', $item->classes)){
            $item->title = '<span class="nav-icon"><i class="bi bi-house-door-fill"></i></span>'. $item->title ;
            echo '</pre>';
            continue;
        }
        if(in_array('menu-item-has-children', $item->classes)){
            $item->title = $item->title . '<span class="arrow"><i class="bi bi-caret-down-fill"></i></span>';
            continue;
        }
    }
    return $items;
}

add_filter('wp_nav_menu_objects', 'customize_main_menu');
?>
