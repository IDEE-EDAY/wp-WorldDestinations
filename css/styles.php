<?php
	/* Menu */
	if ( isset( $ct_data['ct_menu_position'] ) ) $menu_position = strtolower ( $ct_data['ct_menu_position'] );
	if ( isset( $ct_data['ct_menu_background'] ) ) $menu_background = stripslashes ( $ct_data['ct_menu_background'] );
	if ( isset( $ct_data['ct_menu_border'] ) ) $menu_border = $ct_data['ct_menu_border'];
	if ( isset( $ct_data['ct_menu_transform'] ) ) $menu_transform = strtolower( $ct_data['ct_menu_transform'] );
	if ( isset( $ct_data['ct_menu_font'] ) ) $menu_font = $ct_data['ct_menu_font'];
	if ( isset( $ct_data['ct_dd_menu_background'] ) ) $dd_menu_background = $ct_data['ct_dd_menu_background'];
	if ( isset( $ct_data['ct_dd_menu_opacity'] ) ) $dd_menu_opacity = $ct_data['ct_dd_menu_opacity'];
	if ( isset( $ct_data['ct_dd_menu_hover_background'] ) ) $dd_menu_hover_background = $ct_data['ct_dd_menu_hover_background'];
	if ( isset( $ct_data['ct_dd_menu_width'] ) ) $dd_menu_width = $ct_data['ct_dd_menu_width'];

	/* Widgets */
	if ( isset( $ct_data['ct_widget_title_background'] ) ) $widget_title_background = stripslashes ( $ct_data['ct_widget_title_background'] );
	if ( isset( $ct_data['ct_widget_title_border'] ) ) $widget_title_border = $ct_data['ct_widget_title_border'];
	if ( isset( $ct_data['ct_widget_title_font'] ) ) $widget_title_font = $ct_data['ct_widget_title_font'];

	/* WooCommerce */
	if ( isset( $ct_data['ct_shop_reviewstar_color'] ) ) $shop_reviewstar_color = $ct_data['ct_shop_reviewstar_color'];
	if ( isset( $ct_data['ct_shop_posts_per_row'] ) ) $ct_shop_posts_per_row = $ct_data['ct_shop_posts_per_row'];
	if ( isset( $ct_data['ct_shop_columns'] ) ) $ct_shop_columns = $ct_data['ct_shop_columns'];
	if ( isset( $ct_data['ct_shop_onsale_color'] ) ) $ct_shop_onsale_color = $ct_data['ct_shop_onsale_color'];

	/* Show Featured Image */
	if ( isset( $ct_data['ct_featured_image_post'] ) ) $featured_image_post = $ct_data['ct_featured_image_post'];

	/* Responsive Layout */
	if ( isset( $ct_data['ct_responsive_layout'] ) ) $responsive_layout = $ct_data['ct_responsive_layout'];

	/* Tubmlelog Layout */
	if ( isset( $ct_data['ct_tumblelog_layout'] ) ) $tumblelog_layout = $ct_data['ct_tumblelog_layout'];

	/* Stretch thumbnail post images */
	if ( isset( $ct_data['ct_thumb_posts_stretch'] ) ) $thumb_posts_stretch = $ct_data['ct_thumb_posts_stretch'];

	if ( isset( $ct_data['ct_single_colored_bg'] ) ) $single_colored_bg = $ct_data['ct_single_colored_bg'];

	/* Links Color */
	if ( isset( $ct_data['ct_links_color'] ) ) $links_color = stripslashes ( $ct_data['ct_links_color'] );

	/* Blog type/width */
	if ( isset( $ct_data['ct_blog_width'] ) ) $blog_width = stripslashes ( $ct_data['ct_blog_width'] );

	/* Blog meta */
	if ( isset( $ct_data['ct_meta_background'] ) ) $meta_background = stripslashes ( $ct_data['ct_meta_background'] );
	if ( isset( $ct_data['ct_meta_color'] ) ) $meta_color = stripslashes ( $ct_data['ct_meta_color'] );
	if ( isset( $ct_data['ct_pagination_background'] ) ) $pagination_background = stripslashes ( $ct_data['ct_pagination_background'] );
	if ( isset( $ct_data['ct_pagination_border'] ) ) $pagination_border = $ct_data['ct_pagination_border'];	

	/* Body background Color */
	if ( isset( $ct_data['ct_body_background'] ) ) $body_background = stripslashes ( $ct_data['ct_body_background'] );

	/* Welcome Block */
	if ( isset( $ct_data['ct_welcome_background'] ) ) $welcome_background = stripslashes ( $ct_data['ct_welcome_background'] );
	if ( isset( $ct_data['ct_welcome_strip_background'] ) ) $welcome_strip_background = stripslashes ( $ct_data['ct_welcome_strip_background'] );
	if ( isset( $ct_data['ct_welcome_color'] ) ) $welcome_color = stripslashes ( $ct_data['ct_welcome_color'] );
	if ( isset( $ct_data['ct_welcome_links_color'] ) ) $welcome_links_color = stripslashes ( $ct_data['ct_welcome_links_color'] );
	if ( isset( $ct_data['ct_welcome_padding'] ) ) $welcome_padding = stripslashes ( $ct_data['ct_welcome_padding'] );

	/* Header bg */
	if ( isset( $ct_data['ct_header_width'] ) ) $header_width = stripslashes ( $ct_data['ct_header_width'] );
	if ( isset( $ct_data['ct_header_background'] ) ) $header_background = stripslashes ( $ct_data['ct_header_background'] );
	if ( isset( $ct_data['ct_header_bg_type'] ) ) $header_bg_type = stripslashes ( $ct_data['ct_header_bg_type'] );
	if ( isset( $ct_data['ct_header_bg_repeat'] ) ) $header_bg_repeat = strtolower( $ct_data['ct_header_bg_repeat'] );
	if ( isset( $ct_data['ct_header_bg_image'] ) ) $header_bg_image = stripslashes ( $ct_data['ct_header_bg_image'] );
	if ( isset( $ct_data['ct_header_predefined_bg'] ) ) $header_predefined_bg = stripslashes ( $ct_data['ct_header_predefined_bg'] );
	if ( isset( $ct_data['ct_header_top_padding'] ) ) $header_top_padding = stripslashes ( $ct_data['ct_header_top_padding'] );
	if ( isset( $ct_data['ct_header_bottom_padding'] ) ) $header_bottom_padding = stripslashes ( $ct_data['ct_header_bottom_padding'] );

	/* Footer bg */
	if ( isset( $ct_data['ct_footer_background'] ) ) $footer_background = stripslashes ( $ct_data['ct_footer_background'] );
	if ( isset( $ct_data['ct_footer_font'] ) ) $footer_font = $ct_data['ct_footer_font'];

	/* Post format */
	if ( isset( $ct_data['ct_postformat_meta'] ) ) $postformat_meta = stripslashes ( $ct_data['ct_postformat_meta'] );

	/* Headings Options: Size, Style, Color */
	if ( isset( $ct_data['ct_h_one'] ) ) $h_one = $ct_data['ct_h_one'];
	if ( isset( $ct_data['ct_h_two'] ) ) $h_two = $ct_data['ct_h_two'];
	if ( isset( $ct_data['ct_h_three'] ) ) $h_three = $ct_data['ct_h_three'];
	if ( isset( $ct_data['ct_h_four'] ) ) $h_four = $ct_data['ct_h_four'];
	if ( isset( $ct_data['ct_h_five'] ) ) $h_five = $ct_data['ct_h_five'];
	if ( isset( $ct_data['ct_h_six'] ) ) $h_six = $ct_data['ct_h_six'];
	if ( isset( $ct_data['ct_post_title_font'] ) ) $post_title_font = $ct_data['ct_post_title_font'];
	if ( isset( $ct_data['ct_post_title_transform'] ) ) $post_title_transform = strtolower( $ct_data['ct_post_title_transform'] );

	/* Homepage Columns */
	if ( isset( $ct_data['ct_homepage_columns'] ) ) $homepage_columns = stripslashes( $ct_data['ct_homepage_columns'] );
	if ( isset( $ct_data['ct_sidebar_type'] ) ) $sidebar_type = stripslashes( $ct_data['ct_sidebar_type'] );
	/* Category page Columns */
	if ( isset( $ct_data['ct_categorypage_columns'] ) ) $categorypage_columns = stripslashes( $ct_data['ct_categorypage_columns'] );

	if ( isset( $ct_data['ct_pagination_type'] ) ) $pagination_type = stripslashes( $ct_data['ct_pagination_type'] );
		
