<?php
/*
-----------------------------------------------------------------------------------

	Plugin Name: CT Recent Posts Widget
	Plugin URI: http://www.color-theme.com
	Description: A widget that show recent posts ( Specified by cat-id )
	Version: 1.0
	Author: ZERGE
	Author URI:  http://www.color-theme.com
 
-----------------------------------------------------------------------------------
*/


/**
 * Add function to widgets_init that'll load our widget.
 */
add_action( 'widgets_init', 'ct_posts_load_widgets' );

function ct_posts_load_widgets()
{
	register_widget('CT_Recent_Posts_Widget');
}


/**
 * Widget class.
 * This class handles everything that needs to be handled with the widget:
 * the settings, form, display, and update. 
 *
 */
class CT_Recent_Posts_Widget extends WP_Widget {

	/**
	 * Widget setup.
	 */
	function CT_Recent_Posts_Widget()
	{
		/* Widget settings. */
		$widget_ops = array('classname' => 'ct_posts_widget', 'description' => __( 'Display recent posts by categories (or related)' , 'color-theme-framework' ) );
		
		/* Widget control settings. */
		$control_ops = array( 'width' => 200, 'height' => 350, 'id_base' => 'ct_posts_widget' );
		
		/* Create the widget. */
		$this->WP_Widget( 'ct_posts_widget', __( 'CT: Recent Posts' , 'color-theme-framework' ), $widget_ops, $control_ops);
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		global $wpdb;
		$time_id = rand();

		/* Our variables from the widget settings. */
		$title = apply_filters ('widget_title', $instance ['title']);
		$num_posts = $instance['num_posts'];
		$categories = $instance['categories'];
		$categories_exclude = $instance['categories_exclude'];
		$show_image = isset($instance['show_image']) ? '1' : '0';
		$show_related = isset($instance['show_related']) ? '1' : '0';
		$show_author = isset($instance['show_author']) ? '1' : '0';
		$show_likes = isset($instance['show_likes']) ? '1' : '0';
		$show_comments = isset($instance['show_comments']) ? '1' : '0';
		$show_views = isset($instance['show_views']) ? '1' : '0';
		$show_date = isset($instance['show_date']) ? '1' : '0';
		$show_category = isset($instance['show_category']) ? '1' : '0';

		/* Before widget (defined by themes). */
		echo "\n<!-- START RECENT POSTS WIDGET -->\n";
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title ){
			echo $before_title.$title.$after_title;
		}
		?>
			
		<?php 
			global $post, $ct_data;

			if ( $show_related ) { //show related category
				//$related_category = get_the_category($post->ID);
				//$related_category_id = get_cat_ID( $related_category[0]->cat_name );			

				foreach((get_the_category($post->ID)) as $category) { 
					$rel_cats[] = $category->cat_ID;
				}

				$recent_posts = new WP_Query(array(
					'showposts'				=> $num_posts,
					//'cat'					=> $related_category_id, 
					'category__in'			=> $rel_cats,
					'post__not_in'			=> array( $post->ID ),
					'ignore_sticky_posts'	=> 1,
					'category__not_in'		=> $categories_exclude
				));
			}
			else {
				$recent_posts = new WP_Query(array(
					'showposts'				=> $num_posts,
					'cat'					=> $categories,
					'ignore_sticky_posts'	=> 1,
					'category__not_in'		=> $categories_exclude
				));
			}
		?>

