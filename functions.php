function custom_posts_per_page($query){
if(is_home()){
	$query->set('posts_per_page',5);
		if(is_paged()){
			$query->set('posts_per_page',6);
			$offset = 24;
			$ppp = get_option('posts_per_page');
			$page_offset = $offset + ( ($query->query_vars['paged']-1) * $ppp );
			$query->set('offset', $page_offset );
		}
	}
	if(is_archive()){
		$query->set('posts_per_page',10);
	}
	if(is_tag()){
		$query->set('posts_per_page',10);
	}
	if(is_search()){
		$query->set('posts_per_page',-1);
	}
}
add_action('pre_get_posts','custom_posts_per_page');
