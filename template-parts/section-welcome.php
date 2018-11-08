<?php 
global $mosportfolio_options;
$animation = $mosportfolio_options['sections-welcome-animation'];
$animation_delay = ( $mosportfolio_options['sections-welcome-animation-delay'] ) ? $mosportfolio_options['sections-welcome-animation-delay'] : 0;
$title = $mosportfolio_options['sections-welcome-title'];
$content = $mosportfolio_options['sections-welcome-content'];
$image = wp_get_attachment_url( $mosportfolio_options['sections-welcome-media']['id']);
$readmore = $mosportfolio_options['sections-welcome-readmore'];
$url = $mosportfolio_options['sections-welcome-url'];
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_welcome', $page_details ); 
?>
<section id="section-welcome" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">	
		<?php 
		/*
		* action_before_welcome hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_welcome', $page_details ); 
		?>
			<div class="row">
				<div class="col-md-<?php if ($image) echo 6; else echo 12 ?>">	
					<?php if ($title) : ?>				
						<div class="title-wrapper">
							<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
						</div>
					<?php endif; ?>
					<?php 
					if ($readmore == 'scroll') $class = "with-scroll"; 
					elseif ($readmore == 'button') $class = "with-button"; 
					elseif ($readmore == 'popup') $class = "with-popup"; 
					elseif ($readmore == 'redirect') $class = "with-redirect"; 
					else $class = "with-none"; 
					?>
						<div class="desc <?php echo $class ?>"><?php echo do_shortcode( $content );//the_content(); ?></div>
					<?php if ($readmore == 'button') : ?> 	
						<a href="javascript:void(0)" class="btn btn-welcome expand">Read More</a>
						<a href="javascript:void(0)" class="btn btn-welcome bend" style="display: none">Close</a>
					<?php elseif ($readmore == 'popup') : ?>
						<a href="javascript:void(0)" class="btn btn-welcome popup" data-toggle="modal" data-target="#welcomeModal">Read More</a>
					<?php elseif ($readmore == 'redirect') : ?>
						<a href="<?php echo do_shortcode( $url ) ?>" class="btn btn-welcome redirect">Read More</a>
					<?php endif; ?>
					
				</div>
				<?php if ($image) : ?>
				<div class="col-md-6">
					<img class="img-responsive img-centered img-welcome" src="<?php echo $image ?>" alt="<?php echo $alt_tag['inner'] . $title; ?>">
				</div>
				<?php endif; ?>							
			</div>
		<?php 
		/*
		* action_after_welcome hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_welcome', $page_details ); 
		?>	
<?php if ($readmore == 'popup') : ?>
<!-- Modal -->
<div class="modal fade" id="welcomeModal" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo do_shortcode( $title ); ?></h4>
			</div>
			<div class="modal-body">
				<?php echo do_shortcode( $content );//the_content(); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<?php endif; ?>
	</div>
</section>
<?php do_action( 'action_below_welcome', $page_details  ); ?>