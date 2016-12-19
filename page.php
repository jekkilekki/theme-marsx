<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Oblique
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
                                        // But NOT on the Front page if this is set to the Static Front Page
				if ( ! is_front_page() && ( comments_open() || get_comments_number() ) ) :
					comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>
                    
                        <?php
                        /**
                         * Front Page specific features
                         */
                        if( is_front_page() ) :
                            
                            wp_reset_postdata();
                            
                            $query = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 6, 'ignore_sticky_posts' => 1 ) );
                        
                            if ( $query->have_posts() ) : ?>

                            <?php /* Start the Loop */ ?>
                            <div id="ob-grid" class="grid-layout">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                                    <?php

                                            /*
                                             Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part( 'content', get_post_format() );
                                    ?>

                            <?php endwhile; ?>
                            </div>

                            <?php marsx_paging_nav();
                        
                            endif; 
                            
                            wp_reset_postdata();
                            
                        endif; ?>
                        
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
