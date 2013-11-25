<?php

/* Insert Javascript in custom routes or pages.
 * Filters:
 * [post_type:the_post_type] = entire post type
 * [single_post_type:the_post_type] = only in single
 * [archive_post_type:the_post_type] = only in archieve
 */



function smartideas_build_js() {
	 
	$js_path = get_template_directory_uri()."/js/";
	
	$js[]["*"]	= "bootstrap.min.js";

	
	$num = count($js);
	
	for ($i=0;$i<$num;$i++) {
		
		
		$key = key($js[$i]);
		$val = $js[$i][$key];
		
		$key = explode(":", $key);
		
		$include = false;
		
		if ($key[0] == "*") {
			$include = true;
		} else if ($key[0] == "single_post_type") {
			if (is_singular($key[1])) {
				$include = true;
			}
		} else if ($key[0] == "archive_post_type") {
			if (is_post_type_archive($key[1])) {
				$include = true;
			}
		} else if ($key[0] == "page") {
			if (is_page($key[1])) {
				$include = true;
			}
		} else if ($key[0] == "category") {
			if (is_category($key[1])) {
				$include = true;
			}
		} else {
			$include = false;
		}
		
		if ($include) {
			$name = str_replace(".", "_", $val);
			wp_enqueue_script($name,$js_path.$val);
		}
	}
}

add_action( 'wp_enqueue_scripts', 'smartideas_build_js' );
