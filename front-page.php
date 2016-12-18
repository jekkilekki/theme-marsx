<?php
/**
 * The template for displaying the landing page/blog posts
 * The functions used here can be found in includes/landing-page.php
 *
 * @package MarsX
 */

get_header(); ?>

    <div id="front-page-extras">

        <?php 
        /**
         * Front Page Headline
         */
        if ( get_theme_mod( 'home_headline_display', false ) ) : ?>

            <div class="svg-container single-post-svg svg-block">
                    <?php oblique_svg_1(); ?>
            </div>
            <div class="front-page-headline">
                <h1><?php echo get_theme_mod( 'home_headline' ); ?></h1>
            </div>
            <div class="svg-container single-post-svg single-svg-bottom svg-block">
                    <?php oblique_svg_4(); ?>
            </div>

        <?php 
        endif; 
        
        
        /**
         * Front Page Icon Blocks Section
         */
        if ( get_theme_mod( 'icon_blocks_display', false ) ) : ?>
        
            <div class="svg-container single-post-svg svg-block">
                    <?php oblique_svg_1(); ?>
            </div>
            <div class="front-page-section">
                <h1><?php echo get_theme_mod( 'icon_blocks_title' ); ?></h1>
                <h2><?php echo get_theme_mod( 'icon_blocks_desc' ); ?></h2>
                
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
            </div>
            <div class="svg-container single-post-svg single-svg-bottom svg-block">
                    <?php oblique_svg_4(); ?>
            </div>
            
        <?php 
        endif;
        
        /**
         * Front Page Featured Pages Section
         */
        if ( get_theme_mod( 'featured_pages_display', false ) ) : ?>
        
            <div class="svg-container single-post-svg svg-block">
                    <?php oblique_svg_1(); ?>
            </div>
            <div class="front-page-section">
                <h1><?php echo get_theme_mod( 'featured_pages_title' ); ?></h1>
                <h2><?php echo get_theme_mod( 'featured_pages_desc' ); ?></h2>
                
                <?php 
                // Check for 3 Featured Pages (the total possible)
                for ( $i = 1; $i <= 3; $i++ ) : 
                    
                    $featId = get_theme_mod( 'featured_page_' . $i );
                    
                    // If a Page has been selected for content, only then show the icon block
                    if ( $featId ) : ?>
                
                        <div class="front-page-feature">
                            <?php
                            // WP Query for this Page
                            $query = new WP_Query( 'page_id=' . $featId );
                            if ( $query->have_posts() ) : 
                                while ( $query->have_posts() ) : $query->the_post(); ?>
                                    <h1><?php the_title(); ?></h1>
                                    <p><?php the_excerpt(); ?></p>
                                <?php
                                endwhile;
                            endif;
                            ?>
                        </div>
                    <?php 
                    endif; 
                    
                    // Reset our post data
                    wp_reset_postdata();
                    
                endfor; ?>
            </div>
            <div class="svg-container single-post-svg single-svg-bottom svg-block">
                    <?php oblique_svg_4(); ?>
            </div>
        
        <?php 
        endif;
        
        /**
         * Front Page Featured Pages Section
         */
        if ( get_theme_mod( 'cta_display', false ) ) : ?>

            <div class="svg-container single-post-svg svg-block">
                    <?php oblique_svg_1(); ?>
            </div>
            <div class="front-page-headline">
                <h1><?php echo get_theme_mod( 'cta_headline' ); ?></h1>
                <a class="button"><?php echo get_theme_mod( 'cta_button' ); ?></a>
            </div>
            <div class="svg-container single-post-svg single-svg-bottom svg-block">
                    <?php oblique_svg_4(); ?>
            </div>

        <?php
        endif; ?>
        
    </div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
                    
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<div id="ob-grid" class="grid-layout">
			<?php while ( have_posts() ) : the_post();

				// Is this the first post of the front page?
                                $first_post = $wp_query->current_post == 0 && !is_paged() && is_front_page() ? true : false;
                                
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				if ( $first_post ) {
                                    get_template_part( 'content', 'single' );
                                } else {
                                    get_template_part( 'content', get_post_format() );
                                }

			endwhile; ?>
			</div>

			<?php marsx_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
