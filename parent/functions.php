<?php
/* function definitions for blocks */
add_theme_support("post-thumbnails");

add_action('init', function() {
	register_nav_menus(array(
		'logged_out_menu' => 'Menu public',
		'logged_in_menu' => 'Menu privé',
		'footer_menu' => 'Menu du pied de page',
	));
});

if(!current_user_can("administrator")) {
	add_filter('show_admin_bar', '__return_false');
}

function render_blocks() {
	$part_dir = "./inc/";
	if(have_rows("blocks")) {
		while(have_rows("blocks")) {
			the_row();

			get_template_part($part_dir . get_row_layout());
		}
	}
}
