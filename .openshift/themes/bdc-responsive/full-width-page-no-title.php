<?php

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * (Based on) Full Content Template
 *
Template Name:  Full-Width, no title or sidebar
 *
 * @file           full-width-page-no-title.php
 * @package        Responsive
 * @author         Kyle Condiff (based on work by Emil Uzelac)
 * @license        license.txt
 */

get_header(); ?>

<div id="content-full" class="grid col-940">
	<div class="club-page">

		<?php if ( have_posts() ) : ?>

			<?php while( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'loop-header', get_post_type() ); ?>

				<?php responsive_entry_before(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php responsive_entry_top(); ?>

					<!-- The post metadata isn't shown -->
					<div class="club-post-meta" style="display: none">
						<?php get_template_part( 'post-meta', get_post_type() ); ?>
					</div>

					<div class="post-entry">
						<?php the_content( __( 'Read more &#8250;', 'responsive' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="pagination">' . __( 'Pages:', 'responsive' ), 'after' => '</div>' ) ); ?>
					</div>
					<!-- end of .post-entry -->

					<?php get_template_part( 'post-data', get_post_type() ); ?>

					<?php responsive_entry_bottom(); ?>
				</div><!-- end of #post-<?php the_ID(); ?> -->
				<?php responsive_entry_after(); ?>

				<?php responsive_comments_before(); ?>
				<?php comments_template( '', true ); ?>
				<?php responsive_comments_after(); ?>

			<?php
			endwhile;

			get_template_part( 'loop-nav', get_post_type() );

		else :

			get_template_part( 'loop-no-posts', get_post_type() );

		endif;
		?>

	</div><!-- end of .club-page -->
</div><!-- end of #content-full -->

<?php get_footer(); ?>
