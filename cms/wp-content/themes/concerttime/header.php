<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=2.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php wp_title(); ?></title>
  <meta name="description" content="">

  <?php $faviconUrl = THEME_URL . '/public/images/favicon/'; ?>
  <link rel="apple-touch-icon" sizes="180x180" href="<?= $faviconUrl ?>apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?= $faviconUrl ?>favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= $faviconUrl ?>favicon-16x16.png">
  <link rel="manifest" href="<?= $faviconUrl ?>site.webmanifest">
  <link rel="mask-icon" href="<?= $faviconUrl ?>safari-pinned-tab.svg">
  <link rel="shortcut icon" href="<?= $faviconUrl ?>favicon.ico">
  <meta name="msapplication-config" content="<?= $faviconUrl ?>browserconfig.xml">

  <script src="https://kit.fontawesome.com/393692f86b.js" crossorigin="anonymous"></script>

  <?php wp_head(); ?>

  <?php if (is_user_logged_in()): ?>
    <!-- auto hide wp admin bar -->
    <style>
        #wpadminbar {
            opacity: 0;
            transform: translateY(-24px);
            transition: opacity 0.2s, transform 0.2s;
        }
        #wpadminbar:hover {
            opacity: 1;
            transform: translateY(0);
        }
        html {
            margin-top: 0 !important;
        }
    </style>
  <?php endif; ?>
</head>
<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="header" data-header>
    <div class="header__inner container">
      <a class="header__logo" href="/">
        Concert<span class="header__logoText">TIME</span>
      </a>
      <div class="header__nav" data-header-nav>
        <a href="/" class="header__link">Strona główna</a>
        <a href="/concerts" class="header__link">Koncerty</a>
        <a href="/concerts" class="header__link">Wydarzenia</a>
        <a href="/artists" class="header__link">Wykonawcy</a>
        <a href="/?s" class="header__link">
          <i class="fa-solid fa-magnifying-glass"></i>
        </a>
        <div class="header__close" data-header-close>
          <i class="fa-solid fa-xmark"></i>
        </div>
      </div>
      <div class="header__hamburger" data-header-hamburger>
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
  </header>