<?php get_header();?>
<div id="wrapper">
	<?php the_header();?>
	<div id="main">
		<div class="twocolumns">
			<?php get_sidebar();?>
			<div class="content"><?php if (have_posts()):
				the_post();
				global $wp_query;
				$this_page = $wp_query->get_queried_object();
				?><div class="heading"><?php
				?><h1><img src="<?php bloginfo('template_url');?>/images/text-<?php echo($this_page->post_name);?>.gif" alt="<?php the_title();?>"/></h1><?php
				?></div><?php
				the_page_content();
				endif;
			?></div>
		</div>
	</div>
<?php get_footer();?>