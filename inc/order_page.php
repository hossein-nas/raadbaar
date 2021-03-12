<?php

function global_notice_meta_box() {

    add_meta_box(
        'order-info',
        __( 'اطلاعات سفارش', '_hn_raadbaar' ),
        'global_notice_meta_box_callback',
        'orders'
    );
}

add_action( 'add_meta_boxes', 'global_notice_meta_box' );

function global_notice_meta_box_callback( $post ) {

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'global_notice_nonce', 'global_notice_nonce' );

    $value = get_post_meta( $post->ID, 'data', true );
    /*<thead><tr><th>عنوان</th> <th>مقدار</th></tr></thead>*/
    if( count($value) ){
        echo "<table class=\"form-table\"><tbody>";
        foreach($value as $key => $v){
            echo "<tr>";
            echo "<td>" . translate_lookup_table($key)  . "</td>";
            echo "<td>" . '<input name="'.$key.'" type="text" value="' . $v . '" class="regular-text" readonly="readonly">' . "</td>";
            echo "</td>";
        }
        echo "</tbody></table>";
    }

}

add_action('rest_api_init', 'register_orders_new_post_route');

function register_orders_new_post_route(){
    register_rest_route('raadbaar/v1', 'orders', array(
        'methods' => WP_REST_SERVER::EDITABLE,
        'callback' => 'new_order_route',
        'permission_callback' => '__return_true',
        'args' => validation_array(),
    ));
}

function new_order_route(WP_REST_Request $data){
    $params = $data->get_params();
    $post = array(
        'post_title' => sanitize_text_field($params['title']),
        'post_content' => '',
        'post_author' => null,
        'post_type' => 'orders',
        'post_status' => 'publish' 
    );

    try{
        $post_id = wp_insert_post($post, false);

        // adding extra data to postmeta table
        update_post_meta($post_id, 'data', $params);
        update_post_meta($post_id, 'order_status', 'unprocessed');

        $response = new WP_REST_Response(array(
            'status' => 'success',
            'response' => 'order_submitted_successfully',
            'body' => 'سفارش با موفقیت ثبت شد.',
        ));
        $response->set_status(201);
        
        return $response; 
    }catch(\Exception $e){}
}

function translate_lookup_table($term){
    $table = [
        'source'               => 'آدرس مبداء',
        'dest'                 => 'آدرس مقصد',
        'name'                 => 'نام و نام خانوا  دگی',
        'cargoType'            => 'نوع بار',
        'carType'              => 'نوع ماشین',
        'title'                => 'عنوان',
        'orderID'              => 'شناسه سفارش',
        'orderType'              => 'روش سفارش',
        'status'               => 'وضعیت انتشار',
        'cargoTitle'           => 'عنوان بار',
        'pickupTime'           => 'زمان بار گیری',
        'pickupDate'           => 'تاریخ بارگیری',
        'workersCount'         => 'تعداد کارگر درخواستی',
        'sourceFloorCount'     => 'طبقات مبداء',
        'destFloorCount'       => 'طبقات مقصد',
        'insuranceRequired'    => 'بیمه لازم است؟',
        'address'              => 'آدرس دقیق',
        'phoneNumber'          => 'شماره تماس',
        'notes'                => 'ملاحضات',
    ];

    $ret = array_filter($table, function( $key) use($term){
        if($key == $term){
            return true;
        }
        return false;
    }, ARRAY_FILTER_USE_KEY);

    return array_values($ret)[0];
}

function sanitize_post_data($params){
    $ret = [];
    $table = [
        'title'                => 'text_field',
        'orderID'              => 'text_field',
        'source'               => 'text_field',
        'dest'                 => 'text_field',
        'cargoType'            => 'text_field',
        'cargoTitle'           => 'text_field',
        'pickupTime'           => 'text_field',
        'pickupDate'           => 'text_field',
        'carType'              => 'text_field',
        'workersCount'         => 'text_field',
        'sourceFloorCount'     => 'text_field',
        'destFloorCount'       => 'text_field',
        'insuranceRequired'    => 'text_field',
        'name'                 => 'text_field',
        'address'              => 'textarea_field',
        'phoneNumber'          => 'text_field',
        'notes'                => 'textarea_field',
    ];

    foreach ($table as $item => $sanitizer ){
        if(isset($params[$item])){
            $ret[$item] = call_user_func('sanitize_'.$sanitizer, $params[$item]);
        }
    }
    return $ret;
}

function validation_array(){
    return array(
            'title' => array(
                'required' => true,
                'sanitize_callback' => function($data){return sanitize_text_field($data);}
            ),
            'insuranceRequired' => array(
                'validation_callback' => function($data) { return is_bool($data); },
                'sanitize_callback' => function($data) { return rest_sanitize_boolean($data)? 'بله' : 'خیر'; },
            ),
            'orderID' => array(
                'required' => true,
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'orderType' => array(
                'required' => true,
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'name' => array(
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'address' => array(
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_textarea_field($data); },
            ),
            'notes' => array(
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_textarea_field($data); },
            ),
            'carType' => array(
                'required' => true,
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'cargoType' => array(
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'source' => array(
                'required' => true,
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'dest' => array(
                'required' => true,
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
            'destFloorCount' => array('sanitize_callback' => function($data) { return rest_sanitize_boolean($data); } ),
            'sourceFloorCount' => array('sanitize_callback' => function($data) { return rest_sanitize_boolean($data); } ),

            'phoneNumber' => array(
                'required' => true,
                'validation_callback' => function($data) { return is_string($data); },
                'sanitize_callback' => function($data) { return sanitize_text_field($data); },
            ),
    );
}