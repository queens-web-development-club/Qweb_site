<?php

// Load Custom Classes

define('classes_folder', __DIR__.'/classes');

$classes_dir = opendir(classes_folder);
$c = 0;

while( ($class_file = readdir($classes_dir)) !== false ) {
	
	if( in_array($class_file, array('.','..', 'BB_Framework')) )
		continue;
	
	$sub_dir = classes_folder.'/'.$class_file;
	
	if( is_dir($sub_dir) ) {
		$sub_dir_opendir = opendir($sub_dir);
		while( ($sub_dir_class_file = readdir($sub_dir_opendir)) !== false ) {

			if( strpos($sub_dir_class_file, '.class.php') !== false ) {
			    include_once( $sub_dir . '/' . $sub_dir_class_file );
			    $child_class_dir_path = $sub_dir. '/child-classes';
			    if( file_exists($child_class_dir_path) && is_dir($child_class_dir_path) ) {
				    $child_class_dir = opendir($child_class_dir_path);
				    while( ( $child_class_file  = readdir($child_class_dir) ) !== false ) {
					    if( strpos($child_class_file, '.class.php') !== false ) {
						    include_once($child_class_dir_path . '/' .$child_class_file);
					    }
				    }
				    
			    }
			}
		}
		
	}else if( strpos($class_file, '.class.php') ) {
	    include_once( classes_folder . '/' . $class_file );
	}
	
}

closedir($classes_dir);