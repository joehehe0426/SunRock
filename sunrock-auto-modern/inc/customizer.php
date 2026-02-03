<?php
/**
 * Customizer settings for business info + homepage.
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

add_action('customize_register', function (WP_Customize_Manager $wp_customize) {
	$wp_customize->add_section('sunrock_auto_modern_language', [
		'title'       => esc_html__('Language Landing (Sunrock)', 'sunrock-auto-modern'),
		'description' => esc_html__('Create a landing page that lets visitors choose English or Traditional Chinese.', 'sunrock-auto-modern'),
		'priority'    => 29,
	]);

	$wp_customize->add_setting('sunrock_enable_language_landing', [
		'default'           => false,
		'sanitize_callback' => 'rest_sanitize_boolean',
	]);
	$wp_customize->add_control('sunrock_enable_language_landing', [
		'type'        => 'checkbox',
		'section'     => 'sunrock_auto_modern_language',
		'label'       => esc_html__('Enable language selection on the front page', 'sunrock-auto-modern'),
		'description' => esc_html__('If enabled, the front page will show a language picker instead of the homepage sections.', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_lang_url_en', [
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	]);
	$wp_customize->add_control('sunrock_lang_url_en', [
		'type'        => 'url',
		'section'     => 'sunrock_auto_modern_language',
		'label'       => esc_html__('English URL (fallback)', 'sunrock-auto-modern'),
		'description' => esc_html__('Only needed if you are not using Polylang/WPML.', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_lang_url_zh', [
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	]);
	$wp_customize->add_control('sunrock_lang_url_zh', [
		'type'        => 'url',
		'section'     => 'sunrock_auto_modern_language',
		'label'       => esc_html__('Traditional Chinese URL (fallback)', 'sunrock-auto-modern'),
		'description' => esc_html__('Only needed if you are not using Polylang/WPML.', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_lang_label_en', [
		'default'           => 'English',
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_lang_label_en', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_language',
		'label'   => esc_html__('English label', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_lang_label_zh', [
		'default'           => '繁體中文',
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_lang_label_zh', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_language',
		'label'   => esc_html__('Traditional Chinese label', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_section('sunrock_auto_modern_business', [
		'title'       => esc_html__('Business Info (Sunrock)', 'sunrock-auto-modern'),
		'description' => esc_html__('Update contact details, hours, and CTAs used across the site.', 'sunrock-auto-modern'),
		'priority'    => 30,
	]);

	$fields = [
		'sunrock_phone' => [
			'label'   => esc_html__('Phone number', 'sunrock-auto-modern'),
			'default' => '+1 (000) 000-0000',
		],
		'sunrock_email' => [
			'label'   => esc_html__('Email', 'sunrock-auto-modern'),
			'default' => 'service@example.com',
		],
		'sunrock_address' => [
			'label'   => esc_html__('Address', 'sunrock-auto-modern'),
			'default' => 'Your street address, City, Province/State',
		],
		'sunrock_maps_url' => [
			'label'   => esc_html__('Google Maps URL', 'sunrock-auto-modern'),
			'default' => '',
		],
		'sunrock_hours' => [
			'label'   => esc_html__('Hours (short)', 'sunrock-auto-modern'),
			'default' => "Mon–Fri: 8:00–5:30\nSat: 9:00–2:00\nSun: Closed",
		],
		'sunrock_booking_url' => [
			'label'   => esc_html__('Booking / Request Quote URL', 'sunrock-auto-modern'),
			'default' => '#',
		],
		'sunrock_contact_form_shortcode' => [
			'label'   => esc_html__('Contact form shortcode (optional)', 'sunrock-auto-modern'),
			'default' => '',
		],
	];

	foreach ($fields as $key => $field) {
		$wp_customize->add_setting($key, [
			'default'           => $field['default'],
			'sanitize_callback' => $key === 'sunrock_contact_form_shortcode'
				? 'wp_kses_post'
				: 'sanitize_textarea_field',
		]);

		$wp_customize->add_control($key, [
			'type'        => ($key === 'sunrock_maps_url' || $key === 'sunrock_booking_url') ? 'url' : 'textarea',
			'section'     => 'sunrock_auto_modern_business',
			'label'       => $field['label'],
			'description' => $key === 'sunrock_contact_form_shortcode'
				? esc_html__('Paste a shortcode from your form plugin (e.g., Contact Form 7).', 'sunrock-auto-modern')
				: '',
		]);
	}

	$wp_customize->add_section('sunrock_auto_modern_home', [
		'title'       => esc_html__('Homepage (Sunrock)', 'sunrock-auto-modern'),
		'description' => esc_html__('Controls for hero headline and quick highlights.', 'sunrock-auto-modern'),
		'priority'    => 31,
	]);

	$wp_customize->add_setting('sunrock_hero_headline', [
		'default'           => esc_html__('Trusted Auto Repair. Honest Advice. Fast Turnaround.', 'sunrock-auto-modern'),
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_hero_headline', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_home',
		'label'   => esc_html__('Hero headline', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_hero_subheadline', [
		'default'           => esc_html__('From oil changes to diagnostics and brakes—we keep your car safe, reliable, and road‑ready.', 'sunrock-auto-modern'),
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_hero_subheadline', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_home',
		'label'   => esc_html__('Hero subheadline', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_highlight_1', [
		'default'           => esc_html__('Certified technicians', 'sunrock-auto-modern'),
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_highlight_1', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_home',
		'label'   => esc_html__('Highlight 1', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_highlight_2', [
		'default'           => esc_html__('Digital inspections', 'sunrock-auto-modern'),
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_highlight_2', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_home',
		'label'   => esc_html__('Highlight 2', 'sunrock-auto-modern'),
	]);

	$wp_customize->add_setting('sunrock_highlight_3', [
		'default'           => esc_html__('Warranty-backed work', 'sunrock-auto-modern'),
		'sanitize_callback' => 'sanitize_text_field',
	]);
	$wp_customize->add_control('sunrock_highlight_3', [
		'type'    => 'text',
		'section' => 'sunrock_auto_modern_home',
		'label'   => esc_html__('Highlight 3', 'sunrock-auto-modern'),
	]);
});

