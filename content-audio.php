<?php
/**
 * The template for displaying posts in the Audio Post Format
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Pravda
 * @since Pravda 1.0
 */
?>

<?php
global $ct_data, $post;
global $comments_meta, $share_meta, $date_meta, $author_meta, $date_alt_meta, $categories_meta, $likes_meta, $views_meta, $postformat_meta, $post_class, $tumblelog_layout, $entire_meta, $excerpt_lenght, $post_color_type;
global $single_postformat_meta, $single_date_meta, $single_date_alt_meta, $single_author_meta, $single_categories_meta, $single_likes_meta, $single_views_meta, $featured_image_post, $ct_featured_type, $single_share_meta, $single_comments_meta;

$single_colored_bg = $ct_data['ct_single_colored_bg'];
$post_bg_color = get_post_meta( $post->ID, 'ct_mb_post_bg_color', true);
$post_font_color = get_post_meta( $post->ID, 'ct_mb_post_font_color', true);
$show_title = get_post_meta( $post->ID, 'ct_mb_show_title', true);
$show_content = get_post_meta( $post->ID, 'ct_mb_show_content', true);
$show_meta = get_post_meta( $post->ID, 'ct_mb_show_meta', true);
$mb_excerpt_lenght = get_post_meta( $post->ID, 'ct_mb_excerpt_lenght', true);
$mb_external_url = get_post_meta( $post->ID, 'ct_mb_external_url', true);

$post_type = get_post_meta($post->ID, 'ct_mb_post_type', true);
if( $post_type == '' ) $post_type = 'standard_post';

// Tumblelog
$ct_col1 = '';

if ( $tumblelog_layout == '1' ) : // yes, tumblelog layout

	$post_width = get_post_meta( $post->ID, 'ct_mb_post_width', true);
	if ( $post_width == '' ) $post_width = 'auto';

	$ct_post_class = '';
	$post_class = '';
	if ( $post_width == 'auto' ) :
		// check, if width > height, use col2 size
		$ct_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-thumb');
		if (!empty($ct_image)) :
			if ( ($ct_image[1] / $ct_image[2]) > 1.2 ) : $ct_post_class .= $post_class . ' col2'; $ct_col1 = 0; //col2 (wide)
			elseif ( $ct_image[1] <= $ct_image[2] ) : $ct_post_class .= $post_class . ' col1'; $ct_col1 = 1; //col1 (normal)
			else : $ct_post_class .= $post_class . ' col1'; $ct_col1 = 1; //col1 (normal)
			endif;
		else : $ct_post_class .= $post_class . ' col1 ' . 'no-top-padding'; $ct_col1 = 1; //col1 (normal)
		endif;
		//$post_class = $ct_post_class;
	else :
		$ct_post_class .= $post_class . ' ' . $post_width;
		if ( !has_post_thumbnail() ) $ct_post_class .= ' no-top-padding';
		//$post_class = $ct_post_class;
	endif; // post_width
else :
	$ct_post_class = $post_class; // no, use standard masonry layout
	if ( !has_post_thumbnail() ) $ct_post_class .= ' no-top-padding';
	//$post_class = $ct_post_class;
endif;

?>

