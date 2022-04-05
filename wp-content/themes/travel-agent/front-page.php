<?php
/**
 * The front page template file
 *
 * @package Travel Agent
 * @subpackage travel_agent
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'adventure_travelling_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'adventure_travelling_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/latest-tour' ); ?>
	<?php do_action( 'travel_agent_after_latest_tour' ); ?>

	<?php get_template_part( 'template-parts/home/blog' ); ?>
	<?php do_action( 'adventure_travelling_after_blog' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'adventure_travelling_after_home_content' ); ?>
</main>

<?php get_footer();