?>

/* Header Bg */
<?php if ( $header_width == 'Boxed' ) : ?>
	#header, #footer { background: none; }
	#footer { border-top: 0;}
	#footer .container { border-top: 4px solid #a3a6a8; background: <?php echo $footer_background; ?>  }
	.copyright-info { padding-left: 20px }
	.add-info { padding-right: 20px }
	#logo { margin-left: 20px; }
	.banner { margin-right: 20px; }
	
	<?php if ( $header_bg_type == 'Color' ) : ?>
		.header-block { background: <?php echo $header_background; ?>; }
	<?php elseif ( $header_bg_type == 'Predefined' ) : ?>
		.header-block {
			background: url(<?php echo $header_predefined_bg; ?>) left top <?php echo $header_bg_repeat?>;
			background-color: <?php echo $header_background; ?>;
		}
	<?php elseif ( $header_bg_type == 'Uploaded' ) : ?>
		.header-block {
			background: url(<?php echo $header_bg_image; ?>) left top <?php echo $header_bg_repeat?>;
			background-color: <?php echo $header_background; ?>;
		}
	<?php endif; //$header_bg_type ?>
<?php else: ?>
	#footer { background: <?php echo $footer_background; ?> }
	<?php if ( $header_bg_type == 'Color' ) : ?>
		#header { background: <?php echo $header_background; ?>; }
	<?php elseif ( $header_bg_type == 'Predefined' ) : ?>
		#header {
			background: url(<?php echo $header_predefined_bg; ?>) left top <?php echo $header_bg_repeat?>;
			background-color: <?php echo $header_background; ?>;
		}
	<?php elseif ( $header_bg_type == 'Uploaded' ) : ?>
		#header {
			background: url(<?php echo $header_bg_image; ?>) left top <?php echo $header_bg_repeat?>;
			background-color: <?php echo $header_background; ?>;
		}
	<?php endif; //$header_bg_type ?>	
