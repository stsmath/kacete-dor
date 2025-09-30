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

        <?php
        $args = array(
          'post_type' => 'participantes',
          'posts_per_page' => -1, // pega todos
          'post_status' => 'publish'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();
            $nome_participante = get_the_title();
            ?>
            <h2><?php echo $nome_participante?></h2>
            <?php
            // pega todas as taxonomias "premios" ligadas a esse participante
            $premios = get_the_terms(get_the_ID(), 'premios');

            if ($premios && !is_wp_error($premios)) {
              echo '<ul>';
              foreach ($premios as $premio) {
                echo '<li>' . esc_html($premio->name) . '</li>';
              }
              echo '</ul>';
            } else {
              echo '<p>Nenhum prêmio vinculado.</p>';
            }

          endwhile;
          wp_reset_postdata();
        else:
          echo '<p>Nenhum participante encontrado.</p>';
        endif;
        ?>

      </ul>
    </container>

  <?php endwhile; else: endif;
get_footer(); ?>