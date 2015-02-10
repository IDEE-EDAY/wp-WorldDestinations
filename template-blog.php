<?php
/**
 * Template Name: Blog
 *
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */

get_header(); ?>

<?php 
global $ct_data, $comments_meta, $share_meta, $date_meta, $author_meta, $date_alt_meta, $categories_meta, $likes_meta, $views_meta, $postformat_meta, $post_class, $tumblelog_layout, $entire_meta, $excerpt_lenght, $post_color_type;

$postformat_meta = $ct_data['ct_postformat_meta'];
$comments_meta = $ct_data['ct_comments_meta'];
$share_meta = $ct_data['ct_share_meta'];
$date_meta = $ct_data['ct_date_meta'];
$date_alt_meta = $ct_data['ct_date_alt_meta'];
$author_meta = $ct_data['ct_author_meta'];
$categories_meta = $ct_data['ct_categories_meta'];
$likes_meta = $ct_data['ct_likes_meta'];
$views_meta = $ct_data['ct_views_meta'];

$pagination_type = stripslashes( $ct_data['ct_pagination_type'] );
$footer_width = stripslashes( $ct_data['ct_header_width'] );

$show_welcome = stripslashes( $ct_data['ct_show_welcome'] );
$blog_width = stripslashes( $ct_data['ct_blog_width'] );
$home_columns = stripslashes( $ct_data['ct_homepage_columns'] );
$home_sidebar = stripslashes( $ct_data['ct_homepage_sidebar'] );
$tumblelog_layout = stripslashes( $ct_data['ct_tumblelog_layout'] );
$entire_meta = stripslashes( $ct_data['ct_entire_meta'] );
$excerpt_lenght = stripslashes( $ct_data['ct_excerpt_lenght'] );
$post_color_type = stripslashes( $ct_data['ct_post_color_type'] );

$sidebar_type = $ct_data['ct_sidebar_type'];
$custom_ads_perpost = $ct_data['ct_custom_ads_perpost'];

$post_count = 0; //post counter for "inbuilt" sidebar
$post_count_layout = 0;
$ads_per_post = $custom_ads_perpost; // show ads per N post ?>

<script type="text/javascript">
/* <![CDATA[ */
jQuery.noConflict()(function($){
	if ( $(window).width() < 980 ) {
		$( ".home .inbuilt-sidebar" ).remove();
	}
});	
/* ]]> */
</script>

<?php


if( $home_columns == '3 Columns' ) {
	$post_class = 'three_columns';
	$post_count_layout = 3;
} else if( $home_columns == '4 Columns' ) {
	$post_class = 'four_columns';
	$post_count_layout = 4;
} else if( $home_columns == '5 Columns' ) {
	$post_class = 'five_columns';
	$post_count_layout = 5;
} else if( $home_columns == '1 Column + Sidebar' ) {
	$post_class = 'one_columns_sidebar';
	$post_count_layout = 2;
} else if( $home_columns == '2 Columns + Sidebar' ) {
	$post_class = 'two_columns_sidebar';
	$post_count_layout = 3;
} else if( $home_columns == '3 Columns + Sidebar' ) {
	$post_class = 'three_columns_sidebar';
	$post_count_layout = 4;
} else $post_class = 'four_columns';
?>


<!-- START CONTENT -->
<?php 
if ( $show_welcome ) :
?>
<div class="welcome-block">
	<?php $welcome_text = stripslashes( $ct_data['ct_welcome_text'] );	?>

	<div class="container">
		<div class="row-fluid">
			<div class="span12">
				<div class="welcome-text">
					<?php if( !empty( $welcome_text ) ) echo do_shortcode( $welcome_text ); ?>
				</div><!-- .welcome-text -->
			</div> <!-- /span12 -->
		</div> <!-- /row-fluid -->
	</div><!-- .container -->
	<div class="welcome-strip">
	</div><!-- .welcome-strip -->
