<?php
/**
 * Contains methods for customizing the theme customization screen.
 * 
 * @link http://codex.wordpress.org/Theme_Customization_API
 * @since MyTheme 1.0
 */
class MyTheme_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since MyTheme 1.0
    */
   public static function register ( $wp_customize ) {
      $wp_customize->add_section( 'footer_options', 
         array(
            'title' => __( 'Footer' ), //Visible title of section
            'capability' => 'edit_theme_options', //Capability needed to tweak
            'description' => __('Allows you to customize the footer area text.'), //Descriptive tooltip
         ) 
      );
      
      $wp_customize->add_section( 'analytics',
      	array(
      		'title' => __( 'Analytics Code' ),
      		'capability' => 'edit_theme_options',
      		'description' => __('Google Analytics Identifier. Ex: (UA-XXXXXXX-X)'),
      	)
      );
      /*
$wp_customize->add_setting( 'link_textcolor', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
         array(
            'default' => '#2BA6CB', //Default setting/value to save
            'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
            'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
            'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
         ) 
      );      
         $wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
         $wp_customize, //Pass the $wp_customize object (required)
         'mytheme_link_textcolor', //Set a unique ID for the control
         array(
            'label' => __( 'Link Color', 'mytheme' ), //Admin-visible name of the control
            'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
            'settings' => 'link_textcolor', //Which setting to load and manipulate (serialized is okay)
            'priority' => 10, //Determines the order this control appears in for the specified section
         ) 
      ) );
*/

      /* Image Uploader - for logo */
      $wp_customize->add_setting('site_logo', array(
      	'default'	=> '',
      	'type'	=> 'theme_mod',
      	'capability' => 'edit_theme_options',
      	'transport' => 'postMessage'
      ));
      
      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'site_logo', array(
      	'label'	=> __('Logo Upload'),
      	'section'	=> 'title_tagline',
      	'settings'=> 'site_logo',
	 	)
      ));
      
      $wp_customize->add_setting('hero_height', array(
      	'default' => '350',
      	'type'	=> 'theme_mod',
      	'capability' => 'edit_theme_options',
      	'transport' => 'postMessage',
      ));
      
      $wp_customize->add_control('hero_height', array(
      	'label'	=> __('Hero image height'),
      	'section' => 'header_image',
      	'settings' => 'hero_height',
      ));
      
	 $wp_customize->add_setting('hero_attachment', array(
	 	'default'        => 'scroll',
	 	'capability'     => 'edit_theme_options',
	 	'type'           => 'theme_mod',
	 	'transport'	=> 'postMessage'
	 ));
	 
	 $wp_customize->add_control( 'hero_attachment', array(
	    'settings' => 'hero_attachment',
	    'label'   => __('Hero Image attachment:'),
	    'section' => 'header_image',
	    'type'    => 'select',
	    'choices'    => array(
	        'scroll' => __('scroll'),
	        'fixed' => __('fixed'),
	    ),
	));
      
      $wp_customize->add_setting('service_location', array(
      	'default'	=> 'Dayton, OH',
      	'type'	=> 'theme_mod',
      	'capability'	=> 'edit_theme_options',
	 	'transport'	=> 'postMessage',
      ));
      
      $wp_customize->add_control('service_location', array(
      	'label' => __('Service Location'),
      	'section' => 'title_tagline',
      	'settings' => 'service_location'	
	 ));
      
      $wp_customize->add_setting('advertisement_disclaimer', array(
      	'default' => 'This site is an advertisement',
      	'type'	=> 'theme_mod',
      	'capability' => 'edit_theme_options',
      	'transport' => 'postMessage'
      ));
      
      $wp_customize->add_control('advertisement_disclaimer', array(
      	'label'	=> __('Advertisement Disclaimer'),
      	'section' => 'footer_options',
      	'settings' => 'advertisement_disclaimer',
      ));
      
      $wp_customize->add_setting('site_disclaimer_text', array(
      	'default' => 'Default: Page Title',
      	'type'	=> 'theme_mod',
      	'capability' => 'edit_theme_options',
      	'transport' => 'postMessage'
      ));
      
      $wp_customize->add_control('site_disclaimer_text', array(
      	'label'	=> __('Site Disclaimer/Privacy Policy Text'),
      	'section' => 'footer_options',
      	'settings' => 'site_disclaimer_text',
      ));
      
      $wp_customize->add_setting('site_disclaimer_page', array(
      	'default' => '',
      	'type'	=> 'theme_mod',
      	'capability' => 'edit_theme_options',
      	'transport' => 'postMessage'
      ));
      
      $wp_customize->add_control('site_disclaimer_page', array(
      	'label'	=> __('Site Disclaimer/Privacy Policy Page'),
      	'section' => 'footer_options',
      	'type'	=> 'dropdown-pages',
      	'settings' => 'site_disclaimer_page',
      ));
      
      $wp_customize->add_setting('analytics_code', array(
      	'default'	=> '',
      	'type'	=> 'theme_mod',
      	'capability' => 'edit_theme_options',
      	'transport' => 'postMessage',
      ));
      
      $wp_customize->add_control('analytics_code', array(
      	'label'	=> __('GA Identifier'),
      	'section'	=> 'analytics',
      	'settings' => 'analytics_code',
      		
      ));
      
      //4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
//      $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
//      $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';


	// Set Custom priority levels
	$wp_customize->get_section('title_tagline')->priority = 1;
	$wp_customize->get_section('colors')->priority = 2;
	$wp_customize->get_section('nav')->priority = 3;
	$wp_customize->get_section('header_image')->priority = 4;
	$wp_customize->get_section('footer_options')->priority = 5;
	$wp_customize->get_section('static_front_page')->priority = 6;
	
	// Set Custom titles
	$wp_customize->get_section('header_image')->title = __('Hero Image(s)');
   }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since MyTheme 1.0
    */
   public static function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
           <?php self::generate_css('#site-title a', 'color', 'header_textcolor', '#'); ?> 
           <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?> 
           <?php self::generate_css('a', 'color', 'link_textcolor'); ?>
           
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
      
   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since MyTheme 1.0
    */
   public static function live_preview() {
      wp_enqueue_script( 
           'mytheme-themecustomizer', // Give the script a unique ID
           get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
           array(  'jquery', 'customize-preview' ), // Define dependencies
           '', // Define a version (optional) 
           true // Specify whether to put in footer (leave this true)
      );
   }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
}

// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'MyTheme_Customize' , 'header_output' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'MyTheme_Customize' , 'live_preview' ) );