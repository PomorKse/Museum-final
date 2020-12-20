<?php
//Изменяем класс выпадающего меню
add_filter( 'nav_menu_submenu_css_class', 'change_wp_nav_menu', 10, 3 );

function change_wp_nav_menu( $classes, $args, $depth ) {
	foreach ( $classes as $key => $class ) {
		if ( $class == 'sub-menu' ) {
			$classes[ $key ] = 'nav-main_double_next';
		}
	}

	return $classes;
}

// отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'150x150',
		'1536x1536',
		'2048x2048',
		] );
}

//Увеличиваем длину excerpt до 70 слов
add_filter( 'excerpt_length', function(){
	return 70;
} );