<?php if(have_rows("youtube-videos")): ?>
<div class="section">
	<div class="wrapper">
		<h2>Vidéos YouTube</h2>
	<?php
		while(have_rows("youtube-videos")): the_row();
			$url = get_sub_field("url");
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
			$youtube_id = $match[1];
	?>
		<div class="video" data-component="YouTube" data-video-id="<?php echo $youtube_id; ?>">
			<div class="video__media js-video"></div>
		</div>
	<?php endwhile; ?>
	</div>
</div>
<?php endif; ?>
