<?php

add_shortcode('phone_number', '_rb_phone_number_box');

function _rb_phone_number_box($attrs, $content = null){
    extract (
        shortcode_atts(
            array( // $phone_number and $label is required
                'phone_number' => true,
            ),
            $attrs
        )
    );

    if( $phone_number ){
        $decoratedPhoneNumber = util_separate_phone_num($phone_number);
        $telFormatPhoneNumber = util_transform_phone_number_to_tel_format($phone_number);
        $ret = <<<EOF
            <div id="PhoneNumber__box">
                <p class="header">برای ثبت سفارش کادر زیر را لمس کنید</p>
                <a href="{$telFormatPhoneNumber}" id="PhoneNumber__click">
                    <div>
                        <div class="label">ثبت سفــارش</div>
                        <div class="number">{$decoratedPhoneNumber}</div>
                    </div>
                    <div class="figure_svg">
                        <svg width="41" height="40" viewBox="0 0 41 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle opacity="0.8" cx="20.5" cy="20" r="19.5" fill="white" stroke="#FBD353"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.93 23.93C26.05 24.3 27.25 24.5 28.5 24.5C29.05 24.5 29.5 24.95 29.5 25.5V29C29.5 29.55 29.05 30 28.5 30C19.11 30 11.5 22.39 11.5 13C11.5 12.45 11.95 12 12.5 12H16C16.55 12 17 12.45 17 13C17 14.25 17.2 15.45 17.57 16.57C17.68 16.92 17.6 17.31 17.32 17.57L15.12 19.78C16.56 22.62 18.88 24.93 21.71 26.37L23.91 24.17C24.11 23.98 24.36 23.88 24.62 23.88C24.72 23.88 24.83 23.9 24.93 23.93ZM27.5 21H29.5C29.5 16.03 25.47 12 20.5 12V14C24.37 14 27.5 17.13 27.5 21ZM23.5 21H25.5C25.5 18.24 23.26 16 20.5 16V18C22.16 18 23.5 19.34 23.5 21ZM15.03 14C15.1 14.88 15.25 15.75 15.48 16.58L14.28 17.79C13.88 16.58 13.62 15.32 13.53 14H15.03ZM23.7 27.21C24.9 27.62 26.18 27.88 27.5 27.97V26.46C26.62 26.4 25.75 26.25 24.9 26.01L23.7 27.21Z" fill="#B48A04"/>
                        </svg>
                    </div>
                </a>
            </div>        
            EOF;
            return $ret;
    }
}

function util_separate_phone_num($number){
    preg_match('/(\d{4})(\d{3})(\d{4})/', $number, $matches);
    $sliced = array_slice($matches, 1);
    $sliced = array_reverse($sliced);

    return implode(" ", $sliced);
}

function util_transform_phone_number_to_tel_format($number){
    return "tel:+98" . substr($number, 1);
    
}
