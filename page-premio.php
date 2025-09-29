<?php
// Template Name: Prêmio
get_header();
if (have_posts()):
  while (have_posts()):
    the_post();
    ?>
    <?php
    $args = array(
      'post_type' => 'Categorias prêmio',
      'order' => 'ASC'
    );
    $the_query = new WP_Query($args);
    ?>

    <?php if ($the_query->have_posts()):
      while ($the_query->have_posts()):
        $the_query->the_post(); ?>

        <section class="container premio_item">
          <a href="<?php the_permalink(); ?>">
            <div class="grid-11">
              <img src="<?php the_field('foto_produto_1') ?>" alt="<?php the_title() ?>">
              <h2><?php the_title() ?></h2>
            </div>
            <div class="grid-5 produto_icone"><img src="<?php the_field('icone_produto') ?>" alt="<?php the_title() ?>"></div>
          </a>
        </section>
      <?php endwhile; else: endif; ?>
    <?php wp_reset_query();
    wp_reset_postdata(); ?>

  <?php endwhile; else: endif;
get_footer(); ?>