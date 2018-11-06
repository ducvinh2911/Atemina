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
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title-blog">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title-blog"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>
	</header><!-- .entry-header -->
</article><!-- #post-<?php the_ID(); ?> -->