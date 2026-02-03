<?php
/**
 * Inline SVG icons.
 *
 * @package SunrockAutoModern
 */

if (!defined('ABSPATH')) {
	exit;
}

function sunrock_auto_modern_icon(string $name, array $attrs = []): string
{
	$defaults = [
		'width'  => '20',
		'height' => '20',
		'viewBox' => '0 0 24 24',
		'fill'   => 'none',
		'xmlns'  => 'http://www.w3.org/2000/svg',
		'aria-hidden' => 'true',
		'focusable' => 'false',
	];

	$attrs = array_merge($defaults, $attrs);
	$attr_str = '';
	foreach ($attrs as $k => $v) {
		$attr_str .= ' ' . esc_attr($k) . '="' . esc_attr((string)$v) . '"';
	}

	switch ($name) {
		case 'arrow-right':
			return '<svg' . $attr_str . '><path d="M5 12h12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M13 6l6 6-6 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		case 'phone':
			return '<svg' . $attr_str . '><path d="M22 16.9v2a2 2 0 0 1-2.2 2A19.8 19.8 0 0 1 3 5.2 2 2 0 0 1 5 3h2a2 2 0 0 1 2 1.7c.1.8.3 1.6.6 2.3a2 2 0 0 1-.5 2.1L8.1 10a16 16 0 0 0 5.9 5.9l.9-1a2 2 0 0 1 2.1-.5c.7.3 1.5.5 2.3.6A2 2 0 0 1 22 16.9Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		case 'clock':
			return '<svg' . $attr_str . '><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/><path d="M12 7v6l4 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		case 'map-pin':
			return '<svg' . $attr_str . '><path d="M12 22s7-5.2 7-12a7 7 0 1 0-14 0c0 6.8 7 12 7 12Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="12" cy="10" r="2.5" stroke="currentColor" stroke-width="2"/></svg>';
		case 'wrench':
			return '<svg' . $attr_str . '><path d="M21 7a6 6 0 0 1-8.6 5.4L6.3 18.5a2.1 2.1 0 0 1-3-3l6.1-6.1A6 6 0 0 1 17 3l-3 3 4 4 3-3Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
		case 'shield':
			return '<svg' . $attr_str . '><path d="M12 22s8-4 8-10V6l-8-3-8 3v6c0 6 8 10 8 10Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
		case 'spark':
			return '<svg' . $attr_str . '><path d="M12 2l1.4 5.1L18 8.5l-4.6 1.4L12 15l-1.4-5.1L6 8.5l4.6-1.4L12 2Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M5 13l.7 2.4L8 16l-2.3.6L5 19l-.7-2.4L2 16l2.3-.6L5 13Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>';
		default:
			return '';
	}
}

