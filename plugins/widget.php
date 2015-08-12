<?php
/*
Plugin Name: Royal King Plugin
Plugin URI: http://www.sheridanc.on.ca
Description: The widget shows the different posts for the different categories
Author: Rachit Srivastava
Version: 2.0
Author URI: http://www.sheridanc.on.ca
*/

function my_post_type() {
	register_post_type( 'royalking',
                array( 
				'label' => __('Todays Deals!'), 
				'singular_label' => __('Slide', 'my_framework'),
				'_builtin' => false,
				'exclude_from_search' => true, // Exclude from Search Results
				'capability_type' => 'page',
				'public' => true, 
				'show_ui' => true,
				'taxonomies' => array('category'),
				'show_in_nav_menus' => false,
				'rewrite' => array(
					'slug' => 'royal-king',
				),
				'supports' => array(
						'title',
						'custom-fields',
						'editor',
            			'thumbnail')
					) 
				);
}
add_action('init', 'my_post_type');
add_theme_support( 'post-thumbnails' );

class RoyalKing extends WP_Widget {
	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'RoyalKing', // Base ID
			__( 'Royal King Plugin', 'text_domain' ), // Name
			array( 'description' => __( 'The widget on the site', 'text_domain' ), ) // Args
		);
	}

	/* Front-end display of widget. */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		/* if (count ($_POST) > 0) {		Commenting out the if statement because it does not work. This 
			$option = $_POST['deals']; 		was initially used to make the user choose the posts he/she wants to see.
			if($option== 't'){ */
			$new = array('post_type'=> 'royalking', 'showposts' => 4);
			$my_query = new WP_query($new);
		
			if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
			<h2 class="post-title">
				<?php the_title(); ?>
			</h2>
		<div class="entry-content">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php the_post_thumbnail('thumbnail'); ?> </a> 	
		</div><!-- .entry-content -->
		</article><!-- #post-## -->
		<?php endwhile; endif;?>
		<!-- }   Comment out the end conditionals for the if statement
		 }      -->
	<!-- <html>      Comment out the form created for the widget because the if statements do not work.
	<form method=post>
		<h2><font size = "2"><ins><b>Today's Deals!</b></ins></font></h2> 
			<option value="t">Traditional Wing</option> 
			<option value="w">Western Wing</option>
		</select><br />
	</form>
	</html>		-->
<?php
		echo $args['after_widget'];
	}

} // class Foo_Widget
add_action( 'widgets_init', function(){
	register_widget( 'RoyalKing' );
});