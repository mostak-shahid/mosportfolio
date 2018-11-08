<?php 
global $mosportfolio_options;
$animation = $mosportfolio_options['sections-about-animation'];
$animation_delay = ( $mosportfolio_options['sections-about-animation-delay'] ) ? $mosportfolio_options['sections-about-animation-delay'] : 0;
$title = $mosportfolio_options['sections-about-title'];
$content = $mosportfolio_options['sections-about-content'];
$skills = $mosportfolio_options['sections-about-skils'];

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_about', $page_details ); 
?>
<section id="section-about" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_about hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_about', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<div class="row">
					<div class="col-md-8">
					<?php if ($content) : ?>				
						<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
					<?php endif; ?>						
					</div>
					<div class="col-md-4">
						<h4>MY SKILS</h4>
						<?php //mosportfolio_options[sections-about-skils][5][url] 
						if ($skills) {
							foreach ($skills as $skill) : ?>
						<div class="skill-unit">
							<strong><?php echo do_shortcode( $skill['title'] ) ?></strong>
							<div class="progress progress-xs">
								<div class="progress-bar bg-black" role="progressbar" aria-valuenow="<?php echo do_shortcode( $skill['url'] ) ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo do_shortcode( $skill['url'] ) ?>%">
									<span class="sr-only"><?php echo do_shortcode( $skill['url'] ) ?>% Complete</span>
								</div>							
							</div>
						</div>
							<?php endforeach;
						}
						?>

					</div>
				</div>
		<?php 
		/*
		* action_after_about hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_about', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_about', $page_details  ); ?>