<?php endif; ?>

.top-block { padding-top: <?php echo $header_top_padding.'px;'; ?> padding-bottom: <?php echo $header_bottom_padding.'px;'; ?>}

/* Blog Meta Bg */
.entry-meta { background-color: <?php echo $meta_background; ?>; }
.entry-meta, .entry-meta a, .meta-category a:hover, .meta-author a:hover, .meta-tags a:hover, .post-like a { color: <?php echo $meta_color; ?>; }
.meta-category a:hover, .meta-author a:hover, .meta-comments a:hover, .meta-tags a:hover { border-bottom-color: <?php echo $meta_color; ?>; }

/* Menu */
#mainmenu-block-bg {
	text-align: <?php echo $menu_position; ?>;
	background: <?php echo $menu_background; ?>;
	border-top: <?php echo $menu_border['width']; ?>px <?php echo $menu_border['style']; ?> <?php echo $menu_border['color']; ?>;
	border-bottom: <?php echo $menu_border['width']; ?>px <?php echo $menu_border['style']; ?> <?php echo $menu_border['color']; ?>;
}
.sf-menu a {
	text-transform: <?php echo $menu_transform; ?>;
	font-size: <?php echo $menu_font['size']; ?>;
	color: <?php echo $menu_font['color']; ?> !important;
	<?php if( $menu_font['style'] == 'normal' || $menu_font['style'] == 'italic') { ?>font-style: <?php echo $menu_font['style']; ?>;<?php } ?>	
	<?php if( $menu_font['style'] == 'bold' || $menu_font['style'] == 'bold italic') { ?>font-weight: <?php echo $menu_font['style']; ?>;<?php } ?>	
}
.current-menu-item > a, .current-menu-ancestor > a, .current-post-ancestor > a { color: <?php echo $links_color; ?> !important; }

