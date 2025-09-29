<?php get_header(); ?>

<?php if (have_posts()):
  while (have_posts()):
    the_post(); ?>

    <article>
			<section class="">
				<div class="">
					<h1><?php the_title(); ?></h1>
				</div>
			</section>

			<section class="">
				<div class="">
					<?php the_content(); ?>
				</div>
			</section>
		</article>
  
  <?php endwhile; else: ?>

  <section class="">
    <div class="">
      <h1>Página não encontrada.</h1>
    </div>
  </section>

<?php endif; ?>

<?php get_footer(); ?>