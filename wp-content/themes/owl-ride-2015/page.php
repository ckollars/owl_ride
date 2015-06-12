<?php get_header();?>

<div class="main">

  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
      $url = $thumb['0'];
    ?>
    <article>
      <header class="article__header" style="background-image:url(<?=$url?>);">
        <div class="container">
          <h1 class="page-title"><?php the_title(); ?></h1>
        </div>
      </header>
      <div class="main-content">
        <div class="container">
          <?php the_content(); ?>
        </div>
      </div>
    </article>

  <?php endwhile; endif; ?>
</div>

<?php get_footer();?>
