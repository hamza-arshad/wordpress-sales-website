<?php

/**
 * Appearance Tab for Themify Custom Panel
 *
 * @since 1.0.0
 *
 * @return array
 */
function themify_theme_page_appearance_meta_box() {
	return array(
		
		// Header Wrap
		array(
			'name'          => 'header_wrap',
			'title'         => __( 'Header Background', 'themify' ),
			'description'   => '',
			'type'          => 'radio',
			'show_title'    => true,
			'meta'          => array(
				array(
					'value'    => 'solid',
					'name'     => __( 'Solid Background', 'themify' ),
					'selected' => true
				),
				array(
					'value' => 'transparent',
					'name'  => __( 'Transparent Background', 'themify' )
				),
			),
			'enable_toggle' => true,
			'class'     => 'hide-if none',
		),
		// Background Color
		array(
			'name'        => 'background_color',
			'title'       => '',
			'description' => '',
			'type'        => 'color',
			'meta'        => array( 'default' => null ),
			'toggle'      => 'solid-toggle',
			'class'     => 'hide-if none',
		),
		// Background image
		array(
			'name'        => 'background_image',
			'title'       => '',
			'type'        => 'image',
			'description' => '',
			'meta'        => array(),
			'before'      => '',
			'after'       => '',
			'toggle'      => 'solid-toggle',
			'class'     => 'hide-if none',
		),
		// Background repeat
		array(
			'name'        => 'background_repeat',
			'title'       => '',
			'description' => __( 'Background Repeat', 'themify' ),
			'type'        => 'dropdown',
			'meta'        => array(
				array(
					'value' => 'fullcover',
					'name'  => __( 'Fullcover', 'themify' )
				),
				array(
					'value' => 'repeat',
					'name'  => __( 'Repeat', 'themify' )
				),
				array(
					'value' => 'repeat-x',
					'name'  => __( 'Repeat horizontally', 'themify' )
				),
				array(
					'value' => 'repeat-y',
					'name'  => __( 'Repeat vertically', 'themify' )
				),
			),
			'toggle'      => 'solid-toggle',
			'class'     => 'hide-if none',
		),
		// Header wrap text color
		array(
			'name'        => 'headerwrap_text_color',
			'title'       => __( 'Header Text Color', 'themify' ),
			'description' => '',
			'type'        => 'color',
			'meta'        => array( 'default' => null ),
			'class'     => 'hide-if none',
		),
		// Header wrap link color
		array(
			'name'        => 'headerwrap_link_color',
			'title'       => __( 'Header Link Color', 'themify' ),
			'description' => '',
			'type'        => 'color',
			'meta'        => array( 'default' => null ),
			'class'     => 'hide-if none',
		),
            
                // Separator
		array(
			'name' => 'page_title_background',
			'type' => 'separator',
		),
                // Background Color
		array(
			'name'        => 'page_title_background_color',
			'title' => __( 'Page Title Background', 'themify' ).'&nbsp;',
			'description' => '',
			'type'        => 'color',
			'meta'        => array( 'default' => null ),
		),
		// Background image
		array(
			'name'        => 'page_title_background_image',
			'title'       => '',
			'type'        => 'image',
			'description' => '',
			'meta'        => array(),
			'before'      => '',
			'after'       => '',
		),
	);
}

/**
 * Page Meta Box Options
 * @param array $args
 * @return array
 * @since 1.0.7
 */
function themify_theme_page_meta_box( $args = array() ) {
	return array(
                // Page Sub Heading
		array(
			'name' 		=> 'page_sub_heading',
			'title'		=> __('Page Sub Heading', 'themify'),
			'description'	=> '',
			'type'		=> 'textarea'
		),
		// Page Layout
		array(
			'name' 		=> 'page_layout',
			'title'		=> __('Sidebar Option', 'themify'),
			'description'	=> '',
			'type'		=> 'layout',
			'show_title' => true,
			'meta'		=> array(
				array('value' => 'default', 'img' => 'images/layout-icons/default.png', 'title' => __('Default', 'themify')),
				array('value' => 'sidebar1', 'img' => 'images/layout-icons/sidebar1.png', 'title' => __('Sidebar Right', 'themify')),
				array('value' => 'sidebar1 sidebar-left', 'img' => 'images/layout-icons/sidebar1-left.png', 'title' => __('Sidebar Left', 'themify')),
				array('value' => 'sidebar-none', 'img' => 'images/layout-icons/sidebar-none.png', 'selected' => true, 'title' => __('No Sidebar ', 'themify'))
			)
		),
		// Content Width
		array(
			'name'=> 'content_width',
			'title' => __('Content Width', 'themify'),
			'description' => '',
			'type' => 'layout',
			'show_title' => true,
			'meta' => array(
				array(
					'value' => 'default_width',
					'img' => 'themify/img/default.png',
					'selected' => true,
					'title' => __( 'Default', 'themify' )
				),
				array(
					'value' => 'full_width',
					'img' => 'themify/img/fullwidth.png',
					'title' => __( 'Fullwidth', 'themify' )
				)
			)
		),
		// Hide page title
		array(
			'name' 		=> 'hide_page_title',
			'title'		=> __('Hide Page Title', 'themify'),
			'description'	=> '',
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		),
		// Custom menu for page
		array(
			'name' 		=> 'custom_menu',
			'title'		=> __('Custom Menu', 'themify'),
			'description'	=> '',
			'type'		=> 'dropdown',
			'meta'		=> $args['nav_menus'], // extracted from $args
		),
	);
}

