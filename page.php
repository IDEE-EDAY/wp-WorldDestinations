<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */

get_header(); ?>

<?php
$page_comments = get_post_meta($post->ID,'ct_mb_page_comments', true);
$mb_sidebar_position = get_post_meta( $post->ID, 'ct_mb_sidebar_position', true);

if ( ($mb_sidebar_position == '') and is_rtl() ) : $mb_sidebar_position = 'left'; else: $mb_sidebar_position = 'right'; endif;
?>

<?php if ( is_active_sidebar('ct_page_top') ): ?>
	<!-- START PAGE TOP WIDGETS AREA -->
	<div class="container top-widgets-area">
		<div class="row-fluid">
			<div class="span12">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('ct_page_top') ) : ?>
				<?php endif; ?>
			</div> <!-- .span12 -->	
		</div> <!-- .row-fluid -->
	</div><!-- .container -->
	<!-- END PAGE TOP WIDGETS AREA -->
<?php endif; ?>	

<div class="container">
	<div class="row-fluid">
		<?php if ( $mb_sidebar_position == 'right') :?>
		<div id="primary" class="site-content span8">
		<?php else : ?>
		<div id="primary" class="site-content span8 pull-right">
		<?php endif; ?>
			<div id="content" role="main">
				<div class="entry-page">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>

						<?php if ( $page_comments == '1') : ?>
							<?php comments_template( '', true ); ?>
						<?php endif; ?>
					<?php endwhile; // end of the loop. ?>
				</div><!-- .entry-page -->
			</div><!-- #content -->
		</div><!-- .span8 #primary -->


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
			  else { if  (function_exists('dynamic_sidebar') && dynamic_sidebar('ct_page_sidebar')) : endif; }
			}
			else { if  (function_exists('dynamic_sidebar') && dynamic_sidebar('ct_page_sidebar')) : endif; }
			?>
		</div><!-- .span4 -->
	</div><!-- .row-fluid -->
</div><!-- .container -->

<?php get_footer(); ?>