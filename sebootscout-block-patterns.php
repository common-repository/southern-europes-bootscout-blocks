<?php
/**
 * Plugin Name:      Southern Europe's BootScout Blocks
 * Plugin URI:       https://southerneurope-bso.org.uk
 * Description:      Block Patterns for Southern Europe.
 * Version:          1.0.0
 * Author:           Thomas Thorne
 * Author URI:       https://thomasthorne.me
 */
 
 // If this file is called directly, abort.
 if ( ! defined( 'WPINC' ) ) {
	 die;
 }
 
 /**
  * Currently plugin version.
  */
 define( 'SEBOOTSCOUT_BLOCK_PATTERNS_VERSION', '1.0.0' );
 
require_once( 'inc/patterns.php' );

/**
 * Load Pattern category
 */

register_block_pattern_category(
    'SE-Blocks',
    array( 'label' => __( 'SE-Blocks', 'sebootscout-block-patterns' ) )
);

/**
 * Dependencie Loader
 */

require_once __DIR__ . '/vendor/autoload.php';
add_action( 'plugins_loaded', function() {
  WP_Dependency_Installer::instance( __DIR__ )->run();
});


/**
 * CSS
 */

function sebootscout_block_pattern_scripts()
{
  wp_enqueue_style('sebootscout-block-patterns-style', plugin_dir_url(__FILE__) . 'sebootscout-block-style.css', array(), 1.0);
}

add_action('wp_enqueue_scripts', 'sebootscout_block_pattern_scripts');

 /** 
  * function sebootscout_enqueue_frontend() {
  *   wp_enqueue_style( 'sebootscout-block-patterns', plugins_url( 'sebootscout-block-style.css', __DIR__ ), array(), '1.0' );
  * }
  * add_action( 'wp_enqueue_scripts', 'sebootscout_enqueue_frontend' );
  */ 