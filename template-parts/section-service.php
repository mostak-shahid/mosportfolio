<?php 
global $mosportfolio_options;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$animation = $mosportfolio_options['sections-service-animation'];
$animation_delay = $mosportfolio_options['sections-service-animation-delay'];
$title = $mosportfolio_options['sections-service-title'];
$content = $mosportfolio_options['sections-service-content'];
$layout = $mosportfolio_options['sections-service-layout'];
$gap = $mosportfolio_options['sections-service-gap'][1];
$slides = $mosportfolio_options['sections-service-slides'];
$view = $mosportfolio_options['sections-service-view'];
if($layout == '3') { $colsize = 4; }
elseif($layout == '4') { $colsize = 3; }
else { $colsize = 6; }
if ($colsize < 6) $smallcol = 6;
else  $smallcol = 12;
$n = 1;
$total = sizeof($slides);
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_service', $page_details ); 
?>

<section id="section-service" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">		
		<?php 
		/*
		* action_before_service hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_service', $page_details ); 
		?>
		<?php if ($title) : ?>			
			<div class="title-wrapper">
				<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
			</div>
		<?php endif; ?>
		<?php if ($content) : ?>			
			<div class="content-wrapper"><?php echo do_shortcode( $content ); ?></div>
		<?php endif; ?>
			<div <?php if ($view == 'slider') echo 'id="section-service-owl" class="services owl-carousel owl-theme"'; elseif ($view == 'grid') echo 'class="row services"'; else echo 'class="services"'; ?> >
			<?php do_action( 'action_before_service_loop', $page_details ); ?>

				<?php foreach ($slides as $slide) :	?>
				<div class="<?php if ($view == 'grid') echo 'col-sm-'.$smallcol.' col-md-'.$colsize; else echo 'wrapper'?><?php if ($gap) echo ' mb30'; else echo ' no-padding'?>">
					<div class="service-unit">
						<div class="img-part">
						<?php if ($slide['image']) : ?>
							<img class="img-responsive img-service-one" src="<?php echo esc_url ($slide['image']) ?>" alt="<?php echo $alt_tag['inner'] . get_the_title( $page ) ?>">
						<?php endif; ?>
						<?php if ($slide['photo']) : ?>
							<img class="img-responsive img-service-two" src="<?php echo esc_url( $slide['photo'] ) ?>" alt="<?php echo $alt_tag['inner'] . get_the_title( $page ) ?>">
						<?php endif; ?>
						</div>
						<div class="content">							
							<h3 class="service-section-title"><?php echo do_shortcode($slide['title']) ?></h3>
							<div class="service-section-desc"><?php echo do_shortcode( $slide['description'] ) ?></div>
						<?php if(@$slide['url_title']) : ?>
							<span class="rd-more"><?php echo $slide['link_title'] ?></span>
						<?php endif; ?>
						</div>
						<?php if (@$slide['link_url']) : ?>
						<a class="service-link" href="<?php echo do_shortcode( $slide['link_url'] ) ?>">View More</a>
						<?php endif; ?>
					</div>
				</div>
				<?php if ($view == 'grid' AND $n%$layout == 0 AND $n<$total) echo '<div class="hidden-xs hidden-sm clearfix"></div>';  if ($view == 'grid' AND $n%2 == 0 AND $n<$total) echo '<div class="hidden-md hidden-lg clearfix"></div>'; $n++;?>	
				<?php endforeach;?>

			<?php do_action( 'action_after_service_loop' ); ?>
			</div>
		<?php 
		/*
		* action_after_service hook
		* @hooked end_div 10
		*/
		do_action( 'action_after_service', $page_details ); 
		?>
	</div>
</section>
<?php do_action( 'action_below_service', $page_details ); ?>

