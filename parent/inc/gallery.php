<div class="section section--no-pb">
	<div class="wrapper">
		<div class="section__header">
			<h2>Image</h2>
		</div>
	</div>
	<div class="swiper" data-component="Carousel">
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
