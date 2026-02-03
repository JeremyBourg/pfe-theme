<?php get_header(); ?>

<?php $placeholder = get_bloginfo("template_url") . "/strawberry.jpg" ?>

<?php
/* function definitions for blocks */

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

function render_cta() {
	ob_start();
 ?>
	<div class="section section--no-pb">
		<div class="wrapper">
			<?php the_sub_field('content'); ?>
			<a href="<?php the_sub_field('lien_vers'); ?>">En savoir plus</a>
		</div>
	</div>
<?php
	return ob_get_clean();
}
 ?>

<?php
/* render blocks */

if(have_rows("blocks")):
	while(have_rows("blocks")): the_row();

		if(get_row_layout() == "gallery"):
			echo render_gallery();
		elseif(get_row_layout() == "cta"):
			echo render_cta();
		endif;

	endwhile;
endif;
?>

<?php get_footer(); ?>
