<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */


add_filter( 'rwmb_meta_boxes', 'ct_mb_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function ct_mb_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'ct_mb_';

	/*-----------------------------------------------------------------------------------*/
	/* PAGE SETTINGS
	/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id' => 'ct_custom_page_settings',
		'title' => __('Custom Page Settings', 'color-theme-framework'),
		'pages' => array( 'page' ),
		'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
		'priority' => 'high',
		'fields' => array(
			array(
				'name' => __('Allow Comments', 'color-theme-framework'),
				'id'   => "{$prefix}page_comments",
				'type' => 'checkbox',
				'std'  => 0,
			),		
			array(
				'name' => __('Custom Page Description', 'color-theme-framework'),
				'desc' => __('Text for page description. Appears under page title.', 'color-theme-framework'),
				'id'   => "{$prefix}page_desc",
				'type' => 'textarea',
				'cols' => '20',
				'rows' => '3',
			),
		)
	);


	/*-----------------------------------------------------------------------------------*/
	/* SIDEBAR POSITION
	/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id'		=> 'ct_sidebar_settings',
		'title'		=> __('Sidebar Position', 'color-theme-framework'),
		'pages'		=> array( 'post', 'page' ),
		'context'	=> 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
		'priority'	=> 'high',
		'fields'	=> array(
			array(
				'name'     => __('Sidebar Position', 'color-theme-framework'),
				'id'       => "{$prefix}sidebar_position",
				'type'     => 'select',
				'std'		=> __('Select Position', 'color-theme-framework'),
				'options'  => array(
					'left' => 'Left',
					'right' => 'Right'
				),
			),
		)
	);

	/*-----------------------------------------------------------------------------------*/
	/* CUSTOM BACKGROUND SETTINGS
	/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id'		=> 'ct_custom_backgrounds',
		'title'		=> __('Custom Background Settings', 'color-theme-framework'),
		'pages'		=> array( 'post', 'page' ),
		'context'	=> 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
		'priority'	=> 'high',
		'fields'	=> array(
			array(
				'name'		=> __('Custom Background Image', 'color-theme-framework'),
				'id'		=> "{$prefix}background_image",
				//'type'		=> 'thickbox_image',
				'type'				=> 'image_advanced',
				'max_file_uploads'	=> 2,			
				'desc'		=> __('Upload a custom background image for this page. Once uploaded, click "Insert to Post".', 'color-theme-framework'),
			),
			array(
				'name'     => __('Custom Background Repeat', 'color-theme-framework'),
				'id'       => "{$prefix}background_repeat",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'  => array(
					'no-repeat' => 'No Repeat',
					'repeat' => 'Repeat',
					'repeat-x' => 'Repeat Horizontally',
					'repeat-y' => 'Repeat Vertically',
				),
			),
			array(
				'name'     => __('Custom Background Position', 'color-theme-framework'),
				'id'       => "{$prefix}background_position",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'  => array(
					'left' => 'Left',
					'right' => 'Right',
					'center' => 'Centered',
					'full' => 'Full Screen',
				),
			),
			array(
				'name'     => __('Custom Background Attachment', 'color-theme-framework'),
				'id'       => "{$prefix}background_attachment",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'  => array(
					'fixed' => 'Fixed',
					'scroll' => 'Scroll',
				),
			),
			array(
				'name' => __('Custom Background Color', 'color-theme-framework'),
				'id'   => "{$prefix}background_color",
				'type' => 'color',
				'desc' => __('Select a custom background color for the uploaded image.', 'color-theme-framework'),
				'std' => '',
			),
		)
	);



	/*-----------------------------------------------------------------------------------*/
	/* GENERAL POST SETTINGS
	/*-----------------------------------------------------------------------------------*/
	$meta_boxes[] = array(
		'id'		=> 'ct_post_settings',
		'title'		=> __('General Post Settings', 'color-theme-framework'),
		'pages'		=> array( 'post' ),
		'context'	=> 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
		'priority'	=> 'high',
		'fields'	=> array(
			array(
				'name'		=> __('Background Color', 'color-theme-framework'),
				'id'		=> "{$prefix}post_bg_color",
				'type'		=> 'color',
				'desc'		=> __('Select a custom background color for the post.', 'color-theme-framework'),
				'std'		=> '#FFFFFF',
			),
			array(
				'name'		=> __('Font Color', 'color-theme-framework'),
				'id'		=> "{$prefix}post_font_color",
				'type'		=> 'color',
				'desc'		=> __('Select a custom font color for the post.', 'color-theme-framework'),
				'std'		=> '#363636',
			),
			// CHECKBOX
			array(
				'name'		=> __('Title Block', 'color-theme-framework'),
				'desc'		=> __('Show Title Block (title + post format icon)', 'color-theme-framework'),
				'id'		=> "{$prefix}show_title",
				'type'		=> 'checkbox',
				'std'		=> 1,
			),
			array(
				'name'		=> __('Content Block', 'color-theme-framework'),
				'desc'		=> __('Show Content Block (text + comments + share)', 'color-theme-framework'),
				'id'		=> "{$prefix}show_content",
				'type'		=> 'checkbox',
				'std'		=> 1,
			),
			array(
				'name'		=> __('Meta Block', 'color-theme-framework'),
				'desc'		=> __('Show Meta Block (date, author, likes, etc.)', 'color-theme-framework'),
				'id'		=> "{$prefix}show_meta",
				'type'		=> 'checkbox',
				'std'		=> 1,
			),
			array(
				'name'     => __('Post width (for tumblelog layout)', 'color-theme-framework'),
				'id'       => "{$prefix}post_width",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'  => array(
					'auto' => 'Auto',
					'col1' => 'Column1',
					'col2' => 'Column2',
					'col3' => 'Column3',
				),
				'multiple' => false,
			),
			array(
				'name'		=> __('Length of Excerpt', 'color-theme-framework'),
				'id'		=> "{$prefix}excerpt_lenght",
				'type'		=> 'slider',
				'prefix'	=> '',
				'suffix'	=> ' chars',
				'std'		=> '0',
				'js_options' => array(
					'min'   => 0,
					'max'   => 500,
					'step'  => 1,
				),
			),
			array(
				'name'  => __('Custom URL for post', 'color-theme-framework'),
				'id'    => "{$prefix}external_url",
				'desc'  => __('Paste a custom URL for post', 'color-theme-framework'),
				'type'  => 'textarea',
				'std'   => '',
			),		
		)
	);


	// Metabox for Post Format: Gallery
	$meta_boxes[] = array(
		'title'		=> __('Post Format: Gallery', 'color-theme-framework'),
		'id'		=> 'ct_gallery_format',
		'fields'	=> array(
			array(
				'name'				=> __('Add Images for Gallery', 'color-theme-framework'),
				'id'				=> "{$prefix}gallery",
				'type'				=> 'image_advanced',
				'max_file_uploads'	=> 20,
			),
		)
	);


	// Metabox for Post Format: Video 
	$meta_boxes[] = array(
		'id' => 'ct_video_format',
		'title' => __('Post Format: Video', 'color-theme-framework'),
		'pages' => array( 'post' ),
		'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
		'priority' => 'high',
		'fields' => array(
			array(
				'name'     => __('Type of Video', 'color-theme-framework'),
				'id'       => "{$prefix}post_video_type",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'  => array(
					'vimeo'			=> 'Vimeo',
					'youtube'		=> 'Youtube',
					'dailymotion'	=> 'Dailymotion',
					'custom'		=> 'Custom'
				),
				'multiple' => false,
			),

			array(
				'name'  => __('Video ID', 'color-theme-framework'),
				'id'    => "{$prefix}post_video_file",
				'desc'  => __('Enter Video ID (example: WluQQiXKVc8)', 'color-theme-framework'),
				'type'  => 'text',
				'std'   => '',
				'clone' => false,
			),	
	        array(  
				'name'     => __('Type of Video Thumbnail', 'color-theme-framework'),
				'desc'  => __('Choose the type of thumbnail: auto generated from video service or use featured image', 'color-theme-framework'),
				'id'       => "{$prefix}post_video_thumb",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'  => array(
					'player' => 'Iframe player',
					'featured' => 'Featured image',
					'auto' => 'Auto',
				),
				'multiple' => false,
	        ),
			array(
				'name'  => __('Code for Custom video', 'color-theme-framework'),
				'id'    => "{$prefix}video_custom_code",
				'desc'  => __('Paste a custom code for video (iframe or shortcode)', 'color-theme-framework'),
				'type'  => 'textarea',
				'std'   => '',
			),
		)
	);


	// Metabox for Post Format: Audio 
	$meta_boxes[] = array(
		'id' => 'ct_audio_format',
		'title' => __('Post Format: Audio', 'color-theme-framework'),
		'pages' => array( 'post' ),
		'context' => 'normal', // Where the meta box appear: normal (default), advanced, side. Optional.
		'priority' => 'high',
		'fields' => array(
			array(
				'name'		=> __('Type of Audio Thumbnail (for Blog, Widgets, etc.)', 'color-theme-framework'),
				//'desc'		=> __('Choose the type of thumbnail : iframe player or featured image', 'color-theme-framework' ),
				'id'		=> "{$prefix}post_audio_thumb",
				'type'		=> 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				'options'	=> array(
					'player'	=> 'Iframe Player',
					'featured' => 'Featured Image',
				),
				'multiple' => false,
			),
			array(
				'name'  => __('Soundcloud', 'color-theme-framework'),
				'id'    => "{$prefix}post_soundcloud",
				'desc'  => __('Paste code from Soundcloud Service', 'color-theme-framework'),
				'type'  => 'textarea',
				'std'   => '',
				'clone' => false,
			),		
		)
	);




	// 2nd meta box
	$meta_boxes[] = array(
		'title' => __('Settings for Review', 'color-theme-framework'),
		'id' => 'color_id',
		'fields' => array(
			// SELECT BOX
			array(
				'name'     => __('Select Type of Post', 'color-theme-framework'),
				'id'       => "{$prefix}post_type",
				'type'     => 'select',
				'std'		=> __('Select an Item', 'color-theme-framework'),
				// Array of 'value' => 'Label' pairs for select box
				'options'  => array(
					'standard_post' => __('Standard Post', 'color-theme-framework'),
					'review_post' => __('Review Post', 'color-theme-framework'),
				),
				// Select multiple values, optional. Default is false.
				'multiple' => false,
			),

			// COLOR
			array(
				'name' => __('Color for Score Stars', 'color-theme-framework'),
				'id'   => "{$prefix}stars_color",
				'std' => "#dd0c37",
				'type' => 'color',
			),	

			// COLOR
			array(
				'name' => __('Color for Overall Score', 'color-theme-framework'),
				'id'   => "{$prefix}overall_color",
				'std' => "#363636",
				'type' => 'color',
			),	
			
			// TEXT
			array(
				// Field name - Will be used as label
				'name'  => __('Overall Score Name', 'color-theme-framework'),
				// Field ID, i.e. the meta key
				'id'    => "{$prefix}over_name",
				// Field description (optional)
				'desc'  => __('Enter name for Overall Score', 'color-theme-framework'),
				'type'  => 'text',
				// Default value (optional)
				'std'   => __('Overall Score', 'color-theme-framework'),
				// CLONES: Add to make the field cloneable (i.e. have multiple value)
				'clone' => false,
			),	

			// SELECT BOX
			array(
				'name'     => __('Overall Score ( from 0.5 to 5 )', 'color-theme-framework'),
				'id'       => "{$prefix}over_score",
				'std'		=> __('Select Score', 'color-theme-framework'),
				'type'     => 'select',
				'options'  => array(
					'0' => '0',
					'0.5' => '0.5',
					'1' => '1',				
					'1.5' => '1.5',				
					'2' => '2',				
					'2.5' => '2.5',
					'3' => '3',
					'3.5' => '3.5',
					'4' => '4',												
					'4.5' => '4.5',								
					'5' => '5',								
				),
				'multiple' => false,
			),

	/*
	// CRITERIA 1	
	*/
			array(
				'name'  => __('Criteria #1 Name', 'color-theme-framework'),
				'id'    => "{$prefix}criteria1_name",
				'desc'  => __('Enter name for Criteria #1', 'color-theme-framework'),
				'type'  => 'text',
				'std'   => __('Criteria #1', 'color-theme-framework'),
				'clone' => false,
			),	

			array(
				'name'     => __('Criteria #1 Score', 'color-theme-framework'),
				'id'       => "{$prefix}criteria1_score",
				'type'     => 'select',
				'std'		=> __('Select Score', 'color-theme-framework'),
				'options'  => array(
					'0' => '0',
					'0.5' => '0.5',
					'1' => '1',				
					'1.5' => '1.5',				
					'2' => '2',				
					'2.5' => '2.5',
					'3' => '3',
					'3.5' => '3.5',
					'4' => '4',												
					'4.5' => '4.5',								
					'5' => '5',								
				),
				'multiple' => false,
			),

	/*
	// CRITERIA 2	
	*/
			array(
				'name'  => __('Criteria #2 Name', 'color-theme-framework'),
				'id'    => "{$prefix}criteria2_name",
				'desc'  => __('Enter name for Criteria #2', 'color-theme-framework'),
				'type'  => 'text',
				'std'   => __('Criteria #2', 'color-theme-framework'),
				'clone' => false,
			),	

			array(
				'name'     => __('Criteria #2 Score', 'color-theme-framework'),
				'id'       => "{$prefix}criteria2_score",
				'type'     => 'select',
				'std'		=> __('Select Score', 'color-theme-framework'),
				'options'  => array(
					'0' => '0',
					'0.5' => '0.5',
					'1' => '1',				
					'1.5' => '1.5',				
					'2' => '2',				
					'2.5' => '2.5',
					'3' => '3',
					'3.5' => '3.5',
					'4' => '4',												
					'4.5' => '4.5',								
					'5' => '5',								
				),
				'multiple' => false,
			),

	/*
	// CRITERIA 3	
	*/
			array(
				'name'  => __('Criteria #3 Name', 'color-theme-framework'),
				'id'    => "{$prefix}criteria3_name",
				'desc'  => __('Enter name for Criteria #3', 'color-theme-framework'),
				'type'  => 'text',
				'std'   => __('Criteria #3', 'color-theme-framework'),
				'clone' => false,
			),	

			array(
				'name'     => __('Criteria #3 Score', 'color-theme-framework'),
				'id'       => "{$prefix}criteria3_score",
				'type'     => 'select',
				'std'		=> __('Select Score', 'color-theme-framework'),
				'options'  => array(
					'0' => '0',
					'0.5' => '0.5',
					'1' => '1',				
					'1.5' => '1.5',				
					'2' => '2',				
					'2.5' => '2.5',
					'3' => '3',
					'3.5' => '3.5',
					'4' => '4',												
					'4.5' => '4.5',								
					'5' => '5',								
				),
				'multiple' => false,
			),

	/*
	// CRITERIA 4	
	*/
			array(
				'name'  => __('Criteria #4 Name', 'color-theme-framework'),
				'id'    => "{$prefix}criteria4_name",
				'desc'  => __('Enter name for Criteria #4', 'color-theme-framework'),
				'type'  => 'text',
				'std'   => __('Criteria #4', 'color-theme-framework'),
				'clone' => false,
			),	

			array(
				'name'     => __('Criteria #4 Score', 'color-theme-framework'),
				'id'       => "{$prefix}criteria4_score",
				'type'     => 'select',
				'std'		=> __('Select Score', 'color-theme-framework'),
				'options'  => array(
					'0' => '0',
					'0.5' => '0.5',
					'1' => '1',				
					'1.5' => '1.5',				
					'2' => '2',				
					'2.5' => '2.5',
					'3' => '3',
					'3.5' => '3.5',
					'4' => '4',												
					'4.5' => '4.5',								
					'5' => '5',								
				),
				'multiple' => false,
			),
	/*
	// CRITERIA 5	
	*/
			array(
				'name'  => __('Criteria #5 Name', 'color-theme-framework'),
				'id'    => "{$prefix}criteria5_name",
				'desc'  => __('Enter name for Criteria #5', 'color-theme-framework'),
				'type'  => 'text',
				'std'   => __('Criteria #5', 'color-theme-framework'),
				'clone' => false,
			),	

			array(
				'name'     => __('Criteria #5 Score', 'color-theme-framework'),
				'id'       => "{$prefix}criteria5_score",
				'type'     => 'select',
				'std'		=> __('Select Score', 'color-theme-framework'),
				'options'  => array(
					'0' => '0',
					'0.5' => '0.5',
					'1' => '1',				
					'1.5' => '1.5',				
					'2' => '2',				
					'2.5' => '2.5',
					'3' => '3',
					'3.5' => '3.5',
					'4' => '4',												
					'4.5' => '4.5',								
					'5' => '5',								
				),
				'multiple' => false,
			),

			// TEXTAREA
			array(
				'name' => __('Summary', 'color-theme-framework'),
				'desc' => __('Enter your text', 'color-theme-framework'),
				'id'   => "{$prefix}summary",
				'type' => 'textarea',
				'cols' => '20',
				'rows' => '3',
			),
				
		)
	);
	return $meta_boxes;
}