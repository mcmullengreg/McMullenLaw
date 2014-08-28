<?php

function sidebarWidgets() {
	
	register_sidebar(array(
		'id' => 'homepage-slideshow',
		'name' => __('Homepage Slider', 'mcmullen'),
		'description' => __('Drag widgets to this container, for the homepage slider, use Text or Media Upload'),
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="large-3 small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>'
	));
	
	register_sidebar(array(
		'id' => 'homepage-features',
		'name' => __('Homepage Features', 'mcmullen'),
		'description' => __('Drag widgets to this container, three is best.'),
		'before_widget' => '<div id="%1$s" class="large-4 small-12 columns">',
		'after_widget' => '</div>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>'
	));
	
	register_sidebar(array(
     	'id' => 'sidebar-widgets',
		'name' => __('Sidebar widgets', 'mcmullen'),
		'description' => __('Drag widgets to this sidebar container. Displays everywhere BUT the front page.', 'mcmullen'),
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>'
	));

	register_sidebar(array(
     	'id' => 'footer-widgets',
		'name' => __('Footer widgets', 'mcmullen'),
     	'description' => __('Drag widgets to this footer container. Displays on every page.', 'mcmullen'),
     	'before_widget' => '<div id="%1$s" class="small-6 columns widget %2$s">',
     	'after_widget' => '</div>',
     	'before_title' => '<h6 class="title">',
     	'after_title' => '</h6>'      
  ));
}

add_action( 'widgets_init', 'sidebarWidgets' );

?>