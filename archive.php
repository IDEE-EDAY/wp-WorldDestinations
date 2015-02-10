<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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

$show_welcome = stripslashes( $ct_data['ct_show_welcome'] );
$blog_width = stripslashes( $ct_data['ct_blog_width'] );
$category_columns = stripslashes( $ct_data['ct_categorypage_columns'] );
$category_sidebar = stripslashes( $ct_data['ct_categorypage_sidebar'] );
$tumblelog_layout = stripslashes( $ct_data['ct_tumblelog_layout'] );
$entire_meta = stripslashes( $ct_data['ct_entire_meta'] );
$excerpt_lenght = stripslashes( $ct_data['ct_excerpt_lenght'] );
$post_color_type = stripslashes( $ct_data['ct_post_color_type'] );

$pagination_type = stripslashes( $ct_data['ct_pagination_type'] );
$footer_width = stripslashes( $ct_data['ct_header_width'] );

$sidebar_type = $ct_data['ct_sidebar_type'];
$custom_ads_perpost = $ct_data['ct_custom_ads_perpost'];

$post_count = 0; //post counter for "inbuilt" sidebar
$post_count_layout = 0;
$ads_per_post = $custom_ads_perpost; // show ads per N post ?>

<script type="text/javascript">
/* <![CDATA[ */
jQuery.noConflict()(function($){
	if ( $(window).width() < 980 ) {
		$( ".archive .inbuilt-sidebar" ).remove();
	}
});	
/* ]]> */
</script>

<?php
if( $category_columns == '3 Columns' ) {
	$post_class = 'three_columns';
	$post_count_layout = 3;
} else if( $category_columns == '4 Columns' ) {
	$post_class = 'four_columns';
	$post_count_layout = 4;
} else if( $category_columns == '5 Columns' ) {
	$post_class = 'five_columns';
	$post_count_layout = 5;
} else if( $category_columns == '1 Column + Sidebar' ) {
	$post_class = 'one_columns_sidebar';
	$post_count_layout = 2;
} else if( $category_columns == '2 Columns + Sidebar' ) {
	$post_class = 'two_columns_sidebar';
	$post_count_layout = 3;
} else if( $category_columns == '3 Columns + Sidebar' ) {
	$post_class = 'three_columns_sidebar';
	$post_count_layout = 4;
} else $post_class = 'four_columns';
?>


<?php if ( is_active_sidebar('ct_category_top') ): ?>
	<!-- START HOMEPAGE TOP WIDGETS AREA -->
	<div class="container top-widgets-area">
		<div class="row-fluid">
			<div class="span12">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('ct_category_top') ) : ?>
				<?php endif; ?>
			</div> <!-- /span12 -->	
		</div> <!-- /row-fluid -->
	</div><!-- .container -->
	<!-- END HOMEPAGE TOP WIDGETS AREA -->
<?php endif; ?>	


<?php
// Check if Load More Button
if ( $pagination_type == 'Load More' ) :

	if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
	} else {
			$paged = 1;
	}


	global $wp_query;
	$count_posts = $wp_query->found_posts;

	$num_posts = get_option( 'posts_per_page' );
	$max = ceil ($count_posts / $num_posts);

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
endif;
?>


<!-- START CONTENT -->
<?php if ( $blog_width == 'Boxed' ) : ?>
<div id="content" class="container" role="main">
<?php else : ?>
<div id="content" class="container-wide" role="main">
<?php endif; ?>

<?php if ( have_posts() ) : ?>

	<header class="archive-header padding-20 box-shadow-2px">
		<div class="row-fluid">
			<div class="span6">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'color-theme-framework' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'color-theme-framework' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'color-theme-framework' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'color-theme-framework' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'color-theme-framework' ) ) . '</span>' );
					else :
						_e( 'Archives', 'color-theme-framework' );
					endif;
				?></h1>				
			</div> <!-- .span6 -->
			<div class="span6 category-ads">
				<?php if ( is_active_sidebar( 'ct_category_ads' ) ) : ?>
					<?php dynamic_sidebar( 'ct_category_ads' ); ?>
				<?php endif; ?>
			</div> <!-- .span6 -->
		</div> <!-- .row-fluid -->
	</header><!-- .archive-header -->


	<div class="row-fluid">
		<?php if ( (($category_columns == '2 Columns + Sidebar') or ($category_columns == '3 Columns + Sidebar') or ($category_columns == '1 Column + Sidebar')) and ($sidebar_type != 'Inbuilt') ) : ?>
			<?php if ( $category_sidebar == 'Right' ) : ?>
		<div class="span8">
			<?php else : ?>
		<div class="span8 pull-right">
			<?php endif; // $home_sidebar ?>
		<?php else : ?>
		<div class="span12">
		<?php endif; // $category_columns ?>

			<?php /* Start the Loop */ ?>
			<div id="blog-entry">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					$format = get_post_format();

					// Inbuilt sidebar for Left sidebar
					if ( ($sidebar_type == 'Inbuilt') and ($category_sidebar == 'Left') and ($post_count == 0) and ( $pagination_type != 'Infinite Scroll' ) ) :
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
					if ( ($sidebar_type == 'Inbuilt') and ($post_count == $post_count_layout-1) and ($category_sidebar != 'Left') and ( $pagination_type != 'Infinite Scroll' ) ) :
						if ( is_active_sidebar( 'ct_category_sidebar' ) ) {
							echo '<div class="masonry-box inbuilt-sidebar widget-area ' . $post_class . '">';
							dynamic_sidebar( 'ct_category_sidebar' );
							echo '</div> <!-- .masonry-box -->';
						}
					endif;

					// Show Ads
					if ( $post_count % $ads_per_post == 0) {
						ct_get_masonry_ads();
					}					
					?>
				<?php endwhile; ?>
			</div> <!-- .blog-entry -->
			<div class="clear"></div>
		</div> <!-- .span12 -->

		<?php if ( (($category_columns == '2 Columns + Sidebar') or ($category_columns == '3 Columns + Sidebar') or ($category_columns == '1 Column + Sidebar')) and ($sidebar_type != 'Inbuilt') ) : ?>
			<!-- START SIDEBAR -->
			<?php if ( is_active_sidebar( 'ct_category_sidebar' ) ) : ?>
				<?php if ( $category_sidebar == 'Right' ) : ?>
				<div id="secondary" class="widget-area span4 sb4" role="complementary">
				<?php else : ?>
				<div id="secondary" class="widget-area span4 sb4 pull-left" role="complementary">
				<?php endif; // $category_sidebar ?>
					<?php dynamic_sidebar( 'ct_category_sidebar' ); ?>
				</div> <!-- .span4 -->
			<?php endif; ?>
			<!-- END SIDEBAR -->
		<?php endif; ?>
	</div> <!-- .row-fluid -->

<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>

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
								ct_pagination();
							} ?>
							<!-- End Navigation -->
						</div> <!-- /span12 -->
					</div> <!-- /row-fluid -->
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
wp_reset_postdata();
?>

<?php get_footer(); ?>