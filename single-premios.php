<?php
//Template Name: Single Premios
get_header();
if (have_posts()):
  while (have_posts()):
    the_post();
    ?>
    <?php
    $premio_atual_slug = get_post_field('post_name', get_the_ID());
    $args_participantes = array(
      'post_type' => 'participantes',
      'posts_per_page' => -1,
      'tax_query' => array(
        array(
          'taxonomy' => 'premios',
          'field' => 'slug',
          'terms' => $premio_atual_slug,
        ),
      ),
      'orderby' => 'title',
      'order' => 'ASC',
    );
    $query_participantes = new WP_Query($args_participantes);
    ?>
    <section class="container-premio-participantes">

      <div class="container-textos">
        <h2 class="container-textos--titulo"><?php the_title() ?></h2>
        <p class="container-textos--descricao">Confira os indicados ao <?php the_title() ?> de 2025:</p>
      </div>

      <div class="participantes_info">
        <ul class="participantes--lista">
          <?php
          if ($query_participantes->have_posts()):
            while ($query_participantes->have_posts()):
              $query_participantes->the_post();
              ?>
              <li class="participante-item">
                <div class="container-video">
                  <div class="foto-participante">
                    <img src="<?php the_field('foto_participante'); ?>" alt="<?php the_title() ?>">
                  </div>
                  <p class="nome-participante"><?php the_title(); ?></p>
                  <p class="link-votacao"><a href="#vote">Vote abaixo</a></p>
                </div>
                <?php
                if (have_rows('participacoes')):
                  echo '<div class="videos-participantes">';
                  while (have_rows('participacoes')):
                    the_row();
                    $video_url = get_sub_field('link_video');
                    $video_categoria = get_sub_field('nome_do_video');
                    if ($video_categoria && $video_categoria === $premio_atual_slug):
                      ?>
                      <div class="video-item">
                        <iframe width="1250" height="703" src="<?php echo esc_url($video_url); ?>" title="" frameborder="0"
                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                          referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                      </div>
                      <?php
                    endif;
                  endwhile;
                  echo '</div>';
                else:
                  echo '<p>Não há vídeos disponíveis.</p>';
                endif;
                ?>
              </li>
              <?php
            endwhile;
          else:
            echo '<p class="mensagem-sem-participante">Nenhum participante foi indicado para este prêmio ainda.</p>';
          endif;
          wp_reset_postdata();
          ?>
        </ul>
        <div id="vote" class="opcoes-votacao">
          <?php the_content() ?>
        </div>
      </div>
    </section>
  <?php endwhile; else: endif;
get_footer(); ?>