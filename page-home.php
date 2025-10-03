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
          'posts_per_page' => -1,
          'post_status' => 'publish',
          'order' => 'ASC'
        );
        $query = new WP_Query($args);
        if ($query->have_posts()):
          while ($query->have_posts()):
            $query->the_post();
            $nome_participante = get_the_title();
            $premios = get_the_terms(get_the_ID(), 'premios');
            ?>
            <li>
              <h2 class="premios-indicados--nome">
                <?php echo $nome_participante ?>
              </h2>
              <div class="foto-participante">
                <img src="<?php the_field('foto_participante'); ?>" alt="<?php the_title() ?>">
              </div>
              <div class="lista-indicacoes">
                <p class="lista-indicacoes--titulo">Concorrendo à:</p>
                <?php
                if ($premios && !is_wp_error($premios)) {
                  foreach ($premios as $premio) {
                    echo '<p class="premios-indicados--tags"><a href=/premio/' . ($premio->name) . '>' . esc_html(str_replace('-', ' ', $premio->name)) . '</a></p>';
                  }
                } else {
                  echo '<p>Nenhum prêmio vinculado.</p>';
                }

          endwhile;
          wp_reset_postdata();
        else:
          echo '<p>Nenhum participante encontrado.</p>';
        endif; ?>
          </div>
        </li>
      </ul>
    </container>

  <?php endwhile; else: endif;
get_footer(); ?>