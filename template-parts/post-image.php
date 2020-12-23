<?php 
	$media = get_attached_media( 'image' );
	$image = array_shift( $media );
								
	// ссылка на картинку
	$image_url = $image->guid;
								
	// выведем картинку в браузере
	echo '<img src="'. $image_url .'" />';
  ?>
