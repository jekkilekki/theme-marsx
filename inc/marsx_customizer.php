<?php
/**
 * MarsX Theme Customizer
 * Parent Theme: Oblique
 * 
 * @package MarsX
 */

/**
 * Add in the MarsX Customizer script
 */
function marsx_customize_register( $wp_customize ) {

    /**
     * Remove some things in the Customizer
     */
    $wp_customize->remove_section( 'oblique_theme_info' );
    $wp_customize->remove_setting( 'oblique_color_notice' );
    $wp_customize->remove_section( 'oblique_pro_featured' );
    $wp_customize->remove_section( 'oblique_view_pro' );
    $wp_customize->remove_control( 'oblique_color_notice' );
    
    /**
     * Modify other values in the Customizer
     */
    $wp_customize->get_setting( 'logo_size' )->default = '300';
    $wp_customize->get_control( 'logo_size' )->description = __( 'Max-width for the logo. Default 300px', 'marsx' );
    $wp_customize->get_setting( 'branding_padding' )->default = '200';
    $wp_customize->get_control( 'branding_padding' )->description = __( 'Top&amp;bottom padding for the branding. Default: 200px', 'marsx' );
    $wp_customize->get_setting( 'body_font_name' )->default = 'Fira+Sans:400italic,700italic,400,700';
    $wp_customize->get_setting( 'body_font_family' )->default = '\'Fira Sans\', sans-serif';
    $wp_customize->get_setting( 'headings_font_name' )->default = 'Play';
    $wp_customize->get_setting( 'headings_font_family' )->default = '\'Play\', sans-serif';
    $wp_customize->get_setting( 'background_color' )->default = '#282828'; // #181c1f SpaceX background color
    $wp_customize->get_setting( 'primary_color' )->default = '#f7941d';
    
    /**
     * Perform some reorganization of default sections
     */
    $wp_customize->get_section( 'title_tagline' )->title                = __( 'Site Title / Logo', 'marsx' );
    $wp_customize->get_section( 'static_front_page' )->title            = __( 'Home Page Settings', 'marsx' );
    $wp_customize->get_section( 'static_front_page' )->active_callback  = 'is_front_page';
    $wp_customize->get_section( 'static_front_page' )->priority         = 12;
    $wp_customize->get_section( 'header_image' )->priority              = 11;
    $wp_customize->get_section( 'title_tagline' )->priority             = 10;
    
    /**
     * Add New stuff to the Customizer
     */
    // ___Front Page Options___//
//    $wp_customize->add_section( 'home_options',
//            array(
//                'title'             => __( 'Home Page options', 'marsx' ),
//                'priority'          => 150,
//                'active_callback'   => 'is_front_page',
//            ) );
    
        /**
         * Add a Featured Headline Area
         */
        $wp_customize->add_setting( 'home_headline',
                array(
                    'default'           => __( 'We are MarsX.', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'home_headline', 
                array(
                    'type'              => 'text',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Home headline', 'marsx' ),
                    'description'       => __( 'Put a nice attention-grabbing headline here.', 'marsx' ),
                ) );
        
        $wp_customize->add_setting( 'home_headline_display',
                array(
                    'default'           => false,
                    'sanitize_callback' => 'marsx_sanitize_checkbox',
                ) );
        
        $wp_customize->add_control( 'home_headline_display', 
                array(
                    'type'              => 'checkbox',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Display Home page headline?', 'marsx' ),
        ) );
        
        $wp_customize->add_setting( 'marsx_line' );
        $wp_customize->add_control( new MarsX_Misc_Control( $wp_customize, 'marsx_line' ), array(
                'section'   => 'static_front_page',
                'type'      => 'line',
        ) );
        
        /**
         * Icon Blocks Title + Description
         */
        $wp_customize->add_setting( 'icon_blocks_title',
                array(
                    'default'           => __( 'What we do', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'icon_blocks_title', 
                array(
                    'type'              => 'text',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Featured Blocks', 'marsx' ),
                    'description'       => __( 'Configure a headline and description for this section.', 'marsx' ),
                ) );
        
        $wp_customize->add_setting( 'icon_blocks_desc',
                array(
                    'default'           => __( 'Making everything better', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'icon_blocks_desc', 
                array(
                    'type'              => 'textarea',
                    'section'           => 'static_front_page',
                ) );
        
        $wp_customize->add_setting( 'icon_blocks_display',
                array(
                    'default'           => false,
                    'sanitize_callback' => 'marsx_sanitize_checkbox',
                ) );
        
        $wp_customize->add_control( 'icon_blocks_display', 
                array(
                    'type'              => 'checkbox',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Display Featured Blocks?', 'marsx' ),
                ) );
        
        /**
         * Icon Sections (4)
         */
        $num_icon_sections = 4;
        
        // Create a setting and control for each of the icon sections available in the theme.
        for ( $i = 1; $i < ( 1 + $num_icon_sections ); $i++ ) {
                $wp_customize->add_setting( 'icon_block_' . $i . '_icon',
                        array(
                            'default'           => 'fa-gift',
                            'sanitize_callback' => 'absint',
                        ) );
                
                $wp_customize->add_control( 'icon_block_' . $i . '_icon', 
                        array(
                            /* Translators: %d is the icon block number */
                            'description'       => sprintf( __( 'Define Icon Block %1$d.<br>For icons, input any <a href="%2$s" target="_blank">Font Awesome icon</a>.', 'marsx' ), $i, 'http://fontawesome.io/icons/' ),
                            'section'           => 'static_front_page',
                            'type'              => 'text',
                            'sanitize_callback' => 'marsx_sanitize_text'
                        ) );
                
                $wp_customize->add_setting( 'icon_block_' . $i . '_content',
                        array(
                            'default'           => false,
                        ) );
                
                $wp_customize->add_control( 'icon_block_' . $i . '_content', 
                        array(
                            'type'              => 'dropdown-pages',
                            'section'           => 'static_front_page',
                        ) );
        }
        
        /**
         * Featured Pages Title + Description
         */
        $wp_customize->add_setting( 'featured_pages_title',
                array(
                    'default'           => __( 'Features', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'featured_pages_title', 
                array(
                    'type'              => 'text',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Featured Pages', 'marsx' ),
                    'description'       => __( 'Configure a headline and description for this section.', 'marsx' ),
                ) );
        
        $wp_customize->add_setting( 'featured_pages_desc',
                array(
                    'default'           => __( 'Check out what we\'re doing', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'featured_pages_desc', 
                array(
                    'type'              => 'textarea',
                    'section'           => 'static_front_page',
                ) );
        
        $wp_customize->add_setting( 'featured_pages_display',
                array(
                    'default'           => false,
                    'sanitize_callback' => 'marsx_sanitize_checkbox',
                ) );
        
        $wp_customize->add_control( 'featured_pages_display', 
                array(
                    'type'              => 'checkbox',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Display Featured Pages?', 'marsx' ),
        ) );
        
//        $wp_customize->add_setting(
//                'featured_posts_category',
//                array(
//                'default'   => false,
//                )
//        );
//        $wp_customize->add_control( 'featured_posts_category', array(
//                'type'      => 'select',
//                'choices'   => array( 'Uncategorized', 'Other' ),
//                'section'   => 'home_options',
//                'label'     => __( 'Featured Post Category (optional)', 'marsx' ),
//        ) );
        
        /**
         * Featured Pages Areas (3)
         */
        $num_f_pages_sections = 3;
        
        // Create a setting and control for each of the featured page sections available in the theme.
        for ( $i = 1; $i < ( 1 + $num_f_pages_sections ); $i++ ) {
                $wp_customize->add_setting( 'featured_page_' . $i,
                        array(
                            'default'           => false,
                            'sanitize_callback' => 'absint',
                        ) );
                
                $wp_customize->add_control( 'featured_page_' . $i, 
                        array(
                            /* Translators: %d is the Featured Page number. */
                            'description'       => sprintf( __( 'Select Featured Page %d.', 'marsx' ), $i ),
                            'type'              => 'dropdown-pages',
                            'section'           => 'static_front_page',
                ) );
        }
        
        /**
         * Add a Call To Action Area
         */
        $wp_customize->add_setting( 'cta_headline',
                array(
                    'default'           => __( 'Change the world with us!', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'cta_headline', 
                array(
                    'type'              => 'text',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Call to Action', 'marsx' ),
                    'description'       => __( 'Put a nice attention-grabbing headline here.', 'marsx' ),
                ) );
        
        $wp_customize->add_setting( 'cta_button',
                array(
                    'default'           => __( 'Join!', 'marsx' ),
                    'sanitize_callback' => 'marsx_sanitize_text',
                ) );
        
        $wp_customize->add_control( 'cta_button', 
                array(
                    'type'              => 'text',
                    'section'           => 'static_front_page',
                    'description'       => __( 'Call to Action button text.', 'marsx' ),
                ) );
        
        $wp_customize->add_control( 'cta_button_dest',
                array(
                    'default'           => false,
                ) );
        
        $wp_customize->add_control( 'cta_button_dest',
                array(
                    'type'              => 'dropdown-pages',
                    'section'           => 'static_front_page',
                    'description'       => __( 'Select the Page for the Call to Action button to link to.', 'marsx' ),
                ) );
        
        $wp_customize->add_setting( 'cta_display',
                array(
                    'default'           => false,
                    'sanitize_callback' => 'marsx_sanitize_checkbox',
                ) );
        
        $wp_customize->add_control( 'cta_display', 
                array(
                    'type'              => 'checkbox',
                    'section'           => 'static_front_page',
                    'label'             => __( 'Display Call to Action?', 'marsx' ),
        ) );

}
add_action( 'customize_register', 'marsx_customize_register', 12 );


/**
 * Sanitize Text
 */
function marsx_sanitize_text( $input ) {
	return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Logo style
 */
function marsx_sanitize_logo_style( $input ) {
	$valid = array(
				'hide-title'  => __( 'Only logo', 'marsx' ),
				'show-title'  => __( 'Logo plus site title &amp; description', 'marsx' ),
			);
	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}
/**
 * Checkboxes
 */
function marsx_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function marsx_customize_preview_js() {
    
        /* Dequeue Oblique Theme Info scripts and styles */
        wp_dequeue_script( 'customizer-info-js' );
        wp_dequeue_style( 'customizer-info-style' );
        
        /* Load Customizer functions from Parent Theme (Oblique) */
	wp_enqueue_script( 'marsx_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
        
}
add_action( 'customize_preview_init', 'marsx_customize_preview_js' );

function marsx_customizer_control() {
    
    /* MarsX Customizer controller script */
    wp_enqueue_script( 'marsx_customizer_control', get_stylesheet_directory_uri() . '/js/customizer-control.js', array( 'jquery' ), '20161208', true );
    
}
add_action( 'customize_controls_print_footer_scripts', 'marsx_customizer_control' );
