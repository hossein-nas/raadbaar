<?php

// Adding "ORDERS" posttype header text
add_filter('manage_orders_posts_columns', 'orders_table_head');
function orders_table_head( $defaults ) {
    $defaults['order_status']  = __('وضعیت سفارش','_hn_raadbaar');
    return $defaults;
}

// Adding "ORDERS" posttype table cell value
add_action( 'manage_orders_posts_custom_column', 'orders_table_content', 10, 2 );
function orders_table_content( $column_name, $post_id ) {
    if ($column_name == 'order_status') {
        $order_status= get_post_meta( $post_id, 'order_status', true) ?? 'unprocessed';
        echo order_status_lookup_table($order_status);
    }
}


function order_status_lookup_table($term){
    $table = array(
        'done'          => 'انجام شده',
        'unprocessed'   => 'پردازش نشده',
        'ongoing'       => 'در حال انجام'
    );

    $ret = array_filter( $table, function($item) use($term) {
        if($item == $term ){
            return true;
        }
        return false;
    }, ARRAY_FILTER_USE_KEY);

    return array_values($ret)[0]; 
}


// Adding sorting functionality to "ORDERS" posttype table list
add_filter( 'manage_edit-orders_sortable_columns', 'orders_table_sorting' );
function orders_table_sorting( $columns ) {
  $columns['order_status'] = 'order_status';
  return $columns;
}

add_filter( 'request', 'orders_order_status_column_orderby' );
function orders_order_status_column_orderby( $vars ) {
    if ( isset( $vars['orderby'] ) && 'order_status' == $vars['orderby'] ) {
        $vars = array_merge( $vars, array(
            'meta_key' => 'order_status',
            'orderby' => 'meta_value'
        ) );
    }

    return $vars;
}