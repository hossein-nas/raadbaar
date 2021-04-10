<?php

add_action('add_meta_boxes', '_rb_order_metabox');

function _rb_order_metabox(){

    add_meta_box('_rb_metabox', __('نمایش جعبه ابزار', '_rb_textdomain'), '_rb_metabox_html', 'orders', 'side', 'default');
}

function _rb_metabox_html(){
    echo "HEY";
}