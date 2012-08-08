<?php


if ( ! isset( $content_width ) )
	$content_width  = '590';


/**
* Add Menu Support
**/

add_theme_support('automatic-feed-links');
register_nav_menu('main', 'Main Nav');

/**
* Add editor style - recommended according to Theme-Check
**/
add_editor_style('editor-style.css');


/**
* Add custom background	with custom background colour fix 
* as shown here: http://devpress.com/blog/custom-background-fix-for-theme-developers/
**/

add_custom_background( 'grisaille_custom_background_callback' );

function grisaille_custom_background_callback() {

	/* Get the background image. */
	$image = get_background_image();

	/* If there's an image, just call the normal WordPress callback. We won't do anything here. */
	if ( !empty( $image ) ) {
		_custom_background_cb();
		return;
	}

	/* Get the background color. */
	$color = get_background_color();

	/* If no background color, return. */
	if ( empty( $color ) )
		return;

	/* Use 'background' instead of 'background-color'. */
	$style = "background: #{$color};";

?>
<style type="text/css">body { <?php echo trim( $style ); ?> }</style>
<?php

}

/**
* Add custom header
**/

define('HEADER_TEXTCOLOR', '334759');
define('HEADER_IMAGE', ''); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 960); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 200);

// gets included in the site header

function grisaille_header_style() {

    ?><style type="text/css">
        #site-title {
			 background: url(<?php header_image(); ?>) 0 0 no-repeat;
			 min-height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
	 	}
		#site-title h1 a {
		 	color:#<?php header_textcolor(); ?> ;
        }
		#site-description {
			color:#<?php header_textcolor(); ?> ;
		}
 		<?php if ( 'blank' == get_header_textcolor() ) { ?>
		#site-title h1 a , #site-description {
			display:block;
			text-indent:-99999px;
		}
					
<?php } ?>
</style>
<?php
}
// gets included in the admin header
function grisaille_admin_header_style() {
    ?>
		<style type="text/css">
			@font-face {
			font-family: 'WoodenNickelBlackRegular';
    src: url('<?php echo get_template_directory_uri(); ?>/type/WOODENNI-webfont.eot?') format('eot'),
         url('<?php echo get_template_directory_uri(); ?>/type/WOODENNI-webfont.woff') format('woff'),
         url('<?php echo get_template_directory_uri(); ?>/type/WOODENNI-webfont.ttf') format('truetype'),
         url('<?php echo get_template_directory_uri(); ?>/type/WOODENNI-webfont.svg#webfontDYhQeecV') format('svg');
    font-weight: normal;
    font-style: normal;
}

		#headimg h1 {
			margin-bottom: 0;
        }
		#headimg h1 a{
			font:80px WoodenNickelBlackRegular, "Times New Roman", Times, serif;
			padding-left: 30px;
			text-transform:uppercase;
			text-decoration:none;
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
		#desc {
			font:26px  Geneva, Verdana, sans-serif;
   			padding-left: 30px;
    	}
    </style><?php
}
add_custom_image_header('grisaille_header_style', 'grisaille_admin_header_style');

/**
* Change Excerpt length
**/
function grisaille_new_excerpt_length($length) {
	return 20;
}
add_filter('excerpt_length', 'grisaille_new_excerpt_length');

/**
* Change excerpt [...] to something else
**/

function grisaille_new_excerpt_more($more) {
    global $post;
	return '<br /><a class="more-link" href="'. get_permalink($post->ID) . '">keep reading</a>';
}
add_filter('excerpt_more', 'grisaille_new_excerpt_more');

/**
* Thumbnail support
**/

add_theme_support( 'post-thumbnails' );  
set_post_thumbnail_size( 590, 275, true ); // 590 pixels wide by 275 pixels tall, hard crop mode
add_image_size( 'following-post-thumbnails', 250, 200, true ); // 250 pixels wide by 200 pixels tall, hard crop mode

// THIS LINKS THE THUMBNAIL TO THE POST PERMALINK
add_filter( 'post_thumbnail_html', 'grisaille_post_image_html', 10, 3 );
function grisaille_post_image_html( $html, $post_id, $post_image_id ) {

	$html = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_post_field( 'post_title', $post_id ) ) . '">' . $html . '</a>';

	return $html;
}
 
/**
* checks if the visitor is browsing either a page or a post and adds the 
* JavaScript required for threaded comments if they are
**/
function grisaille_queue_js(){
  if (!is_admin()){
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
      wp_enqueue_script( 'comment-reply' );
  }
}
add_action('get_header', 'grisaille_queue_js');


/**
* register_sidebar()
**/

add_action( 'widgets_init', 'grisaille_register_sidebars' );

function grisaille_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'grisaillesidebar',
			'name' => __( 'Grisaille Sidebar', 'grisaille' ),
			'description' => __( 'Main right sidebar.', 'grisaille' ),
			'before_widget' => '<div class="sidebaritem">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}	

/**
* Load the Theme Options Page for social media icons
*/
require_once ( get_template_directory() . '/inc/theme-options.php' );


	
?>