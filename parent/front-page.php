<?php get_header(); ?>

<section class="hero">
	<div class="wrapper">
		<div class="hero__media">
			<?php the_post_thumbnail('full'); ?>
		</div>
		<div class="hero__content">
			<h1>
				<?php bloginfo("name"); ?>
			</h1>
			<p>
				<?php the_content(); ?>
			</p>
		</div>
	</div>
</section>

<div class="wrapper" style="text-align: center;">
	<h1>Constructeur</h1>
</div>
<?php
/* render page builder blocks */
render_blocks();
?>

<?php get_footer(); ?>
