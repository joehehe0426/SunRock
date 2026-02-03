<?php
/**
 * Header template.
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

$phone = sunrock_auto_modern_get_option('sunrock_phone', '');
$booking_url = sunrock_auto_modern_get_option('sunrock_booking_url', '#');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content">
	<?php esc_html_e('Skip to content', 'sunrock-auto-modern'); ?>
</a>

<header class="site-header" role="banner">
	<div class="sr-container">
		<div class="site-header__bar">
			<div class="brand">
				<?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
					<?php the_custom_logo(); ?>
				<?php else : ?>
					<div class="brand__mark" aria-hidden="true"></div>
					<div>
						<div class="brand__title"><?php echo esc_html(get_bloginfo('name')); ?></div>
						<div class="brand__tagline"><?php echo esc_html(get_bloginfo('description')); ?></div>
					</div>
				<?php endif; ?>
			</div>

			<button class="nav-toggle" type="button" data-nav-toggle aria-controls="primary-menu" aria-expanded="false">
				<?php echo sunrock_auto_modern_icon('spark', ['width' => 18, 'height' => 18]); ?>
				<span class="screen-reader-text"><?php esc_html_e('Toggle menu', 'sunrock-auto-modern'); ?></span>
				<span aria-hidden="true"><?php esc_html_e('Menu', 'sunrock-auto-modern'); ?></span>
			</button>

			<nav class="nav" id="primary-menu" data-nav role="navigation" aria-label="<?php esc_attr_e('Primary menu', 'sunrock-auto-modern'); ?>">
				<?php
				wp_nav_menu([
					'theme_location' => 'primary',
					'container'      => false,
					'menu_class'     => '',
					'fallback_cb'    => 'wp_page_menu',
					'depth'          => 2,
				]);
				?>
			</nav>

			<div class="header-cta">
				<?php sunrock_auto_modern_language_switcher(); ?>
				<?php if ($phone) : ?>
					<a class="header-cta__phone" href="<?php echo esc_url(sunrock_auto_modern_phone_href($phone)); ?>">
						<?php echo sunrock_auto_modern_icon('phone', ['width' => 16, 'height' => 16]); ?>
						<?php echo esc_html($phone); ?>
					</a>
				<?php endif; ?>
				<a class="sr-btn sr-btn--primary" href="<?php echo esc_url($booking_url ?: '#'); ?>">
					<?php esc_html_e('Request a Quote', 'sunrock-auto-modern'); ?>
					<?php echo sunrock_auto_modern_icon('arrow-right', ['width' => 18, 'height' => 18]); ?>
				</a>
			</div>
		</div>
	</div>
</header>

<main id="content" class="site-main" role="main">

