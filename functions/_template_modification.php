<?php

add_filter( 'template_include', 'bb_set_page_templates');

function bb_set_page_templates( $page_template ) {

	$new_template = null;

	if( is_front_page() )
		$new_template = 'front-page.php';

	if( is_home() )
		$new_template = 'front-page.php';

	if( is_category() )
		$new_template = 'post-category.php';

	if( is_single() )
		$new_template = 'single.php';

	if( is_single() && get_post_type() === 'post' )
		$new_template = 'post-single.php';
	if( is_page('team') )
		$new_template = 'page-team.php';
	if( is_page('contact') )
		$new_template = 'page-contact.php';
	if( is_page('about-us') )
		$new_template = 'page-about-us.php';
	if( is_page('portfolio') )
		$new_template = 'page-portfolio.php';		
	if( is_search() )
		$new_template = 'page-search-results.php';

	if( is_404() )
		$new_template = '404.php';


	$page_template = $new_template ? PAGE_TEMPLATES_DIRECTORY . $new_template : $page_template;

	return $page_template;

}
