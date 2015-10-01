<div class="advanced-search box-radius">
	<form class="form-inline" action="<?php echo esc_url( home_url( '/' ) ) ?>">
		<div class="form-group search-input">
			<input value="<?php echo esc_attr( get_search_query() );?>" type="text" name="s" placeholder="<?php _e( 'What are you looking for?', 'edo' ); ?>" />
		</div>
		<button type="submit" class="btn-search main-bg"><i class="fa fa-search"></i></button>
	</form>
</div>