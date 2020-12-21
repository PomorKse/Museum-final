<?php
//Добавление нового виджета Same_Category_Posts_Widget
  
class Same_Category_Posts_Widget extends WP_Widget {

  // Регистрация виджета используя основной класс
  function __construct() {
    // вызов конструктора выглядит так:
    // __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
    parent::__construct(
      'same_category_posts_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: same_category_posts_widget
      __( 'Еще статьи на эту тему', 'museum-theme' ),
      array( 'description' => __( 'Еще статьи на эту тему', 'museum-theme' ), 'classname' => 'widget-same-category-posts', )
    );

    // скрипты/стили виджета, только если он активен
    if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
     // add_action('wp_enqueue_scripts', array( $this, 'add_same_category_posts_widget_scripts' ));
      add_action('wp_head', array( $this, 'add_same_category_posts_widget_style' ) );
    }
  }

  /**
   * Вывод виджета во Фронт-энде
   *
   * @param array $args     аргументы виджета.
   * @param array $instance сохраненные данные из настроек
   */
  function widget( $args, $instance ) {
    $title = $instance['title'];
    $count = $instance['count'];

    echo $args['before_widget'];
    if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
    }
    if ( ! empty( $count ) ) {
      echo '<div class="row">';
      
      //Объявляем глобальную переменную
      global $post;
      $posts = get_posts([ 
        'posts_per_page' => $count,
        'post_type' => $post->post_type,
        //можно реализовать выборку статей, где больше лайков(просмотров и т.п.)
      ]);

      foreach($posts as $post) :
        ?>
          <div class="col-xs-12 col-sm-6	col-md-4 col-lg-4">
            <!--<a href="<?php echo get_the_permalink(); ?>">-->
              <div class="news-wrapp_block">
                <a href="<?php echo get_the_permalink(); ?>">
                  <?php 
                    get_template_part( 'template-parts/post-image' );
                  ?>
                  <span><?php the_field('date'); ?></span>
                  <h4><?php the_title(); ?></h4>
                </a>
              </div><!-- end .news-wrapp_block -->
            <!--</a> -->
          </div><!--end. col-xs-12 col-sm-6	col-md-4 col-lg-4-->
        <?php
      endforeach;
      echo '</div>';
      wp_reset_postdata(); // Сбрасываем $post
      echo $args['after_widget'];
    }
  }

  /**
   * Админ-часть виджета
   *
   * @param array $instance сохраненные данные из настроек
   */
  function form( $instance ) {
    $title = @ $instance['title'] ?: 'Популярные события';
    $count = @ $instance['count'] ?: '6';

    ?>
    <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:', 'museum-theme' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
      <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php _e( 'Количество постов:' ); ?></label> 
      <input class="widefat" id="<?php echo $this->get_field_id( 'count' ); ?>" name="<?php echo $this->get_field_name( 'count' ); ?>" type="text" value="<?php echo esc_attr( $count ); ?>">
    </p>
    <?php 
  }

  /**
   * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance новые настройки
   * @param array $old_instance предыдущие настройки
   *
   * @return array данные которые будут сохранены
   */
  function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

    return $instance;
  }

  // скрипт виджета
  function add_same_category_posts_widget_scripts() {
    // фильтр чтобы можно было отключить скрипты
    if( ! apply_filters( 'show_same_category_posts_widget_script', true, $this->id_base ) )
      return;

    $theme_url = get_stylesheet_directory_uri();

    wp_enqueue_script('same_category_posts_widget_script', $theme_url .'/same_category_posts_widget_script.js' );
  }

  // стили виджета
  function add_same_category_posts_widget_style() {
    // фильтр чтобы можно было отключить стили
    if( ! apply_filters( 'show_same_category_posts_widget_style', true, $this->id_base ) )
      return;
    ?>
    <style type="text/css">
      .same_category_posts_widget a{ display:inline; }
    </style>
    <?php
  }

}

// регистрация Same_Category_Posts_Widget в WordPress
function same_category_posts_widget() {
register_widget( 'Same_Category_Posts_Widget' );
}
add_action( 'widgets_init', 'same_category_posts_widget' );

?>