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
			<div class="banner-single-post">
				<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<div class="text-of-banner">
					<div class="box-content-text">
						<div class="box-1">
							<div class="title-content-text">
								<?php atemina_entry_cat(); ?>
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
					get_template_part( 'template-parts/content','singleblog');

				endwhile;?>

				
				<?php
			else :

				get_template_part( 'template-parts/content', 'none' );

			endif;
			?>

			</main><!-- #main -->
			<div class="post-product">
				<h2>関連商品</h2>
				<ul>
					<li class="single-product"><img src="/wp-content/uploads/2018/11/sp2.png" /></li>
					<li class="single-product"><img src="/wp-content/uploads/2018/11/sp2.png" /></li>
				</ul>
			
			</div>
			<div class="ads-bot">
				<?php dynamic_sidebar( 'widget_ads_bottom' ); ?>
			</div>
			<div class="recent-post">
				<h2>オススメの記事</h2>
				<?php 
					$terms= get_the_terms($post->ID, 'category');
						foreach($terms as $term) {
								$slug = $term->slug;
							} 
					$args = array(
						'category_name'	=> 	$slug,
					    'orderby'       =>  'post_date',
					    'order'         =>  'ASC',
					    'post__not_in'			=>array($post->ID),
					    'posts_per_page' => 4
					    );
					     $the_query = new WP_Query( $args ); 
			        	// The Loop
			        	if ( $the_query->have_posts() ) { 
			        	while ( $the_query->have_posts() ) {
			                $the_query->the_post(); ?> 
			                	<div id="post-<?php the_ID(); ?>" class="content-recent">
									<a href="<?php the_permalink(  ); ?>" class="post-thumbnail" alt="<?php the_title(); ?>">
										<?php the_post_thumbnail('blog1'); ?>
									</a>
									<header class="entry-header-blog">
										<?php
										if ( 'post' === get_post_type() ) :
											?>
											<div class="entry-meta-blog">
												<?php
												atemina_entry_cat();
												?>
											</div><!-- .entry-meta -->
										<?php endif; ?>
										<?php
											the_title( '<h2 class="entry-title-blog"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
										?>
									</header><!-- .entry-header -->
								</div><!-- #post-<?php the_ID(); ?> -->
					   <?php 
			            } 
			            wp_reset_postdata();
			        } else {
			            // no posts found
			        }
			        ?>
			</div>
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
