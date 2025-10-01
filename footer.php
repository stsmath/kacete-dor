<footer class="m-footer">
  <?php $footer = get_post('5') ?>
  <div class="footer">
    <div class="container">

      <div class="grid-4 footer_contato">
        <p><a href="/contato">Contato</a></p>
      </div>

    </div>
  </div>

  <div class="copy">
    <div class="container">
      <div class="logo-kacete">
        <a href="/">
          <img src="<?php echo get_template_directory_uri() ?>/img/trofeu-kacete-2.png" alt="trofeu Kacete" srcset="" />
        </a>
      </div>
      <p class="grid-16"><?php bloginfo("name") ?> <?php echo date("Y") ?> - Alguns direitos reservados.</p>
    </div>
  </div>
</footer>
</body>
<!-- Inicio footer Wordpress -->
<?php wp_footer(); ?>
<!-- Fim footer Wordpress -->

</html>