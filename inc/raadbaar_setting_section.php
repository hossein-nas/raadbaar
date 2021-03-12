<?php

add_action('admin_init', '_hn_raadbaar_settings_init');

function _hn_raadbaar_settings_init() {
    add_settings_section('_hn_raadbaar_setting_section', 'تنظیمات وبسایت راد بار', '_hn_raadbaar_setting_section', 'general');

    add_settings_field('_hn_raadbaar_order_inbox_mail', 'ایمیل دریافت کننده سفارش ؟', '_hn_raadbaar_order_inbox_mail', 'general', '_hn_raadbaar_setting_section');
    add_settings_field('_hn_raadbaar_question_inbox_mail', 'ایمیل دریافت کننده سؤالات ؟', '_hn_raadbaar_question_inbox_mail', 'general', '_hn_raadbaar_setting_section');

    register_setting('general', '_hn_raadbaar_values', '_hn_raadbaar_values_sanitize');
}
function _hn_raadbaar_values_sanitize($input){
    $input['order_inbox_mail'] = sanitize_email( $input['order_inbox_mail']);
    $input['question_inbox_mail'] = sanitize_email( $input['question_inbox_mail']);

    return $input;
}


function _hn_raadbaar_setting_section(){
    echo "با تغییر دادن مقادیر زیر میتوانید به تنظیمات دلخواه خود دست یابید. قبل از تغییر مطمئن شوید که مقادیر درست را وارد کردید. یا از متخصص آی تی درخواست کنید.";
}

function _hn_raadbaar_order_inbox_mail(){
    $_hn_options_values = get_option('_hn_raadbaar_values');?>

    <input type="email" name="_hn_raadbaar_values[order_inbox_mail]" value="<?php echo $_hn_options_values ? esc_attr($_hn_options_values['order_inbox_mail']) : '' ?>" />

<?php
}

function _hn_raadbaar_question_inbox_mail(){
    $_hn_options_values = get_option('_hn_raadbaar_values');?>

    <input type="email" name="_hn_raadbaar_values[question_inbox_mail]" value="<?php echo $_hn_options_values ? esc_attr($_hn_options_values['question_inbox_mail']) : '' ?>" />

<?php
}