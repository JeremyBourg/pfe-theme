<div class="section excerpt"
<?php if(get_sub_field("color")): ?>
style="background-color: <?php the_sub_field("color"); ?>;"
<?php endif; ?>
	<div class="wrapper">
		<h4><?php the_sub_field('content'); ?></h4>
		<a class="button" href="<?php the_sub_field('lien_vers'); ?>">En savoir plus</a>
	</div>
</div>

