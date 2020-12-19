<?php
//Добавление нового виджета Phone_Widget
 
class Phone_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'phone_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: phone_widget
			__( 'Контактные телефоны', 'museum-theme' ),
			array( 'description' => __( 'Поля для номеров телефонов', 'museum-theme' ), 'classname' => 'widget-phone', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_phone_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_phone_widget_style' ) );
		}
	}

	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
    $description_phone_1 = $instance['description_phone_1'];
    $description_phone_2 = $instance['description_phone_2'];

		echo $args['before_widget'];
    if ( ! empty( $description_phone_1 ) ) {
			echo '<a href="tel:' . $description_phone_1 . '">' . $description_phone_1 . '</a>';
    }
    if ( ! empty( $description_phone_2 ) ) {
			echo '<a href="tel:' . $description_phone_2 . '">' . $description_phone_2 . '</a>';
		}
		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
    $description_phone_1 = @ $instance['description_phone_1'] ?: '+7 (911) 111–22-33';
    $description_phone_2 = @ $instance['description_phone_2'] ?: '8 (816 2) 11-22-33';
    ?>
    
    <p>
			<label for="<?php echo $this->get_field_id( 'description_phone_1' ); ?>"><?php _e( 'Тел.:', 'museum-theme' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'description_phone_1' ); ?>" name="<?php echo $this->get_field_name( 'description_phone_1' ); ?>" type="text" value="<?php echo esc_attr( $description_phone_1 ); ?>">
		</p>
    <p>
      <label for="<?php echo $this->get_field_id( 'description_phone_2' ); ?>"><?php _e( 'Телю.', 'museum-theme' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'description_phone_2' ); ?>" name="<?php echo $this->get_field_name( 'description_phone_2' ); ?>" type="text" value="<?php echo esc_attr( $description_phone_2 ); ?>">
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
    $instance['description_phone_1'] = ( ! empty( $new_instance['description_phone_1'] ) ) ? strip_tags( $new_instance['description_phone_1'] ) : '';
    $instance['description_phone_2'] = ( ! empty( $new_instance['description_phone_2'] ) ) ? strip_tags( $new_instance['description_phone_2'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_phone_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_phone_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_stylesheet_directory_uri();

		wp_enqueue_script('phone_widget_script', $theme_url .'/phone_widget_script.js' );
	}

	// стили виджета
	function add_phone_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_phone_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.phone_widget a{ display:inline; }
		</style>
		<?php
	}
} 

// регистрация Phone_Widget в WordPress
function register_phone_widget() {
	register_widget( 'Phone_Widget' );
}
add_action( 'widgets_init', 'register_phone_widget' );

