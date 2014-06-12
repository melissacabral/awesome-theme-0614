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








//DO NOT CLOSE PHP
