<?php
/**
 * i18n helpers and integrations (Polylang/WPML).
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

/**
 * Theme mods that are expected to be language-specific.
 */
function sunrock_auto_modern_translatable_mod_keys(): array
{
	return [
		'sunrock_hero_headline',
		'sunrock_hero_subheadline',
		'sunrock_highlight_1',
		'sunrock_highlight_2',
		'sunrock_highlight_3',
		'sunrock_address',
		'sunrock_hours',
	];
}

/**
 * Register translatable theme strings for Polylang/WPML if present.
 */
add_action('init', function () {
	$keys = sunrock_auto_modern_translatable_mod_keys();

	// Polylang.
	if (function_exists('pll_register_string')) {
		foreach ($keys as $key) {
			$val = (string) get_theme_mod($key, '');
			if ($val !== '') {
				pll_register_string($key, $val, 'Sunrock Auto Modern', true);
			}
		}
	}

	// WPML.
	if (has_action('wpml_register_single_string')) {
		foreach ($keys as $key) {
			$val = (string) get_theme_mod($key, '');
			if ($val !== '') {
				do_action('wpml_register_single_string', 'sunrock-auto-modern', $key, $val);
			}
		}
	}
}, 20);

/**
 * Translate a theme-mod value using Polylang/WPML when available.
 */
function sunrock_auto_modern_translate_mod(string $key, string $value): string
{
	if ($value === '') {
		return $value;
	}

	$translatable = in_array($key, sunrock_auto_modern_translatable_mod_keys(), true);
	if (!$translatable) {
		return $value;
	}

	if (function_exists('pll__')) {
		return (string) pll__($value);
	}

	if (has_filter('wpml_translate_single_string')) {
		return (string) apply_filters('wpml_translate_single_string', $value, 'sunrock-auto-modern', $key);
	}

	return $value;
}

/**
 * Render a language switcher if Polylang/WPML is active.
 */
function sunrock_auto_modern_language_switcher(): void
{
	// Polylang.
	if (function_exists('pll_the_languages')) {
		$langs = pll_the_languages([
			'raw'        => 1,
			'show_flags' => 0,
			'show_names' => 0,
			'hide_if_empty' => 0,
		]);

		if (is_array($langs) && !empty($langs)) {
			echo '<div class="lang-switch" aria-label="' . esc_attr__('Language switcher', 'sunrock-auto-modern') . '">';
			foreach ($langs as $lang) {
				$label = !empty($lang['slug']) ? strtoupper((string) $lang['slug']) : (!empty($lang['name']) ? (string) $lang['name'] : '');
				if ($label === '') {
					continue;
				}
				$is_current = !empty($lang['current_lang']);
				printf(
					'<a class="lang-switch__link %s" href="%s">%s</a>',
					$is_current ? 'is-current' : '',
					esc_url((string) ($lang['url'] ?? '#')),
					esc_html($label)
				);
			}
			echo '</div>';
		}
		return;
	}

	// WPML.
	if (has_filter('wpml_active_languages')) {
		$langs = apply_filters('wpml_active_languages', null, ['skip_missing' => 0]);
		if (is_array($langs) && !empty($langs)) {
			echo '<div class="lang-switch" aria-label="' . esc_attr__('Language switcher', 'sunrock-auto-modern') . '">';
			foreach ($langs as $lang) {
				$label = !empty($lang['language_code']) ? strtoupper((string) $lang['language_code']) : '';
				if ($label === '') {
					continue;
				}
				$is_current = !empty($lang['active']);
				printf(
					'<a class="lang-switch__link %s" href="%s">%s</a>',
					$is_current ? 'is-current' : '',
					esc_url((string) ($lang['url'] ?? '#')),
					esc_html($label)
				);
			}
			echo '</div>';
		}
	}
}

