<?php /*Template Name: Thank You Page Template*/ ?>
<?php 
global $mosportfolio_options;
$all_sections = get_post_meta( get_the_ID(), '_mosportfolio_page_section_layout', true );
$sections = ( @$all_sections["Enabled"] ) ? @$all_sections["Enabled"] : $mosportfolio_options['page-layout-settings']['Enabled'];

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
?>
<?php get_header(); ?>

<?php $page_layout = get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true )? get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true ) : $mosportfolio_options['general-page-layout']; ?>
<section id="thanks-page" class="page-content">
	<div class="content-wrap">

		<?php 
		/*
		* action_before_thanks_page hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_page', $page_details ); 
		?>
		<?php if($page_layout != 'ns') : ?>
			<div class="row">
				<div class="<?php if($page_layout != 'ns' ) echo 'col-md-8'; if($page_layout == 'ls') echo ' col-md-push-4' ?>">
			<?php endif; ?>
				<?php if ( have_posts() ) :?>
					<img class="img-responsive img-centered img-thanks" src="<?php echo get_template_directory_uri() ?>/images/thank-you-1.png" alt="<?php echo $alt_tag['inner'] ?>Thank You">
					<?php get_template_part( 'content', 'page' ) ?>
				<?php endif; ?>
			<?php if($page_layout != 'ns') : ?>
				</div>
				<div class="page-widgets col-md-4 <?php if($page_layout == 'ls') echo 'col-md-pull-8' ?>">
					<?php get_sidebar('page');?>
				</div>
			</div>
			<?php endif; ?>
		<?php 
		/*
		* action_after_thanks_page hook
		* @hooked end_div 10
		*/
		do_action( 'action_after_page', $page_details ); 
		?>
	</div>
</section>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer(); ?>
