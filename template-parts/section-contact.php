<?php 
global $mosportfolio_options;
$title = $mosportfolio_options['sections-contact-title'];
$content = $mosportfolio_options['sections-contact-content'];
$animation = $mosportfolio_options['sections-contact-animation'];
$animation_delay = ( $mosportfolio_options['sections-contact-animation-delay'] ) ? $mosportfolio_options['sections-contact-animation-delay'] : 0;
$short_code = $mosportfolio_options['sections-contact-shortcode'];
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_banner', $page_details );
?>
<section id="section-contact" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_contact hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_contact', $page_details );
		?>
		<div class="row">
			<div class="col-md-4">
			<?php if ($title) : ?>				
				<div class="title-wrapper">
					<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
				</div>
			<?php endif; ?>
		
			<?php 
			/*
			* action_before_contact_form hook
			*/
			do_action( 'action_before_contact_form', $page_details );
			?>	
			<?php 
			/*
			* action_contact_form hook
			* @hooked contact_form_fnc 10
			*/
			do_action( 'action_contact_form', $page_details );
			?>			

			<?php do_action( 'action_after_contact_form', $page_details );?>

			</div>
			<div class="col-md-8">
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<h4>FEEL FREE TO CONTACT WITH ME!</h4>
				<p><?php echo do_shortcode( '[phone_number]' ); ?></p>
				<p><?php echo do_shortcode( '[email index=1]' ); ?></p>
				
			</div>
		</div>
		<?php 
		/*
		* action_after_contact hook
		* @hooked end_div 10
		*/		
		do_action( 'action_after_contact', $page_details ); 
		?>		
		
	</div>
</section>
<?php do_action( 'action_below_contact', $page_details ); ?>