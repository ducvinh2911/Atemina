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
	<?php $author_id=$post->post_author;
			$image = get_field('image_banner_blog');
	?>
	
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta-single">
				<span class="posted-on"><?php echo get_the_date();?>
				</span>
				<div class="animation-industry">
					<?php atemina_entry_cat(); ?>
				</div>
			</div><!-- .entry-meta-single -->
			<?php if( !empty($image) ): ?>
				<div class="img-single-post">
					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				</div>
			<?php endif; ?>
		<?php endif;

		if ( is_singular() ) :
			the_title( '<h2 class="entry-title-single">', '</h2>' );
		else :?>
			<h2> <?php the_field('text_for_banner'); ?></h2>
		<?php endif;
		 ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'atemina' ),
			'after'  => '</div>',
		) );
		?>
	</div>
	<!-- .entry-content -->
	<div class="share-this">
		<div class="share-fb">
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink( ); ?>" title="share-fb">
				<img src="/wp-content/themes/atemina/images/share-fb.png" alt="fb" />
			</a>
		</div>
		<div class="share-tw">
			<a href="https://twitter.com/home?status=<?php the_permalink( ); ?>" title="">
				<img src="/wp-content/themes/atemina/images/share-tw.png" alt="tw"/>
			</a>
		</div>
	</div>
	<div class="author-single">
		<div class="author-single-entry">
			<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' )); ?>" class="iw-property-avartar">
	        	<?php 
	        		echo wp_get_attachment_image( get_field('imageuser','user_'.$author_id) , 'medium' ); 
				?>
	        </a>
	        <div class="iw-property-name">
	        	<div class="profile">
	        		Profile
	        	</div>
	        	<div class="name-author">
	        		<a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' )); ?>"><?php the_author(); ?></a>
	        	</div>
	        	<div class="description-author">
	        		<div class="age-author">
	        			<?php the_field('age','user_'.$author_id); ?>
	        		</div>
	        		<div class="position-author">
	        			<?php the_field('positionuser','user_'.$author_id); ?>
	        		</div>
	        		<div class="achievements-author">
	        			<?php the_field('achievements','user_'.$author_id); ?>
	        		</div>
	        	</div>
	        	
	        </div>
	        
		</div>
		
	</div>
	<div class="post-recent-author">
		<ul>
			<?php $args = array(
			    'author'        =>  $current_user->ID,
			    'orderby'       =>  'post_date',
			    'order'         =>  'ASC',
			    'posts_per_page' => 4
			    );
			     $the_query = new WP_Query( $args ); 
	        	// The Loop
	        	if ( $the_query->have_posts() ) { 
	        	while ( $the_query->have_posts() ) {
	                $the_query->the_post(); ?> 
	                	<li><a href="<?php the_permalink(  ); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			   <?php 
	            } 
	            wp_reset_postdata();
	        } else {
	            // no posts found
	        }
	        ?>
		 </ul>
		
	</div>
	

</article><!-- #post-<?php the_ID(); ?> -->