/**
 * Query Posts Options
 * @param array $args
 * @return array
 * @since 1.0.7
 */
function themify_theme_query_post_meta_box( $args = array() ) {
	extract( $args );
	return array(
		// Notice
		array(
			'name' => '_query_posts_notice',
			'title' => '',
			'description' => '',
			'type' => 'separator',
			'meta' => array(
				'html' => '<div class="themify-info-link">' . sprintf( __( '<a href="%s">Query Posts</a> allows you to query WordPress posts from any category on the page. To use it, select a Query Category.', 'themify' ), 'http://themify.me/docs/query-posts' ) . '</div>'
			),
		),
		// Query Category
		array(
			'name' 		=> 'query_category',
			'title'		=> __('Query Category', 'themify'),
			'description'	=> __('Select a category or enter multiple category IDs (eg. 2,5,6). Enter 0 to display all category.', 'themify'),
			'type'		=> 'query_category',
			'meta'		=> array()
		),
		// Descending or Ascending Order for Posts
		array(
			'name' 		=> 'order',
			'title'		=> __('Order', 'themify'),
			'description'	=> '',
			'type'		=> 'dropdown',
			'meta'		=> array(
				array('name' => __('Descending', 'themify'), 'value' => 'desc', 'selected' => true),
				array('name' => __('Ascending', 'themify'), 'value' => 'asc')
			)
		),
		// Criteria to Order By
		array(
			'name' 		=> 'orderby',
			'title'		=> __('Order By', 'themify'),
			'description'	=> '',
			'type'		=> 'dropdown',
			'meta'		=> array(
				array('name' => __('Date', 'themify'), 'value' => 'date', 'selected' => true),
				array('name' => __('Random', 'themify'), 'value' => 'rand'),
				array('name' => __('Author', 'themify'), 'value' => 'author'),
				array('name' => __('Post Title', 'themify'), 'value' => 'title'),
				array('name' => __('Comments Number', 'themify'), 'value' => 'comment_count'),
				array('name' => __('Modified Date', 'themify'), 'value' => 'modified'),
				array('name' => __('Post Slug', 'themify'), 'value' => 'name'),
				array('name' => __('Post ID', 'themify'), 'value' => 'ID')
			)
		),
		// Post Layout
		array(
			'name' 		=> 'layout',
			'title'		=> __('Query Post Layout', 'themify'),
			'description'	=> '',
			'type'		=> 'layout',
			'show_title' => true,
			'meta'		=> array(
				array('value' => 'list-post', 'img' => 'images/layout-icons/list-post.png', 'selected' => true, 'title' => __('List Post', 'themify')),
				array('value' => 'grid4', 'img' => 'images/layout-icons/grid4.png', 'title' => __('Grid 4', 'themify')),
				array('value' => 'grid3', 'img' => 'images/layout-icons/grid3.png', 'title' => __('Grid 3', 'themify')),
				array('value' => 'grid2', 'img' => 'images/layout-icons/grid2.png', 'title' => __('Grid 2', 'themify')),
			)
		),
		// Posts Per Page
		array(
			'name' 		=> 'posts_per_page',
			'title'		=> __('Posts Per Page', 'themify'),
			'description'	=> '',
			'type'		=> 'textbox',
			'meta'		=> array('size' => 'small')
		),
		// Display Content
		array(
			'name' 		=> 'display_content',
			'title'		=> __('Display Content', 'themify'),
			'description'	=> '',
			'type'		=> 'dropdown',
			'meta'		=> array(
				array('name' => __('Full Content', 'themify'),'value'=>'content','selected'=>true),
				array('name' => __('Excerpt', 'themify'),'value'=>'excerpt'),
				array('name' => __('None', 'themify'),'value'=>'none')
			)
		),
		// Featured Image Size
		array(
			'name'	=>	'feature_size_page',
			'title'	=>	__('Image Size', 'themify'),
			'description' => sprintf(__('Image sizes can be set at <a href="%s">Media Settings</a> and <a href="%s">Regenerated</a>', 'themify'), 'options-media.php', 'admin.php?page=regenerate-thumbnails'),
			'type'		 =>	'featimgdropdown'
		),
		// Multi field: Image Dimension
		themify_image_dimensions_field(),
		// Hide Title
		array(
			'name' 		=> 'hide_title',
			'title'		=> __('Hide Post Title', 'themify'),
			'description'	=> '',
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		),
		// Unlink Post Title
		array(
			'name' 		=> 'unlink_title',
			'title' 		=> __('Unlink Post Title', 'themify'),
			'description' => __('Unlink post title (it will display the post title without link)', 'themify'),
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		),
		// Hide Post Date
		array(
			'name' 		=> 'hide_date',
			'title'		=> __('Hide Post Date', 'themify'),
			'description'	=> '',
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		),
		// Multi field: Hide Post Meta
		themify_multi_meta_field(),
		// Media Above/Below Title
		array(
			'name' 		=> 'media_position',
			'title'		=> __('Media Position', 'themify'),
			'description'	=> '',
			'type' 		=> 'dropdown',			
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'below', 'name' => __('Below Post Title', 'themify')),
				array('value' => 'above', 'name' => __('Above Post Title', 'themify')),
			)
		),
		// Hide Post Image
		array(
			'name' 		=> 'hide_image',
			'title' 		=> __('Hide Featured Image', 'themify'),
			'description' => '',
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		),
		// Unlink Post Image
		array(
			'name' 		=> 'unlink_image',
			'title' 		=> __('Unlink Featured Image', 'themify'),
			'description' => __('Display the Featured Image without link', 'themify'),
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		),
		// Page Navigation Visibility
		array(
			'name' 		=> 'hide_navigation',
			'title'		=> __('Hide Page Navigation', 'themify'),
			'description'	=> '',
			'type' 		=> 'dropdown',
			'meta'		=> array(
				array('value' => 'default', 'name' => '', 'selected' => true),
				array('value' => 'yes', 'name' => __('Yes', 'themify')),
				array('value' => 'no',	'name' => __('No', 'themify'))
			)
		)
	);
}

