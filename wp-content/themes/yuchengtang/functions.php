<?php
function is_mobile() {
	$useragent=$_SERVER['HTTP_USER_AGENT'];
	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
		return true;
	}
	return false;
}

function yct_theme_setup() {

	//load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	//add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */
	// 	add_theme_support( 'custom-logo', array(
	// 		'height'      => 240,
	// 		'width'       => 240,
	// 		'flex-height' => true,
	// 	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	// 	register_nav_menus( array(
	// 		'primary' => __( 'Primary Menu', 'twentysixteen' ),
	// 		'social'  => __( 'Social Links Menu', 'twentysixteen' ),
	// 	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	// 	add_theme_support( 'html5', array(
	// 		'search-form',
	// 		'comment-form',
	// 		'comment-list',
	// 		'gallery',
	// 		'caption',
	// 	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	// 	add_theme_support( 'post-formats', array(
	// 		'aside',
	// 		'image',
	// 		'video',
	// 		'quote',
	// 		'link',
	// 		'gallery',
	// 		'status',
	// 		'audio',
	// 		'chat',
	// 	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	//add_editor_style( array( 'css/editor-style.css', twentysixteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	//add_theme_support( 'customize-selective-refresh-widgets' );
}

add_action( 'after_setup_theme', 'yct_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function yct_theme_scripts() {
	//wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	//wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
//	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-1.12.3.min.js', array(), '1.12.3', false );
	wp_enqueue_script( 'jquery.zaccordion', get_template_directory_uri() . '/assets/js/jquery.zaccordion.min.js', array('jquery'), null, false);
	wp_enqueue_script( 'anime',  get_template_directory_uri() . '/assets/js/anime.min.js');
	wp_enqueue_style( 'yct-theme-style', get_stylesheet_uri() );
	
	if (!is_mobile()) {
		wp_enqueue_script( 'sly',  get_template_directory_uri() . '/assets/js/sly.min.js', ['jquery']);
		wp_enqueue_script( 'pagepiling',  get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.js', ['jquery']);
		wp_enqueue_style( 'pagepiling-style', get_template_directory_uri() . '/assets/js/pagepiling/jquery.pagepiling.min.css' );
	}
	//
}
add_action( 'wp_enqueue_scripts', 'yct_theme_scripts' );

function yct_content_image_sizes_attr( $sizes, $size ) {
// 	$width = $size[0];

// 	if ( 740 <= $width ) {
// 		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
// 	}

// 	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
// 		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
// 			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
// 		}
// 	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'yct_content_image_sizes_attr', 10, 2 );



function yct_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
// 	if ( is_archive() || is_search() || is_home() ) {
// 		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
// 	} else {
// 		$attr['sizes'] = '100vw';
// 	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'yct_post_thumbnail_sizes_attr', 10, 3 );


add_action('login_head', 'yct_login_logo');
add_filter('login_headerurl', create_function(false,"return get_bloginfo('siteurl');"));
add_filter('login_headertitle', create_function(false,"return get_bloginfo('description');"));

function yct_login_logo() {
	echo '<style type="text/css">' .
	'h1 a { height:153px!important; width: 200px!important;background-size:cover!important; background-image:url(' . get_bloginfo('template_directory') . '/assets/images/logo-yct.png)!important; }'.
	'</style>';
}

function yct_theme_body_classes( $classes ) {
	if (is_singular()) {
		global $post;
		$classes[] = $post->post_name;
		if (!in_array($post->post_name, ['frontpage'])) {
			$classes[] = 'bg-general';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'yct_theme_body_classes' );

/**
 * TinyMCE
 */
function add_mce_buttons_1($buttons) {
//	$buttons = array('newdocument','undo','redo','|','bold','italic','underline','strikethrough','|','justifyleft','justifycenter','justifyright','justifyfull','|','styleselect','formatselect','fontselect','fontsizeselect','wp_more','wp_adv');
	$buttons = array('undo','redo','|','bold','italic','underline','strikethrough','|','justifyleft','justifycenter','justifyright','justifyfull','|','styleselect','formatselect','fontselect','fontsizeselect','wp_more','wp_adv');
	return $buttons;
}

function add_mce_buttons_2($buttons) {
	$buttons = array('cut','copy','paste','pastetext','pasteword','|','search','replace','|','bullist','numlist','|','outdent','indent','blockquote','|','|','link','unlink','anchor','image','cleanup','code','|','forecolor','backcolor','hr','removeformat','|','sub','sup','|','spellchecker','charmap','fullscreen','wp_help');
	return $buttons;
}

add_filter("mce_buttons", "add_mce_buttons_1");
add_filter("mce_buttons_2", "add_mce_buttons_2");

/**
 * Autoload
 */
require_once(ABSPATH . '/vendor/autoload.php');

/**
 * Custom Plguins
 */
require_once('plugin-reservation.php');
