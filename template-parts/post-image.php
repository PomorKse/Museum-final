<?php 
	$media = get_attached_media( 'image' );
	$media = array_shift( $media );
								
	// ссылка на картинку
	$image_url = $media->guid;
								
	// выведем картинку в браузере
	echo '<img src="'. $image_url .'" />';
  ?>