/**
 * Default Page Layout Module
 * @param array $data Theme settings data
 * @return string Markup for module.
 * @since 1.0.0
 */
function themify_default_page_layout($data = array()){
	$data = themify_get_data();

	/**
	 * Theme Settings Option Key Prefix
	 * @var string
	 */
	$prefix = 'setting-default_page_';

	/**
	 * Sidebar placement options
	 * @var array
	 */
	$sidebar_location_options = array(
		array('value' => 'sidebar1', 'img' => 'images/layout-icons/sidebar1.png', 'title' => __('Sidebar Right', 'themify')),
		array('value' => 'sidebar1 sidebar-left', 'img' => 'images/layout-icons/sidebar1-left.png', 'title' => __('Sidebar Left', 'themify')),
		array('value' => 'sidebar-none', 'img' => 'images/layout-icons/sidebar-none.png', 'selected' => true, 'title' => __('No Sidebar', 'themify'))
	);

	/**
	 * Tertiary options <blank>|yes|no
	 * @var array
	 */
	$default_options = array(
		array('name' => '', 'value' => ''),
		array('name' => __('Yes', 'themify'), 'value' => 'yes'),
		array('name' => __('No', 'themify'), 'value' => 'no')
	);

	/**
	 * Module markup
	 * @var string
	 */
	$output = '';

	/**
	 * Page sidebar placement
	 */
	$output .= '<p>
					<span class="label">' . __('Page Sidebar Option', 'themify') . '</span>';
	$val = themify_get( $prefix.'layout' );
	foreach ( $sidebar_location_options as $option ) {
		if ( ( '' == $val || ! $val || ! isset( $val ) ) && ( isset( $option['selected'] ) && $option['selected'] ) ) {
			$val = $option['value'];
		}
		if ( $val == $option['value'] ) {
			$class = 'selected';
		} else {
			$class = '';
		}
		$output .= '<a href="#" class="preview-icon '.$class.'" title="'.$option['title'].'"><img src="'.THEME_URI.'/'.$option['img'].'" alt="'.$option['value'].'"  /></a>';
	}
	$output .= '<input type="hidden" name="'.$prefix.'layout" class="val" value="'.$val.'" /></p>';

	/**
	 * Hide Title in All Pages
	 */
	$output .= '<p>
					<span class="label">' . __('Hide Title in All Pages', 'themify') . '</span>
					<select name="setting-hide_page_title">'.
						themify_options_module($default_options, 'setting-hide_page_title') . '
					</select>
				</p>';

	/**
	 * Page Comments
	 */
	$pre = 'setting-comments_pages';
	$pages_checked = themify_check( $pre ) ? 'checked="checked"': '';

	$output .= '<p><span class="label">' . __('Page Comments', 'themify') . '</span><label for="'.$pre.'"><input type="checkbox" id="'.$pre.'" name="'.$pre.'" '.$pages_checked.' /> ' . __('Disable comments in all Pages', 'themify') . '</label></p>';

	return $output;
}