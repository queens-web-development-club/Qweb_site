<?php

// Echo out Safe Varaibles - wrap in extract();
function bb_safe_vars($safe_vars=array(), $untested_vars=array()){

	foreach($safe_vars as $safe_var_key => $safe_var_value){

		unset($safe_vars[$safe_var_key]);

		if( gettype($meta) == 'string' ){
			$safe_vars[$safe_var_value] = isset($untested_vars) ? $untested_vars : null;
		}else{
			$safe_vars[$safe_var_value] = isset($untested_vars[$safe_var_value]) ? $untested_vars[$safe_var_value] : null;
		}
	}

	return $safe_vars;

}

// Quick Debug Function for Easy Reading
function bb_print_r($var, $args=array()){

	$defaults = array(
		'strip_tags'	=> false,
		'allow_tags'	=> null
	);

	$options = array_merge($defaults, $args);

	if($options['strip_tags'])
	$var = strip_tags($var, $options['allow_tags']);

	echo '<pre>';
	print_r($var);
	echo '</pre>';

};

// Output Friendly Time - TODO: Expand Upon
function bb_friendly_time($minutes){

	$time = null;
	$single = null;
	$plural = null;

	if( $minutes <= 60 ) {
		$time = $minutes;
		$single = 'Minute';
		$plural = 'Minutes';
	}

    if( $minutes > 60 && $minutes < 1440 ) {
    	$time = round($minutes/60, 0);
    	$single = 'Hour';
    	$plural = 'Hours';
    }

    if( $minutes > 1440 && $minutes < 43200 ) {
    	$time = round($minutes/60/24, 0);
    	$single = 'Day';
    	$plural = 'Days';
    }

    if( $minutes > 43200 && $minutes < 518400 ) {
		$time = round($minutes/60/24/30, 0);
		$single = 'Month';
		$plural = 'Months';
    }

    if( $minutes > 518400 ) {
    	$time = round($minutes/60/24/30/12, 0);
    	$single = 'Year';
    	$plural = 'Years';
    }

    $time = $time == 1 ? $time.' '.$single : $time.' '.$plural;

    return $time;
}

function bb_post_published_time_ago($post_id=null, $append=null) {
	if( !$post_id ) {
		global $post;
		$post_id = is_object($post) && isset($post->ID) && !empty($post->ID) ? $post->ID : null;
	}

	if( !$post_id )
		return;

	$publish_time = get_the_time('U', $post_id);

	$append = $append ? ' '.$append : $append;

	return bb_friendly_time(round(abs((time() - $publish_time) / 60),0)) . $append;

}

// Grab the url for an image
function bb_image_url( $image_id, $size ) {

	$image_url = wp_get_attachment_image_src( $image_id, $size );

	$image_url = is_array($image_url) ? $image_url : array(null);

	return $image_url[0];

}

// Grab Post Thumbnail URL
function bb_get_post_thumbnail_url($post_id=null, $size='thumbnail') {
	if( !$post_id ) {
		global $post;
		$post_id = is_object($post) && isset($post->ID) && !empty($post->ID) ? $post->ID : null;
	}

	if( !$post_id )
		return;

	$image_id = get_post_thumbnail_id($post_id);

	return bb_image_url($image_id, $size);
}

function bb_the_post_thumbnail_url($post_id=null, $size='thumbnail') {
	echo bb_get_post_thumbnail_url($post_id, $size);
}

function bb_svg( $svg_name, $svg_path = null ) {
	if( $svg_path ) {
		$upload_dir = wp_upload_dir();
		$svg_path = str_replace(site_url().'/wp-content/uploads', $upload_dir['basedir'], $svg_path);
	}else{
		$svg_path = TEMPLATEPATH .'/media/svg/'. $svg_name . '.svg';
	}
	if( file_exists($svg_path) ) {
		$svg_file = file_get_contents($svg_path);
		$svg_file = str_replace('id="Layer_1" ', '', $svg_file);
		for( $x = 0; $x<10; $x++ ) {
			$svg_file = str_replace('st'.$x, 'svg-'.time().rand(), $svg_file);
		}
		return $svg_file;
	}
}

function bb_img( $image_name, $properties=array() ) {

	$image_path = TEMPLATEPATH .'/media/images/'. $image_name;

	if( file_exists($image_path) ) {

		$properties = is_array($properties) ? $properties : array();

		$default_properties = array(
			'alt'  		=> null,
			'title'		=> null,
			'width'		=> null,
			'height'	=> null
		);

		$properties = array_merge($default_properties, $properties);

		return '<img src="'.  str_replace(TEMPLATEPATH, get_bloginfo('stylesheet_directory'), $image_path) .'" width="'. $properties['width'] .'" height="'. $properties['height'] .'" title="'. $properties['title'] .'" alt="'. $properties['alt'] .'" />';
	}
}

