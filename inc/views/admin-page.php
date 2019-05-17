

<?php // Register New Theme Mods ?>
<div class="metabox-holder"><div id="custom-fonts-settings-wrapper" class="settings-wrapper postbox">

	<h3 id="upload-fonts-settings-h2" class="form-table-title hndle"><?php esc_html_e( 'Register Current Theme Mods Settings', 'mtmh' ); ?></h3>

	<div class="inside"><div class="main">

        <?php require_once( 'admin-page/form-register-current-theme-mods.php' ); ?>
        
    </div></div>

</div></div>

<?php // Table 
$all_registered_theme_mods = get_option( mtmh()->getThemeDir() );
?>
<div class="metabox-holder"><div id="custom-fonts-settings-wrapper" class="settings-wrapper postbox">

	<h3 id="upload-fonts-settings-h2" class="form-table-title hndle"><?php esc_html_e( 'Register Current Theme Mods Settings', 'mtmh' ); ?></h3>

	<div class="inside"><div class="main">

        <?php require_once( 'admin-page/form-theme-mods-table.php' ); ?>

    </div></div>

</div></div>

