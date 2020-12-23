<?php
  //Фильтруем контент для вывода без изображения
  add_filter('the_content','htm_image_content_filter',11);
  
  function htm_image_content_filter($content){
    $content = preg_replace("/<img[^>]+\>/i", "", $content);
    return $content;
  }

