<?php

define('ASSETS_DIRECTORY', __DIR__.'/');
define('TEMPLATES_DIRECTORY', ASSETS_DIRECTORY.'templates/');
define('PAGE_TEMPLATES_DIRECTORY', ASSETS_DIRECTORY.'page-templates/');
define('FUNCTIONS_DIRECTORY', __DIR__.'/functions');
define('VENDORS_DIR', __DIR__.'/vendors/');

$dir = opendir(FUNCTIONS_DIRECTORY);

while( ($currentFile = readdir($dir)) !== false ) {

	$file_extention = explode('.', $currentFile);

	if ( end($file_extention) !== 'php') {
        continue;
    }

    include_once( FUNCTIONS_DIRECTORY . '/' . $currentFile );

}

closedir($dir);