.sf-menu ul { min-width: <?php echo $dd_menu_width ?>em; }

<?php
// convert hex color too rgb
$rgb = ct_hex2rgb($dd_menu_background);
$rgba = "rgba(" . $rgb[0] . "," . $rgb[1] . "," . $rgb[2] . ", " . $dd_menu_opacity . ")";
?>
.sf-menu > li > ul, .sf-menu ul li ul {
	background: <?php echo $dd_menu_background; ?>;
	background: <?php echo $rgba; ?>;
}
.sf-menu ul > li:hover { background: <?php echo $dd_menu_hover_background; ?>; }


/* Pagination */
.container-pagination {
	background: <?php echo $pagination_background; ?>;
	border-top: <?php echo $pagination_border['width']; ?>px <?php echo $pagination_border['style']; ?> <?php echo $pagination_border['color']; ?>;
	border-bottom: <?php echo $pagination_border['width']; ?>px <?php echo $pagination_border['style']; ?> <?php echo $pagination_border['color']; ?>;
}

<?php if ( $pagination_type == 'Standard') : ?>
#footer { border-top: 0; }
<?php endif; ?>

<?php if ( $pagination_type == 'Load More') : ?>
.container-pagination { border-bottom: 0; }
.container-pagination .pagination { display: none; }
<?php elseif ( $pagination_type == 'Infinite Scroll') : ?>
.home .pagination, .blog .pagination, .archive .pagination { display: none; }
<?php endif; ?>

#pbd-alp-load-posts a:hover { border-bottom-color: <?php echo $links_color; ?>;}
#pbd-alp-load-posts i { color: <?php echo $links_color; ?>; }



/* Body background Color */
body { background: <?php echo $body_background; ?>; }

/* Post format */
<?php if ( !$postformat_meta ) { ?>
#blog-entry .entry-title { padding-right: 20px; }
<?php } ?>

.container-pagination #pbd-alp-load-posts a:hover { text-decoration: none; border-bottom: 1px dashed #c2374c; }


