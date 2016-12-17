<?php
/**
 * Enqueue Parent Theme (Oblique) Styles
 */
function marsx_enqueue_parent_styles() {
    wp_enqueue_style( 'marsx-parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'marsx_enqueue_parent_styles' );

/**
 * Do Theme Setup
 */
function marsx_setup_theme() {
    // Prepare theme for translation
    load_child_theme_textdomain( 'marsx', get_stylesheet_directory() . '/languages' );
    
    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );    
}
add_action( 'after_setup_theme', 'marsx_setup_theme' );

/**
 * Remove old masonry init
 */
function marsx_print_scripts() {
    wp_dequeue_script( 'oblique-masonry-init' );
}
/**
 * Add new masonry init
 */
function marsx_scripts() {
    wp_enqueue_script( 'marsx-masonry-init', get_stylesheet_directory_uri() . '/js/masonry-init.js', array( 'jquery-masonry' ), '20161218', true );
}
add_action( 'wp_print_scripts', 'marsx_print_scripts' );
add_action( 'wp_enqueue_scripts', 'marsx_scripts' );

/*
 * Load MarsX_Misc_Control class
 */
require get_stylesheet_directory() . '/inc/MarsX_Misc_Control.class.php';

/*
 * Load MarsX Customizer
 */
require get_stylesheet_directory() . '/inc/marsx_customizer.php';

/*
 * Load MarsX Template Tags
 */
require get_stylesheet_directory() . '/inc/marsx_template_tags.php';

/**
 * Allow some tags on excerpts.
 */
require_once get_stylesheet_directory().'/inc/excerpts.php';
