<?php
/**
 * Single post content.
 *
 * @package SunrockAutoModern
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<div class="entry-meta">
			<?php echo esc_html(get_the_date()); ?>
		</div>
	</header>

	<div class="prose">
		<?php the_content(); ?>
	</div>

	<div style="margin-top:1.6rem;">
		<?php the_post_navigation(); ?>
	</div>
</article>

