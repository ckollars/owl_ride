<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && ('comments.php' == basename($_SERVER['SCRIPT_FILENAME'])))
		die('Please do not load this page directly. Thanks!');
	if (post_password_required()){
		echo('<p>This post is password protected. Enter the password to view comments.</p>');
		return;
}

function theme_comment($comment, $args, $depth){
$GLOBALS['comment'] = $comment;?>
<li><?php echo(get_avatar($comment, 48));?>
	<?php comment_date('F d, Y');?> at <?php comment_time('g:i a');?>, <b><?php comment_author();?></b> said:
	<?php if ($comment->comment_approved == '0'):?>
	<p>Your comment is awaiting moderation.</p>
	<?php else:?>
	<?php comment_text();?>
	<?php endif;?>
	<?php comment_reply_link(array_merge($args, array(
			'reply_text' => 'Reply',
			'before' => '<p>',
			'after' => '</p>',
			'depth' => $depth,
			'max_depth' => $args['max_depth'])));?>
<?php }
function theme_comment_end(){
	echo('</li>');
}

if (have_comments()):?>
<div id="comments">
	<h2><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &laquo;<?php the_title();?>&raquo;</h2>
	<ul id="chokecom">
		<?php wp_list_comments(array('callback' => 'theme_comment', 'end-callback' => 'theme_comment_end'));?>
	</ul>
	<div class="navigation">
		<div class="next"><?php previous_comments_link('&laquo; Older Comments');?></div>
		<div class="prev"><?php next_comments_link('Newer Comments &raquo;');?></div>
	</div>
</div>
<?php endif;?>
<?php if (comments_open()):?>
<div id="respond">
	<form action="<?php echo get_option('siteurl');?>/wp-comments-post.php" method="post" id="commentform">
		<fieldset>
			<h2><?php comment_form_title('Leave a Reply', 'Leave a Reply to %s');?></h2>
			<div class="cancel-comment-reply"><?php cancel_comment_reply_link();?></div>
			<?php if (get_option('comment_registration') && !is_user_logged_in()):?>
			<p>You must be <a href="<?php echo wp_login_url(get_permalink());?>">logged in</a> to post a comment.</p>
			<?php else: if (is_user_logged_in()):?>
			<p>Logged in as <a href="<?php echo get_option('siteurl');?>/wp-admin/profile.php"><?php echo $user_identity;?></a>.&nbsp;<a href="<?php echo wp_logout_url(get_permalink());?>" title="Log out of this account">Log out &raquo;</a></p>
			<dl>
			<?php else:?>
			<dl><dt><label for="author">Name:</label></dt>
				<dd><input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author);?>"/></dd>
				<dt><label for="email">E-Mail (will not be published):</label></dt>
				<dd><input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email);?>"/></dd>
				<dt><label for="url">Website:</label></dt>
				<dd><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url);?>"/></dd>
			<?php endif;?>
				<dt><label for="comment">Comment:</label></dt>
				<dd><textarea name="comment" id="comment" cols="60" rows="10"></textarea></dd>
				<dd><input name="submit" type="submit" id="submit" value="Submit Comment"/></dd>
			</dl>
			<?php
				comment_id_fields();
				do_action('comment_form', $post->ID);
			?>
			<?php endif;?>
		</fieldset>
	</form>
</div>
<?php endif;?>