<?php get_header();?>

<div class="main">

  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <article>
      <header>
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php the_post_thumbnail(); ?>
      </header>
      <div class="main-content">
        <?php the_content(); ?>
      </div>
    </article>

  <?php endwhile; endif; ?>
</div>

<?php get_footer();?>
