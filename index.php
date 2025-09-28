<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>
  
  <?php endwhile; else: ?>

  <section class="">
    <div class="">
      <h1>Página não encontrada.</h1>
    </div>
  </section>

<?php endif; ?>

<?php get_footer(); ?>