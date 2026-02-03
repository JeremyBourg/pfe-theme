<?php

function enfant1_enqueue_styles() {
	wp_enqueue_style(
		'parent-style',
		get_parent_theme_file_uri( '/dist/styles/main.css' )
	);

	wp_enqueue_style(
		'enfant1-style',
		get_stylesheet_directory_uri() . '/custom.css',
		array('parent-style')
	);
}
add_action('wp_enqueue_scripts', 'enfant1_enqueue_styles');
