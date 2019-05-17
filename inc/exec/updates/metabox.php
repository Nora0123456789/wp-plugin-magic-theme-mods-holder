<?php
if ( ! isset( $_POST['mtmh_metabox_nonce'] ) || ! wp_verify_nonce( $_POST['mtmh_metabox_nonce'], 'mtmh_metabox' ) ) {
    return;
}

if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
}

if ( isset( $_POST['post_type'] ) && 'page' === $_POST['post_type'] ) {

    if ( ! current_user_can( 'edit_page', $post_id ) ) {
        return;
    }

} else {

    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

}

if ( ! isset( $_POST['mtmh_theme_mods'] ) ) {
    return;
}


$mtmh_theme_mods = sanitize_text_field( $_POST['mtmh_theme_mods'] );
update_post_meta( $post_id, '_mtmh_theme_mods', $mtmh_theme_mods );

