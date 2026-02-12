<?php get_header(); ?>

<?php if(!is_user_logged_in()) wp_redirect(home_url("/connexion")); ?>

<div class="section">
	<div class="wrapper">
	<?php if(have_posts()): ?>
		<?php while(have_posts()): the_post(); ?>
			<a href="<?php the_permalink(); ?>">
				<div>
					<h2><?php the_title() ?></h2>
				</div>
			</a>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
