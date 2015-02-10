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
global $ct_data, $post, $post_class;
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

	$src = wp_get_attachment_image_src($images[0], 'blog-thumb');
	?>

	<div class="entry-thumb">
		<?php
		if ( $post_class == 'one_columns_sidebar' ) :
			$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumb');
		else :
			$thumb_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'blog-thumb');
		endif; ?>
		<a href="<?php echo the_permalink(); ?>"><img src="<?php echo $src[0]; ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" /></a>
	</div> <!-- .entry-thumb -->
<?php } ?>