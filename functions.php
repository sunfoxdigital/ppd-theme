<?php
/**
 * planpackdiscover functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package planpackdiscover
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function planpackdiscover_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on planpackdiscover, use a find and replace
		* to change 'planpackdiscover' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'planpackdiscover', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'planpackdiscover' ),
			'menu-2' => esc_html__( 'Discover', 'planpackdiscover' ),
			'menu-3' => esc_html__( 'Company', 'planpackdiscover' ),
			'menu-4' => esc_html__( 'Social', 'planpackdiscover' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	add_theme_support( 'wp-block-styles' );
}
add_action( 'after_setup_theme', 'planpackdiscover_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function planpackdiscover_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'planpackdiscover_content_width', 640 );
}
add_action( 'after_setup_theme', 'planpackdiscover_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function planpackdiscover_scripts() {
	wp_enqueue_style( 'planpackdiscover-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'planpackdiscover-style', 'rtl', 'replace' );

	wp_enqueue_style( 'global-stylesheet', get_stylesheet_directory_uri() . '/dist/css/global.min.css', [], _S_VERSION );
	wp_enqueue_script( 'global-functions', get_template_directory_uri() . '/dist/js/global.min.js', array(), _S_VERSION, true );
	wp_script_add_data( 'global-functions', 'strategy', 'defer' );

	if( is_front_page() ) {
		wp_enqueue_style( 'front-page-styles', get_stylesheet_directory_uri() . '/dist/css/front-page.min.css', [], _S_VERSION );
		// wp_enqueue_script( 'home-functions', get_template_directory_uri() . '/js/front-page.js', array(), _S_VERSION, true );
	};

	if( is_single() ) {
		wp_enqueue_style( 'post-styles', get_stylesheet_directory_uri() . '/dist/css/single.min.css', [], _S_VERSION );
		wp_enqueue_script( 'post-functions', get_template_directory_uri() . '/dist/js/single.min.js', array(), _S_VERSION, true );
		wp_script_add_data( 'post-functions', 'strategy', 'defer' );

	}

	if( is_home() || is_category() || is_archive() || is_single() ) {
		wp_enqueue_style( 'blog-styles', get_stylesheet_directory_uri() . '/dist/css/blog.min.css', [], _S_VERSION );
		// wp_enqueue_script( 'archive-functions', get_template_directory_uri() . '/js/blog.js', array(), _S_VERSION, true );
	}

	if( is_home() || is_front_page() || is_category() || is_archive() || is_single() || is_page_template('about.php') || is_page_template('landing.php') ) {
		wp_enqueue_style( 'archive-styles', get_stylesheet_directory_uri() . '/dist/css/archive.min.css', [], _S_VERSION );
		// wp_enqueue_script( 'archive-functions', get_template_directory_uri() . '/js/archive.js', array(), _S_VERSION, true );
	}

	if( is_single() || is_page_template('about.php') || is_page_template('landing.php') || is_page() && !is_front_page() ) {
		wp_enqueue_style( 'page-post-styles', get_stylesheet_directory_uri() . '/dist/css/page-post.min.css', [], _S_VERSION );
		// wp_enqueue_script( 'page-post-functions', get_template_directory_uri() . '/assets/js/page-post.js', array(), _S_VERSION, true );
	}
	
	if( is_home() || is_category() || is_singular('post') ) {
		wp_enqueue_script( 'load-more', get_template_directory_uri() . '/dist/js/load-more.min.js', array(), _S_VERSION, true );
		wp_script_add_data( 'load-more', 'strategy', 'defer' );
		wp_localize_script(	'load-more', 'ppdData',
			array(
				'ajax_url' => admin_url( 'admin-ajax.php' ),
			)
		);
	};

	if ( !is_admin() ) {
        wp_dequeue_script('jquery');
        wp_deregister_script('jquery');
        wp_dequeue_script('jquery-migrate');
    }
}
add_action( 'wp_enqueue_scripts', 'planpackdiscover_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load Jetpack compatibility file.
 */
require_once("inc/shortcodes.php");

/**
 * Allow SVG Uploads.
 */
function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Remove menus from customizer.
 */
function remove_customizer_settings( $wp_customize ){
    $wp_customize->remove_panel('nav_menus');
	$wp_customize->remove_panel( 'widgets' );
}
add_action( 'customize_register', 'remove_customizer_settings', 20 );

