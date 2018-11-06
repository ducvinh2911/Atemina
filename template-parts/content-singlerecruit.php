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
	<?php $author_id=$post->post_author; ?>
	<header class="entry-header">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta-single">
				<?php
				atemina_posted_on_date();
				?>
				<div class="animation-industry">
					<?php atemina_entry_cat(); ?>
				</div>
			</div><!-- .entry-meta-single -->
		<?php endif;?>
			<h2 class="entry-title-single">事業紹介</h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();
		?>
		<div class="clearfix"></div>
		<h2 class="entry-title-single"><?php the_field('wanted_jobs'); ?></h2>
		<div class="go-form-apply">
			<div class="position-apply">
				プロデューサー
			</div>
			<div class="recruit-reamore-apply">
				<a href="#" title="">応募する　　＞</a>
				
			</div>
		</div>
		<?php the_field('description_job'); ?>
		<div class="clearfix"></div>
		<div class="infor-recruit">
			<table style="height: 160px;" width="577">
				<tbody>
					<tr>
						<td>雇用形態</td>
						<td><?php the_field('employment_status'); ?></td>
					</tr>
					<tr>
						<td>勤務地</td>
						<td><?php the_field('work_location'); ?></td>
					</tr>
					<tr>
						<td>勤務時間</td>
						<td><?php the_field('working_hours'); ?></td>
					</tr>
					<tr>
						<td>待遇</td>
						<td><?php the_field('treatment'); ?></td>
					</tr>
					<tr>
						<td>歓迎スキル</td>
						<td><?php the_field('welcome_skill'); ?></td>
					</tr>
					<tr>
						<td>給与</td>
						<td><?php the_field('salary'); ?></td>
					</tr>
					<tr>
						<td>備考</td>
						<td><?php the_field('remarks'); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->
