<?php

/*
 *  Author: funcoders
 *  URL: funcoders.top
 *  Custom functions, support, custom post types and more.
 */


/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width)) {
    $content_width = 900;
}

if (function_exists('add_theme_support')) {

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    //load_theme_textdomain('davinci', get_template_directory() . '/languages');

    /*
     * This theme styles the visual editor to resemble the theme style,
     * specifically font, colors, icons, and column width.
     */
    add_editor_style( 'css/editor-style.css' );

}

add_theme_support( 'custom-header', array(
    'default-image'          => '',
    'random-default'         => false,
    'width'                  => 0,
    'height'                 => 0,
    'flex-height'            => false,
    'flex-width'             => false,
    'default-text-color'     => '', // function get_header_textcolor()
    'header-text'            => true,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
    'video'                  => false, // с 4.7
    'video-active-callback'  => 'is_front_page', // с 4.7
) );

add_theme_support( 'custom-background', array(
    'default-color'          => '',
    'default-image'          => '',
    'wp-head-callback'       => '_custom_background_cb',
    'admin-head-callback'    => '',
    'admin-preview-callback' => ''
) );

add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
    .hide-if-no-customize {
      display: none;
    }
  </style>';
}



/*------------------------------------*\
   Slightly Modified Options Framework
\*------------------------------------*/
require_once ('admin/index.php');


/*------------------------------------*\
	Functions
\*------------------------------------*/

// davinci navigation
function davinci_nav() {
?>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<span class="sr"></span>
			<span class="menu-bar bar1"></span>
			<span class="menu-bar bar2"></span>
			<span class="menu-bar bar3"></span>
		</button>
		<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_id' => 'primary-menu' ) ); ?>
	</nav>
<?php }

// Load davinci scripts (header.php)
function davinci_header_scripts() {

    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr.js', array(), '4.5.1'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr.js', array(), '2.8.3'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('carousel2', get_template_directory_uri() . '/js/owl.carousel2/owl.carousel.js', array('jquery'), '1.0.0');
        wp_enqueue_script('carousel2'); // Enqueue it!

        wp_register_script('equalheights', get_template_directory_uri() . '/js/jquery.equalheights.min.js', array('jquery'), '1.0.0');
        wp_enqueue_script('equalheights'); // Enqueue it!

        wp_register_script('davinciscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0');
        wp_enqueue_script('davinciscripts'); // Enqueue it!
		}
}

// Load davinci styles
function davinci_styles() {

    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('bootstrapgrid', get_template_directory_uri() . '/css/bootstrap-grid.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrapgrid'); // Enqueue it!

    wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('font-awesome'); // Enqueue it!

    wp_register_style('line-awesome', get_template_directory_uri() . '/css/line-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('line-awesome'); // Enqueue it!

    wp_register_style('carousel2', get_template_directory_uri() . '/js/owl.carousel2/assets/owl.carousel.min.css', array(), '1.0', 'all');
    wp_enqueue_style('carousel2'); // Enqueue it!

    wp_register_style('davinci', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('davinci'); // Enqueue it!

    global $smof_data;
    if($smof_data['rtl']) {
        wp_register_style('davinci-rtl', get_template_directory_uri() . '/rtl.css', array(), '1.0', 'all');
        wp_enqueue_style('davinci-rtl'); // Enqueue it!
    }

}

// Register davinci Navigation
function register_davinci_menu() {
    register_nav_menus(array(
        'primary' => __('Header Menu', 'davinci'),
        'sidebar-menu' => __('Sidebar Menu', 'davinci'),
        'extra-menu' => __('Extra Menu', 'davinci')
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '') {
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var) {
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist) {
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers WordPress Theme
function add_slug_to_body_class($classes) {
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }
    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar')) {

    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Main Sidebar', 'davinci'),
        'id' => 'main-sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Sidebar Blog', 'davinci'),
        'id' => 'blog-sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

     // Define Sidebar Widget Area 3
    register_sidebar(array(
        'name' => __('Sidebar Posts', 'davinci'),
        'id' => 'posts-sidebar',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 4
    register_sidebar(array(
        'name' => __('Footer Area', 'davinci'),
        'id' => 'footer-area',
        'before_widget' => '<div id="%1$s" class="%2$s widget col">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function davinci_pagination() {
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
// Create 40 Word Callback for Index page Excerpts, call using davinci_excerpt('davinci_index');
function davinci_index($length) {
    return 40;
}

// Create 40 Word Callback for Custom Post Excerpts, call using davinci_excerpt('davinci_custom_post');
function davinci_custom_post($length) {
    return 40;
}

// Create the Custom Excerpts callback
function davinci_excerpt($length_callback = '', $more_callback = '') {
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function davinci_view_article($more) {
    global $post, $smof_data;
    if($smof_data['rtl']) {
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Read More <i class="la la-long-arrow-left"></i>', 'davinci') . '</a>';
    } else {
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('Read More <i class="la la-long-arrow-right"></i>', 'davinci') . '</a>';
    }
}

// Remove Admin bar
function remove_admin_bar() {
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function davinci_style_remove($tag) {
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function davincigravatar ($avatar_defaults) {
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments() {
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

add_action( 'after_setup_theme', 'wpse_theme_setup' );
function wpse_theme_setup() {
    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );
}

// Custom Comments Callback
function davincicomments($comment, $args, $depth) {
	//$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
  	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, 180 ); ?>

	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'davinci') ?></em>
	<br />
<?php endif; ?>


  <div class="commet-tx">
    <?php printf(__('<cite class="fn">%s</cite>', 'davinci'), get_comment_author_link()) ?>
    <?php comment_text() ?>
  </div>

  <div class="comment-meta commentmetadata"><!--<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">-->
		<?php
			echo get_comment_date(); ?><!--</a>--><?php edit_comment_link(__('(Edit)', 'davinci'),'  ','' );
		?>
	</div>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }


/*------------------------------------*\

	Actions + Filters + ShortCodes

\*------------------------------------*/



// Add Actions

add_action('init', 'davinci_header_scripts'); // Add Custom Scripts to wp_head
//add_action('wp_print_scripts', 'davinci_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'davinci_styles'); // Add Theme Stylesheet
add_action('init', 'register_davinci_menu'); // Add davinci Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'davinci_pagination'); // Add our davinci Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters

add_filter('avatar_defaults', 'davincigravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation

// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)

add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'davinci_view_article'); // Add 'View Article' button instead of [...] for Excerpts
//add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'davinci_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/


/*------------------------------------*\
	Custom
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme_name');
}
