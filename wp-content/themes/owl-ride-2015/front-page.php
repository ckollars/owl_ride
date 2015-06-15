<?php get_header();?>

<div class="main">
  <div class="callout">
    <div class="container">
      <h1 class="page-title">Omaha&rsquo;s nighttime,<br>urban, cycling<br>adventure.</h1>
      <div class="hr"></div>
      <h3 class="sub-title">July 11<sup>th</sup> 2015 at 10:00pm<span>Starting and ending at the Lewis and Clark Landing</span></h3>
      <a href="https://www.eventbrite.com/e/owl-ride-tickets-16979885294" class="btn btn--register">Register</a>
    </div>
  </div>
  <div class="main-content">
    <div class="container">
      <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
        <h4 class="sponsors-title">Our Cause</h4>
        <div class="container-small">
          <?php the_content(); ?>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>
</div>

<?php get_footer();?>
