<?php
include(TEMPLATEPATH.'/classes.php');
automatic_feed_links(false);
remove_action('wp_head', 'wp_generator');
function filter_template_url($text){
	return str_replace('[template-url]', get_bloginfo('template_url'), $text);
}
add_filter('the_content', 'filter_template_url');
add_filter('get_the_content', 'filter_template_url');
function the_page_content($more_link_text = null, $stripteaser = 0){
	$removep = get_post_meta(get_the_ID(), 'nofilter', true);
	if ($removep) remove_filter('the_content', 'wpautop');
	the_content($more_link_text, $stripteaser);
	if ($removep) add_filter('the_content', 'wpautop');
}
function get_homepage_id(){
	$homepage = get_page_by_title(strtolower('home'));
	return $homepage->ID;
}
function the_header(){
?><div id="header">
	<div class="main-nav"><div class="w1"><div class="w2"><ul><?php
		wp_list_pages(array('title_li' => '', 'depth' => 1, 'sort_column' => 'menu_order',
			'meta_key' => 'menulevel', 'meta_value' => 'first', 'walker' => new Walker_Top()));
	?></ul></div></div></div>
	<div class="main-nav"><div class="w1"><div class="w2"><ul><?php
		wp_list_pages(array('title_li' => '', 'depth' => 1, 'sort_column' => 'menu_order',
			'meta_key' => 'menulevel', 'meta_value' => 'second', 'walker' => new Walker_Top()));
	?></ul></div></div></div>
</div>
<?php }
?>