<?php
//turn on sleeping features
add_theme_support('post-thumbnails');

//adds RSS links to the head of every page. use this if building a blog or news site
add_theme_support('automatic-feed-links');

add_theme_support( 'custom-background' );

//Allows you to visually differentiate different kinds of posts
add_theme_support( 'post-formats', array( 'gallery', 'image', 'quote', 'audio', 'video') );

//add a custom image size
// $name, $width, $height, $crop
add_image_size( 'banner', 1300, 300, true );

//allows you to create editor-style.css for the post edit window
add_editor_style();

/**
 * Make the default excerpt better
 */
function awesome_excerpt_length(){
	return 85; //words
}
add_filter( 'excerpt_length', 'awesome_excerpt_length' );

//fix [...]
function awesome_readmore(){
	return ' <a href="' . get_permalink() . '" class="readmore">Read More</a>';
}
add_filter( 'excerpt_more', 'awesome_readmore' );

/**
 * Improve Usability of the comment form with JS
 */
function awesome_comment_reply(){
	if( !is_admin() AND is_singular() AND comments_open() AND get_option('thread_comments') ){
		wp_enqueue_script('comment-reply');
	}
}
add_action( 'wp_print_scripts', 'awesome_comment_reply' );

/**
 * Make some menu areas
 * register them here first, then display with wp_nav_menu()
 */
add_action('init', 'awesome_menu_areas');
function awesome_menu_areas(){
	register_nav_menus( array(
		// code_name 	=> 'Human Friendly Name',
		'top_menu' 		=> 'Top Menu Area',
		'utilities' 	=> 'Utility Bar Area',
	) );
}
/**
 * Make some Widget Areas (dynamic sidebars)
 * register them here first, then display with dynamic_sidebar()
 */
add_action('widgets_init', 'awesome_widget_areas');
function awesome_widget_areas(){
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'description' => 'Appears next to all blog archives and posts',
		//%1$s = dynamic ID, %2$s = dynamic classes
		'before_widget' => '<section class="widget clearfix %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Home Area',
		'id' => 'home_area',
		'description' => 'Appears on the Front Page',
		'before_widget' => '<section class="widget clearfix %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Page Sidebar',
		'id' => 'page_sidebar',
		'description' => 'Appears next to static pages',
		'before_widget' => '<section class="widget clearfix %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
	register_sidebar(array(
		'name' => 'Footer Area',
		'id' => 'footer_area',
		'description' => 'Appears on the bottom of every view',
		'before_widget' => '<section class="widget clearfix %2$s" id="%1$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));

	
}




//DO NOT CLOSE PHP
