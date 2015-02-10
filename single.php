<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */

get_header(); ?>

<?php
global $single_share_meta, $single_comments_meta ,$single_date_meta, $single_date_alt_meta, $single_author_meta, $single_categories_meta, $single_likes_meta, $single_views_meta, $featured_image_post, $ct_featured_type, $post_color_type;

$single_postformat_meta = $ct_data['ct_single_postformat_meta'];
$single_comments_meta = $ct_data['ct_single_comments_meta'];
$single_share_meta = $ct_data['ct_single_share_meta'];
$single_date_meta = $ct_data['ct_single_date_meta'];
$single_date_alt_meta = $ct_data['ct_single_date_alt_meta'];
$single_author_meta = $ct_data['ct_single_author_meta'];
$single_categories_meta = $ct_data['ct_single_categories_meta'];
$single_likes_meta = $ct_data['ct_single_likes_meta'];
$single_views_meta = $ct_data['ct_single_views_meta'];
$featured_image_post = $ct_data['ct_featured_image_post'];
$ct_featured_type = $ct_data['ct_featured_type'];
$about_author = $ct_data['ct_about_author'];
//$code_about_author = $ct_data['ct_code_about_author'];
$code_blog_sharing = $ct_data['ct_code_blog_sharing'];
$mb_sidebar_position = get_post_meta( $post->ID, 'ct_mb_sidebar_position', true);
$post_color_type = $ct_data['ct_post_color_type'];

if ( $mb_sidebar_position == '' ) $mb_sidebar_position = 'right';
if ( $single_date_alt_meta ) $single_date_alt_meta = 'true'; else $single_date_alt_meta = 'false';
if ( $single_author_meta ) $single_author_meta = 'true'; else $single_author_meta = 'false';
if ( $single_categories_meta ) $single_categories_meta = 'true'; else $single_categories_meta = 'false';
if ( $single_likes_meta ) $single_likes_meta = 'true'; else $single_likes_meta = 'false';
if ( $single_views_meta ) $single_views_meta = 'true'; else $single_views_meta = 'false';
?>

<div class="container">
	
	<?php if ( is_active_sidebar('ct_single_top') ): ?>
		<!-- START TOP SINGLE WIDGETS AREA -->
		<div class="row-fluid top-widgets-area">
			<div class="span12">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Single Post Top") ) : ?>
				<?php endif; ?>
			</div> <!-- .span12 -->	
		</div> <!-- .row-fluid -->
		<!-- END TOP SINGLE WIDGETS AREA -->
	<?php endif; ?>	

	<div class="row-fluid">
		<?php if ( $mb_sidebar_position == 'right') :?>
		<div id="primary" class="span8">
		<?php else : ?>
		<div id="primary" class="span8 pull-right">
		<?php endif; ?>
			<div id="content" role="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php ct_setPostViews(get_the_ID()); ?>

					<?php $format = get_post_format();

					if ( false === $format ) {
						get_template_part( 'content', 'standard' ); 
					} else {	
						get_template_part( 'content', get_post_format() ); 
					} ?>


					<?php if ( !empty($code_blog_sharing) ) : ?>
						<!-- blog sharing -->
						<div id="blog-sharing-block" class="box-shadow-2px padding-20 clearfix">
							<?php echo do_shortcode( $code_blog_sharing ); ?>
						</div><!-- #blog-sharing-block	-->
						<!-- end blog sharing -->
					<?php endif; ?>


					<?php if ( $about_author ) : ?>
						<!-- about the author -->
						<div id="author-block" class="box-shadow-2px clearfix" itemscope="" itemtype="http://schema.org/Person">
							<h2 class="author-title"><?php _e('About the author', 'color-theme-framework'); ?></h2>
							<div id="author-avatar">
								<?php 
								$user_email = get_the_author_meta( 'user_email' );
    							$hash = md5( strtolower( trim ( $user_email ) ) );
    							echo '<img itemprop="image" style="display:none;" src="http://gravatar.com/avatar/' . $hash .'" alt="" />';
								?>
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyeleven_author_bio_avatar_size', 100 ) ); ?>
							</div><!-- #author-avatar -->

							<div id="author-description" class="padding-20">
								<meta itemprop="name" content="<?php the_author_meta( 'first_name' ); ?> <?php the_author_meta( 'last_name' ); ?>">
								<meta itemprop="url" content="<?php the_author_meta( 'user_url' ); ?>">
								<p><?php the_author_meta( 'description' ); ?></p>

								<?php ct_get_author_social(); ?>

								<a style="font-size: 11px;" href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php _e('View all articles by ', 'color-theme-framework'); the_author_meta('display_name'); ?></a>
							</div><!-- #author-description	-->
						</div><!-- #author-info -->
	  				<?php endif; ?>

					<div class="nav-block box-shadow-2px padding-20 clearfix">
						<nav class="nav-single">
							<h3 class="assistive-text"><?php _e( 'Post navigation', 'color-theme-framework' ); ?></h3>
							<?php if ( is_rtl() ) : ?>
								<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '', 'Previous post link', 'color-theme-framework' ) . ' &rarr;</span> %title' ); ?></span>
							<?php else : ?>
								<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'color-theme-framework' ) . '</span> %title' ); ?></span>
							<?php endif ?>

							<?php if ( is_rtl() ) : ?>
								<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&larr;', 'Next post link', 'color-theme-framework' ) . '</span>' ); ?></span>
							<?php else : ?>
								<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'color-theme-framework' ) . '</span>' ); ?></span>
							<?php endif ?>
						</nav><!-- .nav-single -->

						<nav class="nav-single-hidden">
							<?php if( get_previous_post() ) : ?>				
								<span class="nav-previous"><?php previous_posts_link(); ?></span>
							<?php endif; ?>
							<?php if( get_next_post() ) : ?>
		                        <!-- next_posts_link -->
								<span class="nav-next"><?php next_posts_link(); ?></span>
							<?php endif; ?>	
							<div class="clear"></div>
						</nav><!-- .nav-single-hidden -->
					</div><!-- .nav-block -->

					<div class="comments-block box-shadow-2px clearfix">
						<?php comments_template( '', true ); ?>
					</div><!-- .comments-block -->
				<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- .span8 #content -->

		<?php if ( $mb_sidebar_position == 'right') :?>
		<div id="secondary" class="widget-area span4 sb-4" role="complementary">
		<?php else : ?>
		<div id="secondary" class="widget-area span4 sb-4 pull-left" role="complementary">
		<?php endif; ?>
			<?php
			global $wp_query; 
			$postid = $wp_query->post->ID; 
			$cus = get_post_meta($postid, 'sbg_selected_sidebar_replacement', true);

			if ($cus != '') {
			  if ($cus[0] != '0') { if  (function_exists('dynamic_sidebar') && dynamic_sidebar($cus[0])) : endif; }
			  else { if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Single Post Sidebar')) : endif; }
			}
			else { if  (function_exists('dynamic_sidebar') && dynamic_sidebar('Single Post Sidebar')) : endif; }
			?>
		</div><!-- .span4 -->
	</div><!-- .row-fluid -->
</div> <!-- .container -->

<?php get_footer(); ?>