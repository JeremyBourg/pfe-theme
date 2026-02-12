<div class="section">
	<div class="wrapper">
		<div class="section__header">
			<h2>Bloc vidéo YouTube</h2>
		</div>
	<?php
			$url = get_sub_field("url");
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match);
			$youtube_id = $match[1];
	?>
		<div class="video" data-component="YouTube" data-video-id="<?php echo $youtube_id; ?>">
			<div class="video__media js-video"></div>
		</div>
	</div>
</div>
