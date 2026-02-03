<?php
/**
 * Archive template.
 *
 * @package SunrockAutoModern
 */

get_header();
?>

<div class="content">
	<div class="sr-container">
		<div class="sr-card">
			<header>
				<h1 class="entry-title"><?php the_archive_title(); ?></h1>
				<div class="entry-meta"><?php the_archive_description(); ?></div>
			</header>

			<?php if (have_posts()) : ?>
				<div class="grid" style="gap: 1.1rem;">
					<?php while (have_posts()) : the_post(); ?>
						<?php get_template_part('template-parts/content', get_post_type()); ?>
					<?php endwhile; ?>
				</div>
				<div style="margin-top:1.4rem;">
					<?php the_posts_pagination(); ?>
				</div>
			<?php else : ?>
				<p class="footer__muted"><?php esc_html_e('No posts found.', 'sunrock-auto-modern'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php
get_footer();

