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
				'post_title' => 'Galeria',
				'post_content' => '
					<!-- wp:gallery {"linkTo":"none"} -->
					<figure class="wp-block-gallery has-nested-images columns-default is-cropped"><!-- wp:image {"id":45,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><img src="' . get_theme_file_uri() . '/assets/images/Cupcakes-1.jpg" alt="Cupcakes"/><figcaption>Lorem Ipsum is simply dummy text</figcaption></figure>
					<!-- /wp:image -->

					<!-- wp:image {"id":47,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><img src="' . get_theme_file_uri() . '/assets/images/Cupcakes-3.jpg" alt="Cupcakes"/><figcaption>Lorem Ipsum is simply dummy text</figcaption></figure>
					<!-- /wp:image --></figure>
					<!-- /wp:gallery -->

					<!-- wp:gallery {"linkTo":"none"} -->
					<figure class="wp-block-gallery has-nested-images columns-default is-cropped"><!-- wp:image {"id":48,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><img src="' . get_theme_file_uri() . '/assets/images/Cupcakes-4.jpg" alt="Cupcakes"/><figcaption>Lorem Ipsum is simply dummy text</figcaption></figure>
					<!-- /wp:image -->

					<!-- wp:image {"id":47,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><img src="' . get_theme_file_uri() . '/assets/images/Cupcakes-3.jpg" alt="Cupcakes"/><figcaption>Lorem Ipsum is simply dummy text</figcaption></figure>
					<!-- /wp:image -->

					<!-- wp:image {"id":46,"sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><img src="' . get_theme_file_uri() . '/assets/images/Cupcakes-2.jpg" alt="Cupcakes"/><figcaption>Lorem Ipsum is simply dummy text</figcaption></figure>
					<!-- /wp:image --></figure>
					<!-- /wp:gallery -->
				',
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


function theme_scripts() {
	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/styles.css' , array(), $theme_version);

	wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, true);

	wp_enqueue_style('lightBox-css', get_template_directory_uri() . '/assets/css/lightBox.css', array(), '2.11.3');
	wp_enqueue_script('lightBox-js', get_template_directory_uri() . '/assets/js/lightBox.js', array('jquery'), '2.11.3', true);

}
add_action('wp_enqueue_scripts', 'theme_scripts');