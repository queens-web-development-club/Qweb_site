<?php

foreach( array(

		// 'bundle' => array(
		// 	'label'			=> 'Bundles',
		// 	'labels'		=> array( 'singular_name' => 'Bundle' ),
		// 	'menu_icon'		=> null,
		// 	'has_archive'	=> false,
		// 	'rewrite'		=> array('slug'=>'bundle'),
		// 	'supports' => array( 'title', 'author'),
		// )


	) as $custom_post_type => $args ) {

	// Standard Arguements
	$standard_args = array(
		'supports' => array( 'title', 'editor', 'thumbnail', 'author', 'excerpt' ),
		'menu_position' => 5,
		'public' => true
	);

	// Overwrite standard args with args set above
	$args = array_replace( $standard_args, $args );

	// register_post_type( $custom_post_type, $args );
}

foreach( array(


		'taxonomy' => array(
			'object_type'			=> array('post'),
			'label'					=> 'Taxonomy',
			'labels'				=> array( 'singular_name' => 'Taxonomy' ),
			'public'				=> true,
			'show_ui'				=> true,
			'show_in_nav_menus'		=> true,
			'rewrite'				=> array('slug'=>'taxonomy')
		)


	) as $custom_taxonomy => $args ) {

	// Standard Arguements
	$standard_args = array(
		'show_admin_column' => true,
		'hierarchical' => true
	);

	$args = array_replace( $standard_args, $args );

	//register_taxonomy($custom_taxonomy, $args['object_type'], $args);

}

/*
add_filter( 'pre_option_tag_base', function() {

   return 'tags';

});

add_action( 'init', 'my_new_default_post_type', 1 );
function my_new_default_post_type() {

    register_post_type( 'post', array(
        'labels' => array(
            'name_admin_bar' => _x( 'Post', 'add new on admin bar' ),
        ),
        'public'  => true,
        '_builtin' => false,
        '_edit_link' => 'post.php?post=%d',
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => 'stories' ),
        'query_var' => false,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'post-formats' ),
    ) );
}
*/
