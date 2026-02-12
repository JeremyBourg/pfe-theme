<div class="wrapper">
	<div class="section__header">
		<h2>Bloc citation</h2>
	</div>
</div>
<div class="section excerpt"
<?php if(get_sub_field("color")): ?>
style="background-color: <?php the_sub_field("color"); ?>;"
<?php endif; ?>
	<div class="wrapper">
		<h4><i>"<?php the_sub_field('content'); ?>"</i></h4>
		<p>- <?php the_sub_field('author'); ?></p>
	</div>
</div>

