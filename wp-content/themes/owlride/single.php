<?php get_header();?>
<div id="wrapper">
	<?php the_header();?>
	<div id="main">
		<div class="twocolumns">
			<?php get_sidebar();?>
			<div class="content">
				<div id="choke">
					<?php if (have_posts()): while (have_posts()): the_post();?>
					<div class="chokepost">
						<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
						<b><?php the_time('F jS, Y');?></b> by <?php the_author();?>
						<?php the_page_content('Read More&hellip;');?>
						[<?php comments_number('No Comments', '1 Comment', '% Comments');?>]
					</div>
					<?php if (comments_open()) comments_template();
						else echo('<h1>Comments are closed.</h1>');	
					endwhile; else:?>
						<h1>Not Found</h1>
						<p>Sorry, but you are looking for something that isn't here.</p>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();?>