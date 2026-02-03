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
