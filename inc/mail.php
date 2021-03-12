<?php

function my_project_updated_send_email( $post_id, $post, $update ) {
    if( !(get_post_type($post_id) == 'orders') )
        return;
 
    // If this is a revision, don't send the email.
    if ( wp_is_post_revision( $post_id ) )
        return;
 
    if ( !($post->post_status == 'publish') )
        return;

    $post_url = get_edit_post_link( $post_id , false);
    $subject = 'سفارش جدیدی دریافت شد';
 
    $message = $post->post_title . " - ( " . $post_url . " )";

    $mail_to = get_option('_hn_raadbaar_values')['order_inbox_mail'];

    // Send email to admin.
    wp_mail( $mail_to, $subject, $message );
}
add_action( 'wp_insert_post', 'my_project_updated_send_email', 10, 3 );