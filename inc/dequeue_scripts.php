<?php
function reduce_scripts_loading(){
    wp_deregister_script('jquery'); 
    wp_deregister_script('wpsh'); 
    wp_register_script('jquery', '', '', '', true);
    wp_register_script('wpsh', '', '', '', true);

    wp_dequeue_style('wp-block-library-rtl');
    wp_dequeue_style('wpsh-style');
}

add_action('wp_enqueue_scripts', 'reduce_scripts_loading', 20);