<?php get_header(); ?>

<main class="sections">
  <?php
    if (!empty($_GET['s'])) {
      $args = array(
        's' => get_search_query(),
        'posts_per_page' => -1,
      );

      $search = new WP_Query($args);
      global $wp_query;
    }
  ?>

  <section class="heroWithHeading">
    <div class="container">
      <div class="heroWithHeading__inner">
        <div class="heroWithHeading__background">
          <img src="<?= THEME_URL ?>/public/images/heroBg.jpg" class="heroWithHeading__image" />
        </div>
        <h1 class="heroWithHeading__title">
          Szukaj
        </h1>
        <p class="heroWithHeading__text">
          Tu znajdziesz swoje ulubione koncerty.
        </p>
      </div>
    </div>
  </section>

  <section class="searchList">
    <div class="container">
      <div class="searchList__inner">
        <div class="searchList__title">Wprowadź dowolną frazę</div>
        <form
          id="searchform"
          class="searchList__form"
          method="GET"
          action="<?= home_url() ?>"
        >
          <div class="searchList__searchbar">
            <input
              type="search"
              class="searchList__input"
              value="<?=get_search_query()?>"
              placeholder="Szukaj..."
              name="s"
            >
            <button type="submit" class="searchList__button">
              <?=__('Szukaj', 'soma')?>
            </button>
          </div>
        </form>
      </div>
      <?php if (!empty($_GET['s'])) : ?>
      <div class="searchList__outer">
        <div class="searchList__count">
          Znaleziono wyników: <?= $search->post_count ?>
        </div>

        <?php while ($search->have_posts()) : $search->the_post(); ?>
          <?php $post = get_post(); ?>

          <?php if ($post->post_type == 'page') : ?>
            <a href="<?= get_permalink($post->ID) ?>" class="searchList__item">
              Strona
              <p class="searchList__label"><?= $post->post_title ?></p>
            </a>
          <?php endif; ?>

          <?php if ($post->post_type == 'concert') : ?>
            <?php $data = get_field('concert', $post->ID);;?>

            <a href="<?= get_permalink($post->ID) ?>" class="searchList__item">
              Koncert
              <p class="searchList__label"><?= $post->post_title ?></p>
              <p class="searchList__text">
                <?= $data['location'] ?>,
                <?= $data['date'] ?>,
                <?= $data['open_hour'] ?>
              </p>
            </a>
          <?php endif; ?>

          <?php if ($post->post_type == 'artist') : ?>
            <?php $description = get_field('artist', $post->ID); ?>

            <a href="<?= get_permalink($post->ID) ?>" class="searchList__item">
              Wykonawca
              <p class="searchList__label"><?= $post->post_title ?></p>
              <p class="searchList__text"><?= $description['description'] ?></p>
            </a>
          <?php endif; ?>
        <?php endwhile; ?>

        <?php if (!$search->have_posts()) : ?>
          <p class="searchList__error">
            Brak wyników. Spróbuj zmienić kryteria wyszukiwania.
          </p>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>
