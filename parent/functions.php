<?php
/* function definitions for blocks */
add_theme_support("post-thumbnails");

register_nav_menus(array(
	'main_menu' => 'Menu principal',
	'footer_menu' => 'Menu du pied de page',
));

if(!function_exists('render_gallery')) {
function render_gallery() {
	ob_start();
 ?>
	<div class="section section--no-pb">
		<div class="wrapper">
			<div class="section__header">
				<h2>Image</h2>
			</div>
		</div>
		<div class="swiper mySwiper">
			<div class="swiper-wrapper">
				<?php while(have_rows("gallery")): the_row(); ?>
					<?php $image = get_sub_field("image"); ?>
					<div class="swiper-slide">
						<?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-pagination"></div>
		</div>
	</div>
<?php
	return ob_get_clean();
}
}

if(!function_exists('render_excerpt')) {
function render_excerpt() {
	ob_start();
 ?>
	<div class="section excerpt"
<?php if(get_sub_field("color")): ?>
	style="background-color: <?php the_sub_field("color"); ?>;"
<?php endif; ?>
		<div class="wrapper">
			<h4><?php the_sub_field('content'); ?></h4>
			<a class="button" href="<?php the_sub_field('lien_vers'); ?>">En savoir plus</a>
		</div>
	</div>
<?php
	return ob_get_clean();
}}

if(!function_exists('render_hero')) {
function render_hero() {
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
					<?php the_sub_field("title"); ?>
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
}}

if(!function_exists('render_video')) {
function render_video() {
	ob_start();
?>

<?php
	return ob_get_clean();
}}

if(!function_exists('render_cards')) {
function render_cards() {
	ob_start();
?>
		
<?php
	return ob_get_clean();
}}

function render_blocks() {
	if(have_rows("blocks")) {
		while(have_rows("blocks")) {
			the_row();

			if(get_row_layout() == "gallery")
				echo render_gallery();
			elseif(get_row_layout() == "excerpt")
				echo render_excerpt();
			elseif(get_row_layout() == "hero")
				echo render_hero();
			elseif(get_row_layout() == "cards")
				echo render_cards();
			elseif(get_row_layout() == "video")
				echo render_video();
		}
	}
}

$placeholder = get_bloginfo("template_url") . "/strawberry.jpg";
