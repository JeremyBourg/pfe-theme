<?php get_header(); ?>

<?php
/* render blocks */

if(have_rows("blocks")):
	while(have_rows("blocks")): the_row();

		if(get_row_layout() == "gallery"):
			echo render_gallery();
		elseif(get_row_layout() == "cta"):
			echo render_cta();
		endif;

	endwhile;
endif;
?>

<?php get_footer(); ?>
