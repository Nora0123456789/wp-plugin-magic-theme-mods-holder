<?php

class WPTMHFilters {

    private static $instance = null;

    private $themeMods = array();
    private $filterThemeMods = '';

    public static function getInstance()
    {
        if ( null === self::$instance ) self::$instance = new Self();
        return self::$instance;
    }

    private function __construct() 
    {
        add_action( 'wp', [ $this, 'init' ] );
    }

    function init()
    {
        if ( is_customize_preview() ) return;

        $theme_slug = get_option( 'stylesheet' );
        $this->filterThemeMods = "theme_mods_{$theme_slug}";

        if ( is_singular() ) {
            $this->initSingularVars();
        }

        add_filter( $this->filterThemeMods, [ $this, 'filterThemeMods' ] );

    }

    function initSingularVars()
    {
        global $post;
        // Get Post Meta
        $theme_mods_index = get_post_meta( $post->ID, mtmh()->getPrefixedThemeOptionName( 'selected_theme_mods' ), true );
        if ( ! is_numeric( $theme_mods_index ) || in_array( $theme_mods_index, [ null, false, 'none' ] ) ) return;
        $selected_theme_mods = get_option( mtmh()->getPrefixedThemeOptionName( "theme_mods_$theme_mods_index" ), '{}' );
        $selected_theme_mods = json_decode( $selected_theme_mods, true );
        if ( null !== $selected_theme_mods && is_array( $selected_theme_mods ) && 0 < count( $selected_theme_mods ) ) $this->themeMods = $selected_theme_mods;
    }

    function filterThemeMods( $theme_mods )
    {
        $theme_mods = wp_parse_args( $this->themeMods, $theme_mods );
        return $theme_mods;
    }

}