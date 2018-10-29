<?php
Class WP_THEME_CLASS {
	
	// Create an instance of the class on a global variable
	static function instantiate() {
		global $WP_Theme;
		
		if( !is_a($WP_Theme, 'WP_THEME_CLASS') )
			$WP_Theme = new WP_THEME_CLASS();
	}
	
	function __construct( $options = array() ) {
  		
		
	}
}

// Create an instance when theme is setup
add_action('init', array('WP_THEME_CLASS', 'instantiate') );