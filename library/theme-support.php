<?php
function themeSupport() {

    // Add menu support
    add_theme_support('menus');

    // Add post thumbnail support: http://codex.wordpress.org/Post_Thumbnails
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);

    // rss thingy
    add_theme_support('automatic-feed-links');

    // Add post formarts support: http://codex.wordpress.org/Post_Formats
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

    // HTML5 support
    add_theme_support( 'html5', array( 'search-form' ) );
    
    // Custom header
    add_theme_support( 'custom-header' ,
    		array(
    			'default-image'		=> get_template_directory_uri() . '/assets/img/books-full.jpg',
    			'random-default'		=> false,
    			'flex-height'			=> true,
    			'flex-width'			=> false,
    			'header-text'			=> false,
    			'uploads'				=> true,
    			'height'				=> '438',
    			'width'				=> '1024',
    		)
    	);

}

add_action('after_setup_theme', 'themeSupport'); 
	
function contactMethods( $contactmethods ){
	// Add twitter
	$contactmethods['twitter'] = 'Twitter (full URL)';
	
	// Add facebook
	$contactmethods['facebook'] = 'Facebook (full URL)';

	// Add linkedin
	$contactmethods['linkedin'] = 'LinkedIn (full URL)';
	
	// Add Google+
	$contactmethods['google'] = 'Google+ (full URL)';
	
	// Add specialties
	$contactmethods['specialty'] = 'Area(s) of Expertise (comma separated)';
	
	return $contactmethods;
}

// add a short biography form for the author description on blog postss
add_action('show_user_profile', 'extra_profile_field');
add_action('edit_user_profile', 'extra_profile_field');

function extra_profile_field( $user ){ ?>

	<table class="form-table">
		<tbody>
		<tr>
			<th><label for="short-bio">Short Biography (for blog posts)</label></th>
			<td>
				<textarea name="short-bio" id="short-bio" rows="5" cols="30"><?php echo esc_attr( get_the_author_meta( 'short-bio', $user->ID ) ); ?></textarea><br>
				<span class="description">Share a little biographical information to fill out your profile. This may be shown publicly.</span></td>
		</tr>
		</tbody>
	</table>
<?php }

add_action( 'personal_options_update', 'save_extra_profile_field');
add_action( 'edit_user_profile_update', 'save_extra_profile_field');

function save_extra_profile_field( $user_id ){
	if( !current_user_can( 'edit_user', $user_id) ) {return false;}
	update_user_meta($user_id, 'short-bio', $_POST['short-bio']);
}

add_filter('user_contactmethods', 'contactMethods');

// Allow for HTML tags in the User profiles
remove_filter('pre_user_description', 'wp_filter_kses');

// Force search of pages too
function search_filter( $query ){
	if ( $query->is_search ) {
		$query->set( 'post_type', array('post', 'page') );
	}
	return query;
}
add_filter('pre_get_posts', 'search_filter');

add_action('init', 'page_excerpt');
function page_excerpt(){
	add_post_type_support( 'page', 'excerpt');
}
?>