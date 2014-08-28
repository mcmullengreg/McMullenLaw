<?php

if(!function_exists('mcmullenScripts')) :
	function mcmullenScripts(){
		
		// deregister Wordpress jQuery
		wp_deregister_script('jquery');
		
		// register scripts
		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.js', array(), '1.0.0', false);
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery/dist/jquery.min.js', array(), '1.0.0', false);
		wp_register_script('foundation', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true);
		
		// enqueue scripts
		wp_enqueue_script('modernizr');
		wp_enqueue_script('jquery');
		wp_enqueue_script('foundation');
		
		// fancy comment reply
		if ( is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	
	add_action('wp_enqueue_scripts', 'mcmullenScripts');
endif;

?>