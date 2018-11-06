<?php
/**
 * The template for displaying search forms 
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( '検索', 'placeholder', 'anime' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( '検索:', 'label', 'anime' ); ?>">
		
		<input type="submit" class="inputright search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'anime' ); ?>">
	</div>
</form>
