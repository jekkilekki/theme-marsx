<?php
/**
 * The template for displaying the landing page/blog posts
 * The functions used here can be found in includes/landing-page.php
 *
 * @package MarsX
 */

get_header(); ?>

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
