<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Atemina
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	
	<?php if(is_singular( 'recruit' )){
		$user = get_user_by( 'slug', get_query_var( 'author_name' ) ); 
	?>
		<div class="author-sidebar">
			<div class="author-sidebar-img">
				<?php the_post_thumbnail('blog1'); ?>
			</div>
			<div class="author-sidebar-infor">
				<div class="author-1">
					株式会社プロダクションガイ・G
				</div>
				<div class="author-name">
					担当者：黒崎林檎
				</div>
				<div class="author-description">
					<h3>東京都練馬区大泉学園東宝町</h3>

					<div>Mail : info@gonsooooo.com</div>
					<div>URL : http://gonsooooo.com</div>
						<h5>その他の情報</h5>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	<?php } ?>


	<?php if(is_author()){
		$user = get_user_by( 'slug', get_query_var( 'author_name' ) ); 
	?>
		<div class="author-sidebar">
			<div class="author-sidebar-img">
				<?php
                    echo wp_get_attachment_image( get_field('imageuser','user_'.$user->ID) ,'full' ,"",array( "class" => "img-responsive" ) ); ?>
			</div>
			<div class="author-sidebar-infor">
				<div class="author-1">
					アニメーター
				</div>
				<div class="author-name">
					<?php the_author_meta( 'display_name', $user->ID ); ?>
				</div>
				<div class="author-description">
					<h3> <?php the_field('age','user_'.$user->ID); ?></h3>
					<div>Email: <?php if(!empty(get_the_author_meta( 'user_email', $user->ID ))){?>
							<a href="mailto:<?php echo get_the_author_meta( 'user_email', $user->ID ) ?>" title="Send mail">
								<?php
							echo get_the_author_meta( 'user_email', $user->ID );
						}else { echo 'updating...';} ?>
					</a>
					</div>
					<div>URL: <a href="<?php echo get_the_author_meta( 'user_url', $user->ID ) ?>" target="_blank" title="URL"><?php echo get_the_author_meta( 'user_url', $user->ID ) ?></a></div>
						<h5>その他の情報</h5>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	<?php } ?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
