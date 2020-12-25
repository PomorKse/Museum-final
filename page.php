<?php
/*
Template Name: Страница галереи 
Template Post Type: page
*/


get_header();
?>

  <section class="bread-crumbs">
    <div class="container">
      <div class="bread-crumbs_wrapp">
      <div class="bread-crumbs-item"><a href="<?php echo home_url(); ?>">Главная</a></div>
        <div class="bread-crumbs-item">
          <?php
            the_title( );
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="gallery">
    <div class="container">
      <div class="gallery-wrapp">
        <div class="gallery-block">
          <img src="img/gallery/1.png" />
          <a href="#">
            Шедевры
            <img src="img/gallery/arrow.svg" />
          </a>
        </div>
        <div class="gallery-block gallery-block-left">
          <a href="#">
            Живопись
            <img src="img/gallery/arrow.svg" />
          </a>
          <img src="img/gallery/2.png" />
        </div>

        <div class="gallery-block">
          <img src="img/gallery/3.png" />
          <a href="#">
            Графика
            <img src="img/gallery/arrow.svg" />
          </a>
        </div>
        <div class="gallery-block gallery-block-left">
          <a href="#">
            Скульптура
            <img src="img/gallery/arrow.svg" />
          </a>
          <img src="img/gallery/4.png" />
        </div>

        <div class="gallery-block">
          <img src="img/gallery/5.png" />
          <a href="#">
            Шедевры
            <img src="img/gallery/arrow.svg" />
          </a>
        </div>
        <div class="gallery-block gallery-block-left">
          <a href="#">
            Живопись
            <img src="img/gallery/arrow.svg" />
          </a>
          <img src="img/gallery/6.png" />
        </div>

        <div class="gallery-block">
          <img src="img/gallery/7.png" />
          <a href="#">
            Графика
            <img src="img/gallery/arrow.svg" />
          </a>
        </div>
        <div class="gallery-block gallery-block-left">
          <a href="#">
            Скульптура
            <img src="img/gallery/arrow.svg" />
          </a>
          <img src="img/gallery/8.png" />
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
?>