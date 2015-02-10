<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */
?>

<?php
global $ct_data;
$copyright_info = stripslashes( $ct_data['ct_copyright_info'] );
$add_info = stripslashes( $ct_data['ct_add_info'] );
$footer_width = stripslashes( $ct_data['ct_header_width'] );
?>

<div id="footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'ct_footer' ) ) : ?>
		<!-- START FOOTER WIDGETS AREA [Pravda] -->
		<div class="ct-footer-wigets">
		<div class="container">
			<div class="row">
				<?php dynamic_sidebar( 'ct_footer' ); ?>
			</div> <!-- .row -->
		</div><!-- .container -->
		</div><!-- .ct-footer-wigets -->
		<!-- END FOOTER WIDGETS AREA -->
	<?php endif; ?>

	<div class="container">
		<div class="row-fluid">
			<div class="span6">
				<div class="copyright-info">
					<?php echo $copyright_info; ?>
				</div><!-- .copyright-info -->
			</div> <!-- .span6 -->
			<div class="span6">
				<div class="add-info">
					<?php echo $add_info; ?>
				</div><!-- .add-info -->
			</div> <!-- .span6 -->
		</div> <!-- .row-fluid -->
	</div><!-- .container -->
</div><!-- #footer -->

<a href="#" class="ct-totop" title="<?php _e('To Top','color-theme-framework'); ?>"><i class="icon-chevron-up"></i></a>

<?php wp_footer(); ?>

</body>
</html>