<?php
//Template Name: Contato
get_header();
if (have_posts()):
  while (have_posts()):
    the_post();
    ?>
    <div>
      <p class="texto-contato">NÃO ME CONTATE - SOMENTE SE FOR PRA MANDAR PIX!!!!!</p>
      <p class="titulo-patrocinadores">Patrocinadores:</p>
      <ul class="lista-patrocinadores">
        <?php if (have_rows('patrocinadores')):
          while (have_rows('patrocinadores')):
            the_row(); ?>
            <li class="container-patroninador">
              <p class="nome-patrocinador"><?php the_sub_field('nome_patrocinador') ?></p>
              <div class="foto-patrocinador">
                <img src="<?php the_sub_field('foto_patrocinador') ?>" alt="<?php the_title() ?>">
              </div>
          </li>
          <?php endwhile; else: endif; ?>
      </ul>
    </div>
  <?php endwhile; else: endif;
get_footer(); ?>