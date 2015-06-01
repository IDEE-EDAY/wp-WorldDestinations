<!DOCTYPE html>


<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
<?php global $ct_data ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 

<!-- Disable Open Graph function on Pravada prevent crash with plugin with this function
<?php if ( is_single() ) : ?>
	<?php //$post_image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large'); ?>
	<?php //$post_description = ct_get_excerpt_by_id( $post->ID ); ?>
	<meta property="og:url" content="<?php //echo post_permalink( $post->ID ); ?>" />
	<meta property="og:title" content="<?php //echo get_the_title( $post->ID ); ?>" />
	<meta property="og:image" content="<?php //echo $post_image_url[0]; ?>" />
	<meta property="og:description" content="<?php //echo $post_description; ?>" />
<?php endif; ?>
-->

<?php wp_head(); ?>	

</head>

<body <?php body_class('body-class'); ?>>

<?php
// Load custom background image from Theme Options
	global $wp_query;
		if( is_home() ) {
			$postid = get_option('page_for_posts');
		} elseif( is_search() || is_404() || is_archive() || is_tag() || is_author() ) {
			$postid = 0;
		} else {
			$postid = $wp_query->post->ID;
		}

		// Get the unique background image for page
		$bg_img = get_post_meta($postid, 'ct_mb_background_image', true);
		$src = wp_get_attachment_image_src( $bg_img, 'full' );
		$bg_img = $src[0];

		if ( is_archive() ) {
			$bg_img = '';
		}

		if( empty($bg_img) ) { 
			// Background image not defined, fallback to default background
			$bg_pos = stripslashes ( $ct_data['ct_default_bg_position'] );
			$bg_type = stripslashes ( $ct_data['ct_default_bg_type'] );

			if ( $bg_pos == 'Full Screen' ) {
				$bg_pos = 'full';
			}

			// Get the fullscreen background image for page
			if ( ( $bg_pos == 'full' ) && ( $bg_type != 'Color' ) ) {
				$bg_img = stripslashes ( $ct_data['ct_default_bg_image'] );
				if( !empty($bg_img) ) {
					$ct_page_title = $wp_query->post->post_title;

					echo '<img id="bg-stretch" src="' . $bg_img . '" alt="' . $ct_page_title . '" />';
				}
			}
		} else {
			// else get the unique background image for page
			$bg_pos = get_post_meta($postid, 'ct_mb_background_position', true);

			if( $bg_pos == 'full' ) {
				$ct_page_title = $wp_query->post->post_title;

				echo '<img id="bg-stretch" src="' . $bg_img . '" alt="' . $ct_page_title . '" />';
			}
		}
	?>

<?php 
$logo_type = stripslashes( $ct_data['ct_type_logo'] );
$logo_width = stripslashes( $ct_data['ct_logo_width'] );
$header_width = stripslashes( $ct_data['ct_header_width'] );
?>


	<!-- START HEADER -->
	<header id="header">
		<div class="container header-block">
			<div class="row-fluid top-block">
				<?php 
				if ( $logo_width == 'standard' ) : ?>
				<div class="span5 logo-block">
				<?php else : ?>
				<div class="span12 logo-block">
				<?php endif; ?>
					<div id="logo">
						<?php if ( $logo_type == "image" ) { ?>
						   <a href="<?php echo home_url(); ?>"><img src="<?php echo stripslashes( $ct_data['ct_logo_upload'] ) ?>" alt="" /></a><br><br><span class="logo-slogan"><?php echo stripslashes( $ct_data['ct_logo_slogan'] ); ?></span>
						   					<?php }	?>

						<?php if ( $logo_type == "text" ) { ?>
							<h1 class="H1"><a href="<?php echo home_url(); ?>"><?php echo stripslashes( $ct_data['ct_logo_text'] ); ?></a></h1> <br><br>
							<span class="logo-slogan"><?php echo stripslashes( $ct_data['ct_logo_slogan'] ); ?></span>
						<?php } ?>
					</div> <!-- #logo -->
				</div><!-- .span5 -->

				<?php if ( $logo_width == 'standard' ) : ?>
				<div class="span7 banner-block">
					<div class="banner" role="banner">
						<?php
						$banner_upload = stripslashes( $ct_data['ct_banner_upload'] );
						$banner_code = stripslashes( $ct_data['ct_banner_code'] );
						$show_top_banner = stripslashes( $ct_data['ct_top_banner'] );
			
						if ( $banner_upload != '' && $show_top_banner == 'Upload' ) {
						?>
							<a href="<?php echo stripslashes( $ct_data['ct_banner_link'] ); ?>" target="_blank"><img src="<?php echo stripslashes( $ct_data['ct_banner_upload'] ) ?>" alt="" /></a>
						<?php } else if ( $banner_code != '' && $show_top_banner == 'Code' ) { echo do_shortcode( $banner_code ); } ?>
					</div><!-- .banner -->
				</div><!-- .span7 -->
				<?php endif; ?>
			</div><!-- .row-fluid -->
		<?php if ( $header_width == 'Wide' ) : //wide header ?>
		</div><!-- .container -->
		<?php endif; ?>

		<!-- START MAIN MENU -->
		<div id="mainmenu-block-bg">
			<div class="container">
				<div class="row-fluid">
					<div class="span12">
						<div class="navigation" role="navigation">
							<div id="menu">
								<?php 
								if ( has_nav_menu('main_menu') ) wp_nav_menu( array('theme_location' => 'main_menu', 'menu_class' => 'sf-menu'));
								?>
							</div> <!-- .menu -->
						</div>  <!-- .navigation -->
					</div> <!-- .span12 -->
				</div><!-- .row-fluid -->
			</div><!-- .container -->
		</div> <!-- mainmenu-block-bg -->
		<!-- END MAIN MENU -->
		
		<?php if ( $header_width == 'Boxed' ) : //boxed header ?>
		</div><!-- .container -->
		<?php endif; ?>		
	</header> <!-- #header -->
	<!-- END HEADER -->