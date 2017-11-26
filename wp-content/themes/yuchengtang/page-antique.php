<?php
add_filter('document_title_parts', 'yct_antique_filter_title_part');
function yct_antique_filter_title_part($title) {
	return array('a', $title['title'], $title['site']);
}
?>
<?php
get_header();
?>



<?php
get_footer();
?>
