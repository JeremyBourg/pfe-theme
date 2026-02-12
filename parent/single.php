<?php get_header(); ?>

<?php if(!is_user_logged_in()) wp_redirect(home_url("/connexion")); ?>

<div class="section">
	<div class="wrapper">
		<?php the_content(); ?>
	</div>
</div>


<?php

/* render page builder blocks */
render_blocks();
?>

<?php get_footer(); ?>
