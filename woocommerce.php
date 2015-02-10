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
$shop_sidebar_position = $ct_data['ct_shop_sidebar_position'];
if ( empty( $shop_sidebar_position ) ) $shop_sidebar_position = 'Right';
?>

<div class="container">
	<div class="row-fluid">
		<?php if ( $shop_sidebar_position == 'Right') : ?>
			<div id="primary" class="site-content span9">
		<?php elseif ( $shop_sidebar_position == 'Left') : ?>
			<div id="primary" class="site-content span9 pull-right">
		<?php elseif ( $shop_sidebar_position == 'Left') : ?>
			<div id="primary" class="site-content span12">
		<?php endif; ?>
				<div id="content" class="ct-shop-content" role="main">
					<?php woocommerce_content(); ?>	
				</div><!-- #content -->
		</div><!-- .span9 #primary -->

		<?php if ( $shop_sidebar_position == 'Right') :?>
			<div id="secondary" class="widget-area shop-area span3 sb-4" role="complementary">
		<?php elseif ( $shop_sidebar_position == 'Left') :?>
			<div id="secondary" class="widget-area shop-area span3 sb-4 pull-left" role="complementary">
		<?php endif; ?>
			<?php
			global $wp_query; 
			$postid = $wp_query->post->ID; 
			$cus = get_post_meta($postid, 'sbg_selected_sidebar_replacement', true);

			if ($cus != '') {
			  if ($cus[0] != '0') { if  (function_exists('dynamic_sidebar') && dynamic_sidebar($cus[0])) : endif; }
			  else { if  (function_exists('dynamic_sidebar') && dynamic_sidebar('ct_woocommerce_sidebar')) : endif; }
			}
			else { if  (function_exists('dynamic_sidebar') && dynamic_sidebar('ct_woocommerce_sidebar')) : endif; }
			?>

		<?php if ( $shop_sidebar_position != 'None' ) : ?>
			</div><!-- .span3 -->
		<?php endif; ?>
	</div><!-- .row-fluid -->
</div><!-- .container -->

<?php get_footer(); ?>