<?php
/**
 * Footer template.
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

$phone = sunrock_auto_modern_get_option('sunrock_phone', '');
$email = sunrock_auto_modern_get_option('sunrock_email', '');
$address = sunrock_auto_modern_get_option('sunrock_address', '');
$maps = sunrock_auto_modern_get_option('sunrock_maps_url', '');
$hours = sunrock_auto_modern_get_option('sunrock_hours', '');
?>

</main>

<footer class="site-footer" role="contentinfo">
	<div class="sr-container">
		<div class="footer__grid">
			<div>
				<h2 class="footer__title"><?php echo esc_html(get_bloginfo('name')); ?></h2>
				<p class="footer__muted">
					<?php echo esc_html(get_bloginfo('description')); ?>
				</p>
				<p class="footer__muted">
					<?php if ($address) : ?>
						<?php if ($maps) : ?>
							<a href="<?php echo esc_url($maps); ?>"><?php echo esc_html($address); ?></a>
						<?php else : ?>
							<?php echo esc_html($address); ?>
						<?php endif; ?>
						<br>
					<?php endif; ?>
					<?php if ($phone) : ?>
						<a href="<?php echo esc_url(sunrock_auto_modern_phone_href($phone)); ?>"><?php echo esc_html($phone); ?></a>
						<br>
					<?php endif; ?>
					<?php if ($email) : ?>
						<a href="<?php echo esc_url('mailto:' . $email); ?>"><?php echo esc_html($email); ?></a>
					<?php endif; ?>
				</p>
			</div>

			<div>
				<?php if (is_active_sidebar('footer-widgets')) : ?>
					<?php dynamic_sidebar('footer-widgets'); ?>
				<?php else : ?>
					<h3 class="footer__title"><?php esc_html_e('Hours', 'sunrock-auto-modern'); ?></h3>
					<p class="footer__muted" style="white-space: pre-line;"><?php echo esc_html($hours); ?></p>
					<nav aria-label="<?php esc_attr_e('Footer menu', 'sunrock-auto-modern'); ?>">
						<?php
						wp_nav_menu([
							'theme_location' => 'footer',
							'container'      => false,
							'fallback_cb'    => false,
						]);
						?>
					</nav>
				<?php endif; ?>
			</div>
		</div>

		<div class="footer__meta">
			<div>
				<?php
				echo esc_html(sprintf(
					/* translators: %s is the current year. */
					__('© %s ', 'sunrock-auto-modern'),
					gmdate('Y')
				));
				echo esc_html(get_bloginfo('name'));
				?>
			</div>
			<div>
				<?php
				printf(
					/* translators: %s is WordPress. */
					esc_html__('Built on %s', 'sunrock-auto-modern'),
					'WordPress'
				);
				?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

