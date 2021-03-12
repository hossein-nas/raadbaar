<?php
function wpa_cpt_tags( $query ) {
    if ( $query->is_tag() && $query->is_main_query() ) {
        $query->set( 'post_type', array( 'post', 'articles', 'services' ) );
    }
}
add_action( 'pre_get_posts', 'wpa_cpt_tags' );