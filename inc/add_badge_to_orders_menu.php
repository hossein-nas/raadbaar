<?php

add_action( 'admin_menu', 'add_badge_to_admin_panel_orders_menu' );
function add_badge_to_admin_panel_orders_menu(){
    global $menu, $submenu;
    $orders_count = get_unprocessed_orders_count() ? sprintf( '<span class="awaiting-mod">%d</span>', get_unprocessed_orders_count()) : '';

    foreach($menu as &$item){
        if($item[2] == 'edit.php?post_type=orders'){
            $item[0] .= $orders_count;
        }
    }
}

function get_unprocessed_orders_count(){
    $args = array(
        'post_type' => 'orders',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'order_status',
                'value' => 'unprocessed',
                'compoare' => '=',
            )
        ),
    );

    return (new WP_Query($args))->found_posts;
}