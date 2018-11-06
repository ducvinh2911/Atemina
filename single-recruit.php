<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Atemina
 */

get_header();
global $post;
?>
	<?php 
		$image = get_field('image_banner_blog');
		if( !empty($image) ): ?>
			<div class="banner-single-recruit">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<div class="text-of-banner">
					<div class="box-content-text">
						<div class="box-1">
							<div class="title-content-text">
								<?php atemina_entry_cat(); ?>
								株式会社ブロダクションガイ・G
							</div>
							<div class="content-text">
								<?php the_title(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php endif; ?>
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
			<div class="tag-recruit-dn">
				<?php
					if( have_rows('tag-recruit-dn') ):
					    while ( have_rows('tag-recruit-dn') ) : the_row();
					    	?>
					    	<div class="tag-dn"><?php the_sub_field('text_recruit_dn') ?></div>
					    	<?php
					    endwhile;
					else :

					endif;
				?>
			</div>
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
				while ( have_posts() ) :
					the_post();

					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content','singlerecruit');

				endwhile;?>

				
				<?php
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
