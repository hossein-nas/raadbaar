<?php

add_action('rest_api_init', 'register_shipment_types_route');

function register_shipment_types_route(){
    register_rest_route('raadbaar/v1', 'shipment_types', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' =>  'get_shipment_types_list',
        'permission_callback' => "__return_true",
    ));
}

function get_shipment_types_list(){
    $terms = get_terms( 'shipment_types', array(
        'hide_empty' => false,
    ) );

    return array_map(function($item){

        return [ 'id' => $item->term_id, 'label' => $item->name, 'slug'=> $item->slug, 'count' => $item->count];
    }, $terms);
}
?>