	<?php if ($recent_posts->have_posts()) : ?>
		<ul class="recent-posts-widget recent-widget-<?php echo $time_id; ?>">
			<?php while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
				<li class="clearfix">
					<?php
					if( $show_image ):
						if(has_post_thumbnail()):
							$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'small-thumb'); 
							if ( $image[1] == 75 && $image[2] == 75 ) : //if has generated thumb ?>
								<div class="widget-post-small-thumb">
									<a href='<?php the_permalink(); ?>' title='<?php _e('Permalink to ','color-theme-framework'); the_title(); ?>'><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></a>
								</div><!-- widget-post-small-thumb -->
							<?php 
							else : // else use standard 150x150 thumb
								$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
								<div class="widget-post-small-thumb">
									<a href='<?php the_permalink(); ?>' title='<?php _e('Permalink to ','color-theme-framework'); the_title(); ?>'><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></a>
								</div><!-- widget-post-small-thumb -->
							<?php
							endif;
						endif; //has_post_thumbnail
					endif; //show_image ?>

					<div class="post-title">
						<h5><a href='<?php the_permalink(); ?>' title='<?php _e('Permalink to ','color-theme-framework'); the_title(); ?>'><?php the_title(); ?></a></h5>
					</div><!-- post-title -->

					<div class="meta">
						<?php ct_get_post_meta($post->ID, $show_likes, $show_views, $show_category, $show_author, $show_date, $show_comments); ?>
					</div><!-- .meta -->
				</li>	
			<?php endwhile; ?>
		</ul>
	<?php else : echo __('No posts were found for display','color-theme-framework');
	endif; ?>

		<?php
		/* After widget (defined by themes). */
		echo $after_widget;
		echo "\n<!-- END RECENT POSTS WIDGET -->\n";

		// Restor original Post Data
		wp_reset_postdata();
		}

	/**
	 * Update the widget settings.
	 */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num_posts'] = $new_instance['num_posts'];
		$instance['categories'] = $new_instance['categories'];
		$instance['categories_exclude'] = $new_instance['categories_exclude'];
		$instance['show_image'] = $new_instance['show_image'];
		$instance['show_related'] = $new_instance['show_related'];
		$instance['show_likes'] = $new_instance['show_likes'];
		$instance['show_author'] = $new_instance['show_author'];
		$instance['show_comments'] = $new_instance['show_comments'];
		$instance['show_views'] = $new_instance['show_views'];
		$instance['show_date'] = $new_instance['show_date'];
		$instance['show_category'] = $new_instance['show_category'];
		$instance['show_striped'] = $new_instance['show_striped'];
	
		return $instance;
	}

	/**
	 * Displays the widget settings controls on the widget panel.
	 * Make use of the get_field_id() and get_field_name() function
	 * when creating your form elements. This handles the confusing stuff.
	 */
	function form($instance)
	{
		/* Set up some default widget settings. */
		$defaults = array(
			'title'			=> __( 'Recent Posts' , 'color-theme-framework' ),
			'num_posts'		=> 4,
			'categories'	=> 'all',
			'show_related'	=> 'off',
			'show_image'	=> 'on', 
			'show_likes'	=> 'on',
			'show_comments'	=> 'on',
			'show_views'	=> 'on',
			'show_author'	=> 'off',
			'show_date'		=> 'off',
			'show_category'	=> 'off',
			'categories_exclude' => ''
		);

		$instance = wp_parse_args((array) $instance, $defaults);
		$categories_exclude = $instance['categories_exclude']; ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' , 'color-theme-framework' ) ?></label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
	
		<p>
			<label for="<?php echo $this->get_field_id('num_posts'); ?>"><?php _e( 'Number of posts:' , 'color-theme-framework' ); ?></label>
			<input type="number" min="1" max="100" class="widefat" id="<?php echo $this->get_field_id('num_posts'); ?>" name="<?php echo $this->get_field_name('num_posts'); ?>" value="<?php echo $instance['num_posts']; ?>" />
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_related'], 'on'); ?> id="<?php echo $this->get_field_id('show_related'); ?>" name="<?php echo $this->get_field_name('show_related'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_related'); ?>"><?php _e( 'Show related category posts' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_image'], 'on'); ?> id="<?php echo $this->get_field_id('show_image'); ?>" name="<?php echo $this->get_field_name('show_image'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_image'); ?>"><?php _e( 'Show thumbnail image' , 'color-theme-framework' ); ?></label>
		</p>

		<p style="margin-top: 20px;">
			<label style="font-weight: bold;"><?php _e( 'Post meta info' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_likes'], 'on'); ?> id="<?php echo $this->get_field_id('show_likes'); ?>" name="<?php echo $this->get_field_name('show_likes'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_likes'); ?>"><?php _e( 'Show likes' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_views'], 'on'); ?> id="<?php echo $this->get_field_id('show_views'); ?>" name="<?php echo $this->get_field_name('show_views'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_views'); ?>"><?php _e( 'Show views' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_category'], 'on'); ?> id="<?php echo $this->get_field_id('show_category'); ?>" name="<?php echo $this->get_field_name('show_category'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_category'); ?>"><?php _e( 'Show category' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_author'], 'on'); ?> id="<?php echo $this->get_field_id('show_author'); ?>" name="<?php echo $this->get_field_name('show_author'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_author'); ?>"><?php _e( 'Show author' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_date'], 'on'); ?> id="<?php echo $this->get_field_id('show_date'); ?>" name="<?php echo $this->get_field_name('show_date'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_date'); ?>"><?php _e( 'Show date' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['show_comments'], 'on'); ?> id="<?php echo $this->get_field_id('show_comments'); ?>" name="<?php echo $this->get_field_name('show_comments'); ?>" /> 
			<label for="<?php echo $this->get_field_id('show_comments'); ?>"><?php _e( 'Show comments' , 'color-theme-framework' ); ?></label>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>"><?php _e( 'Filter by Category:' , 'color-theme-framework' ); ?></label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ( 'all' == $instance['categories'] ) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories( 'hide_empty=0&depth=1&type=post' ); ?>
				<?php foreach( $categories as $category ) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('categories_exclude'); ?>"><?php _e( 'Categories to exclude:' , 'color-theme-framework' ); ?></label> 
			<select size="5" multiple="multiple" id="<?php echo $this->get_field_id('categories_exclude'); ?>" name="<?php echo $this->get_field_name('categories_exclude'); ?>[]" class="widefat" style="width:100%;">
				<?php $cat = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($cat as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ( is_array( $categories_exclude ) && in_array( $category->term_id, $categories_exclude ) ) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
	<?php 
	}
}

?>