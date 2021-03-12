<?php

add_action('rest_api_init', 'register_cities_route');
function register_cities_route(){
    register_rest_route('raadbaar/v1', 'cities', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'get_cities_list',
        'permission_callback' => "__return_true",
    ));
}

function get_cities_list() {
    $json_list = file_get_contents( get_theme_file_path('cities.json'));
    $list = json_decode($json_list, true);
    $filtered_list = array_filter($list, function($_list){
        if($_list['is_state'] == 1 OR $_list['most_used'] ==1){
            return true;
        }
    });

    $list = array_map(function($_item, $ind){
        return array(
            'id' => $ind,
            'city' => $_item['City'],
            'province' => $_item['State']
        );
    }, $filtered_list, array_keys($filtered_list));
    return array_values($list);
}