<?php
/**
 * Default content card.
 *
 * @package SunrockAutoModern
 */

?>

<article <?php post_class('service'); ?> id="post-<?php the_ID(); ?>">
	<header>
		<h2 class="service__title" style="font-size:1.15rem;">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<div class="entry-meta">
			<?php echo esc_html(get_the_date()); ?>
		</div>
	</header>

	<div class="prose">
		<?php the_excerpt(); ?>
	</div>

	<a class="service__link" href="<?php the_permalink(); ?>">
		<?php esc_html_e('Read more', 'sunrock-auto-modern'); ?>
		<?php echo sunrock_auto_modern_icon('arrow-right', ['width' => 18, 'height' => 18]); ?>
	</a>
</article>

