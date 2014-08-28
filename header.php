<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php if ( is_category() ) {
			echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
		} elseif ( is_author() ) {
			wp_title(''); echo ' | '; bloginfo( 'name');
		} elseif ( is_archive() ) {
			wp_title(''); echo ' Archive | '; bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Search for &quot;'.esc_html($s).'&quot; | '; bloginfo( 'name' );
		} elseif ( is_home() || is_front_page() ) {
			bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
		}  elseif ( is_404() ) {
			echo 'Error 404 Not Found | '; bloginfo( 'name' );
		} elseif ( is_single()  ) {
			wp_title(''); 
		} else {
			echo wp_title( ' | ', 'false', 'right' ); bloginfo( 'name' );
		} ?></title>
		
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<?php if ( is_front_page() && get_header_image() != "" ) : ?>
		<style>
			.hero{
				background-image: url(<?php echo "'" . get_header_image() . "'"; ?>);
				<?php if( get_theme_mod('hero_attachment') ) { echo 'background-attachment:' . get_theme_mod('hero_attachment') . ';';} ?>
				<?php if( get_theme_mod('hero_height')) { echo 'height:' . get_theme_mod('hero_height') . 'px;'; } ?>
			}
		</style>
		<?php endif; ?>
	
		<?php if (get_theme_mod('analytics_code') ) : ?> 
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo get_theme_mod('analytics_code') ?>', 'auto');
				ga('send', 'pageview');

		</script>
		<?php endif; ?>


		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
	<div class="inner-wrap">	
	<header class="hide-for-small" role="header">
		<div class="row">
			<div class="medium-8 small-12 columns">
				<?php if (!get_theme_mod('site_logo')) :
					 if ( is_home() || is_front_page() ){ 
						 echo '<h1 id="site-title" class="title"><a href="'.  get_bloginfo('url') .'">' . get_bloginfo('name') . '</a></h1>'; 
					 } else {
						echo '<h4 id="site-title" class="title"><a href="'.  get_bloginfo('url') .'">' . get_bloginfo('name') . '</a></h4>'; 
					 } 
					 else : ?>
						 <div class="site-logo">
						 	<a href="<?php echo get_bloginfo('url'); ?>">
						 		<img src="<?php echo get_theme_mod('site_logo'); ?>" />
						 	</a>
						 </div>
					<?php endif; ?>
			</div>
			<div class="medium-4 small-12 columns">
				<?php if ( get_bloginfo('description') ) : ?>
				<h2 class="site-description text-right"><?php echo get_bloginfo('description'); ?></h2>
				<?php endif; ?>
				
				<?php if (get_theme_mod('service_location') ) : ?>
					<h3 class="service-location text-right"><?php echo get_theme_mod('service_location'); ?></h3>
				<?php endif; ?>
			</div>
		</div>
	</header>
	<?php get_template_part('parts/top-bar'); ?>	
	<section role="document">