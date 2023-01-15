    <footer class="footer">
      <div class="container">
        <div class="footer__wrapper">
          <div class="footer__inner">
            <div class="footer__col">
              <p class="footer__label">Nawigacja</p>
              <div class="footer__links">
                <a href="/" class="footer__link">Strona główna</a>
                <a href="/concerts" class="footer__link">Koncerty</a>
                <a href="/concerts" class="footer__link">Wydarzenia</a>
                <a href="/artists" class="footer__link">Artyści</a>
              </div>
            </div>
            <div class="footer__col">
              <p class="footer__label">Koncerty</p>
              <div class="footer__links">
                <a href="/concert/twenty-one-pilots" class="footer__link">
                  Twenty One Pilots
                </a>
                <a href="/concert/the-neighbourhood" class="footer__link">
                  The Neighbourhood
                </a>
              </div>
            </div>
            <div class="footer__col">
              <p class="footer__label">Artyści</p>
              <div class="footer__links">
                <a href="/artist/kanye" class="footer__link">Kanye</a>
                <a href="/artist/zabson" class="footer__link">Żabson</a>
              </div>
            </div>
          </div>
          <hr class="footer__gap">
          <div class="footer__outer">
            <p class="footer__copyright">2023 &copy; Realizacja — Hubert Jarząbek & Krzysztof Krawczyk</p>
            <a class="footer__logo" href="/">
              Concert<span class="footer__logoText">TIME</span>
            </a>
          </div>
        </div>
      </div>
    </footer>

    <?php wp_footer(); ?>
    <script type="module" src="<?= THEME_URL ?>/public/dist/bundle.js"></script>
  </body>
</html>
