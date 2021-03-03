<?php 
/* 
Plugin Name: Hide Version String 
Plugin URI: https://github.com/YOURLS/YOURLS/issues/1878 
Description: Plugin to hide the version string in the footer. 
Version: 0.1 
Author: chtaube 
Author URI: http://github.com/chtaube 
*/  

if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_filter( 'html_footer_text', 'hide_version_string' ); 

function hide_version_string( $value ) { 
return preg_filter( '/ v .* \&ndash; /', ' &ndash; ', $value );
}
/* echo $value."<!-- ttzztt -->";*/