<?php
/**
 * Theme setup, assets, and helpers.
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

add_action('after_setup_theme', function () {
	load_theme_textdomain('sunrock-auto-modern', get_template_directory() . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('custom-logo', [
		'height'      => 80,
		'width'       => 220,
		'flex-width'  => true,
		'flex-height' => true,
	]);

	add_theme_support('html5', [
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'style',
		'script',
	]);

	add_theme_support('align-wide');
	add_theme_support('responsive-embeds');
	add_theme_support('editor-styles');

	register_nav_menus([
		'primary' => esc_html__('Primary Menu', 'sunrock-auto-modern'),
		'footer'  => esc_html__('Footer Menu', 'sunrock-auto-modern'),
	]);
});

add_action('wp_enqueue_scripts', function () {
	$theme_uri = get_template_directory_uri();

	wp_enqueue_style(
		'sunrock-auto-modern-fonts',
		'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap',
		[],
		null
	);

	wp_enqueue_style(
		'sunrock-auto-modern-main',
		$theme_uri . '/assets/css/main.css',
		['sunrock-auto-modern-fonts'],
		SUNROCK_AUTO_MODERN_VERSION
	);

	wp_enqueue_script(
		'sunrock-auto-modern-main',
		$theme_uri . '/assets/js/main.js',
		[],
		SUNROCK_AUTO_MODERN_VERSION,
		true
	);
});

add_action('widgets_init', function () {
	register_sidebar([
		'name'          => esc_html__('Footer Widgets', 'sunrock-auto-modern'),
		'id'            => 'footer-widgets',
		'description'   => esc_html__('Widgets shown in the footer.', 'sunrock-auto-modern'),
		'before_widget' => '<section class="footer__widget widget %2$s" id="%1$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="footer__title">',
		'after_title'   => '</h3>',
	]);
});

/**
 * Get a theme option from Customizer with fallback.
 */
function sunrock_auto_modern_get_option(string $key, $default = '')
{
	$val = get_theme_mod($key, $default);
	if (is_string($val)) {
		$val = trim($val);
		return sunrock_auto_modern_translate_mod($key, $val);
	}
	return $val;
}

/**
 * Safely build a tel: link from a phone number string.
 */
function sunrock_auto_modern_phone_href(string $phone): string
{
	$digits = preg_replace('/[^0-9+]/', '', $phone);
	return $digits ? 'tel:' . $digits : '#';
}

