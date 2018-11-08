<?php 
global $mosportfolio_options;
$animation = $mosportfolio_options['sections-counter-animation'];
$animation_delay = ( $mosportfolio_options['sections-counter-animation-delay'] ) ? $mosportfolio_options['sections-counter-animation-delay'] : 0;
$title = $mosportfolio_options['sections-counter-title'];
$content = $mosportfolio_options['sections-counter-content'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_counter', $page_details ); 
?>
<section id="section-counter" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_counter hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_counter', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<div class="row">
                        <div class="col-md-3 col-sm-6">
                        	<div class="con-wrapper">                        		
	                        	<div class="icon-con"><i class="fa fa-code"></i></div>
	                        	<div class="counter-con"><div class="counter">350</div></div>
	                        	<h3 class="text-con">Project completed</h3>
                        	</div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                        	<div class="con-wrapper">                        		
	                        	<div class="icon-con"><i class="fa fa-heart"></i></div>
	                        	<div class="counter-con"><div class="counter">280</div></div>
	                        	<h3 class="text-con">Happy custommers</h3>
                        	</div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                        	<div class="con-wrapper">                        		
	                        	<div class="icon-con"><i class="fa fa-coffee"></i></div>
	                        	<div class="counter-con"><div class="counter">300</div></div>
	                        	<h3 class="text-con">Cups of coffee</h3>
                        	</div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                        	<div class="con-wrapper">                        		
	                        	<div class="icon-con"><i class="fa fa-trophy"></i></div>
	                        	<div class="counter-con"><div class="counter">150</div></div>
	                        	<h3 class="text-con">Award winnig</h3>
                        	</div>
                        </div>
                    </div>
		<?php 
		/*
		* action_after_counter hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_counter', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_counter', $page_details  ); ?>
<script>
jQuery(document).ready(function($) {
	$('.counter').counterUp({
	    delay: 10,
	    time: 1000
	});
});	
</script>