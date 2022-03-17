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
				'post_content' => '
					<!-- wp:gallery {"linkTo":"media"} -->
					<figure class="wp-block-gallery has-nested-images columns-default is-cropped"><!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><a href="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-4.jpg"><img src="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-4.jpg" alt=""/></a><figcaption>Opis 1</figcaption></figure>
					<!-- /wp:image -->

					<!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><a href="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-3.jpg"><img src="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-3.jpg" alt=""/></a><figcaption>Opis 2</figcaption></figure>
					<!-- /wp:image -->

					<!-- wp:image {"sizeSlug":"large","linkDestination":"media","className":"is-style-default"} -->
					<figure class="wp-block-image size-large is-style-default"><a href="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-2.jpg"><img src="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-2.jpg" alt=""/></a><figcaption>Opis 3</figcaption></figure>
					<!-- /wp:image --></figure>
					<!-- /wp:gallery -->

					<!-- wp:image {"align":"center","width":515,"height":686,"sizeSlug":"full","linkDestination":"media","className":"is-style-default"} -->
					<div class="wp-block-image is-style-default"><figure class="aligncenter size-full is-resized"><a href="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-1.jpg"><img src="http://localhost/pive/wp-content/uploads/2022/03/Cupcakes-1.jpg" alt="" width="515" height="686"/></a><figcaption>Opis 4</figcaption></figure></div>
					<!-- /wp:image -->
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