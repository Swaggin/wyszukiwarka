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

  <?php $details = get_field('concert', get_post()->ID); ?>
  <section class="concertDetails">
    <div class="container">
      <div class="concertDetails__inner">
        <div class="concertDetails__content">
          <div class="concertDetails__col">
            <p class="concertDetails__label concertDetails__label--small">Nazwa wydarzenia</p>
            <h2 class="concertDetails__title">
              <?= get_post()->post_title ?>
            </h2>
            <p class="concertDetails__artists">
              <strong>Skład:</strong> <?= $details['artists'] ?>
            </p>
          </div>
          <div class="concertDetails__col">
            <img src="<?= get_the_post_thumbnail_url(get_post()->ID) ?>" class="concertDetails__thumbnail" />
          </div>
        </div>
        <div class="concertDetails__items">
          <div class="concertDetails__item">
            <p class="concertDetails__label">Lokalizacja</p>
            <p class="concertDetails__text"><?= $details['location'] ?></p>
          </div>
          <div class="concertDetails__item">
            <p class="concertDetails__label">Data wydarzenia</p>
            <p class="concertDetails__text"><?= $details['date'] ?></p>
          </div>
          <div class="concertDetails__item">
            <p class="concertDetails__label">Godziny otwarcia</p>
            <p class="concertDetails__text"><?= $details['open_hour'] ?></p>
          </div>
          <div class="concertDetails__item">
            <p class="concertDetails__label">Bilety</p>
            <a
              href="<?= $details['link']['url'] ?>"
              target="<?= $details['link']['target'] ?>"
              class="concertDetails__button"
            >
              <p class="concertDetails__text">
                <span><?= $details['link']['title'] ?></span>
                <i class="fa-solid fa-chevron-right"></i>
              </p>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="concertCatalog concertCatalog--marginTop concertCatalog--marginBottom">
    <div class="container">
      <div class="concertCatalog__inner">
        <h2 class="concertCatalog__title">
          Powiązani artyści
        </h2>

        <?php

          $query = new WP_Query(array(
            'post_type' => 'artist',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'author',
          ));

        ?>
        <div class="concertCatalog__list">
          <?php $concert = get_field('concert', get_post()->ID); ?>

          <?php foreach ($concert['related_artists'] as $item) : ?>
            <a href="<?= get_permalink($item->ID) ?>" class="concertCatalog__item">
              <div class="concertCatalogItem">
                <div class="concertCatalogItem__thumbnail">
                  <img src="<?= get_the_post_thumbnail_url($item->ID) ?>" alt="" class="concertCatalogItem__image">
                </div>
                <div class="concertCatalogItem__inner">
                  <p class="concertCatalogItem__title">
                    <?= $item->post_title ?>
                  </p>
                </div>
              </div>
            </a>
          <?php endforeach; ?>

          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </section>

  <section class="concertCatalog concertCatalog--marginTop concertCatalog--marginBottom">
    <div class="container">
      <div class="concertCatalog__inner">
        <h2 class="concertCatalog__title">
          Podobne wydarzenia
        </h2>

        <?php

          $query = new WP_Query(array(
            'post_type' => 'concert',
            'post_status' => 'publish',
            'posts_per_page' => 4,
            'orderby' => 'rand',
          ));

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
        <div class="concertCatalog__all">
          <a href="/concerts" class="concertCatalog__button button">
            Więcej koncertów
            <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
