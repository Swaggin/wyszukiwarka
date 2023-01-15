<?php get_header(); ?>

<main class="sections">

  <?php $hero = get_field('heroWithHeading', get_post()->ID); ?>
  <section class="heroWithHeading">
    <div class="container">
      <div class="heroWithHeading__inner">
        <div class="heroWithHeading__background">
          <img src="<?= THEME_URL ?>/public/images/heroBg.jpg" class="heroWithHeading__image" />
        </div>
        <h1 class="heroWithHeading__title"><?= get_post()->post_title ?></h1>
        <p class="heroWithHeading__text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid consequuntur ea, error fugiat impedit voluptatibus.
        </p>
      </div>
    </div>
  </section>

  <?php $artist = get_field('artist', get_post()->ID); ?>
  <section class="concertDetails">
    <div class="container">
      <div class="concertDetails__inner">
        <div class="concertDetails__content">
          <div class="concertDetails__col">
            <p class="concertDetails__label concertDetails__label--small">Nazwa artysty</p>
            <h2 class="concertDetails__title">
              <?= get_post()->post_title ?>
            </h2>
<!--            <p class="concertDetails__artists">-->
<!--              <strong>Skład:</strong> --><?//= $artist['artists'] ?>
<!--            </p>-->
          </div>
          <div class="concertDetails__col">
            <img src="<?= get_the_post_thumbnail_url(get_post()->ID) ?>" class="concertDetails__thumbnail" />
          </div>
        </div>
        <div class="concertDetails__items">
          <div class="concertDetails__item">
            <p class="concertDetails__label">Biografia</p>
            <p class="concertDetails__text"><?= $artist['description'] ?></p>
          </div>
          <div class="concertDetails__item">
            <p class="concertDetails__label">W trasie</p>
            <p class="concertDetails__text"><?= $artist['on_tour'] ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php $artist = get_field('artist', get_post()->ID); ?>
  <?php if ($artist['related_concerts']) : ?>
  <section class="concertCatalog concertCatalog--marginTop concertCatalog--marginBottom">
    <div class="container">
      <div class="concertCatalog__inner">
        <h2 class="concertCatalog__title">
          Powiązane koncerty
        </h2>

        <?php

          $query = new WP_Query(array(
            'post_type' => 'concert',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'author',
          ));

        ?>
        <div class="concertCatalog__list">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php foreach ($artist['related_concerts'] as $item) : ?>
              <?php if ($item->ID == get_post()->ID) : ?>
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
              <?php endif; ?>
            <?php endforeach; ?>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <?php if ($artist['related_concerts']) : ?>
  <section class="concertCatalog concertCatalog--marginTop concertCatalog--marginBottom">
    <div class="container">
      <div class="concertCatalog__inner">
        <h2 class="concertCatalog__title">
          Podobni artyści
        </h2>
        <div class="concertCatalog__list">
          <?php

            $query = new WP_Query(array(
              'post_type' => 'concert',
              'post_status' => 'publish',
              'posts_per_page' => 4,
              'orderby' => 'rand',
            ));

          ?>

          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php foreach ($artist['related_concerts'] as $item) : ?>
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
            <?php endforeach; ?>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="concertCatalog__all">
          <a href="/artists" class="concertCatalog__button button">
            Więcej artystów
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
