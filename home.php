<?php
/*
Template Name: Главная страница
Template Post Type: page
*/

get_header(); ?>	
	<section class="hero">
		<div class="slider-wrapp">
			<!--Выводим слайдер с фото из записи-->
			<div class="swiper-container section-slider">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php 
						
						global $post;
						
						$query = new WP_Query( [
							//'posts_per_page' => 4,
							'post_type' => [
								'custom-type' => 'event',
							],
							] );
									
							if ( $query->have_posts() ) {
								while ( $query->have_posts() ) {
									$query->the_post();
					?>
					
					<div class="swiper-slide" data-num="1">
						<?php 
								$media = get_attached_media( 'image' );
								$media = array_shift( $media );
								
								// ссылка на картинку
								$image_url = $media->guid;
								
								// выведем картинку в браузере
								echo '<img src="'. $image_url .'" />';
            ?>
						<h1><?php the_title(); ?></h1>
						<a href="#" class="slider-btn">Купить билет</a>
					</div><!-- end .swiper-slide -->
					<?php 
						}
					} else {
						echo 'Постов не найдено';
					}
					
					wp_reset_postdata(); // Сбрасываем $post
					?>
				</div><!-- end .swiper-wrapper -->

				<div class="swiper-button_arrows">
					<div class="swiper-button-prev"></div>
					<div class="swiper-button_arrows_num">
						<span class="swiper-num-area">1/</span>
						<span>
						<?php
								$events = wp_count_posts('event')->publish;
								echo $events;
							?>
						</span>
					</div>
					<div class="swiper-button-next"></div>
				</div><!-- end .swiper-button_arrows -->

			</div><!-- end .swiper-container .section-slider -->
		</div><!-- end .slider-wrapp -->
	</section>

	<section class="poster">
		<div class="container">
			<h2>Афиша</h2>
			<div class="news-wrapp">
				<div class="product-tabs">
					<div class="info">
						<div class="info-header">
							<div class="info-header-tab active">Текущие</div>
							<div class="info-header-tab">Будущие</div>
							<div class="info-header-tab">Предыдущие</div>
						</div>
						<div class="info-tabcontent fade">
							<div class="grid-container">
								<div class="s">
									<div class="poster-wrapp_block">
										<img src="img/post/1.png">
										<span>20 августа — 30 сентября 2019</span>
										<h4>Приглашаем посетить выставку «История жизни в лицах»</h4>
									</div>
								</div>
								<div class="e">
									<div class="poster-wrapp_block">
										<img src="img/post/1.png">
										<span>20 августа — 30 сентября 2019</span>
										<h4>Приглашаем посетить выставку «История жизни в лицах»</h4>
									</div>
								</div>
								<div class="er">
									<div class="poster-wrapp_block">
										<img src="img/post/2.png">
										<span>30 мая 2020</span>
										<h4>5-я образовательная сессия проекта "Школа - мастерская аналитического
											рисунка и скульптуры для юных художников"</h4>
									</div>
								</div>
								<div class="t">
									<div class="poster-wrapp_block">
										<img src="img/post/3.png">
										<span>22 июня 2020</span>
										<h4>Добрый день, дорогие участники проекта!</h4>
									</div>
								</div>
								<div class="d">
									<div class="poster-wrapp_block">
										<img src="img/post/3.png">
										<span>22 июня 2020</span>
										<h4>Добрый день, дорогие участники проекта!</h4>
									</div>
								</div>
								<div class="g">
									<div class="poster-wrapp_block">
										<img src="img/post/2.png">
										<span>30 мая 2020</span>
										<h4>5-я образовательная сессия проекта "Школа - мастерская аналитического
											рисунка и скульптуры для юных художников"</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="info-tabcontent fade">
							<div class="grid-container">
								<div class="s">
									<div class="poster-wrapp_block">
										<img src="img/post/1.png">
										<span>20 августа — 30 сентября 2019</span>
										<h4>Приглашаем посетить выставку «История жизни в лицах»</h4>
									</div>
								</div>
								<div class="e">
									<div class="poster-wrapp_block">
										<img src="img/post/1.png">
										<span>20 августа — 30 сентября 2019</span>
										<h4>Приглашаем посетить выставку «История жизни в лицах»</h4>
									</div>
								</div>
								<div class="er">
									<div class="poster-wrapp_block">
										<img src="img/post/2.png">
										<span>30 мая 2020</span>
										<h4>5-я образовательная сессия проекта "Школа - мастерская аналитического
											рисунка и скульптуры для юных художников"</h4>
									</div>
								</div>
								<div class="t">
									<div class="poster-wrapp_block">
										<img src="img/post/3.png">
										<span>22 июня 2020</span>
										<h4>Добрый день, дорогие участники проекта!</h4>
									</div>
								</div>
								<div class="d">
									<div class="poster-wrapp_block">
										<img src="img/post/3.png">
										<span>22 июня 2020</span>
										<h4>Добрый день, дорогие участники проекта!</h4>
									</div>
								</div>
								<div class="g">
									<div class="poster-wrapp_block">
										<img src="img/post/2.png">
										<span>30 мая 2020</span>
										<h4>5-я образовательная сессия проекта "Школа - мастерская аналитического
											рисунка и скульптуры для юных художников"</h4>
									</div>
								</div>
							</div>
						</div>
						<div class="info-tabcontent fade">
							<div class="grid-container">
								<div class="s">
									<div class="poster-wrapp_block">
										<img src="img/post/1.png">
										<span>20 августа — 30 сентября 2019</span>
										<h4>Приглашаем посетить выставку «История жизни в лицах»</h4>
									</div>
								</div>
								<div class="e">
									<div class="poster-wrapp_block">
										<img src="img/post/1.png">
										<span>20 августа — 30 сентября 2019</span>
										<h4>Приглашаем посетить выставку «История жизни в лицах»</h4>
									</div>
								</div>
								<div class="er">
									<div class="poster-wrapp_block">
										<img src="img/post/2.png">
										<span>30 мая 2020</span>
										<h4>5-я образовательная сессия проекта "Школа - мастерская аналитического
											рисунка и скульптуры для юных художников"</h4>
									</div>
								</div>
								<div class="t">
									<div class="poster-wrapp_block">
										<img src="img/post/3.png">
										<span>22 июня 2020</span>
										<h4>Добрый день, дорогие участники проекта!</h4>
									</div>
								</div>
								<div class="d">
									<div class="poster-wrapp_block">
										<img src="img/post/3.png">
										<span>22 июня 2020</span>
										<h4>Добрый день, дорогие участники проекта!</h4>
									</div>
								</div>
								<div class="g">
									<div class="poster-wrapp_block">
										<img src="img/post/2.png">
										<span>30 мая 2020</span>
										<h4>5-я образовательная сессия проекта "Школа - мастерская аналитического
											рисунка и скульптуры для юных художников"</h4>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
		<div class="btn-wrapp">
			<a href="#" class="slider-btn btn-white">Вся афиша</a>
		</div>

		</div>
	</section>

	<section class="programs">
		<div class="container">
			<h2>Образовательные программы</h2>
			<div class="slider-wrapp">
				<div class="swiper-container programs-slider">
					<div class="swiper-wrapper">
						<div class="swiper-slide" data-num="1">
							<img src="img/prog-slider/1.png">
							<div class="programs-slide-text">
								<h3>2004 г. Александр Николаев - Весна. Новгородский Кремль</h3>
								<p>Новый образовательный проект Мастерской-музея стал победителем конкурса, который
									проводил Фонд президентских грантов в 2018 году.</p>
								<p>Задачей проекта было выявление и поддержка одаренных учеников детских школ искусств,
									расположенных в малых городах и поселках Новгородской, Ленинградской, Псковской
									областей. Основная целевая аудитория - молодежь в возрасте 14-17 лет (это ребята,
									которые находятся в ДШИ на предпрофессиональном этапе обучения), а также их
									преподаватели.</p>
							</div>
						</div>
						<div class="swiper-slide" data-num="2">
							<img src="img/prog-slider/1.png">
							<div class="programs-slide-text">
								<h3>2004 г. Александр Николаев - Весна. Новгородский Кремль</h3>
								<p>Новый образовательный проект Мастерской-музея стал победителем конкурса, который
									проводил Фонд президентских грантов в 2018 году.</p>
								<p>Задачей проекта было выявление и поддержка одаренных учеников детских школ искусств,
									расположенных в малых городах и поселках Новгородской, Ленинградской, Псковской
									областей. Основная целевая аудитория - молодежь в возрасте 14-17 лет (это ребята,
									которые находятся в ДШИ на предпрофессиональном этапе обучения), а также их
									преподаватели.</p>
							</div>
						</div>
						<div class="swiper-slide" data-num="3">
							<img src="img/prog-slider/1.png">
							<div class="programs-slide-text">
								<h3>2004 г. Александр Николаев - Весна. Новгородский Кремль</h3>
								<p>Новый образовательный проект Мастерской-музея стал победителем конкурса, который
									проводил Фонд президентских грантов в 2018 году.</p>
								<p>Задачей проекта было выявление и поддержка одаренных учеников детских школ искусств,
									расположенных в малых городах и поселках Новгородской, Ленинградской, Псковской
									областей. Основная целевая аудитория - молодежь в возрасте 14-17 лет (это ребята,
									которые находятся в ДШИ на предпрофессиональном этапе обучения), а также их
									преподаватели.</p>
							</div>
						</div>
					</div>
					<div class="swiper-button_arrows">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button_arrows_num">
							<span class="swiper-num-area">1/</span>
							<span>7</span>
						</div>
						<div class="swiper-button-next"></div>
					</div>

				</div>
			</div>
			<div class="btn-wrapp">
				<a href="#" class="slider-btn btn-white">Все программы</a>
			</div>

		</div>
	</section>


	<section class="news">
		<div class="container">
			<h2>
				<?php
					$category_name = get_post_type_object( 'event' );
					echo $category_name->labels->name;
				?>
			</h2>
			<div class="news-wrapp">
				<div class="row">
					<?php		
						global $post;

						// формируем запрос в базу данных
						$query = new WP_Query( [
							// получаем 3 поста
							'posts_per_page'   => 3,
							'post_type'        => [
								'custom-type' => 'event',
							],
						] );

					// проверяем, есть ли посты
					if ( $query->have_posts() ) {
						//создаем переменную-счетчик постов
						$cnt = 0;
						//пока посты есть, выводим их
						while ( $query->have_posts() ) {
							$query->the_post();
							// увеличиваем счетчик постов
							$cnt++;
							switch ($cnt) {
								//выводим первый пост
								case '1':
									?>
									<div class="col-xs-12 col-sm-12	col-md-8 col-lg-8">
										<div class="news-wrapp_block">
											<?php 
												$media = get_attached_media( 'image' );
												$media = array_shift( $media );
												
												// ссылка на картинку
												$image_url = $media->guid;
												
												// выведем картинку в браузере
												echo '<img src="'. $image_url .'" />';
											?>
											<span><?php the_time( 'j F Y' ); ?></span>
											<h3><?php the_title(); ?></h3>
											<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 150, " ..."); ?></p>
										</div>
									</div>
									<?php
										break;

										//выводим второй пост
										case '2':
									?>
								<div class="col-xs-12 col-sm-12	col-md-4 col-lg-4 news-last-block">
									<div class="news-wrapp_block">
										<?php 
											$media = get_attached_media( 'image' );
											$media = array_shift( $media );
															
											// ссылка на картинку
											$image_url = $media->guid;
															
											// выведем картинку в браузере
											echo '<img src="'. $image_url .'" />';
										?>
										<span><?php the_time( 'j F Y' ); ?></span>
										<h4><?php the_title(); ?></h4>
									</div>
									<?php
										break;

									//выводим третий пост
									case '3':
										?>

									<div class="news-wrapp_block">

										<?php 
											$media = get_attached_media( 'image' );
											$media = array_shift( $media );
															
											// ссылка на картинку
											$image_url = $media->guid;
															
											// выведем картинку в браузере
											echo '<img src="'. $image_url .'" />';
										?>

										<span><?php the_time( 'j F Y' ); ?></span>
										<h4><?php the_title(); ?></h4>
									</div>
									<?php
										break;
									?>
								</div>
								<?php 
							}
						}
					} else {
						// Постов не найдено
					}

					wp_reset_postdata(); // Сбрасываем $post
					?>

				</div>
			</div>
			<div class="btn-wrapp">
				<a href="#" class="slider-btn btn-white">Все СОБЫТИЯ</a>
			</div>

		</div>
	</section>


	<?php get_footer(); ?>	