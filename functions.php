<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_theme_support(
	'custom-logo',
	[
        'height'      => 60,
        'width'       => 100,
        'flex-width'  => true,
        'flex-height' => true,
	]
);

function add_theme_menus() {
	register_nav_menus(array(
		'primary' => ('Top Menu'),
	));
}

add_action('init', 'add_theme_menus');

function theme_scripts() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version);
}
add_action('wp_enqueue_scripts', 'theme_scripts');