<?php
// Template Name: Premios
get_header();
if (have_posts()):
  while (have_posts()):
    the_post();
    ?>
    <?php
    $args = array(
      'post_type' => 'premios',
      'order' => 'ASC'
    );
    $the_query = new WP_Query($args);
    ?>
    <section class="container-premio animar-interno">
      <ul class="container-premio-lista">
        <?php if ($the_query->have_posts()):
          while ($the_query->have_posts()):
            $the_query->the_post(); ?>
            <li class="container-premio-item">
              <a href="<?php the_permalink(); ?>">
                <div class="">
                  <h2><?php the_title() ?></h2>
                  <?php the_content() ?>
                </div>
                <div class="grid-5 premio_icone"></div>
              </a>
            </li>
          <?php endwhile; else: endif; ?>
      </ul>
    </section>
    <?php wp_reset_query();
    wp_reset_postdata(); ?>

  <?php endwhile; else: endif;
get_footer(); ?>