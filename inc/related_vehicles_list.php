<?php

add_action('rest_api_init', 'register_related_vehicles_list_route');

function register_related_vehicles_list_route()
{
    register_rest_route('raadbaar/v1', 'related_vehicles', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' =>  'get_related_vehicles_list',
        'permission_callback' => "__return_true",
    ));
}

function get_related_vehicles_list($request)
{
    $params = $request->get_params();
    $postId = $params['postId'];
    $vehicles_list = new RB\RelatedVehicles($postId, 'shipment_types');
    return $vehicles_list->getResult();
}
