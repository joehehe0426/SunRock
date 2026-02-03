<?php
/**
 * 404 template.
 *
 * @package SunrockAutoModern
 */

get_header();
?>

<div class="content">
	<div class="sr-container">
		<div class="sr-card">
			<h1 class="entry-title"><?php esc_html_e('Page not found', 'sunrock-auto-modern'); ?></h1>
			<p class="footer__muted">
				<?php esc_html_e('The page you’re looking for doesn’t exist. Try the menu or search below.', 'sunrock-auto-modern'); ?>
			</p>
			<?php get_search_form(); ?>
		</div>
	</div>
</div>

<?php
get_footer();

