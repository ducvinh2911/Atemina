<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atemina
 */

get_header();
?>
<div class="banner-single-post">
		<div class="text-of-banner-author">
			<div class="box-content-text">
				<div class="box-1">
					<div class="content-text">
						<?php single_post_title(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="breadcrumb-blog">
		<div class="detail-breadcrumb">
			<?php
	        	bcn_display();
	        ?>
		</div>
	</div>
	<div class="container-blog-single">
		
		<div id="primary" class="content-area">
			<div class="ads">
				<?php dynamic_sidebar( 'widget_ads_top' ); ?>
			</div>
			<main id="main" class="site-main">
			<?php
			if ( have_posts() ) :
				if ( is_home() && ! is_front_page() ) :
				endif;
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'page' );
					endwhile; // End of the loop.
			else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			?>
			</main><!-- #main -->
			<div class="ads-bot">
				<?php dynamic_sidebar( 'widget_ads_bottom' ); ?>
			</div>
		</div><!-- #primary -->
		<?php
		get_sidebar();
		?>
	</div>
	<div class="clearfix"></div>
<?php
get_footer();

