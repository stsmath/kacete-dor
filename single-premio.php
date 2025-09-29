<?php
//Template Name: Single Prêmio
get_header();
if (have_posts()):
  while (have_posts()):
    the_post();
    $contato = get_page_by_title('contato')
      ?>
    <section class="container premio_item animar-interno">
      <div class="grid-11">
        <img src="<?php the_field('foto_produto_1') ?>" alt="<?php the_title() ?>">
        <h2><?php the_title() ?></h2>
      </div>
      <div class="grid-5 produto_icone"><img src="<?php the_field('icone_produto') ?>" alt="<?php the_title() ?>"></div>
      <div class="grid-8"><img src="<?php the_field('foto_produto_2') ?>" alt="<?php the_title() ?>"></div>
      <div class="grid-8 produto_info">
        <?php the_content() ?>
      </div>
    </section>

    <?php include(TEMPLATEPATH . "/inc/produtos-orcamento.php"); ?>
  <?php endwhile; else: endif;
get_footer(); ?>