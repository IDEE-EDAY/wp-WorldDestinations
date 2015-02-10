<?php
/**
 * The template for get first image from the post with Gallery Post Format
 *
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */
?>

<?php
	global $ct_data, $post;
	global $wpdb;
?>

<?php
$meta = get_post_meta(get_the_ID(), 'ct_mb_gallery', false);

if (!is_array($meta)) $meta = (array) $meta;
					
if (!empty($meta)) {
	$meta = implode(',', $meta);

	$images = $wpdb->get_col("
		SELECT ID FROM $wpdb->posts
		WHERE post_type = 'attachment'
		AND ID in ($meta)
		ORDER BY menu_order ASC
	");

	foreach ($images as $att) {
		$src = wp_get_attachment_image_src($att, 'single-post-thumb-crop');
		$src_full = wp_get_attachment_image_src($att, 'full');
		$src = $src[0];
		$src_full = $src_full[0];

		//echo get_post($att)->post_excerpt;
		$alt = get_post_meta($att, '_wp_attachment_image_alt', true);
		echo '<li><a href="' . $src_full . '" data-rel="prettyPhoto[gal]">';
		echo '<img src="' . $src . '" alt="' . $alt . '">';
		echo '</a></li>';
	} // end foreach
} 
?>