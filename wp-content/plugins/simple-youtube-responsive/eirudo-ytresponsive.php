<?php
/*
Plugin Name: Simple YouTube Responsive
Plugin URI: https://eirudo.com/portfolios/wordpress-plugins/youtube-responsive
Text Domain: simple-youtube-responsive
Description: Embed YouTube video and Responsive using simple shortcode, and keep the video's Aspect Ratio. AMP & Lazy Load supported.
Version: 2.5
Author: Eirudo
Author URI: https://eirudo.com/
License: GPL2
Requires: WordPress version 2.5 and later
*/

// Block direct access
if ( !defined('ABSPATH') ){
	die;
}

define( 'EIRUDO_YTRESPONSIVE_VER', '2.5');
define( 'EIRUDO_YTRESPONSIVE_DIR', plugin_dir_path(__FILE__) );
define( 'EIRUDO_YTRESPONSIVE_URL', plugin_dir_url(__FILE__) );

require_once( EIRUDO_YTRESPONSIVE_DIR . 'functions.php');
require_once( EIRUDO_YTRESPONSIVE_DIR . 'classes/options.class.php' );
require_once( EIRUDO_YTRESPONSIVE_DIR . 'classes/shortcode.class.php' );
require_once( EIRUDO_YTRESPONSIVE_DIR . 'classes/about.class.php' );


/* Helper Links */
function eirudo_ytresponsive_helper( $links ){
	$helpLinks = array(
		'<a href="'.admin_url( 'admin.php?page=eirudo_ytresponsive_shortcode' ).'">Shortcodes</a>',
	);
	return array_merge( $links, $helpLinks );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'eirudo_ytresponsive_helper' );


/* Include Scripts */
function eirudo_ytresponsive_scripts(){
	wp_enqueue_style( 'eirudo-yt-responsive', EIRUDO_YTRESPONSIVE_URL . 'css/youtube-responsive.css', array(), null );

  $placing = get_option('_eirudo_ytresponsive_js', 'footer');
  if($placing === 'footer'){
    $in_footer = true;
    $jsafter = array();
  }else{
    $in_footer = false;
    $jsafter = array('jquery');
  }
	wp_enqueue_script( 'eirudo-yt-responsive', EIRUDO_YTRESPONSIVE_URL . 'js/youtube-responsive.min.js', $jsafter, null, $in_footer );
}
add_action( 'wp_enqueue_scripts', 'eirudo_ytresponsive_scripts' );

/* Defer or Async */
function eirudo_ytresponsive_jsdefer($tag, $handle) {
    $placing = get_option('_eirudo_ytresponsive_js', 'footer');
    if( $placing === 'footer' || $placing === 'header'){
      return $tag;
    }else{
      if ( 'eirudo-yt-responsive' !== $handle ){
        return $tag;
      }else{
        switch($placing){
          case 'headerdefer':
            return str_replace( ' src', ' defer src', $tag );
            break;
          case 'headerasync':
            return str_replace( ' src', ' async src', $tag );
            break;
        }
      }
    }
}
add_filter('script_loader_tag', 'eirudo_ytresponsive_jsdefer', 10, 2);