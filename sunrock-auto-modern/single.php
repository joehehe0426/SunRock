<?php
/**
 * Single post template.
 *
 * @package SunrockAutoModern
 */

get_header();
?>

<div class="content">
	<div class="sr-container">
		<div class="sr-card">
			<?php while (have_posts()) : the_post(); ?>
				<?php get_template_part('template-parts/content', 'single'); ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>

<?php
get_footer();

