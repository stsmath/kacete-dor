<nav class="grid-12 header_menu">
  <div class="logo-kacete">
    <img src="<?php echo get_template_directory_uri() ?>/img/trofeu-kacete-2.png" alt="trofeu Kacete" srcset="" />
    <p class="titulo-blog">Kacete<br />d'Or</p>
  </div>
  <?php
  $args = array(
    'menu' => 'principal',
    'theme_location' => 'menu-principal',
    'container' => false,
  );
  wp_nav_menu($args);
  ?>
</nav>