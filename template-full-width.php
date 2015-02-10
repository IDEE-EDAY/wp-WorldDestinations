<?php
/**
 * Template Name: Full Width Page
 *
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */

get_header(); ?>

<?php
$page_comments = get_post_meta($post->ID,'ct_mb_page_comments', true);
?>

<div class="container">
	<div class="row-fluid">
		<div id="primary" class="site-content span12">
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
		</div><!-- .span12 #primary -->
	</div><!-- .row-fluid -->
</div><!-- .container -->

<?php get_footer(); ?>