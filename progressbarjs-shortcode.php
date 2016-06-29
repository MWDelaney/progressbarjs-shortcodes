<?php
/*
Plugin Name: Progress Bar Shortcode
Plugin URI: 
Description: Adds shortcodes to easily create animated progress bars using progressbar.js
Version: 1.0
Author: Michael W. Delaney
Author URI: 
License: MIT
*/


/**
 * Define constants
 */
define('PROGRESSBARJS_SHORTCODES_URL', plugin_dir_url( __FILE__ ));

class ProgressbarjsShortcodes {

	/**
	 * Initialize shortcodes and conditionally include javascript
	 */

	function __construct() {
		//Initialize shortcodes
		add_action( 'init', array( $this, 'add_shortcodes' ) );

		//Include progressbar javascript
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


	/**
	 * Enqueue javascript in footer
	 */
	function enqueue_scripts() {
		wp_enqueue_script( 'progressbarjs', PROGRESSBARJS_SHORTCODES_URL . 'bower_components/progressbar.js/dist/progressbar.min.js', false, false, true );
		wp_enqueue_script( 'progressbar_shortcode_js', PROGRESSBARJS_SHORTCODES_URL . 'assets/js/main.js', array( 'jquery' ), false, true );
	}



	/**
	 * Add shortcodes
	 */
	function add_shortcodes() {
		$shortcodes = array(
	  		'progressbar'
	  	);
		foreach ( $shortcodes as $shortcode ) {
			add_shortcode( $shortcode, array( $this, $shortcode ) );

		}
	}


	/**
	 * Progress Bar shortcode
	 */
	function progressbar($atts, $content = null) {
	    $atts = shortcode_atts( array(
	        "type"      	=> 'line',
	        "value"			=> '1',
	        "color"  		=> '#FFEA82',
	        "trailColor" 	=> '#eee',
	        "strokeWidth"	=> '4',
	        "trailWidth"	=> '1'
		), $atts );

		if( isset( $GLOBALS['progressbars_count'] ) )
			$GLOBALS['progressbars_count']++;
		else
			$GLOBALS['progressbars_count'] = 0;

		$class = 'progressbar progressbar-' . $atts['type'];

		return sprintf( 
			'<div id="progressbar-%s" class="%s" data-value="%s" data-color="%s" data-trailColor="%s" data-strokeWidth="%s" data-trailWidth="%s">%s</div>',
			$GLOBALS['progressbars_count'],
			esc_attr( trim($class) ),
			$atts['value'],
			$atts['color'],
			$atts['trailColor'],
			$atts['strokeWidth'],
			$atts['trailWidth'],
			do_shortcode( $content )
		);

	}

}
new ProgressbarjsShortcodes();
