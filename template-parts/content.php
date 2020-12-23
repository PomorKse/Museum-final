<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
<section class="bread-crumbs">
		<div class="container">
			<div class="bread-crumbs_wrapp">
				<div class="bread-crumbs-item"><a href="<?php echo home_url(); ?>">Главная</a></div>
        <div class="bread-crumbs-item">
          <a href="<?php echo get_post_type_archive_link($category_name); ?>">
						<?php
							//получаем ID текущего поста
							$name = get_the_ID();
							//получаем название типа записи в виде строки
              $category_name = get_post_type( $name );
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
			<h1><?php the_title(); ?></h1>
			<span><?php the_field('date'); ?></span>
			<div class="article-wrapp">

				<div class="article-img-wrapp">

					<div class="swiper-container gallery-top">
						<div class="swiper-wrapper">
							<?php
								$media = get_attached_media( 'image' );

								//Перебираем массив с фото, находим guid, получаем ссылку 
								foreach ($media as $image) : ?>
									<div class="swiper-slide">
										<img src="<?php echo $image->guid; ?>" alt="event-slider">
									</div>
								<?php 
								endforeach;
							?>
					</div><!-- end .swiper-container .gallery-top -->

					<div class="swiper-container gallery-thumbs">
						<div class="swiper-wrapper">
								<?php
									$media = get_attached_media( 'image' );

									//Перебираем массив с фото, находим guid, получаем ссылку 
									foreach ($media as $image) {
										echo '<div class="swiper-slide"><img src="'. $image->guid . '" alt="' . '"></div>';
									}
								?>
						</div>
					</div><!-- end .swiper-container .gallery-thumbs -->

					<div class="swiper-button_arrows">
							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>
						</div>
				</div>

				<p><?php the_content(); ?></p>

				<p class="article-link">Об этом смотрите в репортаже....
					<a
						href="https://novgorod-tv.ru/novosti/51404-novgorodskie-podrostki-smogut-poseshchat-master-klassy-i-lektsii-luchshikh-spetsialistov-v-sfere-iskusstva.html">https://novgorod-tv.ru/novosti/51404-novgorodskie-podrostki-smogut-poseshchat-master-klassy-i-lektsii-luchshikh-spetsialistov-v-sfere-iskusstva.html</a>
				</p>

				<div class="article-socials-wrapp">
					<div class="article-socials">
						<div class="share">Поделиться</div> 
						<?php if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { ADDTOANY_SHARE_SAVE_KIT(); } ?>
					</div>
					<div class="article-socials-nav">
						<a class="article-arrow-left no-active" href="<?php ?>">
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
			</div><!-- end .article-wrapp -->
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