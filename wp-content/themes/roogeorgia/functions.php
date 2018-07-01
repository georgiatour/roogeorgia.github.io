<?php
/**
 * Setup Tourpacker Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function tourpacker_child_theme_setup() {
	load_child_theme_textdomain( 'tourpacker-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'tourpacker_child_theme_setup' );
?>