</div><!-- .welcome-block -->
<?php endif; ?>

<?php if ( is_active_sidebar('ct_home_top') ): ?>
	<!-- START HOMEPAGE TOP WIDGETS AREA -->
	<div class="container top-widgets-area">
		<div class="row-fluid">
			<div class="span12">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('ct_home_top') ) : ?>
				<?php endif; ?>
			</div> <!-- /span12 -->	
		</div> <!-- /row-fluid -->
	</div><!-- .container -->
	<!-- END HOMEPAGE TOP WIDGETS AREA -->
<?php endif; ?>	


<?php if ( $blog_width == 'Boxed' ) : ?>
<div id="content" class="container" role="main">
<?php else : ?>
<div id="content" class="container-wide" role="main">
<?php endif; ?>
	<div class="row-fluid">
		<?php if ( (($home_columns == '2 Columns + Sidebar') or ($home_columns == '3 Columns + Sidebar') or ($home_columns == '1 Column + Sidebar')) and ($sidebar_type != 'Inbuilt') ) : ?>
			<?php if ( $home_sidebar == 'Right' ) : ?>
		<div class="span8">
			<?php else : ?>
		<div class="span8 pull-right">
			<?php endif; // $home_sidebar ?>
		<?php else : ?>
		<div class="span12">
		<?php endif; // $home_columns ?>
			<?php
			global $query_string;

			$homepage_category = stripslashes( $ct_data['ct_homepage_category'] );
			$pagination_type = $ct_data['ct_pagination_type'];

			if ( $homepage_category != 'all categories' ) :
			
				$category_id = get_cat_ID($homepage_category);

				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

				$blog_posts = new WP_Query(array(	'cat'		=> $category_id,
											  		'paged'		=> $paged
												));

				$num_posts = get_option( 'posts_per_page' );
				$found_posts = $blog_posts->found_posts;
				$ct_pages = ceil($found_posts/$num_posts);
			else :

				if ( get_query_var('paged') ) {
      				$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) {
	  				$paged = get_query_var('page');
				} else {
	  				$paged = 1;
				}

				$blog_posts = new WP_Query(array(	'post_type'			=> 'post',
													'paged'				=> $paged
												));
			endif;

			
			// Check if Load More Button
			if ( $pagination_type == 'Load More' ) :

				if ( get_query_var('paged') ) {
      				$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) {
	  				$paged = get_query_var('page');
				} else {
	  				$paged = 1;
				}

				$max = 0;
				$num_posts = get_option( 'posts_per_page' );
				$count_posts = wp_count_posts();
				$ct_post_count = $count_posts->publish;
				$max = ceil ($ct_post_count / $num_posts);

				if ( $homepage_category != 'all categories' ) {
					$max = ceil ($found_posts / $num_posts);
				}

				$custom_ads_code = $ct_data['ct_custom_ads_code'];
				$custom_ads_enable = $ct_data['ct_custom_ads_enable'];

				if ( !$custom_ads_enable ) {
					$ga_code = 0;
				} else {
					$ga_code = $custom_ads_code;
				}

 				wp_enqueue_script(
		 			'pbd-alp-load-posts',
 					get_template_directory_uri() . '/js/load-posts.js',
 					array('jquery'),
 					'1.0',
 					true
 				);

 				// Add some parameters for the JS.
 				wp_localize_script(
		 			'pbd-alp-load-posts',
 					'pbd_alp',
 					array(
		 				'startPage'		=> $paged,
 						'maxPages'		=> $max,
 						'ga_code'		=> $ga_code,
 						'nextLink'		=> next_posts($max, false)
 					)
 				);

 				/* Localization JS */
    			$ct_blog_array = array(	'show_more'			=> __('Show More Posts', 'color-theme-framework'),
										'loading_posts' 	=> __('Loading Posts...', 'color-theme-framework'),
										'no_posts' 			=> __('No More Posts to Show', 'color-theme-framework')
								);
				wp_localize_script( 'pbd-alp-load-posts', 'ct_blog_localization', $ct_blog_array );
			endif; ?>


			<?php /* Start the Loop */ ?>
			<div id="blog-entry">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php
					$format = get_post_format();

					// Inbuilt sidebar for Left sidebar
					if ( ($sidebar_type == 'Inbuilt') and ($home_sidebar == 'Left') and ($post_count == 0) and ( $pagination_type != 'Infinite Scroll' ) ) :
						if ( is_active_sidebar( 'ct_category_sidebar' ) ) {
							echo '<div class="masonry-box inbuilt-sidebar widget-area ' . $post_class . '">';
							dynamic_sidebar( 'ct_category_sidebar' );
							echo '</div> <!-- .masonry-box -->';
						}
					endif;

					if ( false === $format ) {
						get_template_part( 'content', 'standard' ); 
					} else {	
						get_template_part( 'content', get_post_format() ); 
					}

					// Show 'inbuilt' sidebar
					$post_count++; //increse post counter for "inbuilt" sidebar
					if ( ($sidebar_type == 'Inbuilt') and ($post_count == $post_count_layout-1) and ($home_sidebar != 'Left') and ( $pagination_type != 'Infinite Scroll' ) ) :
						if ( is_active_sidebar( 'ct_home_sidebar' ) ) {
							echo '<div class="masonry-box inbuilt-sidebar widget-area ' . $post_class . '">';
							dynamic_sidebar( 'ct_home_sidebar' );
							echo '</div> <!-- .masonry-box -->';
						}
					endif;

					// Show Ads
					if ( $post_count % $ads_per_post == 0) {
						ct_get_masonry_ads();
					} ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div> <!-- .blog-entry -->
			<div class="clear"></div>
		</div> <!-- .span12 -->

		<?php if ( (($home_columns == '2 Columns + Sidebar') or ($home_columns == '3 Columns + Sidebar') or ($home_columns == '1 Column + Sidebar')) and ($sidebar_type != 'Inbuilt') ) : ?>
			<!-- START SIDEBAR -->
			<?php if ( is_active_sidebar( 'ct_home_sidebar' ) ) : ?>
				<?php if ( $home_sidebar == 'Right' ) : ?>
				<div id="secondary" class="widget-area span4 sb4" role="complementary">
				<?php else : ?>
				<div id="secondary" class="widget-area span4 sb4 pull-left" role="complementary">
				<?php endif; // $home_sidebar ?>
					<?php dynamic_sidebar( 'ct_home_sidebar' ); ?>
				</div> <!-- .span4 -->
			<?php endif; ?>
			<!-- END SIDEBAR -->
		<?php endif; ?>
	</div> <!-- .row-fluid -->
</div> <!-- .content -->


<?php 
if ( $pagination_type != 'Infinite Scroll') {
	if ( $footer_width == 'Wide' ) : //wide footer ?>
		<div class="container-pagination clearfix">
			<div class="container">
			<?php else : ?>
				<div class="container">
				<div class="container-pagination clearfix">
			<?php endif; ?>
					<div class="row-fluid">
						<div class="span12">					
							<!-- Begin Navigation -->
							<?php if (function_exists("ct_pagination")) {
								//ct_pagination();
								if ( $homepage_category == 'all categories' ) :
									ct_pagination();
								else :
									ct_pagination($ct_pages,4);
								endif;
							} ?>
							<!-- End Navigation -->
						</div> <!-- .span12 -->
					</div> <!-- .row-fluid -->
				</div> <!-- .container -->
				</div> <!-- .container-pagination -->
<?php } else { // if infinite scroll ?>
	<!-- Begin Navigation -->
	<?php if (function_exists("ct_pagination")) {
		ct_pagination();
	} ?>
	<!-- End Navigation -->	
<?php } ?>

<?php
// Restor original Query & Post Data
wp_reset_query();
wp_reset_postdata();
?>

<?php get_footer(); ?>