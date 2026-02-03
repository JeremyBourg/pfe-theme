<?php get_header(); ?>

<section class="hero">
    <div class="wrapper">
        <div class="hero__media">
			<img src=<?php echo $placeholder ?>"" alt="Skieur étoile" />
        </div>
        <div class="hero__content">
            <h1>
                La
                <span>crème</span>
                <br />
                de la crème
            </h1>
            <p>
            text
            </p>
            <a href="#" class="button">Joignez notre équipe</a>
        </div>
    </div>
</section>

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
