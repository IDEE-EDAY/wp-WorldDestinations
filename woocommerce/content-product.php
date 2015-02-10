<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product, $woocommerce_loop, $ct_data, $post;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) )
	$woocommerce_loop['loop'] = 0;

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) )
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );

if ( isset($ct_data['ct_shop_columns']) ) $shop_posts_per_row = $ct_data['ct_shop_columns'];
$woocommerce_loop['columns'] = $shop_posts_per_row;

// Ensure visibility
if ( ! $product || ! $product->is_visible() )
	return;

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 == ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 == $woocommerce_loop['columns'] )
	$classes[] = 'first product-box';
if ( 0 == $woocommerce_loop['loop'] % $woocommerce_loop['columns'] )
	$classes[] = 'last product-box';
?>

<li <?php post_class ($classes); ?> >
	<div class="product-block">
		<header class="entry-header shop-header clearfix">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'View product %s', 'color-theme-framework' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_title(); ?></a>
			</h1>

			<?php if ($product->is_on_sale()) : ?>
				<?php $onsale_bg = $ct_data['ct_shop_onsale_color']; ?>	
				<span class="on-sale" style="background: <?php echo $onsale_bg; ?>">
					<?php echo apply_filters('woocommerce_sale_flash', '<span class="onsale">'.__( 'Sale!', 'color-theme-framework' ).'</span>', $post, $product); ?>
				</span> <!-- /on-sale -->
			<?php endif; ?>
		</header> <!-- /entry-header -->	

		<?php
			/**
			 * woocommerce_after_shop_loop_item_title hook
			 *
			 * @hooked woocommerce_template_loop_price - 10
			 */
			do_action( 'woocommerce_after_shop_loop_item_title' );
		?>

		<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

		<div class="entry-thumb">
			<?php
				echo '<div class="product-added">';
				echo '<i class="icon-check"></i>';
				echo '</div>';
			?>

			<a href="<?php the_permalink(); ?>"  class="product-images">
				<?php
					/**
				 	* woocommerce_before_shop_loop_item_title hook
				 	*
				 	* @hooked woocommerce_show_product_loop_sale_flash - 10
				 	* @hooked woocommerce_template_loop_product_thumbnail - 10
				 	*/
					do_action( 'woocommerce_before_shop_loop_item_title' );
				?>
			</a>

			<?php $outofstock_bg = $ct_data['ct_shop_outofstock_color']; ?>
			
			<?php if ( !$product->is_in_stock() ) : ?>
				<span class="ct-out-of-stock" style="background: <?php echo $outofstock_bg; ?>">
			 		<?php _e( 'Out of Stock' , 'color-theme-framework' ); ?>
				</span> <!-- /put-of-stock -->
			<?php endif; ?>
		</div> <!-- /entry-thumb -->

		<?php ct_get_shop_product_excerpt(); ?>

		<footer class="entry-meta clearfix">
			<div class="shopping-cart-block">
				<i class="icon icon-shopping-cart"></i>
				<div class="clear"></div>
				<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
			</div>	
			
			<div class="right-side">
				<span class="meta-review">
					<?php if ( get_option('woocommerce_enable_review_rating') == 'yes' ) : ?>
						<?php
							$count = $product->get_rating_count();

							if ( $count > 0 ) {
								echo '<div class="product-rating">';
								$average = $product->get_average_rating();

								echo '<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">';
								echo '<div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average ).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"></span></div>';
								echo '</div>';
								echo '</div> <!-- /product-rating -->';
							} ?>
					<?php endif; ?>
				</span> <!-- /meta-review -->

				<div class="clear"></div>

				<span class="ct-meta-category" title="<?php _e('Category','color-theme-framework'); ?>">
					<i class="icon-tag"></i>
					<?php echo $product->get_categories( ', ', '<span class="posted_in" title="View all products from this category">' . _n( '', '', sizeof( get_the_terms( $post->ID, 'product_cat' ) ), 'color-theme-framework' ) . ' ', '</span>' ); ?>
				</span><!-- .meta-category -->
			</div> <!-- /right-side -->	
		</footer>
	</div><!-- .product-block -->
</li><!-- .product-box -->