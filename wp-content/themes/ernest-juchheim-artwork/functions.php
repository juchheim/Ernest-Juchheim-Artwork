<?php
/**
 * Ernest Juchheim Artwork functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ernest_Juchheim_Artwork
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
function ernest_juchheim_artwork_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Ernest Juchheim Artwork, use a find and replace
		* to change 'ernest-juchheim-artwork' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ernest-juchheim-artwork', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'ernest-juchheim-artwork' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'ernest_juchheim_artwork_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
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
}
add_action( 'after_setup_theme', 'ernest_juchheim_artwork_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ernest_juchheim_artwork_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ernest_juchheim_artwork_content_width', 640 );
}
add_action( 'after_setup_theme', 'ernest_juchheim_artwork_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ernest_juchheim_artwork_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ernest-juchheim-artwork' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ernest-juchheim-artwork' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ernest_juchheim_artwork_widgets_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

// MY CODE STARTS HERE

// Add WooCommerce support
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

// Change number of products per row
add_filter( 'loop_shop_columns', 'mytheme_loop_columns' );
function mytheme_loop_columns() {
    return 3; // 3 products per row
}

// Remove default WooCommerce breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


function ernest_juchheim_artwork_scripts() {
    wp_enqueue_style( 'ernest-juchheim-artwork-style', get_stylesheet_uri() );

    wp_enqueue_script( 'ernest-juchheim-artwork-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20220101', true );
    wp_enqueue_script( 'ernest-juchheim-artwork-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '20220101', true );
}
add_action( 'wp_enqueue_scripts', 'ernest_juchheim_artwork_scripts' );

add_action( 'woocommerce_before_cart', 'override_woocommerce_cart_template' );



function ernest_juchheim_artwork_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'ernest_juchheim_artwork_add_woocommerce_support' );


add_action('woocommerce_before_cart', 'override_woocommerce_cart_template');

function override_woocommerce_cart_template() {
    // Your custom code here
}

function custom_enqueue_scripts() {
    // Enqueue the custom JS file
    wp_enqueue_script('custom-cart', get_template_directory_uri() . '/js/custom-cart.js', array('jquery'), '1.0', true);

    // Localize script to pass the AJAX URL and nonce
    wp_localize_script('custom-cart', 'custom_cart_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('custom-cart-nonce')
    ));
}
add_action('wp_enqueue_scripts', 'custom_enqueue_scripts');



// Handle cart quantity update
function custom_update_cart() {
    check_ajax_referer('custom-cart-nonce', 'nonce');

    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = intval($_POST['quantity']);

    if ($quantity > 0) {
        WC()->cart->set_quantity($cart_item_key, $quantity);
        wc_clear_notices();
        wp_send_json_success();
    } else {
        wp_send_json_error(array('message' => __('Quantity must be greater than zero.', 'woocommerce')));
    }
}
add_action('wp_ajax_custom_update_cart', 'custom_update_cart');
add_action('wp_ajax_nopriv_custom_update_cart', 'custom_update_cart');

// Handle applying coupon
function custom_apply_coupon() {
    check_ajax_referer('custom-cart-nonce', 'nonce');

    $coupon_code = sanitize_text_field($_POST['coupon_code']);
    WC()->cart->apply_coupon($coupon_code);
    wc_clear_notices();

    wp_send_json_success();
}
add_action('wp_ajax_custom_apply_coupon', 'custom_apply_coupon');
add_action('wp_ajax_nopriv_custom_apply_coupon', 'custom_apply_coupon');

// Handle updating cart totals
function custom_update_cart_totals() {
    check_ajax_referer('custom-cart-nonce', 'nonce');

    WC()->cart->calculate_totals();
    wc_clear_notices();

    wp_send_json_success();
}
add_action('wp_ajax_custom_update_cart_totals', 'custom_update_cart_totals');
add_action('wp_ajax_nopriv_custom_update_cart_totals', 'custom_update_cart_totals');


// Handle removing cart item
function custom_remove_cart_item() {
    check_ajax_referer('custom-cart-nonce', 'nonce');

    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $removed = WC()->cart->remove_cart_item($cart_item_key);

    if ($removed) {
        wc_clear_notices();
        wp_send_json_success();
    } else {
        wp_send_json_error(array('message' => __('Failed to remove item from cart.', 'woocommerce')));
    }
}
add_action('wp_ajax_custom_remove_cart_item', 'custom_remove_cart_item');
add_action('wp_ajax_nopriv_custom_remove_cart_item', 'custom_remove_cart_item');
