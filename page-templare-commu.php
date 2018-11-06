<?php 
 /* Template Name: Commu page  */   

 get_header(); 
?>
	<div class="container-animator pagecommu">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
			<?php
			if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;

				/* Start the Loop */
				
				/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					 get_template_part( 'template-parts/formcomment'); 
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

		<?php
		get_sidebar();
		?>
	</div>
	<div class="clearfix"></div>
<?php
get_footer();