<?php if ($post_type == 'standard_post') : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( "masonry-box clearfix $ct_post_class" ); ?> itemscope itemtype="http://schema.org/BlogPosting">
<?php else : // review ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( "masonry-box clearfix $ct_post_class" ); ?> itemscope itemtype="http://data-vocabulary.org/Review">
<?php endif; ?>

	<?php
	if ( $post_color_type == 'Category settings' ) :
		$category = get_the_category(); 
		$cat_color = ct_get_color($category[0]->term_id);
		if ( $cat_color == '') { $cat_color = '#000'; }
		$post_bg_color = $cat_color;
	endif;

	// if not set, set variables to their defaults
	if ( empty($post_font_color) ) $post_font_color = '#363636';
	if ( empty($post_bg_color) ) $post_bg_color = '#FFFFFF';
	if ( $show_title == '' ) $show_title = '1';
	if ( $show_content == '' ) $show_content = '1';
	if ( $show_meta == '' ) $show_meta = '1';
	if ( $mb_excerpt_lenght == '' ) $mb_excerpt_lenght = '0';

	if ( is_single() ) $show_content = '1';

	//check, if show meta blog (via theme options)
	if ( $entire_meta == '0') {
		$show_meta = '0'; // hide
	}

	?>

	<?php if ( $post_bg_color == '#FFFFFF' ) : ?>
		<div class="post-block">
	<?php else : ?>
		<div class="post-block" style="background: <?php echo $post_bg_color; ?>">
	<?php endif; ?>



		<header class="entry-header">
			<?php if ( is_single() ) : ?>
       	    	<?php if ($post_type == 'standard_post') : ?>
					<?php if ( $post_font_color == '#363636' ) : ?>
						<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>
					<?php else : ?>
						<h1 class="entry-title" itemprop="name" style="color: <?php echo $post_font_color; ?>"><?php the_title(); ?></h1>
					<?php endif; ?>
				<?php else: //review ?>
					<?php if ( $post_font_color == '#363636' ) : ?>
						<h1 class="entry-title" itemprop="itemreviewed"><?php the_title(); ?></h1>
						<meta itemprop="reviewer" content="<?php the_author(); ?>">
					<?php else : ?>
						<h1 class="entry-title" itemprop="itemreviewed" style="color: <?php echo $post_font_color; ?>"><?php the_title(); ?></h1>
						<meta itemprop="reviewer" content="<?php the_author(); ?>">
					<?php endif; ?>
				<?php endif; ?>	
			<?php elseif ( $show_title == '1' ) : // Show title block ?>
				<h1 class="entry-title">
					<?php if ( $post_font_color == '#363636' ) : ?>
					<a href="<?php if (!empty($mb_external_url)):echo $mb_external_url; else: the_permalink(); endif; ?>" <?php if (!empty($mb_external_url)):echo 'target="_blank"'; endif; ?> title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'color-theme-framework' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
					<?php else : ?>
					<a href="<?php if (!empty($mb_external_url)):echo $mb_external_url; else: the_permalink(); endif; ?>" <?php if (!empty($mb_external_url)):echo 'target="_blank"'; endif; ?> title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'color-theme-framework' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark" style="color: <?php echo $post_font_color; ?>"><?php the_title(); ?></a>
					<?php endif; ?>
				</h1>
			<?php endif; // is_single() ?>


			<?php
			if ( $show_title == '1' and !is_single() ) :
				if ( $postformat_meta ):
					if ( $post_bg_color == '#FFFFFF' ) : $border_class = 'border'; else : $border_class = ''; endif; 
					$format = get_post_format(); 
					if ( is_sticky() ) : $format = __('featured', 'color-theme-framework');
					elseif ( $post_type == 'review_post') : $format = __('review', 'color-theme-framework');
					elseif ( false === $format ) : $format = __('standard', 'color-theme-framework');
					endif;
					?>
				<div class="entry-format <?php echo $border_class; ?>" title="<?php echo $format; ?>">
					<?php if ( is_sticky() ) : ?>
						<i class="icon-star"></i>
					<?php elseif ( $post_type == 'review_post') : ?>
						<i class="icon-check"></i>
					<?php else: ?>
						<i class="icon-music"></i>
					<?php endif; ?>
				</div><!-- .entry-format -->
				<?php endif; ?>
			<?php elseif ( is_single() ) :
				if ( $single_postformat_meta ):
					if ( $post_bg_color == '#FFFFFF' ) : $border_class = 'border'; else : $border_class = ''; endif; 
					$format = get_post_format(); 
					if ( is_sticky() ) : $format = __('featured', 'color-theme-framework');
					elseif ( $post_type == 'review_post') : $format = __('review', 'color-theme-framework');
					elseif ( false === $format ) : $format = __('standard', 'color-theme-framework');
					endif;
					?>
				<div class="entry-format <?php echo $border_class; ?>" title="<?php echo $format; ?>">
					<?php if ( is_sticky() ) : ?>
						<i class="icon-star"></i>
					<?php elseif ( $post_type == 'review_post') : ?>
						<i class="icon-check"></i>
					<?php else: ?>
						<i class="icon-music"></i>
					<?php endif; ?>
				</div><!-- .entry-format -->
				<?php endif; ?>
			<?php endif; ?>
		</header><!-- .entry-header -->


		<?php
		// Get Soundcloud code from Post Metabox
		$soundcloud = get_post_meta( $post->ID, 'ct_mb_post_soundcloud', true );
		$audio_thumb_type = get_post_meta( $post->ID, 'ct_mb_post_audio_thumb', true );
		?>

		<?php if ( ($soundcloud != '' && $audio_thumb_type == 'player' ) or is_single() ) : ?>
			<div class="entry-thumb">
				<?php echo $soundcloud; ?>
			</div> <!-- .entry-thumb -->
		<?php elseif (has_post_thumbnail() && $audio_thumb_type == 'featured' ) : ?>
			<div class="entry-thumb">
				<?php $image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'blog-thumb'); ?>
				<a href="<?php if (!empty($mb_external_url)):echo $mb_external_url; else: echo the_permalink(); endif; ?>" <?php if (!empty($mb_external_url)):echo 'target="_blank"'; endif; ?> title="<?php the_title(); ?>"><img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" /></a>
			</div><!-- .entry-thumb -->
		<?php endif; ?>


		<?php
		/* Get Post Category */ 
		$category = get_the_category(); 
		$category_id = get_cat_ID( $category[0]->cat_name ); 
		$category_link = get_category_link( $category_id );

		$ct_excerpt = get_the_excerpt();
		if ( !$single_colored_bg and is_single() ) $post_font_color = '#363636';
		?>

		<?php if ( is_single() ) : ?>
			<?php get_template_part( 'includes/single' , 'rating' );  //Show Single Rating	?>
		<?php endif; ?>

		<?php if ( $show_content == '1' ) : ?>
			<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary" style="color: <?php echo $post_font_color; ?>">
				<?php ct_excerpt_max_charlength($excerpt_lenght); ?>
			</div><!-- .entry-summary -->
			<?php else : ?>
				<?php if ( !empty($ct_excerpt) or is_single() ) : ?>
					<div class="entry-content clearfix" itemprop="articleBody" style="color: <?php echo $post_font_color; ?>">
						<?php $excerpt_function = stripslashes( $ct_data['ct_excerpt_function'] );	?>
						<?php
						if ( ($excerpt_function == 'Content') || is_single() ) : ?>
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'color-theme-framework' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'color-theme-framework' ), 'after' => '</div>' ) );
						elseif ( $excerpt_function == 'Excerpt' ) : 
							if ( $mb_excerpt_lenght != '0' ) { ct_excerpt_max_charlength($mb_excerpt_lenght); }
							else ct_excerpt_max_charlength($excerpt_lenght); ?>
						<?php endif; ?>
					</div><!-- .entry-content -->
				<?php endif; // empty($ct_excerpt) ?>
			<?php endif; ?>

			<div class="clear"></div>

			<?php 
			// Displays a link to edit the current post, if a user is logged in and allowed to edit the post
			edit_post_link( __( 'Edit', 'color-theme-framework' ), '<span class="edit-link"><i class="icon-pencil"></i>', '</span>' );
			?>


			<?php if ( is_single() ) : ?>
				<?php if ( $single_comments_meta or $single_share_meta ) : ?>
				<div class="entry-extra clearfix">
					<?php if ( $single_comments_meta ) : ?>
						<?php if ( comments_open() ) : ?>
							<?php
							if ( $post_font_color == '#363636' ) : 
								$comments_link_color = 'dark';
							else :
								$comments_link_color = 'white';
							endif;
							?>
							<div class="comments-link <?php echo $comments_link_color; ?>" style="color: <?php echo $post_font_color; ?>">
								<i class="icon-comment"></i>
							<?php comments_popup_link( '<span class="leave-reply"' . ' style="color:' . $post_font_color . ' !important;">' . __( 'Leave a reply', 'color-theme-framework' ) . '</span>', __( '1 Reply', 'color-theme-framework' ), __( '% Replies', 'color-theme-framework' ) ); ?>
							</div><!-- .comments-link -->
						<?php endif; // comments_open() ?>
					<?php endif; // comments meta ?>

					<?php if ( $single_share_meta ) : ?>
						<div class="entry-share">
							<span style="color: <?php echo $post_font_color; ?>"><?php _e( 'Share This', 'color-theme-framework' ); ?><i class="icon-plus"></i></span>
							<?php ct_get_share(); // get share buttons function ?> 
						</div> <!-- .entry-share -->
					<?php endif; // share meta ?>
				</div> <!-- .entry-extra -->
				<?php endif; // entry-extra ?>
			<?php else : ?>

				<?php if ( ($comments_meta) or ($share_meta) ) : ?>
				<div class="entry-extra clearfix">
					<?php if ( $comments_meta ) : ?>
						<?php if ( comments_open() ) : ?>
							<?php
							if ( $post_font_color == '#363636' ) : 
								$comments_link_color = 'dark';
							else :
								$comments_link_color = 'white';
							endif;
							?>
							<div class="comments-link <?php echo $comments_link_color; ?>" style="color: <?php echo $post_font_color; ?>">
								<i class="icon-comment"></i>
								<?php comments_popup_link( '<span class="leave-reply"' . ' style="color:' . $post_font_color . ' !important;">' . __( 'Leave a reply', 'color-theme-framework' ) . '</span>', __( '1 Reply', 'color-theme-framework' ), __( '% Replies', 'color-theme-framework' ) ); ?>
							</div><!-- .comments-link -->
						<?php endif; // comments_open() ?>
					<?php endif; // comments meta ?>

					<?php if ( $share_meta ) : ?>
						<div class="entry-share">
							<span style="color: <?php echo $post_font_color; ?>"><?php _e( 'Share This', 'color-theme-framework' ); ?><i class="icon-plus"></i></span>
							<?php ct_get_share(); // get share buttons function ?> 
						</div> <!-- .entry-share -->
					<?php endif; // share meta ?>
				</div> <!-- .entry-extra -->
				<?php endif; // entry-extra ?>
			<?php endif; // is_single ?>
		<?php endif; // $show_content ?> 


		<?php if ( ($show_meta == '1') and !is_single() ) : ?>
			<footer class="entry-meta clearfix">
			<?php if ( $date_meta ) : ?>
				<div class="entry-date updated">
					<span class="date-month"><?php echo esc_attr( get_the_date( 'M' ) ); ?></span>
					<span class="date-day"><?php echo esc_attr( get_the_date( 'd' ) ); ?></span>
		 		</div> <!-- /entry-date -->
		 	<?php endif; // date meta ?>

			<?php ct_get_post_meta($post->ID, $likes_meta, $views_meta, $categories_meta, $author_meta, $date_alt_meta, false);	?>
			</footer><!-- .entry-meta -->
		<?php elseif ( is_single() ) : // SINGLE ?>
			<footer class="entry-meta single-meta clearfix">
			<?php if ( $single_date_meta ) : ?>
				<div class="entry-date updated">
					<span class="date-month"><?php echo esc_attr( get_the_date( 'M' ) ); ?></span>
					<span class="date-day"><?php echo esc_attr( get_the_date( 'd' ) ); ?></span>
					<meta itemprop="datePublished" content="<?php echo get_the_date( 'M j, Y' ); ?>">
		 		</div> <!-- /entry-date -->
		 	<?php endif; // date meta ?>

			<?php ct_get_single_post_meta($post->ID, $single_likes_meta, $single_views_meta, $single_categories_meta, $single_author_meta, $single_date_alt_meta, false, true); ?>
			</footer><!-- .entry-meta -->
		<?php endif; // $show_meta ?>

	</div> <!-- .post-block -->  
</article><!-- #post-ID -->