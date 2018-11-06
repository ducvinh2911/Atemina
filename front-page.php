<?php
/**
 * The template for displaying the front page.
 *
 * This is the template that displays on the front page only.
 *
 * @package Atemina
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main site-main-homepage" role="main">
			<div class="container-full">	
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->  
					<?php
					while ( have_posts() ) :
						the_post(); 
						?>
							<div class="slider-home">
								<?php if(get_field('slider_home')): ?>

									<ul class="owl-carousel owl-theme slider-home-wapper">

										<?php while(has_sub_field('slider_home')): ?>

											<li class="item"> 
												<img src="<?php the_sub_field('image_slide'); ?>" alt="anime banner">  
												<div class="slider-content">
													<h2><?php the_sub_field('title_slide'); ?></h2>
													<div><?php the_sub_field('description_slide'); ?></div>
												</div>
											</li>


										<?php endwhile; ?>

									</ul>

								<?php endif; ?>
							</div>
						<?php

					endwhile; // End of the loop.
					?>

					<?php  	get_template_part( 'template-parts/content', 'pagehome' );  ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
