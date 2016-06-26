<?php /*
Template Name: Home
*/?>
<?php get_header();?>
<div id="wrapper" class="home-p">
	<?php the_header();?>
	<div id="main">
		<strong class="logo"><a href="<?php bloginfo('url');?>"><?php bloginfo('name');?></a></strong>
		<div class="register-hold"><span class="btn-register"><a href="https://www.signmeup.com/site/online-event-registration/100446">Register to Ride</a></span></div>
		<span class="text-ind text-date">Saturday July 12th, 2014 10:00 PM</span>
		<span class="text-ind text-omahas">Omaha's nighttime urban cycling adventure</span>
		<span class="text-ind year-five">Year Five!</span>
		<div class="text-rider"><?php
			if (have_posts()){
				the_post();
				the_page_content();
			}
		?></div>
	</div>
<?php get_footer();?>