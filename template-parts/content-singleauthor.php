<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Atemina
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php $user = get_user_by( 'slug', get_query_var( 'author_name' ) );  ?>
	<header class="entry-header">
		<h2 class="entry-title-single">代表作</h2>
		<ul class="author-masterpiece">
		<?php
			// check if the repeater field has rows of data
			if( have_rows('masterpiece','user_'.$user->ID) ):
			 	// loop through the rows of data
			    while ( have_rows('masterpiece','user_'.$user->ID) ) : the_row();
			        // display a sub field value
			    ?>
			      	<li><?php the_sub_field('time_and_name','user_'.$user->ID); ?></li>
			        
			    <?php 
			    endwhile;
			else :
			    // no rows found
			endif;
		?>
		</ul>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="description-single-author"><?php the_author_meta('description',$user->ID); ?></div>
	</div>
	<header class="entry-header">
		<h2 class="entry-title-single">作品</h2>
		<ul class="author-masterpiece">
			<div id="sync1" class="owl-carousel owl-theme">
		    	<?php 
					$images = get_field('gallery_about_world_author','user_'.$user->ID);
					$size = 'full';
					if( $images ): ?>
				        <?php foreach( $images as $image ): ?>
				        	<div class="item">
		    					<h1>
				        			<img src="<?php echo wp_get_attachment_image_url( $image['ID'], $size ); ?>"/>
				        		</h1>
							</div>
				        <?php endforeach; ?>
				<?php endif; ?>
			</div>

			<div id="sync2" class="owl-carousel owl-theme">
			  	<?php 
					$images = get_field('gallery_about_world_author','user_'.$user->ID);
					$size = 'medium';
					if( $images ): ?>
				        <?php foreach( $images as $image ): ?>
				        	<div class="item">
		    					<h1>
				        			<img src="<?php echo wp_get_attachment_image_url( $image['ID'], $size ); ?>"/>
				        		</h1>
							</div>
				        <?php endforeach; ?>
				<?php endif; ?>
			</div>
		</ul>
	</header>
</article><!-- #post-<?php the_ID(); ?> -->