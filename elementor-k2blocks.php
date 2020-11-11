<?php
/**
 * K2 Blocks for Elementor WordPress Plugin
 *
 * @package ElementorK2Blocks
 *
 * Plugin Name: K2 Blocks for Elementor
 * Description: Amazing widgets for Elementor page builder 
 * Author: PookiDevs
 * Author URI: https://pookidevs.com/
 * Version:     1.0.0
 * Text Domain: elementor-k2blocks
 */

define( 'ELEMENTOR_K2BLOCKS', __FILE__ );

/**
 * Include the Elementor_K2blocks class.
 */
require plugin_dir_path( ELEMENTOR_K2BLOCKS ) . 'class-elementor-k2blocks.php';