/**
 * Excerpt Length and Ellipsis
 */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page();
}

/**
 * ACF Options Page
 */
 function new_excerpt_more($more) {
    return '...';
}

/**
 * Category Filter for Blog
 */
add_filter('excerpt_more', 'new_excerpt_more');
add_filter( 'excerpt_length', function($length) {
    return 36;
}, PHP_INT_MAX );

add_action('wp_ajax_get_post_teasers', 'get_post_teasers');
add_action('wp_ajax_nopriv_get_post_teasers', 'get_post_teasers');

function get_post_teasers(){
	if (!defined( 'DOING_AJAX' ) || !DOING_AJAX) {
		echo "";
		exit;
	}
	
	$args = [];
	$args["posts_per_page"] = get_option( 'posts_per_page' );
	if (isset($_REQUEST['cat']) && $_REQUEST['cat'] > 0) {
		$args['cat'] = $_REQUEST['cat'];
	}
	
	ob_start();

	$all_posts = new WP_Query( $args );
	while ($all_posts -> have_posts()) : $all_posts -> the_post();
		get_template_part( 'template-parts/blog/component', 'post-teaser' );
	endwhile;
	wp_reset_postdata();
	
	$data = ob_get_clean();
	
	echo $data;

	exit;
}

/**
 * Load More Button for Blog
 */

 add_action('wp_ajax_load_more_posts_in_cat', 'load_more_posts_in_cat');
 add_action('wp_ajax_nopriv_load_more_posts_in_cat', 'load_more_posts_in_cat');

 function load_more_posts_in_cat() {
    if (!defined( 'DOING_AJAX' ) || !DOING_AJAX) {
        wp_send_json_error("Invalid request.");
        exit;
    }

    $posts_per_page = 4;
    $current_page   = isset($_REQUEST['current_page']) ? intval($_REQUEST['current_page']) : 0;
    $category       = isset($_REQUEST['category']) ? intval($_REQUEST['category']) : -1;

    // Find the first valid post (excluding "Omit" posts)
    $first_valid_post_id = null;
    $initial_query_args = [
        'posts_per_page' => 1,
        'post_status'    => 'publish',
        'tag__not_in'    => [14], // Exclude "Omit" tagged posts
    ];

    if ($category > 0) {
        $initial_query_args['cat'] = $category;
    }

    $initial_query = new WP_Query($initial_query_args);
    if ($initial_query->have_posts()) {
        $initial_query->the_post();
        $first_valid_post_id = get_the_ID();
    }
    wp_reset_postdata();

    // Count total valid posts in the selected category
    $count_query_args = [
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'tag__not_in'    => [14],
    ];

    if ($category > 0) {
        $count_query_args['cat'] = $category;
    }

    $count_query = new WP_Query($count_query_args);
    $total_valid_posts = $count_query->found_posts;
    wp_reset_postdata();

    // Prepare new query for AJAX loaded posts
    $args = [
        'posts_per_page' => $posts_per_page,
        'post_status'    => 'publish',
        'tag__not_in'    => [14], // Exclude "Omit" tagged posts
        'offset'         => $current_page * $posts_per_page,
    ];

    // **Only exclude the first post if there is more than one available**
    if ($first_valid_post_id && $total_valid_posts > 1) {
        $args['post__not_in'] = [$first_valid_post_id];
    }

    if ($category > 0) {
        $args['cat'] = $category;
    }

    $all_posts = new WP_Query($args);
    ob_start();
    
    if ($all_posts->have_posts()) :
        while ($all_posts->have_posts()) : $all_posts->the_post();
            get_template_part('template-parts/blog/component', 'post-teaser');
        endwhile;
    else:
        echo '<p>No posts found.</p>';
    endif;

    wp_reset_postdata();

    $output = ob_get_clean();

    // Return JSON response
    if (empty($output)) {
        wp_send_json_error("No posts found.");
    } else {
        wp_send_json_success($output);
    }

    exit;
}


/**
 * Exlude Posts with Omit tag from default WP loop
 */

function exclude_omit_tag_from_main_query($query) {
    if ($query->is_main_query() && !is_admin() && ($query->is_home() || $query->is_category())) {
        $query->set('tag__not_in', [14]);
        $query->set('post_status', 'publish');
    }
}
add_action('pre_get_posts', 'exclude_omit_tag_from_main_query');

