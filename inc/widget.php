<?php add_action( 'widgets_init', 'widget_cat' );
function widget_cat() {
        register_widget('Widget_cat');
}

class Widget_cat extends WP_Widget {

        function __construct() {
		    parent::__construct (
		      'Widget_catgory',
		      'Widget catgory custom',
		 
		      array(
		          'description' => 'display catgory custom' // mô tả
		      )
		    );
		}
        function form( $instance ) {
 			 			$default = array(
			        'title' => 'Add title here',
					);
					$instance = wp_parse_args( (array) $instance, $default);
					$title = esc_attr( $instance['title'] );
					echo "Add title here <input class='widefat' type='text' name='".$this->get_field_name('title')."' value='".$title."'  />";
        }
 
        function update( $new_instance, $old_instance ) {
        	parent::update( $new_instance, $old_instance );
	 			$instance = $old_instance;
				$instance['title'] = strip_tags($new_instance['title']);
				return $instance;
        }
        function widget( $args, $instance ) {
 			extract( $args );
			$title = apply_filters( 'widget_title', $instance['title'] );
 			?>
				<div class="cat-wisget">
	            <div class="cat-wisget-title">
	                <div class="title"><?php echo $title; ?></div>
	            </div>
	            <ul class="list_news">
	            	<?php $terms = get_terms( array( 
					    'taxonomy' => 'category',
					    'parent'   => 0,
					    'hide_empty'=>true,
					) ); 
						$curent_term =  get_query_var('category');
						$terms_cr= get_the_terms($post->ID, 'category');
						if($curent_term!=""){
							$term_cr = get_term_by('slug', $curent_term, 'category');
					    	$slug_cr = $term_cr->slug;
						}else if($terms_cr!=false){
								foreach($terms_cr as $term) {
									$slug_cr = $term->slug;
								} 
						}
	            		foreach ( $terms as $term ) {
	            			$slug = $term->slug;
	            			$name = $term->name;
	            			 ?>
					    		<li>
			                     	<a href="<?php echo get_term_link( $term ); ?>">
			                     		<?php echo $name; ?> <span>></span>
			                     	</a>
			                    </li>
					    	<?php }?>
	            </ul>
	        </div>
        <?php	
        }
 
}