<?php

add_action('rest_api_init', 'register_vehicles_route');

function register_vehicles_route(){
    register_rest_route('raadbaar/v1', 'vehicles', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' =>  'get_vehicles_list',
        'permission_callback' => "__return_true",
    ));
}

function get_vehicles_list(){
    $ret = [];
    $taxonomy = 'vehicles_cat';
    $taxonomy_terms = get_terms( $taxonomy, array(
        'hide_empty' => 1,
        // 'fields' => 'ids'
    ) );

    foreach($taxonomy_terms as $item){
        $ret['cats'][] = array(
            'id' => $item->term_id,
            'label' => $item->name,
            'slug' => $item->slug,
            'count' => $item->count,
            'cars' => [],
        );
    }


    foreach($ret['cats'] as &$item){
        $args = array(
            'post_type' => 'vehicles',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'vehicles_cat',
                    'field' => 'term_id',
                    'terms' => $item['id'],
                )
            )
        );
        $vehicles = new WP_Query($args);

        while($vehicles->have_posts() ): $vehicles->the_post();
            $item['cars'][] = array(
                'id' => get_the_ID(),
                'name' => get_the_title(),
                'label' => get_the_title(),
                'thumb' => wp_get_attachment_url( get_field('vector_figure')['ID']),
                'url' => get_the_permalink(),
                'specs' => [
                    'mh' => get_field('max_height'),
                    'ml' => get_field('max_length'),
                    'mw' => get_field('max_width'),
                    'weight' => get_field('max_weight'),
                ]
            );
        endwhile;
    }

    

    return $ret;
}