<?php
  /**
   * Template Name: Koncerty
   */
?>
<?php get_header(); ?>

<main class="sections">

  <?php $hero = get_field('heroWithHeading', get_post()->ID); ?>
  <section class="heroWithHeading">
    <div class="container">
      <div class="heroWithHeading__inner">
        <div class="heroWithHeading__background">
          <img src="<?= $hero['background'] ?>" class="heroWithHeading__image" />
        </div>
        <h1 class="heroWithHeading__title"><?= get_post()->post_title ?></h1>
        <p class="heroWithHeading__text">
          <?= $hero['text'] ?>
        </p>
      </div>
    </div>
  </section>

  <section class="concertCatalog concertCatalog--marginTop concertCatalog--marginBottom">
    <div class="container">
      <div class="concertCatalog__inner">
        <h2 class="concertCatalog__title">
          Wszystko
        </h2>

        <?php

          $args = array(
            'post_type' => 'concert',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
          );

          $query = new WP_Query( $args );

        ?>
        <div class="concertCatalog__list">
          <?php $concert = get_field('concert', get_post()->ID); ?>

          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <a href="<?= get_permalink(get_post()->ID) ?>" class="concertCatalog__item">
              <div class="concertCatalogItem">
                <div class="concertCatalogItem__thumbnail">
                  <img src="<?= get_the_post_thumbnail_url(get_post()->ID) ?>" alt="" class="concertCatalogItem__image">
                </div>
                <div class="concertCatalogItem__inner">
                  <p class="concertCatalogItem__title">
                    <?= get_post()->post_title ?>
                  </p>
                </div>
              </div>
            </a>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>

