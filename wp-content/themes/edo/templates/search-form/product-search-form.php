<?php 
$args = array(
  'show_option_none' => __( 'All Categries', 'kutetheme' ),
  'taxonomy'    => 'product_cat',
  'class'      => 'search-category-select',
  'id'          => 'category-select',
  'hide_empty'  => 1,
  'orderby'     => 'name',
  'order'       => "desc",
  'tab_index'   => true,
  'hierarchical' => true
);
?>
<div class="advanced-search box-radius">
	<form class="form-inline woo-search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
		<div class="form-group search-category">
			<?php wp_dropdown_categories( $args ); ?>
		</div>
		<div class="form-group search-input">
			<input type="hidden" name="post_type" value="product" />
			<input type="text" name="s" placeholder="<?php _e( 'What are you looking for?', 'edo' ); ?>" value="<?php echo esc_attr( get_search_query() );?>" />
		</div>
		<button type="submit" class="btn-search main-bg"><i class="fa fa-search"></i></button>
	</form>
</div>