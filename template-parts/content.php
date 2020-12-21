<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
<section class="bread-crumbs">
		<div class="container">
			<div class="bread-crumbs_wrapp">
				<div class="bread-crumbs-item"><a href="<?php echo home_url(); ?>">Главная</a></div>
        <div class="bread-crumbs-item">
          <a href="<?php echo get_post_type_archive_link($category_name); ?>">
						<?php
							//получаем IDтекущего поста
							$name = get_the_ID();
							//получаем название типа записи в виде строки
              $category_name = get_post_type( $name );//event/program
              //получаем объект произвольного типа записи
              $obj = get_post_type_object( $category_name );
              //и выводим его название
              echo $obj->labels->name;
            ?>
          </a>
        </div>
				<div class="bread-crumbs-item"><?php echo esc_html( get_the_title() ); ?></div>
			</div>
		</div>
	</section>

	<section class="article">
		<div class="container">
			<h1>Четвёртая по счёту победа "Мастерской-музея реалистической живописи Александра Николаева"</h1>
			<span>24 июня 2020</span>
			<div class="article-wrapp">

				<div class="article-img-wrapp">
					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img src="img/article/1.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/2.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/3.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/4.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/5.png">
							</div>

						</div>

					</div>
					<div class="swiper-container gallery-thumbs">
						<div class="swiper-wrapper">
							<div class="swiper-slide">
								<img src="img/article/1.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/2.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/3.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/4.png">
							</div>
							<div class="swiper-slide">
								<img src="img/article/5.png">
							</div>

						</div>
					</div>
					<div class="swiper-button_arrows">
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
				</div>

				<p>Четвёртая по счёту победа "Мастерской-музея реалистической живописи Александра Николаева" в конкурсе
					Фонда перезидентских грантов означает, что в мастерской-музее стартует новая образовательная
					программа для творческой молодёжи.</p>
				<p>Проект охватывает 5 регионов: Нижегородскую, Тверскую, Псковскую, Ленинградскую и Новгородскую
					область и ориентирован на учащихся 13-17 лет из Детских школ искусств, распололоженных в малых
					городах и сельской местности.</p>
				<p>Общее количество участников проекта 160 человек, 130 учащихся и 30 преподавателей.</p>
				<p>Проект "Межрегиональная молодежная школа-мастерская художественных специальностей" будет проводиться
					в формате образовательных сессий в мастерской-музее, за год состоится 5 совместных сессий для
					учащихся и педгогов и 2 методические сессии для прподавателей ДШИ.</p>
				<p>Задача проекта создать и апробировать уникальную практику системной поэтапной дифференцированной по
					возрастным группам учащихся профориентации в ДШИ и предполагает разработку и реализацию особой
					программы проекта, основой которой станет практическое освоение различных творческих дисциплин и
					компетенций под руководством профессиональных художников и специалистов, работающих в различных
					сферах искусства и культуры.создать систему профориентационной работы для ДШИ.</p>

				<p class="article-link">Об этом смотрите в репортаже....
					<a
						href="https://novgorod-tv.ru/novosti/51404-novgorodskie-podrostki-smogut-poseshchat-master-klassy-i-lektsii-luchshikh-spetsialistov-v-sfere-iskusstva.html">https://novgorod-tv.ru/novosti/51404-novgorodskie-podrostki-smogut-poseshchat-master-klassy-i-lektsii-luchshikh-spetsialistov-v-sfere-iskusstva.html</a>
				</p>

				<div class="article-socials-wrapp">
					<div class="article-socials">
						<div class="share">Поделиться</div>
						<a href="#"><img src="img/article/socials/vk.svg"></a>
						<a href="#"><img src="img/article/socials/facebook.svg"></a>
						<a href="#"><img src="img/article/socials/instagram.svg"></a>
						<a href="#"><img src="img/article/socials/telegram.svg"></a>
						<a href="#"><img src="img/article/socials/whatsapp.svg"></a>
					</div>
					<div class="article-socials-nav">
						<a class="article-arrow-left no-active" href="#">
							<svg width="41" height="16" viewBox="0 0 41 16" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M0.292892 8.70711C-0.0976295 8.31658 -0.0976295 7.68342 0.292892 7.29289L6.65685 0.928932C7.04738 0.538408 7.68054 0.538408 8.07107 0.928932C8.46159 1.31946 8.46159 1.95262 8.07107 2.34315L2.41422 8L8.07107 13.6569C8.46159 14.0474 8.46159 14.6805 8.07107 15.0711C7.68054 15.4616 7.04738 15.4616 6.65685 15.0711L0.292892 8.70711ZM41 9H1V7H41V9Z"
									fill="#A2A2A2" />
							</svg>
							Предыдущее
						</a>
						<a class="article-arrow-right" href="#">
							Следующее
							<svg width="41" height="16" viewBox="0 0 41 16" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path
									d="M0.292892 8.70711C-0.0976295 8.31658 -0.0976295 7.68342 0.292892 7.29289L6.65685 0.928932C7.04738 0.538408 7.68054 0.538408 8.07107 0.928932C8.46159 1.31946 8.46159 1.95262 8.07107 2.34315L2.41422 8L8.07107 13.6569C8.46159 14.0474 8.46159 14.6805 8.07107 15.0711C7.68054 15.4616 7.04738 15.4616 6.65685 15.0711L0.292892 8.70711ZM41 9H1V7H41V9Z"
									fill="#A2A2A2" />
							</svg>

						</a>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>

	<div class="popular-news">
    <?php
			if ( ! is_active_sidebar( 'post-sidebar' ) ) {
				return;
			}
									
			dynamic_sidebar( 'post-sidebar' );
			?>
	</div>
</article>