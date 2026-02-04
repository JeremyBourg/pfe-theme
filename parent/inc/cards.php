<?php if(have_rows("cards")): ?>
<div class="section">
	<div class="wrapper">
		<h2>Bloc cartes</h2>
		<div class="cards">
			<?php while(have_rows("cards")): the_row(); ?>	
			<div class="card">
				<svg class="icon">
					<use xlink:href="#icon-<?php if(get_sub_field("icon")) the_sub_field("icon"); ?>"></use>
				</svg>
				<h2><?php if(get_sub_field("subtitle")) the_sub_field("subtitle"); ?></h2>
				<p><?php if(get_sub_field("content")) the_sub_field("content"); ?></p>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</div>
<?php endif ?>
