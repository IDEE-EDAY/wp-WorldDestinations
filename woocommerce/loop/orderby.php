<?php
/**
 * Show options for ordering
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $woocommerce, $wp_query;

if ( 1 == $wp_query->found_posts || ! woocommerce_products_will_display() )
	return;
?>
	<?php
    	if(!isset($_GET['orderby'])) $_GET['orderby'] = 'menu_order-asc';
	
	$f = explode('-',$_GET['orderby']);
	if(count($f)>1){
		$sort=  $f[1];
	}else{
		$sort = 'desc';
	}
	if(isset($_GET['woocommerce-sort-by-columns'])){
		$perpage = '&woocommerce-sort-by-columns='.$_GET['woocommerce-sort-by-columns'];
	}else{
		$_GET['woocommerce-sort-by-columns'] = 6;
		$perpage = '';
	}	
	?>
<form class="ct-shop-sort clearfix woocommerce-ordering" method="get">
    <ul class="order-combobox no-left-padding">
    	<li><strong><?php echo $_GET['woocommerce-sort-by-columns'];?> <?php _e( 'Products' , 'woocommerce' ); ?></strong> <?php _e( 'Per Page', 'woocommerce' )?>
        	<ul class="no-left-padding">
        		<li><a href="?orderby=<?php echo $f[0].'-'.$sort; ?>&woocommerce-sort-by-columns=6"><?php _e( '6 Products' , 'woocommerce' ); ?></a></li>
            	<li><a href="?orderby=<?php echo $f[0].'-'.$sort; ?>&woocommerce-sort-by-columns=9"><?php _e( '9 Products' , 'woocommerce' ); ?></a></li>
            	<li><a href="?orderby=<?php echo $f[0].'-'.$sort; ?>&woocommerce-sort-by-columns=15"><?php _e( '15 Products' , 'woocommerce' ); ?></a></li>
                <li><a href="?orderby=<?php echo $f[0].'-'.$sort; ?>&woocommerce-sort-by-columns=30"><?php _e( '30 Products' , 'woocommerce' ); ?></a></li>
                <li><a href="?orderby=<?php echo $f[0].'-'.$sort; ?>&woocommerce-sort-by-columns=45"><?php _e( '45 Products' , 'woocommerce' ); ?></a></li>
    		</ul>
        </li>
    </ul>

	<?php 
	
	if($sort == 'desc'){	
		echo '<a title="'.__( 'Order products ascending', 'woocommerce' ).'" class="desc-asc-sort asc" href="?orderby='. ($f[0]) . '-asc'.$perpage.'"></a>';
	}else{
		echo '<a title="'.__( 'Order products descending', 'woocommerce' ).'"class="desc-asc-sort desc" href="?orderby='. ($f[0]) . '-desc'.$perpage.'"></a>';
	}
	
	 ?> 
	<ul class="order-combobox no-left-padding">
    <?php
    	$title_arr = array(
			'menu_order' => 'Name',
			'popularity' => 'Popularity',
			'rating' => 'Average Rating',
			'date' => 'Date',
			'price' => 'Price',
		);
	?>
    <li style="font-size:11px;">Sort By <strong><?php if( isset ($f[0])) {echo $title_arr[$f[0]];}?></strong>
		<ul class="no-left-padding">
		<?php
			$catalog_orderby = apply_filters( 'woocommerce_catalog_orderby', array(
				'menu_order' => __( 'Name', 'woocommerce' ),
				'date'       => __( 'Date', 'woocommerce' ),
				'price'      => __( 'Price', 'woocommerce' ),
				'popularity' => __( 'Popularity', 'woocommerce' ),
				'rating'     => __( 'Average rating', 'woocommerce' ),
			) );

			if ( get_option( 'woocommerce_enable_review_rating' ) == 'no' )
				unset( $catalog_orderby['rating'] );
						foreach ( $catalog_orderby as $id => $name )
				echo '<li class="li_' . esc_attr( $id ) . '" ' . selected( $orderby, $id, false ) . '><a href="?orderby=' . esc_attr( $id ) . '-asc'.$perpage.'">' . esc_attr( $name ) . '</a></li>';
		?>
        </ul>
        </li>
	</ul>
</form>

<?php
	// Keep query string vars intact
	foreach ( $_GET as $key => $val ) {
		if ( 'orderby' == $key )
			continue;
		
		if (is_array($val)) {
			foreach($val as $innerVal) {
				echo '<input type="hidden" name="' . esc_attr( $key ) . '[]" value="' . esc_attr( $innerVal ) . '" />';
			}
		
		} else {
			echo '<input type="hidden" name="' . esc_attr( $key ) . '" value="' . esc_attr( $val ) . '" />';
		}
	}
?>
    

