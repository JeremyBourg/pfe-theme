<?php get_header(); ?>

<div class="section">
	<div class="wrapper">
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<?php the_permalink(); ?>		
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
