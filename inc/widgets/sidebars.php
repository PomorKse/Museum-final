<?php
require get_template_directory() . "/inc/widgets/schedule-widget.php";
require get_template_directory() . "/inc/widgets/phone-widget.php";
require get_template_directory() . "/inc/widgets/social-widget.php";

//Подключение сайдбаров
function universal_theme_widgets_init() {

  register_sidebar(
    array(
      'name'          => esc_html__( 'Меню в подвале для графика', 'museum-theme' ),
      'id'            => 'sidebar-footer',
      'description'   => esc_html__( 'Добавьте виджет сюда', 'museum-theme' ),
      'before_widget' => '<section id="%1$s" class="footer-block %2$s"><p>',
      'after_widget'  => '</p></section>',
      'before_title'  => '',
      'after_title'   => '',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__( 'Меню в подвале для номеров телефона', 'museum-theme' ),
      'id'            => 'sidebar-footer-phone',
      'description'   => esc_html__( 'Добавьте виджет сюда', 'museum-theme' ),
      'before_widget' => '<section id="%1$s" class="footer-work-contact %2$s">',
      'after_widget'  => '</section>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__( 'Меню в подвале для соцсетей', 'museum-theme' ),
      'id'            => 'sidebar-footer-social',
      'description'   => esc_html__( 'Добавьте виджет сюда', 'museum-theme' ),
      'before_widget' => '',
      'after_widget'  => '',
    )
  );

register_sidebar(
    array(
      'name'          => esc_html__( 'Текст в подвале', 'museum-theme' ),
      'id'            => 'sidebar-footer-text',
      'description'   => esc_html__( 'Добавьте текст сюда', 'museum-theme' ),
      'before_widget' => '',
      'after_widget'  => '',
    )
  );

}
add_action( 'widgets_init', 'universal_theme_widgets_init' );