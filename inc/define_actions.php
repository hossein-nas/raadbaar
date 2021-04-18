<?php

add_action('add_call_us_box', 'yield_call_us_box');

function yield_call_us_box(){ 
    // var_dump(in_body_class('no-fast-order'));
    if(is_single() && in_body_class('no-fast-order') ) return ;
    ?>
    <div class="call-us-overlay">
        <a href="#call-us" class="header" onclick="void(0)">با ما در تماس باشید!</a>
        <div class="body">
            <?php get_template_part('template-parts/content/content', 'phone-box'); ?>
        </div>
        <div class="close-button">
            <i class="bi bi-x-circle"></i>
            بستن
        </div>
    </div>
    <?php
}