/**
 * Theme Colors in TinyMCE
 */
function custom_mce_colors($init) {
    $ppd_colors = '
        "212F31", "Dark Green",
		"6f9fa5", "Light Green",
        "ae4242", "Dark Red",
		"e2524d", "Light Red",
        "3366ff", "Medium Blue",
        "F1F6F9", "Light Blue",
        "ef955f", "Orange",
        "f8df7c", "Yellow",
    ';

    $init['textcolor_map'] = '[' . $ppd_colors . ']';
    $init['textcolor_cols'] = 6;

    return $init;
}

add_filter('tiny_mce_before_init', 'custom_mce_colors');

/**
 * Enable SVG Support in TinyMCE
 */

/**
 * WP Head Cleanup
 */
function ppd_cleanup_head() {
	// Emojis.
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

	// RSD + WLW + shortlink + generator.
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
	remove_action( 'wp_head', 'wp_generator' );

	// REST + oEmbed discovery (keeps embeds working when you paste URLs INTO your site).
	remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
}
add_action( 'init', 'ppd_cleanup_head' );

/**
 * Dequeue dashicons on the front end for non-logged-in users.
 */
function ppd_remove_dashicons_for_guests() {
	if ( ! is_user_logged_in() ) {
		wp_deregister_style( 'dashicons' );
	}
}
add_action( 'wp_enqueue_scripts', 'ppd_remove_dashicons_for_guests' );

/**
 * Optionally dequeue block library CSS on the front end.
 * TEST this carefully; re-enable if anything looks off.
 */
function ppd_maybe_remove_block_library_css() {
	if ( ! is_admin() ) {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'global-styles' ); // theme.json output
	}
}
add_action( 'wp_enqueue_scripts', 'ppd_maybe_remove_block_library_css', 100 );

/**
 * Improve LCP by overriding attributes on the hero image.
 */
function ppd_optimize_hero_lcp( $attr, $attachment, $size ) {

    if ( is_front_page() && $size === 'full' ) {
        $attr['loading'] = 'eager';
        $attr['decoding'] = 'async';
        $attr['fetchpriority'] = 'high';
    }

    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'ppd_optimize_hero_lcp', 10, 3 );

function ppd_hero_correct_sizes( $sizes, $size, $image_src, $image_meta, $attachment_id ) {
    if ( is_front_page() ) {
        return '(max-width: 1199px) 100vw, 1199px';
    }
    return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'ppd_hero_correct_sizes', 10, 5 );

function ppd_render_hero_image( $image_id ) {

    if (!$image_id) return;

    // Base image URLs
    $hero_src_full  = wp_get_attachment_image_url( $image_id, 'full' );
    $hero_src_large = wp_get_attachment_image_url( $image_id, 'large' );

    // Extract metadata
    $hero_meta = wp_get_attachment_metadata( $image_id );
    $hero_width  = $hero_meta['width']  ?? 1200;
    $hero_height = $hero_meta['height'] ?? 800;

    // Attempt WebP conversion
    $potential_webp = preg_replace('/\.(jpe?g|png)$/i', '.webp', $hero_src_full);
    $upload_dir = wp_get_upload_dir();
    $webp_path  = str_replace($upload_dir['baseurl'], $upload_dir['basedir'], $potential_webp);

    $hero_webp = file_exists($webp_path) ? $potential_webp : false;

    ?>

    <picture>
        <?php if ($hero_webp): ?>
            <source
                srcset="<?php echo esc_url($hero_webp); ?>"
                type="image/webp"
                sizes="(max-width: 1199px) 100vw, 1199px">
        <?php endif; ?>

        <img
            src="<?php echo esc_url($hero_src_large); ?>"
            srcset="<?php echo esc_url($hero_src_large); ?> 1200w,
                    <?php echo esc_url($hero_src_full); ?> 2000w"
            sizes="(max-width: 1199px) 100vw, 1199px"
            alt="<?php echo esc_attr(get_the_title($image_id)); ?>"
            decoding="async"
            loading="eager"
            width="<?php echo esc_attr($hero_width); ?>"
            height="<?php echo esc_attr($hero_height); ?>"
        />

    </picture>

    <?php
}