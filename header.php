<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
	<header>
		<div class="container">
			<div class="header-top">
				<div class="row">
					<div class="col-xs-10 col-sm-12	col-md-12 col-lg-4">
							<?php
								if( has_custom_logo() ){
									$logo_img = '';
                  if( $custom_logo_id = get_theme_mod('custom_logo') ){
										$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
                      'class'    => 'custom-logo',
                      'itemprop' => 'logo',
											) );
										}
                    if (is_front_page()) {
											echo '<div class="logo-text">' . $logo_img . '<div class="logo-text-wrapp"><span>' .
                      get_bloginfo( 'name' ) . '</span><h3>' . get_bloginfo( 'description' ) . '</h3></div></div>';
                    } else {
											echo '<a class="logo-text" href="' . get_home_url() . '">' . $logo_img . '<div class="logo-text-wrapp"><span>' .
                      get_bloginfo( 'name' ) . '</span><h3>' . get_bloginfo( 'description' ) . '</h3></div></a>';
                    }
                  } else {
										echo '<div class="logo-text-wrapp"><span>' .
										get_bloginfo( 'name' ) . '</span><h3>' . get_bloginfo( 'description' ) . '</h3></div>';
									}
									?>
					</div>
					<div class="col-xs-2 col-sm-12	col-md-12 col-lg-8 header-col">

						<?php 
							wp_nav_menu( [
								'theme_location'  => 'header_menu',
								'container'       => 'nav', 
								'container_class' => 'hamburger hamburger3', 
								'menu_class'      => 'nav-main', 
								'echo'            => true
							] );
						?>

						<span class="bar bar1"></span>
						<span class="bar bar2"></span>
						<span class="bar bar3"></span>
						<span class="bar bar4"></span>

						<!--<nav class="hamburger hamburger3">
							<ul class="nav-main">
								<li><a href='#'>Главная</a></li>
								<li><a class="nav-main_double" href='#'>Музей</a>
									<ul class="nav-main_double_next">
										<li><a href='#'>Выставка</a></li>
										<li><a href='#'>Обучение (Программы \ Беседы с родителями)</a></li>
										<li><a href='#'>Проекты</a></li>
										<li><a href='#'>Коллекции</a></li>
										<li><a href='#'>Издания</a></li>
									</ul>
								</li>
								<li><a href='#'>Образовательные программы</a></li>
								<li><a href='#'>Мастерские</a></li>
								<li><a href='#'>Афиша</a></li>
								<li><a href='#'>События</a></li>
								<li><a href='#'>Контакты</a></li>
							</ul>
						</nav>-->
					</div>
				</div>
			</div>
		</div>
	</header>