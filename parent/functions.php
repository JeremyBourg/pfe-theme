<?php
/* function definitions for blocks */
add_theme_support("post-thumbnails");

register_nav_menus(array(
	'main_menu' => 'Menu principal',
	'footer_menu' => 'Menu du pied de page',
));


function render_blocks() {
	$part_dir = "./inc/";
	if(have_rows("blocks")) {
		while(have_rows("blocks")) {
			the_row();

			get_template_part($part_dir . get_row_layout());
		}
	}
}

$placeholder = get_bloginfo("template_url") . "/strawberry.jpg";
