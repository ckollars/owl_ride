<?php
class Walker_Top extends Walker_Page {
	function start_el(&$output, $page, $depth, $args, $current_page){
		if ($depth) $indent = str_repeat("\t", $depth);
		else $indent = '';
		extract($args, EXTR_SKIP);
		$li_class = array();
		if (!empty($current_page)){
			$_current_page = get_page($current_page);
			if (isset($_current_page->ancestors) && in_array($page->ID, (array) $_current_page->ancestors)) $li_class[] = 'active ancestor';
			if ($page->ID == $current_page) $li_class[] = 'active';
			elseif ($_current_page && $page->ID == $_current_page->post_parent) $li_class[] = 'active parent';
		} elseif ($page->ID == get_option('page_for_posts')) $li_class[] = 'active parent';
		if ($spclass = get_post_meta($page->ID, 'class', true)) $li_class[] = $spclass;
		else $li_class[] = $page->post_name;
		$li_class = implode(' ', apply_filters('page_li_css_class', $li_class, $page));
		$hl_class = array($page->post_name);
		$hl_class = implode(' ', apply_filters('page_hl_css_class', $hl_class, $page));
		if ($li_class) $li_class = ' class="'.$li_class.'"';
		if ($hl_class) $hl_class = ' class="'.$hl_class.'"';
		$output .= $indent.'<li'.$li_class.'><a href="'.get_page_link($page->ID).
			'" title="'.esc_attr(apply_filters('the_title', $page->post_title)).
			'"'.$hl_class.'>'.$link_before.apply_filters('the_title', $page->post_title).$link_after.'</a>';
		if (!empty($show_date)){
			if('modified' == $show_date) $time = $page->post_modified;
			else $time = $page->post_date;
			$output .= " ".mysql2date($date_format, $time);
		}
	}
}
?>