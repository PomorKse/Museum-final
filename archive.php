<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package universal-example
 */
get_header(); ?>

  <section class="bread-crumbs">
    <div class="container">
      <div class="bread-crumbs_wrapp">
        <div class="bread-crumbs-item"><a href="<?php echo home_url(); ?>">Главная</a></div>
        <div class="bread-crumbs-item">
          <a href="<?php echo get_post_type_archive_link($category_name); ?>">
            <?php
              //получаем название типа записи в виде строки
              $category_name = get_post_type();//event/program
              //получаем объект произвольного типа записи
              $obj = get_post_type_object( $category_name );
              //и выводим его название
              echo $obj->labels->name;
            ?>
          </a>
        </div>
      </div>
    </div>
  </section>

  <div class="pictures">
    <div class="container">
      <div class="row">
        <?php
          if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <!-- Цикл WordPress -->
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                  <div class="pictures-wrapp_block">
                    <?php 
                      get_template_part( 'template-parts/card' );
                    ?>
                  </div>
                </div>
          <?php endwhile; else : ?>
            <p>Записей нет.</p>
          <?php endif; 
        ?>
      </div>
      <?php the_posts_pagination() ?>
    </div>
  </div>

<?php get_footer(); ?>

