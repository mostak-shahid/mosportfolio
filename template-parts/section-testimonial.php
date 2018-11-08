<?php 
global $mosportfolio_options;
$animation = $mosportfolio_options['sections-testimonial-animation'];
$animation_delay = ( $mosportfolio_options['sections-testimonial-animation-delay'] ) ? $mosportfolio_options['sections-testimonial-animation-delay'] : 0;
$title = $mosportfolio_options['sections-testimonial-title']; 
$content = $mosportfolio_options['sections-testimonial-content']; 

$feature = $mosportfolio_options['sections-testimonial-feature']; 
$feature_width = @$mosportfolio_options['sections-testimonial-feature-width']; 
$feature_details = $mosportfolio_options['sections-testimonial-feature-details']; 

$layout = $mosportfolio_options['sections-testimonial-layout'];
$view = $mosportfolio_options['sections-testimonial-view'];
if($layout == '3') { $colsize = 4; }
elseif($layout == '4') { $colsize = 3; }
elseif($layout == '2') { $colsize = 6; }
else { $colsize = 12; }
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial', $page_details ); 
?>
<section id="section-testimonial" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		<?php 
		/*
		* action_before_testimonial hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_testimonial', $page_details );
		?>
		<?php if ($title) : ?>		
			<div class="title-wrapper">
				<h2 class="title"><?php echo do_shortcode( $title ) ?></h2>				
			</div>
		<?php endif ?>
		<?php if ($content) : ?>		
			<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
		<?php endif ?>

		<?php if ( ($feature == 'left' OR $feature == 'right') AND $feature_width ) : ?>
			<?php
			$slice = explode("-",$feature_width);
        	$num = 12 - end($slice);
        	$slice_2 = $slice[0] . '-' . $slice[1] . '-' . $num;
			?>
			<div class="row">
				<div class="<?php echo $feature_width ?> <?php if ($feature == 'right') echo $slice[0] . '-' . $slice[1] . '-' . 'push-' . $num; ?>">
		<?php endif; ?>
		<?php if ( $feature) : ?>			
			<?php if ($feature_details) : ?>
				<div <?php if ( sizeof($feature_details) > 1 ) echo 'class="sec-slider owl-carousel owl-theme"'; else echo 'class="static"';   ?>>
				<?php foreach ($feature_details as $slide) : ?>
					<div class="wrapper">
					<?php if ($slide['attachment_id']) : ?>						
						<div class="img-part"><img src="<?php echo wp_get_attachment_url( $slide['attachment_id']) ?>" alt="<?php echo $alt_tag['inner'] . $slide ?>"></div>
					<?php endif; ?>					
						<div class="con-part">
						<?php if ($slide['title']) : ?>
							<h3 class="f-title"><?php echo do_shortcode( $slide['title'] )  ?></h3>
						<?php endif; ?>
						<?php if ($slide['description']) : ?>
							<div class="desc"><?php echo do_shortcode( $slide['description'] ) ?></div>
						<?php endif; ?>
						</div>
					<?php if ($slide['link_url'] AND $slide['link_title'] ) : ?>
						<a class="f-link" href="<?php echo do_shortcode( $slide['link_url'] )  ?>" <?php if ( $slide['target'] ) echo 'target="_blank"'?>><?php echo do_shortcode( $slide['link_title'] )  ?></a>
					<?php endif; ?>
					</div>
				<?php endforeach; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if ( ($feature == 'left' OR $feature == 'right') AND $feature_width ) : ?>
				</div>
				<div class="<?php echo $slice_2 ?> <?php if ($feature == 'right') echo $slice[0] . '-' . $slice[1] . '-' . 'pull-' . end($slice); ?>">
		<?php endif; ?>


		<?php do_action( 'action_before_testimonial_loop', $page_details ); ?>
		<?php
		$count = ($mosportfolio_options['sections-testimonial-count']) ? $mosportfolio_options['sections-testimonial-count'] : '-1' ;
		$args = array(
			'posts_per_page'=>$count,
			'post_type'=>'testimonial'
		);
		$query = new WP_Query($args); 
		$count_posts = wp_count_posts('testimonial');
		$total = ($count > 0)? $count : $count_posts->publish;
		$n = 1;
		?>
		<?php if ($query -> have_posts()) : ?>	
			<div <?php if ($view == 'slider') echo 'id="section-testimonial-owl" class="testimonials owl-carousel owl-theme"'; elseif ($view == 'grid') echo 'class="row testimonials"'; else echo 'class="testimonials"'; ?> >
			<?php 
			while ($query -> have_posts()) : $query -> the_post(); 
				$designation = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_designation', true );
				$image = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_image', true );
				$oembed = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_oembed', true );
				?>
					<div class="<?php if ($view == 'grid') echo 'col-md-'.$colsize; else echo 'wrapper'?>">
		                <div class="testimonial-content<?php if ($mosportfolio_options['sections-testimonial-content-layout'] == 2) echo ' row' ?>">
		                	<?php
		                	if ($mosportfolio_options['sections-testimonial-content-layout'] == 2 AND $mosportfolio_options['sections-testimonial-section1-width']) :
			                	$sec_1 = $mosportfolio_options['sections-testimonial-section1-width'];
			                	$slice = explode("-",$sec_1);
			                	$num = 12 - end($slice);
			                	$sec_2 = $slice[0] . '-' . $slice[1] . '-' . $num;
			                endif
		                	?>
		                	<div class="sec-1 <?php  echo $sec_1 ?>">
		                	<?php foreach ($mosportfolio_options['sections-testimonial-section1'] as $shortcodes) : ?>
		                		<?php echo do_shortcode( $shortcodes ) ?>
		                	<?php endforeach; ?>
		                	</div>
		                	<div class="sec-2 <?php  echo $sec_2 ?>">		                		
		                	<?php foreach ($mosportfolio_options['sections-testimonial-section2'] as $shortcodes) : ?>
		                		<?php echo do_shortcode( $shortcodes ) ?>
		                	<?php endforeach; ?>
		                	</div>  
		                </div> 
					</div>	
				<?php if ($view == 'grid' AND $n%$layout == 0 AND $n<$total) echo '</div><div class="row">'; $n++;?>
				<?php if ($count>0 AND $n>$count) break;?>
			<?php endwhile;?>
			</div>
		<?php endif; ?>
		<?php wp_reset_postdata();?>
		<?php do_action( 'action_afrer_testimonial_loop', $page_details ); ?>

		<?php if ( ($feature == 'left' OR $feature == 'right') AND $feature_width ) : ?>
				</div>
			</div>
		<?php endif; ?>
		<?php 
		/*
		* action_after_testimonial hook
		* @hooked end_div 10
		*/
		do_action( 'action_after_testimonial', $page_details );
		?>
	</div>
</section>
<?php do_action( 'action_below_testimonial', $page_details );?>