<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 */
?>

		</div>
	</div><!-- #content -->

	<div class="svg-container footer-svg svg-block">
		<?php oblique_svg_1(); ?>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<?php do_action('marsx_child_footer'); ?>
                    
                        <?php if ( has_nav_menu( 'social' ) ) : ?>
                                <nav class="social-navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
                                </nav>
                        <?php endif; ?>
                        <div class="copyright">
                            <?php marsx_dynamic_copyright(); ?>
                        </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
