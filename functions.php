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

	add_theme_support('responsive-embeds');

	$starter_content = array(
		'posts'       => array(
			'home',
			'about' => array(
				'post_type' => 'page',
				'post_title' => 'Gallery',
				'post_content' => '',
			),
			'contact',
		),

		'attachments' => array(
			'image-cupcakes_1' => array(
				'file'       => 'assets/images/Cupcakes-1.jpg',
			),
			'image-cupcakes_2' => array(
				'file'       => 'assets/images/Cupcakes-2.jpg',
			),
			'image-cupcakes_3'   => array(
				'file'       => 'assets/images/Cupcakes-3.jpg',
			),
			'image-cupcakes_4'   => array(
				'file'       => 'assets/images/Cupcakes-4.jpg',
			),
		),

		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
		),

		'nav_menus'   => array(
			'primary'   => array(
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


function lightbox2($content) {
	global $post;
	$pattern = "/<a(.*?)href=('|\")(.*?).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>/i";
	$replacement = '<a$1 data-lightbox="post-image" data-title="ello" href=$2$3.$4$5$6</a>';
	$content = preg_replace($pattern, $replacement, $content);

	return $content;
}
add_filter('the_content', 'lightbox2');


function theme_scripts() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('lightBox-css', get_stylesheet_directory_uri() . '/assets/css/lightBox.css', array(), '2.11.3');
	wp_enqueue_script('lightBox-js', get_stylesheet_directory_uri() . '/assets/js/lightBox.js', array('jquery'), '2.11.3', true);

	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');