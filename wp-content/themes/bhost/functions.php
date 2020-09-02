<?php
/**
 * bhost functions and definitions
 *
 * @package bhost
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 770; /* pixels */
}

if ( ! function_exists( 'bhost_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bhost_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bhost, use a find and replace
	 * to change 'bhost' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bhost', get_template_directory() . '/languages' );
	
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'bhost' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bhost_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'post-thumb', 770,400, true );
}
endif; // bhost_setup
add_action( 'after_setup_theme', 'bhost_setup' );

define('BHOST_PRO_THEME_URL','https://www.codegrape.com/item/bhost-pro-responsive-wordpress-theme/8758','bhost');
define('BHOST_LIVE_DEMO','https://getmasum.com/themes-wp/bhost/','bhost');


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bhost_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'bhost' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside class="single-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );	
	
	register_sidebar( array(
		'name'          => __( 'Footer', 'bhost' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside class="col-sm-3"><div class="single-widget %2$s">',
		'after_widget'  => '</div></aside>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'bhost_widgets_init' );

/**
 * Google font For Bhost theme
 */
/**
 * register google fonts
 */
function bhost_fonts_url() {
	$bhost_google_fonts_url = add_query_arg( 'family', urlencode( 'Montserrat:400,500,600,700|Open Sans:400,400italic,600,700,700italic' ), "https://fonts.googleapis.com/css" );
	return $bhost_google_fonts_url;
}

/**
 * HTML5 Js file.
 */
 
function bhost_html5js(){ ?>
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
<?php }

add_action('wp_head' , 'bhost_html5js');

/**
 * Enqueue scripts and styles.
 */
function bhost_scripts() {
	// Add Open sanse font, used in the main stylesheet.
	wp_enqueue_style( 'google-fonts', bhost_fonts_url(), array(), null );
	wp_enqueue_style( 'bhost-bootstrap-css', get_template_directory_uri() .'/css/bootstrap.min.css' );
	wp_enqueue_style( 'bhost-meanmenu', get_template_directory_uri() .'/css/meanmenu.css' );
	wp_enqueue_style( 'bhost-font-awesome.min', get_template_directory_uri() .'/css/font-awesome.min.css' );
	wp_enqueue_style( 'bhost-style', get_stylesheet_uri() );
		
	wp_enqueue_script( 'bhost-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20120205', true );
	wp_enqueue_script( 'bhost-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
	wp_enqueue_script( 'bhost-jquery.meanmenu.min-js', get_template_directory_uri() . '/js/jquery.meanmenu.min.js', array(), '20130116', true );
	wp_enqueue_script( 'bhost-jquery.easing.min-js', get_template_directory_uri() . '/js/jquery.easing.min.js', array(), '20130117', true );
	wp_enqueue_script( 'bhost-custom-js', get_template_directory_uri() . '/js/custom.js', array(), '20130118', true );
		
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bhost_scripts' );

function bhost_wp_kses($val){
	return wp_kses($val, array(
	
	'p' => array(),
	'span' => array(),
	'div' => array(),
	'strong' => array(),
	'b' => array(),
	'br' => array(),
	'h1' => array(),
	'h2' => array(),
	'h3' => array(),
	'h4' => array(),
	'h5' => array(),
	'h6' => array(),
	'a'=> array('href' => array(),'target' => array()),
	'iframe'=> array('src' => array(),'height' => array(),'width' => array()),
	
	), '');
}

// modify search widget
function bhost_my_search_form( $form ) {
	$form = '
		
			
			<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url(home_url( '/' )) . '" >
				<div class="input-group">
					<input type="text" value="' . esc_attr(get_search_query()) . '" name="s" id="s" class="form-control search_field" placeholder="' . esc_attr__('Search...' , 'bhost') .'">
					<span class="input-group-btn">
						<button class="btn btn-default search_btn" type="submit"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			
		
        ';
	return $form;
}
add_filter( 'get_search_form', 'bhost_my_search_form' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load About Theme file.
 */
 
require get_template_directory() . '/inc/about-theme.php';

// comment list modify
function bhost_comments($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div class="single_comment clear">
		<div class="comment_title clear">
			<div class="comment_author_thumb">
				<?php if(get_comment_author_url()) {?>
				<a href="<?php esc_url(comment_author_url()); ?>"><?php echo get_avatar( $comment, 70 ); ?></a>
				<?php }else { ?>
					<?php echo get_avatar( $comment, 70 ); ?>
				<?php }?>
			</div>
			<div class="comment_info">
				<h4>
					<?php comment_author_link() ?>
					<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
				</h4>
				<div><?php comment_date('F j, Y'); ?> <?php esc_html_e('at' , 'bhost');?> <?php comment_date('g:i'); ?></div>
				<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php _e('Your comment is awaiting moderation.','bhost'); ?></em></p>
				<?php endif; ?>			
			</div>
		</div>	
		<div class="comment_text">
			<?php comment_text(); ?>
		</div>
			
	</div>													
</li>


<?php }
