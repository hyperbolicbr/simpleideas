<?php


function theme_setup() {
	load_theme_textdomain('simpleideas', get_template_directory() . '/lang');
	add_filter( 'show_admin_bar', '__return_false' );
	add_theme_support( 'post-thumbnails' );
	register_sidebar(array('name' => __( 'Left sidebar', 'simpleideas'),'id' => 'left-sidebar', 'description' => __( 'Widgets in this area will be shown on the left-hand side', 'simpleideas'),'before_widget' => '<div id="%1$s" class="si-widget %2$s">','after_widget'  => '</div>','before_title' => '<h1>','after_title' => '</h1>'));
	register_nav_menus(array('navigation' => 'Top menu'));
}
add_action( 'after_setup_theme', 'theme_setup' );


function si_wp_title( $title, $sep ) {
    global $page, $paged;

    if ( is_feed() )
        return $title;

    // Add the blog name.
    $title .= get_bloginfo( 'name' );

    // Add the blog description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title .= ' ' . $sep . ' ' . $site_description;

    // Add a page number if necessary:
    if ( $paged >= 2 || $page >= 2 )
        $title .= ' ' . $sep . ' ' . sprintf( __( 'Page %s', 'hyperbol' ), max( $paged, $page ) );

    return $title;
}

add_filter( 'wp_title', 'si_wp_title', 10, 2 );