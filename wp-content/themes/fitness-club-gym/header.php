<?php
/**
 * The header for our theme
 *
 * @subpackage Fitness Club Gym
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'fitness-club-gym' ); ?></a>

<div id="header">
	<div class="menu-section">
		<div class="row">
			<div class="col-lg-3 col-md-4 pr-md-0">
				<div class="logo text-center">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('fitness_club_gym_show_site_title',true)) {?>
	          			<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('fitness_club_gym_show_tagline',true)) {?>
		                <?php $description = get_bloginfo( 'description', 'display' );
	                  	if ( $description || is_customize_preview() ) : ?>
		                  	<p class="site-description"><?php echo esc_html($description); ?></p>
	              		<?php endif; ?>
	          		<?php }?>
				</div>
			</div>
			<div class="col-lg-7 col-md-7 middle-header px-md-0">
				<div class="topbar">
					<div class="row">
						<div class="col-lg-6 col-md-7 align-self-center">
							<?php if( get_theme_mod('fitness_club_gym_timing') != ''){?>
								<p class="time mb-md-0 text-md-left text-center"><i class="far fa-clock mr-2"></i><?php echo esc_html('Opening time:','fitness-club-gym'); ?> <?php echo esc_html(get_theme_mod('fitness_club_gym_timing')); ?></p>
							<?php }?>
						</div>
						<div class="col-lg-6 col-md-5 text-md-right text-center align-self-center">
							<?php if( get_theme_mod('fitness_club_gym_phone_number') != ''){?>
								<a href="tel:<?php echo esc_attr(get_theme_mod('fitness_club_gym_phone_number')); ?>" class="phone mb-0"><i class="fas fa-phone mr-2"></i><?php echo esc_html('Call Us:','fitness-club-gym'); ?> <?php echo esc_html(get_theme_mod('fitness_club_gym_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('fitness_club_gym_phone_number')); ?></span></a>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="menu-bar">
					<div class="toggle-menu responsive-menu text-right">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="fitness_club_gym_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','fitness-club-gym'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'fitness-club-gym' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="fitness_club_gym_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','fitness-club-gym'); ?></span></a>
		                </nav>
		            </div>
		        </div>
			</div>
			<div class="col-lg-2 col-md-1 logo-bg">
			</div>
		</div>
	</div>
</div>