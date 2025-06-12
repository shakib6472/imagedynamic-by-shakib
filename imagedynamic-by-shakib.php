<?php

/*
 * Plugin Name:      ImageDynamic by Shakib
* Plugin URI:        https://github.com/shakib6472/
* Description:        This is the core-helper websites Custom Plugin. All features are came from here.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      7.2
* Author:            Shakib Shown
* Author URI:        https://github.com/shakib6472/
* License:           GPL v2 or later
* License URI:       https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain:       imagedynamic-by-shakib
* Domain Path:       /languages
*/
if (!defined('ABSPATH')) {
exit; // Exit if accessed directly.
}

function register_new_dynamic_tags( $dynamic_tags_manager ) {

	require_once( __DIR__ . '/class-elementor-institute-image-tag.php' ); 

	$dynamic_tags_manager->register( new \Elementor_Institute_Image_Tag() ); 

}
add_action( 'elementor/dynamic_tags/register', 'register_new_dynamic_tags' );