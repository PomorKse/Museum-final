<?php
//Добавление нового виджета Schedule_Widget
 
class Schedule_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'schedule_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: schedule_widget
			__( 'График работы', 'museum-theme' ),
			array( 'description' => __( 'Часы работы', 'museum-theme' ), 'classname' => 'widget-schedule', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_schedule_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_schedule_widget_style' ) );
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
    $description_dayoff = $instance['description_dayoff'];
    $description_weekday = $instance['description_weekday'];

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
    }
    if ( ! empty( $description_dayoff ) ) {
			echo '<span>' . $description_dayoff . '</span><br>';
    }
    if ( ! empty( $description_weekday ) ) {
			echo '<span>' . $description_weekday . '</span>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
    $title = @ $instance['title'] ?: 'График работы';
    $description_dayoff = @ $instance['description_dayoff'] ?: 'ПН: выходной';
    $description_weekday = @ $instance['description_weekday'] ?: 'ВТ-ВС: 12:00–20:00';
    ?>
    
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Заголовок:', 'museum-theme' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
    <p>
			<label for="<?php echo $this->get_field_id( 'description_dayoff' ); ?>"><?php _e( 'Время работы в выходные:', 'museum-theme' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'description_dayoff' ); ?>" name="<?php echo $this->get_field_name( 'description_dayoff' ); ?>" type="text" value="<?php echo esc_attr( $description_dayoff ); ?>">
		</p>
    <p>
      <label for="<?php echo $this->get_field_id( 'description_weekday' ); ?>"><?php _e( 'Время работы в будни:', 'museum-theme' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'description_weekday' ); ?>" name="<?php echo $this->get_field_name( 'description_weekday' ); ?>" type="text" value="<?php echo esc_attr( $description_weekday ); ?>">
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
    $instance['description_dayoff'] = ( ! empty( $new_instance['description_dayoff'] ) ) ? strip_tags( $new_instance['description_dayoff'] ) : '';
    $instance['description_weekday'] = ( ! empty( $new_instance['description_weekday'] ) ) ? strip_tags( $new_instance['description_weekday'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_schedule_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_schedule_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		wp_enqueue_script('schedule_widget_script', $theme_url .'/schedule_widget_script.js' );
	}

	// стили виджета
	function add_schedule_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_schedule_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.schedule_widget a{ display:inline; }
		</style>
		<?php
	}
} 

// регистрация Schedule_Widget в WordPress
function register_schedule_widget() {
	register_widget( 'Schedule_Widget' );
}
add_action( 'widgets_init', 'register_schedule_widget' );