/* Homepage Columns */
#blog-entry .masonry-box {
	<?php if ($homepage_columns == '3 Columns') echo 'width: 30.8%; margin-right: 2.5%; margin-bottom: 2.5%;'; ?>
	<?php if ($homepage_columns == '4 Columns') echo 'width: 23%; margin-right: 2%; margin-bottom: 2%;'; ?>
	<?php if ($homepage_columns == '5 Columns') echo 'width: 18.5%; margin-right: 1.5%; margin-bottom: 1.5%;'; ?>

	<?php
	if ( ($homepage_columns == '1 Column + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'width: 47.5%; margin-right: 2.5%; margin-bottom: 2.5%;';
	elseif ($homepage_columns == '1 Column + Sidebar') : echo 'width: 100%; margin-right: 2.5%; margin-bottom: 3.5%;';
	endif ?>

	<?php
	if ( ($homepage_columns == '2 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'width: 30.8%; margin-right: 2.5%; margin-bottom: 2.5%;';
	elseif ($homepage_columns == '2 Columns + Sidebar') : echo 'width: 46.5%; margin-right: 3.5%; margin-bottom: 3.5%;';
	endif ?>

	<?php
	if ( ($homepage_columns == '3 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'width: 23%; margin-right: 2%; margin-bottom: 2%;';
	elseif ($homepage_columns == '3 Columns + Sidebar') : echo 'width: 30.8%; margin-right: 2.5%; margin-bottom: 2.5%;';
	endif ?>
}

#blog-entry {
	<?php if ( ($homepage_columns == '1 Column + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'margin-right: -2.5%;';
	elseif ($homepage_columns == '1 Column + Sidebar') : echo 'margin-right: 0;';
	endif ?>

	<?php if ( ($homepage_columns == '2 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'margin-right: -2.5%;';
	elseif ($homepage_columns == '2 Columns + Sidebar') : echo 'margin-right: -3.5%;';
	endif ?>

	<?php if ( ($homepage_columns == '3 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'margin-right: -2%;';
	elseif ($homepage_columns == '3 Columns + Sidebar') : echo 'margin-right: -2.5%;';
	endif ?>

	<?php if ($homepage_columns == '3 Columns') echo 'margin-right: -2.5%;'; ?>
	<?php if ($homepage_columns == '4 Columns') echo 'margin-right: -2%;'; ?>
	<?php if ($homepage_columns == '5 Columns') echo 'margin-right: -1.5%;'; ?>
}


/* Category page Columns */
.archive #blog-entry .masonry-box,
.search-results #blog-entry .masonry-box {
	<?php if ($categorypage_columns == '3 Columns') echo 'width: 30.8%; margin-right: 2.5%; margin-bottom: 2.5%;'; ?>
	<?php if ($categorypage_columns == '4 Columns') echo 'width: 23%; margin-right: 2%; margin-bottom: 2%;'; ?>
	<?php if ($categorypage_columns == '5 Columns') echo 'width: 18.5%; margin-right: 1.5%; margin-bottom: 1.5%;'; ?>

	<?php
	if ( ($categorypage_columns == '1 Column + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'width: 47.5%; margin-right: 2.5%; margin-bottom: 2.5%;';
	elseif ($categorypage_columns == '1 Column + Sidebar') : echo 'width: 100%; margin-right: 0; margin-bottom: 3.5%;';
	endif ?>

	<?php
	if ( ($categorypage_columns == '2 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'width: 30.8%; margin-right: 2.5%; margin-bottom: 2.5%;';
	elseif ($categorypage_columns == '2 Columns + Sidebar') : echo 'width: 46.5%; margin-right: 3.5%; margin-bottom: 3.5%;';
	endif ?>

	<?php
	if ( ($categorypage_columns == '3 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'width: 23%; margin-right: 2%; margin-bottom: 2%;';
	elseif ($categorypage_columns == '3 Columns + Sidebar') : echo 'width: 30.8%; margin-right: 2.5%; margin-bottom: 2.5%;';
	endif ?>		
}

.archive #blog-entry,
.search-results #blog-entry {
	<?php if ( ($categorypage_columns == '1 Column + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'margin-right: -2.5%;';
	elseif ($categorypage_columns == '1 Column + Sidebar') : echo 'margin-right: 0;';
	endif ?>

	<?php if ( ($categorypage_columns == '2 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'margin-right: -2.5%;';
	elseif ($categorypage_columns == '2 Columns + Sidebar') : echo 'margin-right: -3.5%;';
	endif ?>

	<?php if ( ($categorypage_columns == '3 Columns + Sidebar') and ($sidebar_type == 'Inbuilt') ) : echo 'margin-right: -2%;';
	elseif ($categorypage_columns == '3 Columns + Sidebar') : echo 'margin-right: -2.5%;';
	endif ?>

	<?php if ($categorypage_columns == '3 Columns') echo 'margin-right: -2.5%;'; ?>
	<?php if ($categorypage_columns == '4 Columns') echo 'margin-right: -2%;'; ?>
	<?php if ($categorypage_columns == '5 Columns') echo 'margin-right: -1.5%;'; ?>
}





/* Footer font*/
.copyright-info, .add-info { color: <?php echo $footer_font['color']; ?>; font-size: <?php echo $footer_font['size']; ?>; }

/* Headers Styling */
h1 {
	color: <?php echo $h_one['color']; ?>;
	<?php if( $h_one['style'] == 'normal' || $h_one['style'] == 'italic') { ?>font-style: <?php echo $h_one['style']; ?>;<?php } ?>	
	<?php if( $h_one['style'] == 'bold' || $h_one['style'] == 'bold italic') { ?>font-weight: <?php echo $h_one['style']; ?>;<?php } ?>	
	font-size: <?php echo $h_one['size']; ?>; 
	line-height: <?php echo $h_one['height']; ?>; 
}

h2 {
	color: <?php echo $h_two['color']; ?>;
	<?php if( $h_two['style'] == 'normal' || $h_two['style'] == 'italic') { ?>font-style: <?php echo $h_two['style']; ?>;<?php } ?>	
	<?php if( $h_two['style'] == 'bold' || $h_two['style'] == 'bold italic') { ?>font-weight: <?php echo $h_two['style']; ?>;<?php } ?>	
	font-size: <?php echo $h_two['size']; ?>; 
	line-height: <?php echo $h_two['height']; ?>; 
}

h3 {
	color: <?php echo $h_three['color']; ?>;
	<?php if( $h_three['style'] == 'normal' || $h_three['style'] == 'italic') { ?>font-style: <?php echo $h_three['style']; ?>;<?php } ?>	
	<?php if( $h_three['style'] == 'bold' || $h_three['style'] == 'bold italic') { ?>font-weight: <?php echo $h_three['style']; ?>;<?php } ?>	
	font-size: <?php echo $h_three['size']; ?>; 
	line-height: <?php echo $h_three['height']; ?>; 
}

h4 {
	color: <?php echo $h_four['color']; ?>;
	<?php if( $h_four['style'] == 'normal' || $h_four['style'] == 'italic') { ?>font-style: <?php echo $h_four['style']; ?>;<?php } ?>	
	<?php if( $h_four['style'] == 'bold' || $h_four['style'] == 'bold italic') { ?>font-weight: <?php echo $h_four['style']; ?>;<?php } ?>	
	font-size: <?php echo $h_four['size']; ?>; 
	line-height: <?php echo $h_four['height']; ?>; 
}

h5 {
	color: <?php echo $h_five['color']; ?>;
	<?php if( $h_five['style'] == 'normal' || $h_five['style'] == 'italic') { ?>font-style: <?php echo $h_five['style']; ?>;<?php } ?>	
	<?php if( $h_five['style'] == 'bold' || $h_five['style'] == 'bold italic') { ?>font-weight: <?php echo $h_five['style']; ?>;<?php } ?>	
	font-size: <?php echo $h_five['size']; ?>; 
	line-height: <?php echo $h_five['height']; ?>; 
}

h6 {
	color: <?php echo $h_six['color']; ?>;
	<?php if( $h_six['style'] == 'normal' || $h_six['style'] == 'italic') { ?>font-style: <?php echo $h_six['style']; ?>;<?php } ?>	
	<?php if( $h_six['style'] == 'bold' || $h_six['style'] == 'bold italic') { ?>font-weight: <?php echo $h_six['style']; ?>;<?php } ?>	
	font-size: <?php echo $h_six['size']; ?>; 
	line-height: <?php echo $h_six['height']; ?>; 
}

h1.entry-title {
	<?php if( $post_title_font['style'] == 'normal' || $post_title_font['style'] == 'italic') { ?>font-style: <?php echo $post_title_font['style']; ?>;<?php } ?>	
	<?php if( $post_title_font['style'] == 'bold' || $post_title_font['style'] == 'bold italic') { ?>font-weight: <?php echo $post_title_font['style']; ?>;<?php } ?>	
	font-size: <?php echo $post_title_font['size']; ?>; 
	line-height: <?php echo $post_title_font['height']; ?>;
	text-transform: <?php echo $post_title_transform; ?>;
}

h1.entry-title a {
	color: <?php echo $post_title_font['color']; ?>;
}

/* Widgets */
.widget-title {
	background: <?php echo $widget_title_background; ?>;
	border-top: <?php echo $widget_title_border['width']; ?>px <?php echo $widget_title_border['style']; ?> <?php echo $widget_title_border['color']; ?>;
	border-bottom: <?php echo $widget_title_border['width']; ?>px <?php echo $widget_title_border['style']; ?> <?php echo $widget_title_border['color']; ?>;
	font-size: <?php echo $widget_title_font['size']; ?>;
	color: <?php echo $widget_title_font['color']; ?>;
	<?php if( $widget_title_font['style'] == 'normal' || $widget_title_font['style'] == 'italic') { ?>font-style: <?php echo $widget_title_font['style']; ?>;<?php } ?>	
	<?php if( $widget_title_font['style'] == 'bold' || $widget_title_font['style'] == 'bold italic') { ?>font-weight: <?php echo $widget_title_font['style']; ?>;<?php } ?>
}

/* Welcome Block */
.welcome-text {	background: <?php echo $welcome_background; ?>; }
.welcome-strip { background: <?php echo $welcome_strip_background; ?>; }
.welcome-text h1, .welcome-text h2, .welcome-text h3, .welcome-text h4 { color: <?php echo $welcome_color; ?>; }
.welcome-text a { color: <?php echo $welcome_links_color; ?>; }
.welcome-text a:hover {
	color: <?php echo $links_color; ?>;
	border-bottom: 1px solid <?php echo $links_color; ?>;
}

/* Tumblelog layout */
<?php if ( $tumblelog_layout ) : ?>
#blog-entry .masonry-box.col1, #blog-entry .masonry-box.col2, #blog-entry .masonry-box.col3 { margin-right: 20px !important; margin-bottom: 20px !important; }
<?php endif; ?>

/* Featured image */
<?php if ( $featured_image_post == '0') : ?>
.single .entry-content { padding-top: 0; }
<?php endif; ?>

/* Stretch thumbnail post images */
<?php if ( $thumb_posts_stretch ) : ?>
.post-block .entry-thumb img { width: 100%; }
<?php endif; ?>

<?php if ( $welcome_padding ) : ?>
.welcome-text { padding: 0; }
<?php endif; ?>

/* Wide Blog */
<?php if ( $blog_width == 'Wide' ) : ?>
#blog-entry { }
.container-wide .span12 { padding: 0 20px; }
.container-wide { overflow-x: hidden; }
<?php endif; ?>

/* Links color*/
a { color: <?php echo $links_color; ?>; }
a:hover { border-bottom: 1px solid <?php echo $links_color; ?>; color: <?php echo $links_color; ?>; }
.sf-menu a:hover { color: <?php echo $links_color; ?> !important; }

.widget .tagcloud a[class|=tag-link]:hover,
#entry-post a[rel=tag]:hover,
.tagcloud a[class|=tag-link]:hover { background-color:<?php echo $links_color; ?>; }

.pagination a:hover { background: <?php echo $links_color; ?>; }
.pagination .current { background: <?php echo $links_color; ?>; }
.meta .meta-category a:hover,
.meta .meta-author a:hover,
.meta .meta-comments a:hover { border-bottom-color: <?php echo $links_color; ?>; }

.small-slider .entry-title a:hover { border-bottom: 1px solid <?php echo $links_color; ?>; }

.meta .meta-category a:hover,
.meta .meta-author a:hover,
.meta .meta-comments a:hover { color: <?php echo $links_color; ?>; }
#wp-calendar td#today { background-color: <?php echo $links_color; ?>; }

.widget_nav_menu li a:hover { color: <?php echo $links_color; ?>; }
.widget_nav_menu li.current-menu-item:before,
.widget_nav_menu li.current-menu-ancestor:before { color: <?php echo $links_color; ?>; }

.colored,
.sf-menu.add-nav li a:hover,
.sf-menu a:hover,
.small-slider .entry-title a:hover,
.tweet_list .tweet_time a:hover,
.flex-direction-nav a:hover,
.recent-posts-widget .post-title a:hover,
.popular-posts-widget .post-title a:hover,
.small-slider .entry-title a:hover { color: <?php echo $links_color; ?>; }

<?php if (!$single_colored_bg) : ?>
.single .entry-content, .single .edit-link, .single .entry-extra { background-color: #FFF; }
<?php endif; ?>

/* Responsive Layout */
<?php if ( !$responsive_layout ) : ?>
#header, #footer { min-width:1170px; }
.container { width: 1170px; }
<?php endif; ?>



/* Woocommerce */

#reviews #comments .star-rating,
.product-rating .star-rating { color: <?php echo $shop_reviewstar_color; ?>; }

.woocommerce .widget_shopping_cart .total > strong,.woocommerce-page .widget_shopping_cart .total > strong { color: <?php echo $links_color; ?>; }
.product_list_widget .star-rating { color: <?php echo $links_color; ?>; }

.woocommerce ul.cart_list li a:hover,
.woocommerce ul.product_list_widget li a:hover,
.woocommerce-page ul.cart_list li a:hover,
.woocommerce-page ul.product_list_widget li a:hover,
div.product .stock,
.ct-shop-tabs ul.tabs li a:hover { color: <?php echo $links_color; ?>; }

ul.page-numbers li span.current { 
	background-color: <?php echo $links_color; ?>;
	border: 1px solid <?php echo $links_color; ?>;
}

ul.page-numbers li a:hover { background-color: <?php echo $links_color; ?>; }

span.cart-total { color: <?php echo $links_color; ?>; }
/*.product-rating { background-color: <?php echo $links_color; ?>; }*/

.price > ins, .price > ins > .amount { color: <?php echo $links_color; ?>; }
.woocommerce .cart-collaterals .cart_totals tr.total th strong, .woocommerce .cart-collaterals .cart_totals tr.total td strong, tr.total th strong, tr.total td strong .amount { color: <?php echo $links_color; ?>; }
.cart_totals tr.total th strong, .cart_totals tr.total td  strong, tr.total th strong, tr.total td strong .amount { color: <?php echo $links_color; ?>; }
h2.shipping-title, .woocommerce h2 { color: <?php echo $links_color; ?>; }
.thankyou { color: <?php echo $links_color; ?>; }
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,.woocommerce-page .widget_price_filter .ui-slider .ui-slider-range { background: <?php echo $links_color; ?>; } 

<?php if ( $ct_shop_posts_per_row == '3' ) : ?>
.woocommerce-page .related ul.products li.product,
.woocommerce .upsells.products ul.products li.product { width: 30.4%; margin-right: 2%; }
<?php else : ?>
.woocommerce-page .related ul.products li.product,
.woocommerce .upsells.products ul.products li.product { width: 45.9%; margin-right: 3%; }
<?php endif; ?>


<?php if ( $ct_shop_columns == '3' ) : ?>
	.woocommerce ul.products li { width: 29.7%; }
<?php endif; ?>


.woocommerce-page .shopping-cart-block a.button:hover, .woocommerce .shopping-cart-block a.button:hover {color: <?php echo $links_color; ?>; }
.woocommerce-info, .woocommerce-info a { background-color: <?php echo $links_color; ?>; }

.span5 .onsale { background-color: <?php echo $ct_shop_onsale_color; ?>; }