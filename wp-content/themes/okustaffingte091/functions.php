<?php
/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 300,
        'flex-height' => true,
        'flex-width' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu', 'twentysixteen' ),
		'secondary' => __( 'Secondary Navigation', 'twentysixteen' ),
		'third'     => __( 'Third Navigation', 'twentysixteen' ),
		'fourth'    => __( 'Fourth Navigation', 'twentysixteen' ),
		'fifth'     => __( 'Fifth Navigation', 'twentysixteen' ),
		'footer-menu' => __( 'Footer Menu', 'twentysixteen' ),
	) );
	

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'twentysixteen_content_width', 840 );
}
add_action( 'after_setup_theme', 'twentysixteen_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Header Information', 'twentyten' ),
		'id' => 'header_info',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar( array(
		'name' => __( 'Banner Information', 'twentyten' ),
		'id' => 'bnr_info',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'name' => __( 'Middle Information', 'twentyten' ),
		'id' => 'mid_info',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'name' => __( 'Middle Information Box1', 'twentyten' ),
		'id' => 'mid_box1',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box2', 'twentyten' ),
		'id' => 'mid_box2',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box3', 'twentyten' ),
		'id' => 'mid_box3',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box4', 'twentyten' ),
		'id' => 'mid_box4',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box5', 'twentyten' ),
		'id' => 'mid_box5',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box6', 'twentyten' ),
		'id' => 'mid_box6',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box7', 'twentyten' ),
		'id' => 'mid_box7',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));register_sidebar( array(
		'name' => __( 'Middle Information Box8', 'twentyten' ),
		'id' => 'mid_box8',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));
	
	register_sidebar( array(
		'name' => __( 'Middle Information Boxes1', 'twentyten' ),
		'id' => 'mid_boxes1',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));	register_sidebar( array(
		'name' => __( 'Middle Information Boxes2', 'twentyten' ),
		'id' => 'mid_boxes2',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'name' => __( 'Main Extra Information', 'twentyten' ),
		'id' => 'main_box',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));
	
	register_sidebar( array(
		'name' => __( 'Bottom 1 Information', 'twentyten' ),
		'id' => 'btm1_info',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'name' => __( 'Bottom 3 Information', 'twentyten' ),
		'id' => 'btm3_info',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));
	
	register_sidebar( array(
		'name' => __( 'Contact Information', 'twentyten' ),
		'id' => 'contact_info_heading',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'name' => __( 'Contact Information List p', 'twentyten' ),
		'id' => 'contact_info_list',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

	register_sidebar( array(
		'name' => __( 'Contact Information List1', 'twentyten' ),
		'id' => 'contact_info_list1',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));	register_sidebar( array(
		'name' => __( 'Contact Information List2', 'twentyten' ),
		'id' => 'contact_info_list2',
		'description' => __( 'The primary widget area', 'twentyten' ),
		'before_widget' => '<div class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

//Added Footer Social 
	register_sidebar([
		'name' => 'Footer Social Links',
		'id' => 'footer-social-links',
		'before_widget' => '<div class="social-icons">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	]);
}
add_action( 'widgets_init', 'twentysixteen_widgets_init' );

if ( ! function_exists( 'twentysixteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Sixteen.
 *
 * Create your own twentysixteen_fonts_url() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentysixteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentysixteen' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function enqueue_twentysixteen_assets() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('media-style', get_template_directory_uri() . '/css/media.css');
    wp_enqueue_style('fontawesome6', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    wp_enqueue_style('fontawesome4', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Orbitron:wght@400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', [], null);
}
add_action('wp_enqueue_scripts', 'enqueue_twentysixteen_assets');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'twentysixteen_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10 , 3 );



/* Function for twentysixteen from twentyten
*
* Start ------------------------------------------------------------------------------------------------------>
**/

if ( ! function_exists( 'twentyten_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'twentyten' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;


/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Twenty Ten 1.0
 * @return string "Continue Reading" link
 */
function twentyten_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and twentyten_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Twenty Ten 1.0
 * @return string An ellipsis
 */
function twentyten_auto_excerpt_more( $more ) {
	return ' &hellip;' . twentyten_continue_reading_link();
}
add_filter( 'excerpt_more', 'twentyten_auto_excerpt_more' );

/**
*
* Force WP to read php function on widgets.
*
**/
function php_execute($html){
	if(strpos($html,"<"."?php")!==false){ ob_start(); eval("?".">".$html);
		$html=ob_get_contents();
		ob_end_clean();
	}
		return $html;
}
add_filter('widget_text','php_execute',100);
add_filter('classic_widget_text','php_execute',100);

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Twenty Sixteen 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function twentysixteen_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentysixteen_widget_tag_cloud_args' );

/** End Function for twentysixteen from twentyten **/

/** Start of WordPress Team Used Functions **/

function get_includes( $name = null ) {
	do_action( 'get_includes', $name );

	$templates = array();
	$name = (string) $name;
	$templates[] = "includes/{$name}.php";

	// Backward compat code will be removed in a future release
	if ('' == locate_template($templates, true))
		load_template( ABSPATH . WPINC . '/theme-compat/sidebar.php');
}

function getcontenturl( $atts ) {
    $return = '';
    switch($atts['type']){
        case 'templateurl':
            $return = get_template_directory_uri();
        break;
        case 'siteurl':
            $return = site_url($atts['page']);
        break;
        default:
            $return = home_url();
        break;
    }
    return $return;
}
add_shortcode( 'contenturl', 'getcontenturl' );

/* Search Result Pagination*/

function kriesi_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<a class='current'>".$i."</a>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</div>\n";
     }
}

update_option( 'posts_per_page', 6 );

if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function twentyten_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
    ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
  <div id="comment-<?php comment_ID(); ?>">
    <div class="comment-author vcard">
      <!-- <//?php echo get_avatar( $comment, 40 ); ?> -->
      <?php printf( __( '%s <span class="says"></span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
    </div><!-- .comment-author .vcard -->
    <?php if ( $comment->comment_approved == '0' ) : ?>
    <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
    <br />
    <?php endif; ?>

    <div class="comment-meta commentmetadata"><a
        href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php
                /* translators: 1: date, 2: time */
                printf( __( '%1$s', 'twentyten' ), get_comment_date()); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
            ?>
    </div><!-- .comment-meta .commentmetadata -->

    <div class="comment-body"><?php comment_text(); ?></div>

    <div class="reply">
      <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
  </div><!-- #comment-##  -->

  <?php
            break;
        case 'pingback'  :
        case 'trackback' :
    ?>
<li class="post pingback">
  <p><?php _e( 'Pingback:', 'twentyten' ); ?>
    <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
  <?php
            break;
    endswitch;
}
endif;
/* End Result Pagination*/

/* Start Featured Image Thumbnail*/

add_filter( 'post_thumbnail_size', function( $size )
 {
     if( is_string( $size ) && 'full' === $size )
         add_filter(
             'wp_calculate_image_srcset_meta',
              '__return_null_and_remove_current_filter'
         );
    return $size;
 } );

// Would be handy, in this example, to have this as a core function ;-)
function __return_null_and_remove_current_filter ( $var )
{
    remove_filter( current_filter(), __FUNCTION__ );
    return null;
}
/* End Featured Image Thumbnail*/

/* Start for Remove Emoji Warning */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
/* End for Remove Emoji Warning */

/* Start for recent_comments Warning */
add_filter( 'show_recent_comments_widget_style', '__return_false', 99 );

//remove wp-embed warning
function my_deregister_scripts(){
  wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );
/* End for recent_comments Warning */

/*Start permalink settings*/
function reset_permalinks() {
    global $wp_rewrite;
    $wp_rewrite->set_permalink_structure( '/%postname%' );
}
add_action( 'init', 'reset_permalinks' );
/*End permalink settings*/

/* Start for Forms Shortcode */
function form_shortcode($atts, $content = null){
    extract(shortcode_atts(array(
    "src" => '',
    "type" => null ?? 'template',
    "class" => '',
    ), $atts));
   
    $output = '';
    $output .= '<p>';
    $output .= '<iframe id="myframe" class="'.$class.'" src="'.get_template_directory_uri().'/forms/'.$type.'/'.$src.'"></iframe>';
    $output .= '</p>';
    return $output;
}
add_shortcode("form", "form_shortcode");
/* End for Forms Shortcode */

/*Start for Master Slider Auto Fit*/

function my_masterslider_panel_default_setting( $defaults ){
    $defaults['slideFillMode'] = 'fit';

    return $defaults;
}
add_filter( 'masterslider_panel_default_setting', 'my_masterslider_panel_default_setting' );

/*End Master Slider Auto Fit*/

/* Start of SEO H1 Shortcode */
function get_short_title( $atts ) {
  extract( shortcode_atts( array( 'id' => null, ), $atts ) );
  $pageTitle = new WP_Query( 'page_id='.$id );
  while ( $pageTitle->have_posts() ) {
      $pageTitle->the_post();
      $short_title= get_post_meta( get_the_ID(), 'Short Title',true );

            if ($short_title == '') {
                $block = '';
              echo $block;

            } else {
                $block = '<h1 class=h1_hdng>'.$short_title.'</h1>';
                echo $block;
            }
  }
  wp_reset_postdata();
}
add_shortcode( 'short_title', 'get_short_title' );
/* End of SEO H1 Shortcode */

/* Start of Page Intro Shortcode */
function get_page_intro( $atts ) {
  extract( shortcode_atts( array( 'id' => null, ), $atts ) );
  $pageIntro = new WP_Query( 'page_id='.$id );
  while ( $pageIntro->have_posts() ) {
      $pageIntro->the_post();
      $short_intro= get_post_meta( get_the_ID(), 'Page Intro',true );

            if ($short_intro == '') {
                $block = '';
              echo $block;

            } else {
                $block = '<div class=intro_txt>'.$short_intro.'</div>';
                echo $block;
            }

  }
  wp_reset_postdata();
}
add_shortcode( 'page_intro', 'get_page_intro' );
/* End of Page Intro Shortcode */

function query_page_title ($page_title ,$post_type='page') {
	return new WP_Query(array(
		'post_type' => $post_type,
		'title' => $page_title,
		'posts_per_page' => 1,
		'post_status' => 'any',
));
}

// delete Hello World! Post
$helloWorldPostquery = query_page_title('Hello world!', 'post');
if($helloWorldPostquery->have_posts() ) {
	$helloWorldPostquery->the_post();
	wp_delete_post( get_the_ID(), true );
}

// delete sample page
$samplePagequery = query_page_title('Sample Page');
if($samplePagequery->have_posts() ) {
	$samplePagequery->the_post();
	wp_delete_post( get_the_ID(), true );
}

function check_pages_live() {
	// to disable certain page from creating automatically just remove a page from array
	$pages_to_check = array('Home', 'Sitemap',);
	
	foreach ($pages_to_check as $page_title) {
			$query = query_page_title($page_title);

			// auto create pages from $pages_to_check if page is not found
			if (!$query->have_posts()) {
				create_pages_fly($page_title);
			}
	}
}
add_action('init','check_pages_live');

// comment this whole statement below in activating intro page or overriding static page
// set home page as static page ~~ Start
$homePagequery = query_page_title('Home');
if($homePagequery->have_posts() ) {
	$homePagequery->the_post();
	$home_id = get_the_ID();
	update_option( 'page_on_front', $home_id );
	update_option( 'show_on_front', 'page' );
}
//  ~~ End

function create_pages_fly($pageName) {
	$createPage = array(
		'post_title'    => $pageName,
		'post_content'  => '',
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type'     => 'page',
		'post_name'     => $pageName
	);

 // Insert the post into the database
 wp_insert_post( $createPage );
}

add_filter( 'post_thumbnail_size', function( $size )
{
		if( is_string( $size ) && 'full' === $size )
				add_filter(
						'wp_calculate_image_srcset_meta',
						 '__return_null_and_remove_current_filter'
				);
	 return $size;
} );

// Remove WordPress generator meta tag

// remove_filter( 'the_content', 'wpautop' );
// add_filter( 'the_content', 'wpautop' , 12);

function remove_generator_tag(){
	return'';
}
add_filter('the_generator', 'remove_generator_tag');


// Classic Widget Style

function classic_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'classic_theme_support' );

// Remove Login error message

add_filter('login_errors', function() {
		return 'Incorrect username or password';
	}
);

remove_action('wp_head', 'wp_generator');

/*Proweaver Scanner*/
function display_scan_buttons() {
    if(is_admin()) {
        global $pagenow;
        if($pagenow == 'tools.php') {
            $btm1 = get_template_directory_uri() . '/proweaver_scanner/index.php';
            echo "<script>
            window.onload = function(){
                function createLink(linkName, linkPath){
                    var a = document.createElement('a');
                    var link = document.createTextNode(linkName);
                    a.appendChild(link);
                    a.href = linkPath;
                    a.target = '_blank';
                    a.style.display = 'block';
                    document.querySelector('#wpbody-content').appendChild(a);
                }
                createLink('Scan PHP Files', '$btm1');
            }
            </script>";
        }
    }
}

display_scan_buttons();

/** End of WordPress Team Used Functions **/