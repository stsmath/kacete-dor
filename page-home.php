<?php
//Template Name: Home
get_header();
if (have_posts()):
  while (have_posts()):
    the_post();
    ?>

    <container class="home-kacete">
      <div class="texto-informativo">
        <h1 class="texto-informativo--titulo"><?php the_field('titulo_kacete') ?></h1>
        <p class="texto-informativo--descricao"><?php the_field('texto_descricao_kacete') ?></p>
      </div>

      <ul class="premios-indicados">
        
      </ul>
    </container>

  <?php endwhile; else: endif;
get_footer(); ?>