<?php
/**
 * Fallback template.
 *
 * @package SunrockAutoModern
 */

get_header();
?>

<div class="content">
	<div class="sr-container">
		<div class="sr-card">
			<?php if (have_posts()) : ?>
				<?php if (is_home() && !is_front_page()) : ?>
					<h1 class="entry-title"><?php single_post_title(); ?></h1>
				<?php endif; ?>

				<div class="grid" style="gap: 1.1rem;">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', get_post_type()); ?>
					<?php endwhile; ?>
				</div>

				<div style="margin-top:1.4rem;">
					<?php the_posts_pagination(); ?>
				</div>
			<?php else : ?>
				<h1 class="entry-title"><?php esc_html_e('Nothing found', 'sunrock-auto-modern'); ?></h1>
				<p class="footer__muted"><?php esc_html_e('Try a search or check back soon.', 'sunrock-auto-modern'); ?></p>
				<?php get_search_form(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();
