<?php if(have_rows('faq')): ?>
<div class="section faq" data-component="Dropdown">
	<div class="wrapper">
		<h2>FAQ</h2>
		<?php while(have_rows('faq')): the_row(); ?>
		<div class="faq-item">
			<div class="faq-item-header">
				<h4><?php the_sub_field('question'); ?></h4>
			</div>
			<div class="faq-item-content">
				<p><?php the_sub_field('answer'); ?></p>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
