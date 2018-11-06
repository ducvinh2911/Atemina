<?php 

 /* Template Name: QA page  */   

get_header();

?>
<div class="banner-single-post">
	<div class="text-of-banner-author">
		<div class="box-content-text">
			<div class="box-1">
				<div class="title-content-text">

				</div>
				<div class="content-text">
					<!-- <?php
					$user = get_user_by( 'slug', get_query_var( 'author_name' ) );
						the_author_meta( 'display_name', $user->ID ); 
					?> -->
					Q&A
				</div>
				<div class="content-text-position">
					<!-- <?php echo  the_field('positionuser','user_'.$user->ID); ?> -->
					アニメについての質問を専門家がお答えいたします。
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix">
	
</div>
<div class="container-animator">

	<div id="primary" class="content-area">
		<div class="ads">
			<?php dynamic_sidebar( 'widget_ads_top' ); ?>
		</div>
		<main id="main" class="site-main"> 

			<?php

				$args = array(

					'post_type' => 'qa', 

					'posts_per_page'=>-1 

				);

				$the_query = new WP_Query( $args );

 

				if ( $the_query->have_posts() ) {

					echo '<div class="section-commu-row">';  

						while ( $the_query->have_posts() ) {

							$the_query->the_post(); ?>

							 <?php   $author_id = get_the_author_meta('ID'); ?> 

							 

								<div class="section-commu-item">   

									<div class="header-commu">

										<?php 

											$valueimg = get_field('imageuser','user_'.$author_id ); 

												if( $valueimg ) { 

													echo wp_get_attachment_image( get_field('imageuser','user_'.$author_id ) , 'thumbnail' ); 



												} else { 

													echo '<img src="'.get_stylesheet_directory_uri().'/images/avata.png" alt="avata">'; 

												} 													

										?> 

											<div>

											<h3><?php the_author() ?></h3>

											<p><span class="entry-date"><?php echo get_the_date(); ?></span></p>

										</div>     

										<div class="commu-action">

											<span class="number-cmt"> <?php echo get_comments_number(get_the_ID()); ?></span>

											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/cmt.png"> 

											<span>...</span> 

										</div>    

									</div>   

									<div class="content-commu"> 

										<?php the_content(); ?>

									</div>

									 <?php 

									 $comments_args = array(

												// Change the title of send button 

												'label_submit' => __( 'Send', 'textdomain' ),

												// Change the title of the reply section

												'title_reply' => __( 'Write a Reply or Comment', 'textdomain' ),

												// Remove "Text or HTML to be displayed after the set of comment fields".

												'comment_notes_after' => '',

												// Redefine your own textarea (the comment body).

												'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',

										);

										comment_form( $comments_args );

									 

									 ?>

								</div>



							<?php 

						}

					echo '</div>'; 

					wp_reset_postdata();

				} else {

					// no posts found

				}

			?>

		</main><!-- #main -->
		<div class="ads-bot">
			<?php dynamic_sidebar( 'widget_ads_bottom' ); ?>
		</div>
	</div><!-- #primary -->



<?php get_sidebar(); ?>

</div>

<?php 

get_footer();

