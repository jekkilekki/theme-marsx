<?php
/**
 * 
 */
?>
<div id="front-page-extras">

        <?php 
        $setHeadline = __( 'Set headline in Customizer', 'marsx' );
        $setTitle = __( 'Set title in Customizer.', 'marsx' );
        $setDesc = __( 'Set description in Customizer.', 'marsx' );
        $setCta = __( 'Set Call to Action in Customizer.', 'marsx' );
        $setButton = __( 'Call to Action', 'marsx' );
        
        /**
         * Front Page Headline
         */
        if ( get_theme_mod( 'home_headline_display', false ) ) : ?>
        <div class="front-page-headline-container front-page-container">
            <?php // We are NOT using an svg-block here so that the headline lines up perfectly with the header image ?>
            <div class="front-page-headline">
                <div class="container content-wrapper">
                    <h1><?php echo get_theme_mod( 'home_headline', $setHeadline ); ?></h1>
                </div>
            </div>
            
                <style> 
                    .front-headline-svg.svg-block { 
                        <?php if ( get_theme_mod( 'home_headline_display', false ) ) : ?>
                        fill: black; 
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'icon_blocks_display', false ) ) : ?>
                        background: black;
                        <?php elseif ( ! get_theme_mod( 'icon_blocks_display', false ) && ! get_theme_mod( 'featured_pages_display' ) && get_theme_mod( 'cta_display', false ) ) : ?>
                        background: white; 
                        <?php endif; ?>
                    } 
                </style>
            
            <div class="svg-container single-post-svg single-svg-bottom front-headline-svg svg-block">
                    <?php oblique_svg_4(); ?>
            </div>
        </div><!-- .front-page-headline-container -->
        <?php 
        endif; 
        
        
        /**
         * Front Page Icon Blocks Section
         */
        if ( get_theme_mod( 'icon_blocks_display', false ) ) : ?>
        <div class="front-page-block-container front-page-container icon-blocks-container">
            <?php // We are NOT using an svg-block here so that the headline lines up perfectly with the header image ?>
            <div class="front-page-section">
                <div class="container content-wrapper">
                    <h1><?php echo get_theme_mod( 'icon_blocks_title', $setTitle ); ?></h1>
                    <h3><?php echo get_theme_mod( 'icon_blocks_desc', $setDesc ); ?></h3>

                    <?php 
                    if ( get_theme_mod( 'icon_block_1_content' ) || get_theme_mod( 'icon_block_2_content' ) || get_theme_mod( 'icon_block_3_content' ) || get_theme_mod( 'icon_block_4_content' ) ) : ?>
                    <div class="front-page-icon-block-container">
                    
                    <?php
                    // Check for 4 icon blocks (the total possible)
                    for ( $i = 1; $i <= 4; $i++ ) : 

                        $pageId = get_theme_mod( 'icon_block_' . $i . '_content' );

                        // If a Page has been selected for content, only then show the icon block
                        if ( $pageId ) : ?>

                            <div class="front-page-icon-block">
                                <div class="front-page-icon">
                                    <i class="fa fa-3x <?php echo get_theme_mod( 'icon_block_' . $i . '_icon' ); ?>"></i>
                                </div>
                                <div class="front-page-block">
                                    <p>
                                        <?php
                                        // WP Query for this Page
                                        $query = new WP_Query( 'page_id=' . $pageId );
                                        if ( $query->have_posts() ) : 
                                            while ( $query->have_posts() ) : $query->the_post();
                                                the_excerpt();
                                            endwhile;
                                        endif;
                                        ?>
                                    </p>
                                </div>
                            </div>
                        <?php 
                        endif; 

                        // Reset our post data
                        wp_reset_postdata();

                    endfor; ?>
                    
                    </div><!-- .front-page-icon-block-container -->
                    
                    <?php
                    endif; ?>
                </div>
            </div><!-- .front-page-section -->
            
                <style> 
                    .front-icons-svg.svg-block { 
                        <?php if ( get_theme_mod( 'icon_blocks_display', false ) ) : ?>
                        fill: #282828; 
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'cta_display', false ) && ! get_theme_mod( 'featured_pages_display' ) ) : ?>
                        background: white;
                        <?php endif; ?>
                    } 
                </style>
            
            <div class="svg-container single-post-svg single-svg-bottom front-icons-svg svg-block">
                    <?php oblique_svg_4(); ?>
            </div>
        </div><!-- .front-page-block-container -->    
        <?php 
        endif;
        
        /**
         * Front Page Featured Pages Section
         */
        if ( get_theme_mod( 'featured_pages_display', false ) ) : ?>
        <div class="front-page-section-container front-page-container featured-pages-container">
            <?php // We are NOT using an svg-block here so that the headline lines up perfectly with the header image ?>
            <div class="front-page-section">
                <div class="container content-wrapper">
                    <h1><?php echo get_theme_mod( 'featured_pages_title', $setTitle ); ?></h1>
                    <h3><?php echo get_theme_mod( 'featured_pages_desc', $setDesc ); ?></h3>

                    <?php 
                    if ( get_theme_mod( 'featured_page_1' ) || get_theme_mod( 'featured_page_2' ) || get_theme_mod( 'featured_page_3' ) ) : ?>
                    <div id="ob-grid" class="front-page-icon-block-container grid-layout masonry">
                    
                    <?php 
                    // Check for 3 Featured Pages (the total possible)
                    for ( $i = 1; $i <= 3; $i++ ) : 

                        $featId = get_theme_mod( 'featured_page_' . $i );

                        // If a Page has been selected for content, only then show the icon block
                        if ( $featId ) : ?>

                            <!--<article class="front-page-feature">-->
                                <?php
                                // WP Query for this Page
                                $query = new WP_Query( 'page_id=' . $featId );
                                if ( $query->have_posts() ) : 
                                    while ( $query->have_posts() ) : $query->the_post(); 
                                
                                        get_template_part( 'content' );
                                    
                                    endwhile;
                                endif;
                                ?>
                            <!--</article>-->
                        <?php 
                        endif; 

                        // Reset our post data
                        wp_reset_postdata();

                    endfor; ?>
                        
                    </div><!-- .front-page-icon-block-container -->
                    
                    <?php
                    endif; ?>
                </div><!-- .front-page-section -->
            </div>
            
                <style> 
                    .front-features-svg.svg-block { 
                        <?php if ( get_theme_mod( 'featured_pages_display', false ) ) : ?>
                        fill: white; 
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'cta_display', false ) ) : ?>
                        background: white;
                        <?php endif; ?>
                    } 
                </style>
            
            <div class="svg-container single-post-svg single-svg-bottom front-features-svg svg-block">
                    <?php oblique_svg_4(); ?>
            </div>
        </div><!-- .front-page-section-container -->
        <?php 
        endif;
        
        /**
         * Front Page Featured Pages Section
         */
        if ( get_theme_mod( 'cta_display', false ) ) : ?>
        <div class="front-page-cta-container front-page-container">
            <?php // We are NOT using an svg-block here so that the headline lines up perfectly with the header image ?>
            <div class="front-page-headline">
                <div class="container content-wrapper">
                    <h1><?php echo get_theme_mod( 'cta_headline', $setCta ); ?></h1>
                    <a class="button" href="#"><?php echo get_theme_mod( 'cta_button', $setButton ); ?></a>
                </div>
            </div>
            
                <style> 
                    .front-cta-svg.svg-block { 
                        <?php if ( get_theme_mod( 'cta_display', false ) ) : ?>
                        fill: white; 
                        <?php endif; ?>
                        <?php if ( get_theme_mod( 'icon_blocks_display', false ) ) : ?>
                        /*background: black;*/
                        <?php endif; ?>
                    } 
                </style>
            
            <div class="svg-container single-post-svg single-svg-bottom front-cta-svg svg-block">
                    <?php oblique_svg_4(); ?>
            </div>
        </div><!-- .front-page-cta-container -->
        <?php
        endif; ?>
        
    </div>

