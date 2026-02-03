<?php
/**
 * Front page template.
 *
 * @package SunrockAutoModern
 */

get_header();

$show_lang_landing = (bool) get_theme_mod('sunrock_enable_language_landing', false);
if ($show_lang_landing) {
	get_template_part('template-parts/language-landing');
	get_footer();
	return;
}

$phone = sunrock_auto_modern_get_option('sunrock_phone', '');
$address = sunrock_auto_modern_get_option('sunrock_address', '');
$maps = sunrock_auto_modern_get_option('sunrock_maps_url', '');
$hours = sunrock_auto_modern_get_option('sunrock_hours', '');
$booking_url = sunrock_auto_modern_get_option('sunrock_booking_url', '#');
$form_shortcode = sunrock_auto_modern_get_option('sunrock_contact_form_shortcode', '');

$hero_h = sunrock_auto_modern_get_option('sunrock_hero_headline', esc_html__('Trusted Auto Repair. Honest Advice. Fast Turnaround.', 'sunrock-auto-modern'));
$hero_s = sunrock_auto_modern_get_option('sunrock_hero_subheadline', esc_html__('From oil changes to diagnostics and brakes—we keep your car safe, reliable, and road‑ready.', 'sunrock-auto-modern'));
$hl_1 = sunrock_auto_modern_get_option('sunrock_highlight_1', esc_html__('Certified technicians', 'sunrock-auto-modern'));
$hl_2 = sunrock_auto_modern_get_option('sunrock_highlight_2', esc_html__('Digital inspections', 'sunrock-auto-modern'));
$hl_3 = sunrock_auto_modern_get_option('sunrock_highlight_3', esc_html__('Warranty-backed work', 'sunrock-auto-modern'));
?>

<section class="hero">
	<div class="sr-container">
		<div class="hero__grid">
			<div class="hero__copy">
				<div class="sr-pill">
					<?php echo sunrock_auto_modern_icon('wrench', ['width' => 16, 'height' => 16]); ?>
					<?php esc_html_e('Auto Repair & Maintenance', 'sunrock-auto-modern'); ?>
				</div>

				<h1 class="hero__h1"><?php echo esc_html($hero_h); ?></h1>
				<p class="hero__sub"><?php echo esc_html($hero_s); ?></p>

				<div class="hero__actions">
					<a class="sr-btn sr-btn--primary" href="<?php echo esc_url($booking_url ?: '#'); ?>">
						<?php esc_html_e('Book Service', 'sunrock-auto-modern'); ?>
						<?php echo sunrock_auto_modern_icon('arrow-right', ['width' => 18, 'height' => 18]); ?>
					</a>
					<?php if ($phone) : ?>
						<a class="sr-btn sr-btn--ghost" href="<?php echo esc_url(sunrock_auto_modern_phone_href($phone)); ?>">
							<?php echo sunrock_auto_modern_icon('phone', ['width' => 18, 'height' => 18]); ?>
							<?php esc_html_e('Call Now', 'sunrock-auto-modern'); ?>
						</a>
					<?php endif; ?>
				</div>

				<div class="hero__highlights">
					<span class="sr-pill"><?php echo esc_html($hl_1); ?></span>
					<span class="sr-pill"><?php echo esc_html($hl_2); ?></span>
					<span class="sr-pill"><?php echo esc_html($hl_3); ?></span>
				</div>
			</div>

			<aside class="hero__panel" aria-label="<?php esc_attr_e('Quick info', 'sunrock-auto-modern'); ?>">
				<h2 class="panel__title"><?php esc_html_e('Visit or Contact', 'sunrock-auto-modern'); ?></h2>
				<p class="panel__meta"><?php esc_html_e('Fast help for urgent issues and easy scheduling for everything else.', 'sunrock-auto-modern'); ?></p>
				<ul class="panel__list">
					<?php if ($address) : ?>
						<li>
							<span class="sr-dot" aria-hidden="true"></span>
							<div>
								<strong style="color:var(--sr-text); font-weight:800;"><?php esc_html_e('Address', 'sunrock-auto-modern'); ?></strong><br>
								<?php if ($maps) : ?>
									<a href="<?php echo esc_url($maps); ?>" style="color:var(--sr-muted); text-decoration:underline;">
										<?php echo esc_html($address); ?>
									</a>
								<?php else : ?>
									<span style="color:var(--sr-muted);"><?php echo esc_html($address); ?></span>
								<?php endif; ?>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($hours) : ?>
						<li>
							<span class="sr-dot" aria-hidden="true"></span>
							<div>
								<strong style="color:var(--sr-text); font-weight:800;"><?php esc_html_e('Hours', 'sunrock-auto-modern'); ?></strong><br>
								<span style="color:var(--sr-muted); white-space: pre-line;"><?php echo esc_html($hours); ?></span>
							</div>
						</li>
					<?php endif; ?>
					<?php if ($phone) : ?>
						<li>
							<span class="sr-dot" aria-hidden="true"></span>
							<div>
								<strong style="color:var(--sr-text); font-weight:800;"><?php esc_html_e('Phone', 'sunrock-auto-modern'); ?></strong><br>
								<a href="<?php echo esc_url(sunrock_auto_modern_phone_href($phone)); ?>" style="color:var(--sr-muted); text-decoration:underline;">
									<?php echo esc_html($phone); ?>
								</a>
							</div>
						</li>
					<?php endif; ?>
				</ul>
			</aside>
		</div>
	</div>
