<?php
add_action( 'pre_get_posts', 'theme_pre_get_posts' );

function theme_pre_get_posts( $wp_query ) {

	if(is_admin() || !$wp_query->is_main_query) {
		return;
	}

}
