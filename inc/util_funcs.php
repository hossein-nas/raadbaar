<?php

add_action('init', 'add_functions');

function add_functions(){

    if( ! function_exists('need_fast_order_box')){
        function need_fast_order_box(){
            $the_field = get_field('fast_order_needed');
            if($the_field){
                return true;
            }
            return false;
        }
    }

};

add_action('wp', function(){
    if( get_post_type() == "services" ){
        if(!need_fast_order_box() && is_singular() ){
            add_filter( 'body_class', function( $classes ) {
                array_push($classes, 'no-fast-order');
                return $classes;
            }, 10);
        }
    }
});


add_action('wp_loaded', 'wp_loaded_functions');

function wp_loaded_functions(){
    if( !function_exists('in_body_class')){
        function in_body_class($term){
            return !! in_array($term, get_body_class());
        }
    }
}