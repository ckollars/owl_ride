	<div id="footer">
		<div class="sponsors-hold">
			<div class="heading"><a href="<?php echo get_permalink(16); ?>" title="<?php echo get_the_title(16); ?>"><strong class="text-ind text-thanks">Thanks to our sponsors</strong></a></div>
			<div class="sponsors-box">
				<div class="w1">
					<div class="w2">
						<ul>
							<li style="display: block;"><span style="margin: 0; font-size: 18px; line-height: 30px; font-weight: normal; text-transform: uppercase; color: #fcb040;">Presenting Sponsor</span>&nbsp;<a href="http://www.metrofcu.org/"><img src="<?php bloginfo('template_directory'); ?>/images/sponsor-metro.png" alt="Metro Credit Union"/></a></li>
							<li><a href="http://wowt.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-6.png" alt="UNMC"/></a></li>
							<li><a href="http://unmc.edu/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-unmc.png" alt="UNMC"/></a></li>
							<li><a href="http://www.nebraskamed.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-nmc.png" alt="Nebraska Medical Center"/></a></li>							
							<li><a href="http://unmc.edu/mmi/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-mmi.png" alt="Munroe Meyer Institute"/></a></li>
							<li><a href="http://www.interstatebatteries.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-interstate.png" alt="Interstate Batteries"/></a></li>
							<li><a href="http://www.clinewilliams.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-cline.png" alt="Cline Williams"/></a></li>
							<li><a href="http://www.oxidedesign.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-oxide.png" alt="Oxide Design Co."/></a></li>
							<li><a href="http://www.regalprint.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-regal.png" alt="Regal" width="130px"/></a></li>
							<li><a href="http://www.hy-vee.com/"><img alt="Hyvee" src="http://owlride.org/wp-content/uploads/2012/05/sponsor-hyvee.png" width="97"></a></li>
							<li><a href="http://www.wholefoodsmarket.com/"><img alt="Whole Foods" src="http://owlride.org/wp-content/uploads/2012/05/sponsor-whole-foods.png" width="89"></a></li>
							<li><a href="http://www.sodexousa.com/"><img src="<?php bloginfo('template_directory'); ?>/images/bottom-sodexo.png" alt="Sodexo"/></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="f-nav">
			<div class="w1">
				<div class="w2">
				<ul><?php
						wp_list_pages(array('title_li' => '', 'depth' => 1, 'sort_column' => 'menu_order', 'exclude' => get_homepage_id()));
					?>
				</ul>
				</div>
				<div class="w2">
				<ul>
					<li><a href="http://www.twitter.com/owlride"><img src="<?php bloginfo('template_url');?>/images/ico-twitter.gif" alt="image description"/> Twitter</a></li>
					<li><a href="http://www.facebook.com/pages/Owl-Ride/235257534962"><img src="<?php bloginfo('template_url');?>/images/ico-facebook.gif" alt="image description"/> Facebook</a></li>
				</ul>
				</div>
			</div>
		</div>
		<div class="copy">
			<div class="w1">
				<div class="w2">
					<ul><li><a href="http://www.oxidedesign.com">Design by Oxide Design Co.</a></li>
						<li>&copy;<?php echo(date('Y'));?> All rights reserved.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer();?>
</body></html>