<?php
/*
 Plugin Name: Skyx-Custom
 Description: Plugin to make Custom changes for Skyx.
 Version: 1.0.1
 Author: Dev@stablewp
 Author URI: https://wp.zedexinfo.in/
*/
defined( 'ABSPATH' ) || exit();

//Define Constants
if ( ! defined( 'SKYX_PLUGIN_DIR' ) ) {
    define( 'SKYX_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
    define( 'SKYX_TEMPLATE_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/templates/' );
    define( 'SKYX_INCLUDES_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) . '/includes/' );
}

//if ( ! function_exists('sky_win_log') ) {
//    function sky_win_log($entry, $mode = 'a', $file = 'skywin-log' ) {
//        // Get WordPress uploads directory.
//        $upload_dir = wp_upload_dir();
//        $upload_dir = $upload_dir['basedir'];
//        // If the entry is array, json_encode.
//        if ( is_array( $entry ) ) {
//            $entry = json_encode( $entry );
//        }
//        // Write the log file.
//        $file  = $upload_dir . '/' . $file . '.log';
//        $file  = fopen( $file, $mode );
//        $bytes = fwrite( $file, current_time( 'mysql' ) . "::" . $entry . "\n" );
//        fclose( $file );
//
//        return $bytes;
//    }
//}

if ( ! class_exists('Skyx') ) {
    include_once SKYX_INCLUDES_DIR . "class-sx.php";
}
function sky_x_init(): Skyx
{
    return Skyx::getInstance();
}

sky_x_init();