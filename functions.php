<?php

require get_template_directory() . "/inc/theme-tools/svg-loader.php";
require get_template_directory() . "/inc/theme-tools/css-filter.php";
require get_template_directory() . "/inc/widgets/sidebars.php";


//Добавление расширенных возможностей
if ( ! function_exists( 'museum_theme_setup' ) ) :

  function museum_theme_setup() {

		//Добавление тэга title
		add_theme_support( 'title-tag' );

		//Добавление миниатюр
		add_theme_support( 'post-thumbnails', array( 'post' ) );
		
		//Добавление пользовательского логотипа
		add_theme_support( 'custom-logo', [
					'header-text'            => 'Museum',
					'unlink-homepage-logo'   => true,
				] );
		
		//Регистрация меню
		register_nav_menus( [
			'header_menu' => 'Меню в шапке',
			'footer_menu_1' => 'Меню в подвале-1',
			'footer_menu_2' => 'Меню в подвале-2'
		] );
		
		function register_post_types(){
			register_post_type( 'event', [
				'label'  => null,
				'labels' => [
					'name'               => __( 'События', 'museum-theme' ), // основное название для типа записи
					'singular_name'      => __( 'Событие', 'museum-theme' ), // название для одной записи этого типа
					'add_new'            => __( 'Добавить событие', 'museum-theme' ), // для добавления новой записи
					'add_new_item'       => __( 'Добавить событие', 'museum-theme' ), // заголовка у вновь создаваемой записи в админ-панели.
					'edit_item'          => __( 'Редактировать событие', 'museum-theme' ), // для редактирования типа записи
					'new_item'           => __( 'Новое событие', 'museum-theme' ), // текст новой записи
					'view_item'          => __( 'Просмотреть событие', 'museum-theme' ), // для просмотра записи этого типа.
					'search_items'       => __( 'Поиск события', 'museum-theme' ), // для поиска по этим типам записи
					'not_found'          => __( 'Not found', 'museum-theme' ), // если в результате поиска ничего не было найдено
					'not_found_in_trash' => __( 'Not found in trash', 'museum-theme' ), // если не было найдено в корзине
					'parent_item_colon'  => '', // для родителей (у древовидных типов)
					'menu_name'          => __( 'События', 'museum-theme' ), // название меню
				],
				'description'         => __( 'Раздел с событиями', 'museum-theme' ),
				'public'              => true,
				// 'publicly_queryable'  => null, // зависит от public
				// 'exclude_from_search' => null, // зависит от public
				// 'show_ui'             => null, // зависит от public
				// 'show_in_nav_menus'   => null, // зависит от public
				'show_in_menu'        => true, // показывать ли в меню адмнки
				// 'show_in_admin_bar'   => null, // зависит от show_in_menu
				'show_in_rest'        => true, // добавить в REST API. C WP 4.7
				'rest_base'           => null, // $post_type. C WP 4.7
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-lightbulb',
				'capability_type'   => 'post',
				//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
				//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
				'hierarchical'        => false,
				'supports'            => [ 'title', 'editor', 'custom-fields', 'excerpt', 'thumbnail' ], // 'author','trackbacks','comments','revisions','page-attributes','post-formats'
				'taxonomies'          => [],
				'has_archive'         => true,
				'rewrite'             => true,
				'query_var'           => true,
			] );
			
			register_post_type( 'program', [
				'label'  => null,
				'labels' => [
					'name'               => __( 'Образовательные программы', 'museum-theme' ), // основное название для типа записи
					'singular_name'      => __( 'Образовательная программа', 'museum-theme' ), // название для одной записи этого типа
					'add_new'            => __( 'Добавить образовательную программу', 'museum-theme' ), // для добавления новой записи
					'add_new_item'       => __( 'Добавить образовательную программу', 'museum-theme' ), // заголовка у вновь создаваемой записи в админ-панели.
					'edit_item'          => __( 'Редактировать образовательную программу', 'museum-theme' ), // для редактирования типа записи
					'new_item'           => __( 'Новая образовательная программа', 'museum-theme' ), // текст новой записи
					'view_item'          => __( 'Просмотреть образовательную программу', 'museum-theme' ), // для просмотра записи этого типа.
					'search_items'       => __( 'Поиск образовательной программы', 'museum-theme' ), // для поиска по этим типам записи
					'not_found'          => __( 'Not found', 'museum-theme' ), // если в результате поиска ничего не было найдено
					'not_found_in_trash' => __( 'Not found in trash', 'museum-theme' ), // если не было найдено в корзине
					'parent_item_colon'  => '', // для родителей (у древовидных типов)
					'menu_name'          => __( 'Образовательные программы', 'museum-theme' ), // название меню
				],
				'description'         => __( 'Раздел с образовательными программами', 'museum-theme' ),
				'public'              => true,
				// 'publicly_queryable'  => null, // зависит от public
				// 'exclude_from_search' => null, // зависит от public
				// 'show_ui'             => null, // зависит от public
				// 'show_in_nav_menus'   => null, // зависит от public
				'show_in_menu'        => true, // показывать ли в меню адмнки
				// 'show_in_admin_bar'   => null, // зависит от show_in_menu
				'show_in_rest'        => true, // добавить в REST API. C WP 4.7
				'rest_base'           => null, // $post_type. C WP 4.7
				'menu_position'       => 5,
				'menu_icon'           => 'dashicons-book-alt',
				'capability_type'   => 'post',
				//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
				//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
				'hierarchical'        => false,
				'supports'            => [ 'title', 'editor', 'custom-fields', 'excerpt', 'thumbnail' ], // 'author','trackbacks','comments','revisions','page-attributes','post-formats'
				'taxonomies'          => [],
				'has_archive'         => true,
				'rewrite'             => true,
				'query_var'           => true,
			] );
		}
		add_action( 'init', 'register_post_types' );
  }

endif;  

add_action( 'after_setup_theme', 'museum_theme_setup');

//Подключение стилей и скриптов
function enqueue_museum_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'Open-Sans', '//fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap');
	wp_enqueue_style( 'Roboto', '//fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap');
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', 'style', time());
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', 'style', time());
	wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css', 'style', time());
	wp_enqueue_style( 'museum-theme-style', get_template_directory_uri() . '/assets/css/style.css', 'style', time());
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//code.jquery.com/jquery-3.5.1.min.js');
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', null, time(), true );	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/js/script.js', 'swiper', time(), true );		
}  
add_action( 'wp_enqueue_scripts', 'enqueue_museum_style' );

