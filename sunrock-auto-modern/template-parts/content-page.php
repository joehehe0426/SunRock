<?php
/**
 * Page content.
 *
 * @package SunrockAutoModern
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="prose">
		<?php the_content(); ?>
	</div>
</article>

