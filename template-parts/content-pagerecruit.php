<div class="author-list">
	<?php 
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	$args = array(
		'order'                 => 'DESC',
		'post_type'				=>'recruit',
		'paged'          		=> $paged
	);
	if(isset($_GET['jobrecruit']) && !empty($_GET['jobrecruit'])) {
		 $args['tax_query'][]=array(
			'taxonomy'  =>  'type',
			'terms'     => $_GET['jobrecruit'] 
		);
	} else {
		if(isset($_GET['typerecruit']) && !empty($_GET['typerecruit'])) {
			 $args['tax_query'][]=array(
				'taxonomy'  =>  'type',
				'terms'     => $_GET['typerecruit'] 
			);
		}
	}	
	if(isset($_GET['locationrecruit']) && !empty($_GET['locationrecruit'])) {
		 $args['tax_query'][]=array(
			'taxonomy'  =>  'location',
			'terms'     => $_GET['locationrecruit'] 
		);
	}
	if(isset($_GET['searchrecruit']) && !empty($_GET['searchrecruit'])) {
		 $args['s']= $_GET['searchrecruit'] ;
	}
	// The Query
	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post();?>
				<div class="recruit-item">
                        <div class="recruit-item-box">
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> 
                                <?php 
                                        the_post_thumbnail('medium'); 
                                ?> 
                            </a>
                            <div class="recruit-item-content"> 
                                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                <?php the_excerpt(); ?>
                                <div class="recruit-item-bottom">
                                    <h3> <?php the_field('company'); ?></h3>
                                    <h4>掲載期間 : <?php the_field('date_recruit_start'); ?> まで <?php the_field('date_recruit_end'); ?></h4>
                                    <a class="recruit-reamore" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">></a>
                                </div>    
                            </div>
                        </div> 
                    </div>
			<?php }
		?>
		
		
		<?php
	} else {
		echo 'posts not found';
	}
	wp_reset_postdata(); ?>

	<div class="pagination">
    	<?php if (function_exists('devvn_wp_corenavi')) devvn_wp_corenavi($query); ?>
    </div>
</div>
    