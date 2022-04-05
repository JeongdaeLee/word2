<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'fitness_club_gym_above_slider' ); ?>

	<?php if( get_theme_mod('fitness_club_gym_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
			    <?php $fitness_club_gym_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'fitness_club_gym_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $fitness_club_gym_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($fitness_club_gym_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $fitness_club_gym_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
					        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
		            			<div class="slider-img text-right">
		            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
		            			</div>
		            			<div class="carousel-caption">
						            <div class="inner-carousel">
						              	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						              	<p class="mb-2"><?php $fitness_club_gym_excerpt = get_the_excerpt(); echo esc_html( fitness_club_gym_string_limit_words( $fitness_club_gym_excerpt,15 ) ); ?></p>
						              	<a href="<?php the_permalink(); ?>" class="read-btn"><span><?php echo esc_html('Read More','fitness-club-gym'); ?></span></a>
				            		</div>
				            	</div>
					        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
			    <?php else : ?>
			    	<div class="no-postfound"></div>
	      		<?php endif;
			    endif;?>
			    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-caret-left"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','fitness-club-gym' );?></span>
			    </a>
			    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-caret-right"></i></span>
			      	<span class="screen-reader-text"><?php esc_html_e( 'Next','fitness-club-gym' );?></span>
			    </a>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>
	
	<?php do_action('fitness_club_gym_below_slider'); ?>

	<?php if(get_theme_mod('fitness_club_gym_section_title') != '' || get_theme_mod('fitness_club_gym_category_setting') != ''){ ?>
		<section id="service-section" class="py-5">
			<div class="container">
				<div class="service-head text-center mb-5">
					<?php if(get_theme_mod('fitness_club_gym_section_title') != ''){?>
						<h3><?php echo esc_html(get_theme_mod('fitness_club_gym_section_title')); ?></h3>
					<?php }?>
				</div>
				<?php $fitness_club_gym_catData1 =  get_theme_mod('fitness_club_gym_category_setting');
				if($fitness_club_gym_catData1){ 
					$args = array(
						'post_type' => 'post',
						'category_name' => esc_html($fitness_club_gym_catData1 ,'fitness-club-gym'),
			        );
			        $i=1; ?>
			        <div class="row">
		        		<?php $query = new WP_Query( $args );
			          	if ( $query->have_posts() ) :
			        		while( $query->have_posts() ) : $query->the_post(); ?>
			          			<div class="col-lg-4 col-md-6">
			          				<div class="service-box">
	          							<div class="service-img">
	          								<?php the_post_thumbnail(); ?>
	          							</div>
          								<div class="service-content">
				            				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							              	<p class="mb-2"><?php $fitness_club_gym_excerpt = get_the_excerpt(); echo esc_html( fitness_club_gym_string_limit_words( $fitness_club_gym_excerpt,10 ) ); ?></p>
							              	<div class="read-btn text-center">
							              		<a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More','fitness-club-gym'); ?><span class="screen-reader-text"><?php echo esc_html('Read More','fitness-club-gym'); ?></span></a>
							              	</div>
			            				</div>
			          				</div>
							    </div>
			          		<?php $i++; endwhile; 
			          		wp_reset_postdata(); ?>
			          	<?php else : ?>
			              	<div class="no-postfound"></div>
			            <?php endif; ?>
	          		</div>
	      		<?php }?>
			</div>
		</section>
	<?php }?>

	<?php do_action('fitness_club_gym_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>