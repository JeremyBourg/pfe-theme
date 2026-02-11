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

function add_custom_roles() {
	add_role(
		"mon_petit_edouard",
		"Mon Petit Édouard",
		array("read" => true)
	);
	add_role(
		"serpentin",
		"Serpentin",
		array("read" => true)
	);
	add_role(
		"tambourin",
		"Tambourin",
		array("read" => true)
	);
}
add_action("init", "add_custom_roles");

function filter_home_posts_by_role( $query ) {
	if (current_user_can("administrator") || ! $query->is_main_query() || ! is_home() ) {
		return;
	}

	if (! is_user_logged_in() ) {
		$query->set("post__in", array(0));
		return;
	}

	$user = wp_get_current_user();

	$role_category_map = array(
		"mon_petit_edouard" => "mon_petit_edouard",
		"tambourin" => "tambourin",
		"serpentin" => "serpentin",
	);

	foreach( $user->roles as $role ) {
		if(isset($role_category_map[$role])) {
			$query->set("category_name", $role_category_map[$role]);
			return;
		}
	}

	$query->set("post__in", array(0));
}
add_action("pre_get_posts", "filter_home_posts_by_role");

// Returns a bool
function user_can_view_post( $post_id ) {
	if (current_user_can("administrator")) return true;

	if (! is_user_logged_in()) return false;

	$categories = get_the_category($post_id);
	if(empty($categories)) return false;

	$role_category_map = array(
		"mon_petit_edouard" => "mon_petit_edouard",
		"tambourin" => "tambourin",
		"serpentin" => "serpentin",
	);

	$user = wp_get_current_user();

	foreach( $categories as $cat ) {
		foreach ( $user->roles as $role ) {
			if(isset($role_category_map[$role]) && $role_category_map[$role] === $cat->slug) {
				return true;
			}
		}
	}

	return false;
}
add_action("pre_get_posts", "user_can_view_post");

// Goes through blocks ACF fields and matches the template in the /inc/ folder.
function render_blocks() {
	$part_dir = "./inc/";
	if(have_rows("blocks")) {
		while(have_rows("blocks")) {
			the_row();

			get_template_part($part_dir . get_row_layout());
		}
	}
}
