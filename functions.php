<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function theme_setup() {
	register_nav_menus(
		array(
			'primary' => __('Top Menu'),
		)
	);

	add_theme_support(
		'custom-logo',
		array(
			'width'       => 250,
			'height'      => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support('editor-styles');

	add_theme_support('wp-block-styles');

	add_theme_support( 'responsive-embeds');

	$starter_content = array(
		'posts'       => array(
			'home',
			'about' => array(
				'post_type' => 'page',
				'post_title' => 'Gallery',
				'post_content' =>'',
			),
			'contact',
		),

		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
		),

		'nav_menus'   => array(
			'primary'    => array(
				'name'  => __('Top Menu'),
				'items' => array(
					'link_home',
					'page_about',
					'page_contact',
				),
			),
		),
	);
	$starter_content = apply_filters('theme_starter_content', $starter_content);

	add_theme_support('starter-content', $starter_content);
}
add_action('after_setup_theme', 'theme_setup');


function theme_scripts() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version);
}
add_action('wp_enqueue_scripts', 'theme_scripts');