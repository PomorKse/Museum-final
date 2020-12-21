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
							'order' => 'ASC',
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
							get_template_part( 'template-parts/post-image' );
            ?>
						<h1><?php the_title(); ?></h1>
						<a href="<?php echo get_the_permalink(); ?>" class="slider-btn">Купить билет</a>
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
						</div><!-- end .info-header -->
						<div class="info-tabcontent fade">
							<div class="grid-container">
								<?php		
									global $post;

									// формируем запрос в базу данных
									$query = new WP_Query( [
										// получаем 3 поста
										'posts_per_page'   => 6,
										'offset'           => 3,
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
									<div class="s">
										<div class="poster-wrapp_block">
											<?php 
												get_template_part( 'template-parts/card' );	
											?>
										</div>
									</div>
									<?php
										break;

									//выводим второй пост
									case '2':
									?>
									<div class="e">
										<div class="poster-wrapp_block">
											<?php 
												get_template_part( 'template-parts/card' );
											?>
										</div>
									</div>
									<?php
										break;

									//выводим второй пост
									case '3':
									?>
									<div class="er">
										<div class="poster-wrapp_block">
											<?php 
												get_template_part( 'template-parts/card' );
											?>
										</div>
									</div>
									<?php
										break;

									//выводим второй пост
									case '4':
									?>
									<div class="t">
										<div class="poster-wrapp_block">
											<?php 
												get_template_part( 'template-parts/card' );
											?>
										</div>
									</div>
									<?php
										break;

									//выводим второй пост
									case '5':
									?>
									<div class="d">
										<div class="poster-wrapp_block">
											<?php 
												get_template_part( 'template-parts/card' );
											?>
										</div>
									</div>
									<?php
										break;

									//выводим второй пост
									case '6':
									?>
									<div class="g">
										<div class="poster-wrapp_block">
											<?php 
												get_template_part( 'template-parts/card' );
											?>
										</div>
									</div>
											<?php
												break;
										}

										?>
										<!-- Вывода постов, функции цикла: the_title() и т.д. -->
										<?php 
									}
								} else {
									// Постов не найдено
								}
								wp_reset_postdata(); // Сбрасываем $post
								?>

							</div><!-- end .grid-container -->
						</div><!-- end .info-tabcontent fade -->
					</div><!-- end .info -->

				</div><!-- end .product-tabs -->
			</div><!-- end .news-wrapp -->
		</div>
		<div class="btn-wrapp">
			<a href="<?php echo get_post_type_archive_link('event'); ?>" class="slider-btn btn-white">Вся афиша</a>
		</div>

		</div>
	</section>

	<section class="programs">
		<div class="container">
			<h2>
				<?php
					$category_name = get_post_type_object( 'program' );
					echo $category_name->labels->name;
				?>
			</h2>
			<div class="slider-wrapp">
				<div class="swiper-container programs-slider">
					<div class="swiper-wrapper">
						<!-- Slides -->
						<?php 
							global $post;
						
							$query = new WP_Query( [
								'post_type' => [
									'custom-type' => 'program',
								],
								] );
										
								if ( $query->have_posts() ) {
									while ( $query->have_posts() ) {
										$query->the_post();
									?>

									<div class="swiper-slide" data-num="1">
										<?php 
											get_template_part( 'template-parts/post-image' );
										?>
										<div class="programs-slide-text">
											<h3><?php the_title(); ?></h3>
											<?php the_excerpt(); ?>
										</div>
									</div>
									<?php 
									}
								} else {
									echo 'Постов не найдено';
								}
								
								wp_reset_postdata(); // Сбрасываем $post
									?>

					</div><!-- end .slider-wrapper -->
					<div class="swiper-button_arrows">
						<div class="swiper-button-prev"></div>
						<div class="swiper-button_arrows_num">
							<span class="swiper-num-area">1/</span>
							<span>
								<?php
									$programs = wp_count_posts('program')->publish;
									echo $programs;
								?>
							</span>
						</div>
						<div class="swiper-button-next"></div>
					</div>

				</div>
			</div>
			<div class="btn-wrapp">
				<a href="<?php echo get_post_type_archive_link('program'); ?>" class="slider-btn btn-white">Все программы</a>
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
											<a href="<?php echo get_the_permalink(); ?>">	
												<?php 
													get_template_part( 'template-parts/post-image' );
												?>
												<span><?php the_field('date'); ?></span>
												<h3><?php the_title(); ?></h3>
											</a>
											<p><?php echo mb_strimwidth(get_the_excerpt(), 0, 150, " ..."); ?></p>
										</div>
									</div>
									<?php
										break;

										//выводим второй пост
										default:
									?>
								<div class="col-xs-12 col-sm-12	col-md-4 col-lg-4 news-last-block">
									<div class="news-wrapp_block">
										<?php 
											get_template_part( 'template-parts/card' );
										?>
									</div>
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
				<a href="<?php echo get_post_type_archive_link('event'); ?>" class="slider-btn btn-white">Все СОБЫТИЯ</a>
			</div>

		</div>
	</section>


	<?php get_footer(); ?>	