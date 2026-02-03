<?php

function render_hero()
{
	ob_start();
?>
	<section class="hero">
		<div class="wrapper">
			<div class="hero__media">
				<?php $image = get_sub_field("image"); ?>
				<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
			</div>
			<div class="hero__content">
				<?php if(get_sub_field("title")): ?>	
				<h1>
					enfant 1 (contenu modifié)
				</h1>
				<?php endif; ?>
				<?php if(get_sub_field("content")): ?>	
				<p>
					<?php the_sub_field("content"); ?>
				</p>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php
	return ob_get_clean();
}

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
