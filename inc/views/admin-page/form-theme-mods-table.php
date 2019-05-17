<?php
$theme_mods_list = get_option( mtmh()->getPrefixedThemeOptionName( 'theme_mods_list' ), '{}' );
$theme_mods_list = json_decode( $theme_mods_list, true );
//var_dump( $theme_mods_list );

$theme_mods_3 = get_option( mtmh()->getPrefixedThemeOptionName( 'theme_mods_3' ), '{}' );
$theme_mods_3 = json_decode( $theme_mods_3, true );
//var_dump( $theme_mods_3 );

$theme_mods_count = get_option( mtmh()->getPrefixedThemeOptionName( 'theme_mods_count' ), 0 );
//var_dump( $theme_mods_count );

?>

<form method="post" action="themes.php?page=mtmh">

    <?php wp_nonce_field( mtmh()->getPrefixedOptionName( 'update_theme_mods_list' ), mtmh()->getPrefixedOptionName( 'update_theme_mods_list_nonce' ) ); ?>

    <table cellspacing="0" id="theme-mods-list-table" class="wp-list-table widefat fixed">

        <caption>
            <?php esc_html_e( 'Register Current Theme Mods Settings with an label and description.', 'mtmh' ); ?>
        </caption>

        <thead>
            <tr>
                <th style="padding: .5rem; width: 5rem;" class="manage-column column-cb check-column" scope="col">
                    <label style="display: block; width: fit-content;"><span style="display: block; width: fit-content;"><?php esc_html_e( 'Delete', 'mtmh' ); ?></span><input type="checkbox" style="margin: auto; padding: .5rem;"></label>
                </th>
                <th style="" class="manage-column column-name" scope="col">
                    <span><?php esc_html_e( 'Name', 'mtmh' ); ?></span>
                </th>
                <th style="" class="manage-column column-description" scope="col">
                    <span><?php esc_html_e( 'Description', 'mtmh' ); ?></span>
                </th>
                <th style="" class="manage-column column-nav" scope="col">
                    <span><?php esc_html_e( 'With Nav Menu', 'mtmh' ); ?></span>
                </th>
            </tr>
        </thead>

        <tbody>
            <?php 
            if ( is_array( $theme_mods_list ) && 0 < count( $theme_mods_list ) ) {
            foreach ( $theme_mods_list as $theme_mods_index => $theme_mods_data ) {
                require( 'form-theme-mods-table-row.php' );
            }
            }
            ?>
        </tbody>

        <tfoot>
            <tr>
                <th style="" class="manage-column column-cb check-column" scope="col"><input type="checkbox"></th>
                <th style="" class="manage-column column-name" scope="col">
                    <span><?php esc_html_e( 'Name', 'mtmh' ); ?></span>
                </th>
                <th style="" class="manage-column column-description" scope="col">
                    <span><?php esc_html_e( 'Description', 'mtmh' ); ?></span>
                </th>
                <th style="" class="manage-column column-nav" scope="col">
                    <span><?php esc_html_e( 'With Nav Menu', 'mtmh' ); ?></span>
                </th>
            </tr>
        </tfoot>

    </table>

    <input type="submit" name="update-theme-mods-list" class="button button-primary" value="<?php esc_attr_e( 'Register Current Theme Mods', 'mtmh' ); ?>"/>

</form>

