<?php

add_action('admin_init', 'bb_required_pages');

function bb_required_pages() {

	// Set Required Pages ( So user doesn't delete )
	$required_pages = [
		[
			'slug' => 'home',
			'title' => 'Home'
		],
		[
			'slug' => 'about-us',
			'title' => 'About Us'
		],
		[
			'slug' => 'team',
			'title' => 'Team'
		],
		[
			'slug' => 'portfolio',
			'title' => 'Portfolio'
		],
		[
			'slug' => 'contact',
			'title' => 'Contact'
		]

	];

	foreach( $required_pages as $page ) {

		$options = array_replace_recursive([
			'slug' =>	null,
			'title' =>	null,
			'parent' => false
		], $page);
		extract( $options );

		// See if page exists
		$check_page = get_posts([
			'post_type' =>		'page',
			'name' => 			$slug,
			'post_status' => 	['any', 'trash'],
			'posts_per_page' => 1
		]);

		// Create Page if doesn't exist
		if( empty($check_page) ) {

			if( $parent ) {
				$parent = get_posts([
					'post_type' =>	'page',
					'name' =>		$parent
				]);
				$parent = $parent ? $parent[0]->ID : false;

			}

			wp_insert_post([
				'post_type' => 		'page',
				'post_name' =>		$slug,
				'post_title' => 	$title,
				'post_status' =>	'publish',
				'post_parent' =>	$parent ? $parent : 0
			]);
		}else{
			// Make sure the pages are published
			if( $check_page[0]->post_status != 'publish' ) {
				wp_update_post([
					'ID' => $check_page[0]->ID,
					'post_status' => 'publish'
				]);
			}
		}
	}

}
