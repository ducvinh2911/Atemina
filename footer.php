<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Atemina
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		
				
				<div class="footer-top"> 
						<div class="container">
							<div class="row">
								<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?> 
										<?php dynamic_sidebar( 'sidebar-footer' ); ?> 
								<?php endif; ?>
							</div> 
					</div>
				</div>
				<div class="site-info">
					<div class="container">	
						<?php the_custom_logo(); ?>
						<span class="site-info-right">プライバシーポリシー　運営会社</span>
					</div>	
				</div><!-- .site-info --> 
				<div class="line3">&nbsp;</div>			
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