</section>

<section class="sr-section sr-section--tight" id="services">
	<div class="sr-container">
		<div style="display:flex; justify-content:space-between; gap:1rem; align-items:flex-end; flex-wrap:wrap;">
			<div>
				<div class="sr-kicker"><?php esc_html_e('Services', 'sunrock-auto-modern'); ?></div>
				<h2 class="sr-h2"><?php esc_html_e('Everything your vehicle needs—done right.', 'sunrock-auto-modern'); ?></h2>
				<p class="sr-lede"><?php esc_html_e('Clear explanations, quality parts, and workmanship you can trust.', 'sunrock-auto-modern'); ?></p>
			</div>
			<a class="sr-btn sr-btn--ghost" href="<?php echo esc_url($booking_url ?: '#'); ?>">
				<?php esc_html_e('Get a Quote', 'sunrock-auto-modern'); ?>
				<?php echo sunrock_auto_modern_icon('arrow-right', ['width' => 18, 'height' => 18]); ?>
			</a>
		</div>

		<div class="grid grid--3" style="margin-top:1.25rem;">
			<div class="service">
				<div class="service__top">
					<div class="service__icon"><?php echo sunrock_auto_modern_icon('spark', ['width' => 20, 'height' => 20]); ?></div>
					<h3 class="service__title"><?php esc_html_e('Diagnostics', 'sunrock-auto-modern'); ?></h3>
				</div>
				<p class="service__desc"><?php esc_html_e('Check engine light, no-start, strange noises—pinpoint the cause with modern tools.', 'sunrock-auto-modern'); ?></p>
			</div>
			<div class="service">
				<div class="service__top">
					<div class="service__icon"><?php echo sunrock_auto_modern_icon('shield', ['width' => 20, 'height' => 20]); ?></div>
					<h3 class="service__title"><?php esc_html_e('Brakes & Safety', 'sunrock-auto-modern'); ?></h3>
				</div>
				<p class="service__desc"><?php esc_html_e('Brake pads, rotors, fluid service and inspections to keep you confident on the road.', 'sunrock-auto-modern'); ?></p>
			</div>
			<div class="service">
				<div class="service__top">
					<div class="service__icon"><?php echo sunrock_auto_modern_icon('wrench', ['width' => 20, 'height' => 20]); ?></div>
					<h3 class="service__title"><?php esc_html_e('Maintenance', 'sunrock-auto-modern'); ?></h3>
				</div>
				<p class="service__desc"><?php esc_html_e('Oil changes, fluids, filters and scheduled maintenance to prevent bigger repairs.', 'sunrock-auto-modern'); ?></p>
			</div>
			<div class="service">
				<div class="service__top">
					<div class="service__icon"><?php echo sunrock_auto_modern_icon('spark', ['width' => 20, 'height' => 20]); ?></div>
					<h3 class="service__title"><?php esc_html_e('Electrical', 'sunrock-auto-modern'); ?></h3>
				</div>
				<p class="service__desc"><?php esc_html_e('Battery, alternator, starters and charging issues—tested and repaired correctly.', 'sunrock-auto-modern'); ?></p>
			</div>
			<div class="service">
				<div class="service__top">
					<div class="service__icon"><?php echo sunrock_auto_modern_icon('clock', ['width' => 20, 'height' => 20]); ?></div>
					<h3 class="service__title"><?php esc_html_e('A/C & Heating', 'sunrock-auto-modern'); ?></h3>
				</div>
				<p class="service__desc"><?php esc_html_e('Stay comfortable year-round with accurate A/C diagnostics and repairs.', 'sunrock-auto-modern'); ?></p>
			</div>
			<div class="service">
				<div class="service__top">
					<div class="service__icon"><?php echo sunrock_auto_modern_icon('map-pin', ['width' => 20, 'height' => 20]); ?></div>
					<h3 class="service__title"><?php esc_html_e('Pre‑Trip Checks', 'sunrock-auto-modern'); ?></h3>
				</div>
				<p class="service__desc"><?php esc_html_e('Quick inspection before long drives: tires, brakes, fluids and lights.', 'sunrock-auto-modern'); ?></p>
			</div>
		</div>
	</div>