function bb_is_mobile_body_class($classes) {

	if( wp_is_mobile() )
		$classes[] = 'mobile';

	return $classes;

}

add_filter('body_class', 'bb_is_mobile_body_class');

function bb_unregister_post_type( $post_type ) {

    global $wp_post_types;

    $wp_post_types = is_array($wp_post_types) ? $wp_post_types : array();

    if ( isset( $wp_post_types[ $post_type ] ) ) {
        unset( $wp_post_types[ $post_type ] );
        return true;
    }
    return false;
}

function bb_add_admin_menu_separator( $position ) {

	global $menu;

	$menu[ $position ] = array(
		0	=>	'',
		1	=>	'read',
		2	=>	'separator' . $position,
		3	=>	'',
		4	=>	'wp-menu-separator'
	);

	ksort($menu);

}

function bb_wp_menu($location, $nest=false) {

	$menu_locations = get_nav_menu_locations();

	$location = isset($menu_locations[$location]) ? $menu_locations[$location] : false;

	if( !$location )
		return;

	$menu = wp_get_nav_menu_items($location);

	$menu = is_array($menu) ? $menu : array();

	if( !$nest )
		return $menu;

	$nested_menu = array();

	foreach( $menu as $menu_item ) {
		if( !$menu_item->menu_item_parent ) {
			$nested_menu[$menu_item->ID] = $menu_item;
			$nested_menu[$menu_item->ID]->sub_nav = array();
		}else{
			$nested_menu[$menu_item->menu_item_parent]->sub_nav[] = $menu_item;
		}
	}

	return $nested_menu;

}

function bb_write_log( $log )  {

    if ( WP_DEBUG === true && WP_DEBUG_LOG === true ) {

        if ( is_array( $log ) || is_object( $log ) ) {
            error_log( print_r( $log, true ) );
        } else {
            error_log( $log );
        }

    }
}

function bb_add_http($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}



function bb_number_to_words( $number = 0) {

    $hyphen      = ' ';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . bb_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . bb_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = bb_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= bb_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;

}

function bb_add_body_classes($new_classes=null){

	if( empty($new_classes) )
		return;

	global $new_classes_pass;

	if( !$new_classes_pass )
		$new_classes_pass = $new_classes;
	else {
		if( is_array($new_classes) ) {
			$new_classes = implode(' ' , $new_classes);
		}
		$new_classes_pass .= ' '.$new_classes;
	}

	add_filter('body_class', function($classes) {

		global $new_classes_pass;

		if( is_array($new_classes_pass) ) {
			foreach( $new_classes_pass as $new_class ) {
				$classes[] = $new_class;
			}
		}else if( is_string($new_classes_pass) ) {
			$classes[] = $new_classes_pass;
		}

		unset($new_classes_pass);

		return $classes;
	}, 1, 2);
}

function bb_remove_body_classes($classes_to_remove=null){

	if( empty($classes_to_remove) )
		return;

	global $body_classes_to_remove;
	$body_classes_to_remove = $classes_to_remove;

	add_filter('body_class', function($classes){

		global $body_classes_to_remove;


		switch( gettype($body_classes_to_remove) ) {
		case 'string' :
						if( in_array($body_classes_to_remove, $classes) )
							unset($classes[array_search($body_classes_to_remove, $classes)]);
						break;
		case 'array' :
						foreach( $classes as $key => $class ) {
							if( in_array($class, $body_classes_to_remove) )
								unset($classes[$key]);
						}
						break;
		}

		unset($body_classes_to_remove);

		return $classes;

	}, 1, 2);

}


function bb_randomize_taxonomy_terms( $orderby, $args ){
	return $orderby = 'RAND()';
}

function bb_build( $options = array() ) {

	$options = is_array($options) ? $options : array();

	extract( array_replace_recursive( array(
		'type' => 'objects',
		'parent_directory' =>	TEMPLATES_DIRECTORY,
		'template' => 'default',
		'once' => false,
		'options' => array()
	), $options) );

	if( empty($type) )
		return false;

	$file_path = $parent_directory . $type . '/'. $template . '.php';

	$options = bb_array( $options );

	if( file_exists( $file_path ) ) {
		ob_start();

		if( $once )
			include_once( $file_path );
		else
			include( $file_path );

		$file_contents = ob_get_contents();

		ob_end_clean();

		return $file_contents;
	}


}


function bb_hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}

function bb_array( $array ) {
	return is_array( $array ) ? $array : array();
}

function bb_adjust_hex($hex, $steps) {
	// Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}

function bb_acf_get_image_url( $image_array, $size ) {
	$image_array = bb_array( $image_array );

	if( !$size )
		return null;

	if( isset( $image_array['sizes'][$size] ) ) {
		return $image_array['sizes'][$size];
	}
}

function bb_bkg_img($image_url) {
	if($image_url) {
		return 'background-image: url(\''. $image_url .'\')';
	}
}
