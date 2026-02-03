<?php
/**
 * Language selection landing.
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

$langs = sunrock_auto_modern_get_languages();
?>

<section class="lang-landing" aria-label="<?php esc_attr_e('Language selection', 'sunrock-auto-modern'); ?>">
	<div class="sr-container">
		<div class="lang-landing__card sr-card">
			<div class="lang-landing__brand">
				<div class="brand__mark" aria-hidden="true"></div>
				<div>
					<div class="brand__title"><?php echo esc_html(get_bloginfo('name')); ?></div>
					<div class="brand__tagline"><?php echo esc_html(get_bloginfo('description')); ?></div>
				</div>
			</div>

			<h1 class="lang-landing__h1"><?php esc_html_e('Choose your language', 'sunrock-auto-modern'); ?></h1>
			<p class="lang-landing__sub"><?php esc_html_e('Please select English or Traditional Chinese to continue.', 'sunrock-auto-modern'); ?></p>

			<?php if (!empty($langs)) : ?>
				<div class="lang-landing__grid" role="list">
					<?php foreach ($langs as $lang) : ?>
						<a class="lang-landing__choice" role="listitem" href="<?php echo esc_url((string) $lang['url']); ?>">
							<div class="lang-landing__choiceTop">
								<div class="lang-landing__code"><?php echo esc_html(strtoupper((string) $lang['code'])); ?></div>
								<div class="lang-landing__arrow" aria-hidden="true">
									<?php echo sunrock_auto_modern_icon('arrow-right', ['width' => 18, 'height' => 18]); ?>
								</div>
							</div>
							<div class="lang-landing__label"><?php echo esc_html((string) $lang['label']); ?></div>
							<div class="lang-landing__native"><?php echo esc_html((string) $lang['native']); ?></div>
						</a>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<p class="footer__muted">
					<?php esc_html_e('To enable language selection, install Polylang or WPML (recommended), or set the two language URLs in the Customizer.', 'sunrock-auto-modern'); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>

