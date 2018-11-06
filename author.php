<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Atemina
 */

get_header();
?>
	<div class="banner-single-post">
		<div class="text-of-banner-author">
			<div class="box-content-text">
				<div class="box-1">
					<div class="title-content-text">
						アニメーター
					</div>
					<div class="content-text">
						<?php
						$user = get_user_by( 'slug', get_query_var( 'author_name' ) );
    						the_author_meta( 'display_name', $user->ID ); 
    					?>
					</div>
					<div class="content-text-position">
    					<?php echo  the_field('positionuser','user_'.$user->ID); ?>
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
			
			if ( $author ) :

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
					get_template_part( 'template-parts/content','singleauthor');
				?>

				
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
