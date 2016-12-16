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

/*
 * Load MarsX_Misc_Control class
 */
require get_stylesheet_directory() . '/inc/MarsX_Misc_Control.class.php';

/*
 * Load MarsX Customizer
 */
require get_stylesheet_directory() . '/inc/marsx_customizer.php';

/**
 * Prints HTML with meta information for the current post-date/time and categories.
 */
function marsx_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf($time_string,
        esc_attr(get_the_date('c')),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date('c')),
        esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
        _x('%s', 'post date', 'marsx'),
        '<a href="'.esc_url(get_permalink()).'" rel="bookmark">'.$time_string.'</a>'
    );

    $cat = get_the_category_list(' / ');

    if (!is_singular()) {
        echo '<span class="posted-on">'.$posted_on.'</span><span class="cat-link">'.$cat.'</span>';
    } elseif (!get_theme_mod('meta_singles')) {
        echo '<span class="posted-on">'.$posted_on.'</span>';
        if ('post' == get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(__(', ', 'marsx'));
            if ($categories_list) {
                printf('<span class="cat-links">'.__('%1$s', 'marsx').'</span>', $categories_list);
            }
        }
    }
}

/**
 * Footer credits for MarsX.
 */
function marsx_footer_credits()
{
    echo '<a href="'.esc_url(__('http://wordpress.org/', 'marsx')).'" rel="nofollow">';
    printf(__('Proudly powered by %s', 'marsx'), 'WordPress');
    echo '</a>';
    echo '<span class="sep"> | </span>';
    printf(__('Theme: %2$s by %1$s.', 'marsx'),
       '<a href="http://www.aaronsnowberger.com" target="_blank" rel="nofollow">Aaron Snowberger</a>',
       '<a href="https://github.com/jekkilekki/theme-marsx" target="_blank" rel="nofollow">MarsX</a>'
    );
}
add_action('marsx_footer', 'marsx_footer_credits');


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
    wp_enqueue_script( 'marsx-masonry-init', get_stylesheet_directory_uri() . '/js/masonry-init.js', array('jquery-masonry'), true );
}
add_action( 'wp_print_scripts', 'marsx_print_scripts' );
add_action( 'wp_enqueue_scripts', 'marsx_scripts' );

/**
 * Allow some tags on excerpts.
 */
require_once get_stylesheet_directory().'/inc/excerpts.php';
