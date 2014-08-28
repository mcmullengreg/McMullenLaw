<?php
/* This wouldn't be possible without the help of Paul Underwood
Source: http://www.paulund.co.uk/add-upload-media-library-widgets

/**
 * Register the Widget
 */
add_action( 'widgets_init', create_function( '', 'register_widget("pu_media_upload_widget");' ) );

class pu_media_upload_widget extends WP_Widget
{
    /**
     * Setup the widget name
     **/
    public function __construct()
    {
        $widget_ops = array(
            'classname' => 'pu_media_upload',
            'description' => 'Widget that uses the built in Media library.'
        );

        parent::__construct( 'pu_media_upload', 'Media Upload Widget', $widget_ops );

        add_action('admin_enqueue_scripts', array($this, 'upload_scripts'));
        add_action('admin_enqueue_styles', array($this, 'upload_styles'));
    }

    /**
     * Upload the Javascripts for the media uploader
     */
    public function upload_scripts()
    {
        wp_enqueue_script('jquery');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        
        wp_enqueue_script('upload_media_widget', get_template_directory_uri() . '/js/upload-media.js');
    }

    /**
     * Add the styles for the upload media box
     */
    public function upload_styles()
    {
        wp_enqueue_style('thickbox');
    }

    /**
     * Outputs the HTML for this widget.
     *
     * @param array  An array of standard parameters for widgets in this theme
     * @param array  An array of settings for this widget instance
     * @return void Echoes it's output
     **/
    public function widget( $args, $instance )
    {
        // Add any html to output the image in the $instance array
        $title = apply_filters( 'widget_title', $instance['title'] );
        $image = $instance['image'];
        $description = $instance['description'];
        $link_target = $instance['link_target'];
        
        echo $args['before_widget'] . '<div class="panel text-center">';
        if ( !empty( $image ) ) {
	        echo '<img class="rounded align-middle" src="' . $image . '" alt="' . $title . '" />';
        } else {
	        echo '<img class="rounded align-middle" src="//placehold.it/150x150" />';
        }
        if ( !empty( $link_target ) && !empty( $title ) ){
	        echo $args['before_title'] . '<a href="' . get_the_permalink($link_target) . '">' . $title . '</a>' . $args['after_title'];
        } elseif ( !empty( $title ) ) {
	        echo $args['before_title'] . $title . $args['after_title'];
        }
        
        if ( !empty( $description ) ) {
	        echo wpautop($description, true);
        } else {
	        echo '<p>Test</p>';
        }
        echo '</div>' . $args['after_widget'];
    }

    /**
     * Deals with the settings when they are saved by the admin. Here is
     * where any validation should be dealt with.
     *
     * @param array  An array of new settings as submitted by the admin
     * @param array  An array of the previous settings
     * @return array The validated and (if necessary) amended settings
     **/
    public function update( $new_instance, $old_instance ) {

        // update logic goes here
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['image'] = strip_tags($new_instance['image']);
        $instance['description'] = $new_instance['description'];
        $instance['link_target'] = strip_tags($new_instance['link_target']);
        return $instance;
    }

    /**
     * Displays the form for this widget on the Widgets page of the WP Admin area.
     *
     * @param array  An array of the current settings for this widget
     * @return void
     **/
    public function form( $instance )
    {
    		if ( $instance ){
			$title = $instance['title'];
			$image = $instance['image'];
			$description = $instance['description'];
			$link_target = $instance['link_target'];
		} else {
			$title = '';
			$image = '';
			$textarea = '';
			$description = '';
			$link_target = '';
		}

?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Feature Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Feature Image: (max 261px)' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button button right" type="button" value="Upload Image" style="margin-top:5px;" />
        </p>
        <p style="clear:both;">
		   <label for="<?php echo $this->get_field_name('description'); ?>"><?php _e( 'Feature Description:' ); ?></label>
		   <textarea name="<?php echo $this->get_field_name('description');?>" id="<?php echo $this->get_field_id('description');?>" class="widefat" type="text" rows="8" style="resize:vertical;" value="<?php echo esc_textarea( $description ); ?>" ><?php echo esc_textarea( $description ) ?></textarea>
        </p>
        <p>
        <label for="<?php echo $this->get_field_id('link_target'); ?>"><?php _e('CTA Link Target:'); ?></label>
        <?php wp_dropdown_pages(array(
        	'id' => $this->get_field_id('link_target'),
        	'name' => $this->get_field_name('link_target'),
        	'selected' => $instance['link_target']
        	
        	)); ?>
	   </p>
    <?php
    }
}
?>