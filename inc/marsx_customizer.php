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
    // $wp_customize->get_setting( '' )->default = '#181c1f'; // SpaceX background color
    $wp_customize->get_setting( 'primary_color' )->default = '#f7941d';
    
    /**
     * Add New stuff to the Customizer
     */
    // ___Home Page Options___//
    $wp_customize->add_section(
            'home_options',
            array(
            'title' => __( 'Home Page options', 'marsx' ),
            'priority' => 10,
            )
    );
        /**
         * Add a Featured Headline Area
         */
        $wp_customize->add_setting(
                'home_headline',
                array(
                'default'           => __( 'We are MarsX.', 'marsx' ),
                )
        );
        $wp_customize->add_control( 'home_headline', array(
                'type'        => 'text',
                'priority'    => 10,
                'section'     => 'home_options',
                'label'       => __( 'Home headline', 'marsx' ),
                'description' => __( 'Put a nice attention-grabbing headline here.', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'home_headline_display',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'home_headline_display', array(
                'type'      => 'checkbox',
                'section'   => 'home_options',
                'label'     => __( 'Display Home page headline?', 'marsx' ),
        ) );
        $wp_customize->add_setting( 'marsx_line' );
        $wp_customize->add_control( new MarsX_Misc_Control( $wp_customize, 'marsx_line' ), array(
                'section'   => 'home_options',
                'type'      => 'line',
        ) );
        
        /**
         * Add 4 Icon & Intro Text Areas 
         */
        $wp_customize->add_setting(
                'icon_blocks_title',
                array(
                'default'           => __( 'Featured Icon Blocks Title', 'marsx' ),
                )
        );
        $wp_customize->add_control( 'icon_blocks_title', array(
                'type'      => 'text',
                'section'   => 'home_options',
                'label'     => __( 'Featured Icon Blocks Title', 'marsx' ),
                'description'   => __( 'Configure a title and description for this section.', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'icon_blocks_desc',
                array(
                'default'           => __( 'Featured Icon Blocks Description', 'marsx' ),
                )
        );
        $wp_customize->add_control( 'icon_blocks_desc', array(
                'type'      => 'textarea',
                'section'   => 'home_options',
        ) );
        $wp_customize->add_setting(
                'icon_blocks_display',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'icon_blocks_display', array(
                'type'      => 'checkbox',
                'section'   => 'home_options',
                'label'     => __( 'Display Featured Icon Blocks?', 'marsx' ),
        ) );
        // Featured Icon Block One
        $wp_customize->add_setting(
                'icon_block_one_icon',
                array(
                'default'   => 'gift',
                )
        );
        $wp_customize->add_control( 'icon_block_one_icon', array(
                'type'      => 'select',
                'choices'   => array( 'gift', 'charlie' ),
                'section'   => 'home_options',
                'label'     => __( 'Block One', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'icon_block_one_content',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'icon_block_one_content', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Define the icon (above) and content (below).', 'marsx' ),
        ) );
        
        // Featured Icon Block Two
        $wp_customize->add_setting(
                'icon_block_two_icon',
                array(
                'default'   => 'gift',
                )
        );
        $wp_customize->add_control( 'icon_block_two_icon', array(
                'type'      => 'select',
                'choices'   => array( 'gift', 'charlie' ),
                'section'   => 'home_options',
                'label'     => __( 'Block Two', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'icon_block_two_content',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'icon_block_two_content', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Define the icon (above) and content (below).', 'marsx' ),
        ) );
        
        // Featured Icon Block Three
        $wp_customize->add_setting(
                'icon_block_three_icon',
                array(
                'default'   => 'gift',
                )
        );
        $wp_customize->add_control( 'icon_block_three_icon', array(
                'type'      => 'select',
                'choices'   => array( 'gift', 'charlie' ),
                'section'   => 'home_options',
                'label'     => __( 'Block Three', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'icon_block_three_content',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'icon_block_three_content', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Define the icon (above) and content (below).', 'marsx' ),
        ) );
        
        // Featured Icon Block Four
        $wp_customize->add_setting(
                'icon_block_four_icon',
                array(
                'default'   => 'gift',
                )
        );
        $wp_customize->add_control( 'icon_block_four_icon', array(
                'type'      => 'select',
                'choices'   => array( 'gift', 'charlie' ),
                'section'   => 'home_options',
                'label'     => __( 'Block Four', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'icon_block_four_content',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'icon_block_four_content', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Define the icon (above) and content (below).', 'marsx' ),
        ) );
        
        /**
         * Add 3 Featured Post Areas
         */
        $wp_customize->add_setting(
                'featured_posts_title',
                array(
                'default'           => __( 'Featured Posts Title', 'marsx' ),
                )
        );
        $wp_customize->add_control( 'featured_posts_title', array(
                'type'      => 'text',
                'section'   => 'home_options',
                'label'     => __( 'Featured Posts Title', 'marsx' ),
                'description'   => __( 'Configure a title and description for this section.', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'featured_posts_desc',
                array(
                'default'           => __( 'Featured Posts Description', 'marsx' ),
                )
        );
        $wp_customize->add_control( 'featured_posts_desc', array(
                'type'      => 'textarea',
                'section'   => 'home_options',
        ) );
        $wp_customize->add_setting(
                'featured_posts_display',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'featured_posts_display', array(
                'type'      => 'checkbox',
                'section'   => 'home_options',
                'label'     => __( 'Display Featured Posts?', 'marsx' ),
        ) );
        $wp_customize->add_setting(
                'featured_posts_category',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'featured_posts_category', array(
                'type'      => 'select',
                'choices'   => array( 'Uncategorized', 'Other' ),
                'section'   => 'home_options',
                'label'     => __( 'Featured Post Category (optional)', 'marsx' ),
        ) );
        // Featured Post One
        $wp_customize->add_setting(
                'featured_post_one',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'featured_post_one', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Select the first Featured Post.', 'marsx' ),
        ) );
        // Featured Post Two
        $wp_customize->add_setting(
                'featured_post_two',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'featured_post_two', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Select the second Featured Post.', 'marsx' ),
        ) );
        // Featured Post Three
        $wp_customize->add_setting(
                'featured_post_three',
                array(
                'default'   => false,
                )
        );
        $wp_customize->add_control( 'featured_post_three', array(
                'type'      => 'dropdown-pages',
                'section'   => 'home_options',
                'description' => __( 'Select the third Featured Post.', 'marsx' ),
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
				'show-title'  => __( 'Logo plus site title&amp;description', 'marsx' ),
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
	wp_enqueue_script( 'marsx_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'marsx_customize_preview_js' );
