<?php get_header();?>

<div class="main">
  <?php
    $image = get_field('event_background_image');
   ?>
  <div class="hero" style="background-image: url(<?php echo $image['sizes']['hero_2x']; ?>);">
    <div class="container">
      <p class="sub-title"><?php the_field('event_date_time'); ?></p3>
      <div class="hero__content"><?php the_field('event_content'); ?></div>
      <a href="<?php the_field('registration_button_url') ?>" class="btn btn--register" target="_blank" rel="noopener noreferrer"><?php the_field('registration_button_txt'); ?></a>
      <p class="copy-small"><?php the_field('small_content_copy'); ?></p>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <div class="container-small">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>

<?php get_footer();?>
