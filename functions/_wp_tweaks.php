<?php

show_admin_bar(false);

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );



add_action('admin_init', function(){
	if( !defined('DOING_AJAX') && is_user_logged_in() ) {
		global $current_user;
		if( !in_array('administrator', $current_user->roles) )
			wp_redirect(site_url());
	}
});

if( ! function_exists('fix_no_editor_on_posts_page'))
{
	/**
	 * Add the wp-editor back into WordPress after it was removed in 4.2.2.
	 *
	 * @param $post
	 * @return void
	 */
	function fix_no_editor_on_posts_page($post)
	{
		if($post->ID != get_option('page_for_posts'))
			return;

		remove_action('edit_form_after_title', '_wp_posts_page_notice');
		add_post_type_support('page', 'editor');
	}
	add_action('edit_form_after_title', 'fix_no_editor_on_posts_page', 0);
}

add_filter('upload_mimes', function( $mimes ) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
});

//add_post_type_support('page', 'excerpt');