</section>

<section class="sr-section" id="why">
	<div class="sr-container">
		<div class="split">
			<div class="sr-card split__card">
				<div class="sr-kicker"><?php esc_html_e('Why choose us', 'sunrock-auto-modern'); ?></div>
				<h2 class="sr-h2"><?php esc_html_e('Modern service with old‑school honesty.', 'sunrock-auto-modern'); ?></h2>
				<p class="sr-lede"><?php esc_html_e('We focus on clear communication, smart diagnostics, and doing the job right the first time.', 'sunrock-auto-modern'); ?></p>
				<div class="grid" style="margin-top:1.1rem;">
					<div class="stat">
						<div class="stat__num">1</div>
						<div class="stat__label"><?php esc_html_e('Straightforward recommendations (no pressure).', 'sunrock-auto-modern'); ?></div>
					</div>
					<div class="stat">
						<div class="stat__num">2</div>
						<div class="stat__label"><?php esc_html_e('Quality parts and warranty-backed workmanship.', 'sunrock-auto-modern'); ?></div>
					</div>
					<div class="stat">
						<div class="stat__num">3</div>
						<div class="stat__label"><?php esc_html_e('Fast scheduling and status updates.', 'sunrock-auto-modern'); ?></div>
					</div>
				</div>
			</div>

			<div class="sr-card split__card" id="contact">
				<div class="sr-kicker"><?php esc_html_e('Contact', 'sunrock-auto-modern'); ?></div>
				<h2 class="sr-h2"><?php esc_html_e('Let’s get your car back to 100%.', 'sunrock-auto-modern'); ?></h2>
				<p class="sr-lede"><?php esc_html_e('Send a message, request a quote, or call us—whatever’s easiest.', 'sunrock-auto-modern'); ?></p>

				<div style="margin-top:1rem;">
					<?php if ($form_shortcode) : ?>
						<?php echo do_shortcode($form_shortcode); ?>
					<?php else : ?>
						<p class="footer__muted">
							<?php esc_html_e('Tip: add a contact form plugin (e.g., Contact Form 7) and paste its shortcode in the Customizer to show a form here.', 'sunrock-auto-modern'); ?>
						</p>
						<div class="hero__actions">
							<a class="sr-btn sr-btn--primary" href="<?php echo esc_url($booking_url ?: '#'); ?>">
								<?php esc_html_e('Request a Quote', 'sunrock-auto-modern'); ?>
								<?php echo sunrock_auto_modern_icon('arrow-right', ['width' => 18, 'height' => 18]); ?>
							</a>
							<?php if ($phone) : ?>
								<a class="sr-btn sr-btn--ghost" href="<?php echo esc_url(sunrock_auto_modern_phone_href($phone)); ?>">
									<?php esc_html_e('Call', 'sunrock-auto-modern'); ?>
									<?php echo sunrock_auto_modern_icon('phone', ['width' => 18, 'height' => 18]); ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();

