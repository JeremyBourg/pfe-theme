<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title<?php bloginfo('name'); ?>></title>

		<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/dist/styles/main.css" />

		<script>
		iconsPath = '<?php bloginfo('template_url') ?>/dist/';
		</script>

		<script src="<?php bloginfo('template_url'); ?>/dist/scripts/vendors.js" defer></script>
		<script src="<?php bloginfo('template_url'); ?>/dist/scripts/main.js" defer></script>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?> data-component="Scrolly">
		<header class="header" data-component="Header" data-threshold="0.2">
			<div class="wrapper">
				<a href="<?php bloginfo('url'); ?>" class="logo">
					<?php bloginfo("name"); ?>
				</a>
				<?php
				$menu = is_user_logged_in() ? "logged_in_menu" : "logged_out_menu";
				wp_nav_menu(array(
					'container' => 'nav',
					'container_class' => 'nav',
					'theme_location' => $menu,
				)); ?>
			</div>
		</header>
