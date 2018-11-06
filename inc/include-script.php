<?php function atemina_scripts_cs() {
	
	wp_enqueue_style( 'blogstyle', get_template_directory_uri() . '/css/blogstyle.css' );

	//wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick.js', array(), rand(), true );
}
add_action( 'wp_enqueue_scripts', 'atemina_scripts_cs' ); 

function atemina_entry_cat() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'atemina' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( '%1$s', 'atemina' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'atemina' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( '%1$s', 'atemina' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}
	}
if ( ! function_exists( 'atemina_posted_on_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function atemina_posted_on_date() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'atemina' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

function devvn_wp_corenavi($custom_query = null, $paged = null) {
    global $wp_query;
    if($custom_query) $main_query = $custom_query;
    else $main_query = $wp_query;
    $paged = ($paged) ? $paged : get_query_var('paged');
    $big = 999999999;
    $total = isset($main_query->max_num_pages)?$main_query->max_num_pages:'';
    if($total > 1) echo '<div class="pagenavi">';
    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $total,
        'mid_size' => '10', // Số trang hiển thị khi có nhiều trang trước khi hiển thị ...
        'prev_text'    => __('<','devvn'),
        'next_text'    => __('>','devvn'),
    ) );
    if($total > 1) echo '</div>';
}

function devvn_wp_corenavi_user($total_users, $total_query,$total_pages) {
	echo '<div class="pagenavi">';
	if ($total_users > $total_query) {
			$big = 999999999;
          $current_page = max(1, get_query_var('paged'));
          echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => 'page/%#%/',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => __('<','devvn'),
        	'next_text'    => __('>','devvn'),
            'mid_size' => '10',
            ));
        echo '</div>';
    }
}
function widget_ads_top() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget ads top content', 'strappress' ),
		'id'            => 'widget_ads_top',
		'description'   => esc_html__( 'Add widgets here.', 'strappress' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title card-header">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'widget_ads_top' );


function widget_ads_bottom() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget ads bottom content', 'strappress' ),
		'id'            => 'widget_ads_bottom',
		'description'   => esc_html__( 'Add widgets here.', 'strappress' ),
		'before_widget' => '<section id="%1$s" class="widget card %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title card-header">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'widget_ads_bottom' );