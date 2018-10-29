<?php

function theme_scripts_and_styles() {

	$template_directory_uri = get_template_directory_uri();

	$javascript_directory = $template_directory_uri.'/javascripts/';
	$vendor_directory = $template_directory_uri.'/vendors/';

	$cache_buster = '0.0.1.000';

	/* CSS */
	wp_register_style( 'theme-style', get_bloginfo('stylesheet_directory').'/styles/theme.css', array(), $cache_buster );
	wp_enqueue_style('theme-style');
	wp_enqueue_style('hamburgers', get_bloginfo('stylesheet_directory').'/vendors/hamburgers/hamburgers.min.css');
	wp_enqueue_style('hamburgers', get_bloginfo('stylesheet_directory').'/vendors/hover/hover-min.css');


	/* JAVASCRIPT */

	wp_enqueue_script('scripts', get_bloginfo('stylesheet_directory').'/scripts/min/scripts-min.js');
	/* JAVASCRIPT */
	wp_register_script('theme-js', $javascript_directory. 'application/'. 'scripts.min.js', array( 'jquery' ), $cache_buster );

	wp_enqueue_script('theme-js');
	wp_localize_script('theme-js', 'local_data', array(
		'ajax_url' =>	admin_url( 'admin-ajax.php' )
	));


	/*
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	*/
}


add_action( 'wp_enqueue_scripts', 'theme_scripts_and_styles' );

add_action( 'wp_head', function(){
	?>
	<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<?php
	// <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	// <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
});
