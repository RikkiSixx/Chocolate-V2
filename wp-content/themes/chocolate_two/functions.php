<?php

add_action( 'after_setup_theme', 'chocolate_setup' );
	function chocolate_setup() {

		// Definitions
		define( 'THEME_SLUG', get_template() );
		define( 'THEME_LIBRARY', TEMPLATEPATH . '/library' );

		// Library files
		require_once( THEME_LIBRARY . '/theme-options.php');

		load_theme_textdomain( 'chocolate', get_template_directory() . '/languages' );

		// Support
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'post-thumbnails' );				
		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 640;

		register_nav_menus(
			array( 'main-menu' => __( 'Main Menu', 'chocolate' ) )
		);

		// Objects
		add_action( 'init', 'theme_post_types_init' );
		add_action( 'init', 'theme_taxonomies_init' );
	}

add_action( 'wp_enqueue_scripts', 'chocolate_load_scripts' );
	function chocolate_load_scripts() {
		wp_enqueue_script( 'jquery' );
	}

add_action( 'comment_form_before', 'chocolate_enqueue_comment_reply_script' );
	function chocolate_enqueue_comment_reply_script() {
		if ( get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}

add_filter( 'the_title', 'chocolate_title' );
	function chocolate_title( $title ) {
		if ( $title == '' ) {
			return '&rarr;';
		} else {
			return $title;
		}
	}

add_filter( 'wp_title', 'chocolate_filter_wp_title' );
	function chocolate_filter_wp_title( $title ) {
		return $title . esc_attr( get_bloginfo( 'name' ) );
	}

add_action( 'widgets_init', 'chocolate_widgets_init' );
	function chocolate_widgets_init() {
		register_sidebar( array (
			'name' => __( 'Sidebar Widget Area', 'chocolate' ),
			'id' => 'primary-widget-area',
			'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
			'after_widget' => "</li>",
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}



/* SETUP HELPERS
--------------------------------------------------------------------------------*/

/* THEME OBJECTS
----------------------------------------*/

function theme_post_types_init() {
	register_post_type( 
		'project',
		array(
			'labels' => array(			
				'name' => __( 'Projects', THEME_SLUG ),
				'singular_name' => __( 'Project', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Project', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Project', THEME_SLUG ),
				'new_item' => __( 'New Project', THEME_SLUG ),
				'view' => __( 'View Project', THEME_SLUG ),
				'view_item' => __( 'View Project', THEME_SLUG ),
				'search_items' => __( 'Search Projects', THEME_SLUG ),
				'not_found' => __( 'No projects found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No projects found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Project', THEME_SLUG  )				
			),
			'description' => __( 'Projects are case studies of client work.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-admin-post',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'comments',
				'trackbacks',
				'author',
				'revisions'
			),
			'rewrite' => array(		
				'slug' => __('projects', THEME_SLUG),
			),
		)
	);

	/*
	register_taxonomy(
		'example',
		array( 'post' ),
		array(
			'public' => true,
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Examples', 'seed' ),
				'singular_name' => __( 'Example', 'seed' ),
				'search_items' => __( 'Search Examples', 'seed' ),
				'popular_items' => __( 'Popular Examples', 'seed' ),
				'all_items' => __( 'All Examples', 'seed' ),
				'parent_item' => __( 'Parent Example', 'seed' ),
				'parent_item_colon' => __( 'Parent Example:', 'seed' ),
				'edit_item' => __( 'Edit Example', 'seed' ),
				'update_item' => __( 'Update Example', 'seed' ),
				'add_new_item' => __( 'Add New Example', 'seed' ),
				'new_item_name' => __( 'New Example Name', 'seed' ),
			),
			'rewrite' => true,
		)
	);
	*/
}


function theme_taxonomies_init() {
	
}


require get_template_directory() . '/inc/template-tags.php'; // Custom template tags for this theme.
require get_template_directory() . '/inc/custom-header.php'; // Custom header image




function chocolate_custom_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

add_filter( 'get_comments_number', 'chocolate_comments_number' );
function chocolate_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}