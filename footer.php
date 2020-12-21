<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-6	col-md-6 col-lg-4">
					<?php
						if( has_custom_logo() ){
							$logo_img = '';
							if( $custom_logo_id = get_theme_mod('custom_logo') ){
								$logo_img = wp_get_attachment_image( $custom_logo_id, 'full', false, array(
									'class'    => 'footer-custom-logo',
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
				<div class="col-xs-12 col-sm-6	col-md-6 col-lg-4">
					<div class="footer-menu-wrapper">
						<?php
							wp_nav_menu( [
								'theme_location'  => 'footer_menu_1',
								'container'       => 'nav', 
								'container_class' => 'footer-nav-wrapper', 
								'menu_class'      => 'footer-nav', 
								'echo'            => true
							] );
							wp_nav_menu( [
								'theme_location'  => 'footer_menu_2',
								'container'       => 'nav', 
								'container_class' => 'footer-nav-wrapper', 
								'menu_class'      => 'footer-nav', 
								'echo'            => true
							] );
						?>
					</div><!-- end .footer-menu-wrapper -->

				</div>
				<div class="col-xs-12 col-sm-12	col-md-12 col-lg-4">
					<div class="footer-block_wrapp">
						<?php
							if ( ! is_active_sidebar( 'sidebar-footer' ) ) {
								return;
							}
							
							dynamic_sidebar( 'sidebar-footer' );
						?>
						<div class="footer-block">
							<?php
								if ( ! is_active_sidebar( 'sidebar-footer-phone' ) ) {
									return;
								}
								
								dynamic_sidebar( 'sidebar-footer-phone' );
							?>
							<p class="footer-work-email header-work-email">
								<!--вывод email через плагин ACF-->
								<a class="footer-copyright" href="tel:<?php the_field('email', 31) ?>"><?php the_field('email', 31) ?></a>
							</p>
							<div class="footer-socials">
								<div class="social-links">
									<?php
										if ( ! is_active_sidebar( 'sidebar-footer-social' ) ) {
											return;
										}
									
										dynamic_sidebar( 'sidebar-footer-social' );
									?>
								</div>
							</div>
						</div><!--end .footer-block-->
					</div>
				</div>
			</div>
			<div class="footer-bottom">
				<?php 
					if ( ! is_active_sidebar( 'sidebar-footer-text' ) ) {
						return;
					}
					dynamic_sidebar( 'sidebar-footer-text' );
				?>
			</div>
		</div>
	</footer>
  <?php wp_footer(); ?>
  </body>
</html>