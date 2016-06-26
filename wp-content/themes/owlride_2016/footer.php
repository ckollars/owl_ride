    <div class="sponsors">
      <div class="container">
<!--   			<h4 class="sponsors-title">Our Sponsors</h4> -->

					<?php
              $sponsor_levels = get_terms(array(
                  'taxonomy' => 'sponsor-level',
                  'orderby' => 'slug'
                )
              );
              $args = array(
                'post_type'   => 'sponsor',
                'post_status' => 'publish',
                'order' => 'ASC',
                'orderby' => 'menu_order',
                'posts_per_page' => -1
              );

            $sponsors = get_posts( $args );
           ?>
          <?php foreach ($sponsor_levels as $key => $level) : ?>
            <h4 class="sponsors-title"><span><?php echo $level->name ?></span></h4>
            <ul class="sponsors-list <?php echo 'sponsor--' . $level->slug; ?>">
              <?php foreach ($sponsors as $post): setup_postdata($post); ?>
                <?php
                  if(has_term($level->name, 'sponsor-level')):
                    $logo = get_field('sponsor_logo'); ?>
                  <?php if(get_field('sponsor_url')): ?>
                    <li><a href="<?php the_field('sponsor_url'); ?>" target="_blank" rel="noopener"><img src="<?php echo $logo['url']; ?>" alt="<?php the_title(); ?>"></a></li>
                  <?php else: ?>
                    <li><img src="<?php echo $logo['url']; ?>" alt="<?php the_title(); ?>"></li>
                  <?php endif; ?>
                <?php endif; ?>
              <?php endforeach;  ?>
            </ul>
          <?php endforeach; ?>

      </div>
		</div>
    <footer>
      <div class="container">
  			<div class="contact">
          <p class="email">
            <a href="mailto:info@owlride.org">info@owlride.org</a>
            <span class="social">
              <a href="https://www.facebook.com/Owlride" class="btn btn--social icon--facebook">Follow us on Facebook</a>
              <a href="https://twitter.com/owlride1" class="btn btn--social icon--twitter">Follow us on Twitter</a>
              <a href="" class="btn btn--social icon--instagram">Follow us on Instagram</a>
            </span>
          </p>
        </div>
  			<p class="copyright">Copyright <?php echo(date('Y'));?> OWL RIDE</p>
      </div>
    </footer>
	</div>
</div>
<?php wp_footer();?>
</body></html>
