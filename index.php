<?php  
global $mosportfolio_options;
$animation = $mosportfolio_options['sections-content-animation'];
$animation_delay = $mosportfolio_options['sections-content-animation-delay'];
$sections = $mosportfolio_options['blog-layout-settings']['Enabled'];
$heading = $mosportfolio_options['blog-archive-heading'];
if($sections ) {
	$shift = array_shift($sections);
}
?>
<?php 
get_header(); 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_blog_page', $page_details ); 
?>
<?php $page_layout = get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true )? get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true ) : $mosportfolio_options['blog-archive-layout']; ?>
<section id="blog-page" class="page-content" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		<?php 
		/*
		* action_before_blog_page hook
		* @hooked action_before_blog_page 10 (output .container)
		*/
		do_action( 'action_before_blog_page', $page_details ); 
		?>
		<?php if(is_home() AND $heading) : ?>
			<div class="blog-heading"><?php echo do_shortcode( $heading ); ?></div>			
		<?php endif; ?>
			<?php if($page_layout != 'ns') : ?>
			<div class="row">
				<div class="<?php if($page_layout != 'ns' ) echo 'col-md-8'; if($page_layout == 'ls') echo ' col-md-push-4' ?>">
			<?php endif; ?>
				<?php if ( have_posts() ) :?>		
					<?php get_template_part( 'content', get_post_format() ) ?>
					
					<div class="pagination-wrapper">
					<?php
						the_posts_pagination( array(
							'show_all' => false,
							'screen_reader_text' => " ",
							'prev_text'          => 'Prev',
							'next_text'          => 'Next',
						) );
					?>
					</div>
				<?php else : ?>
					<?php get_template_part( 'content', 'none' ); ?>
				<?php endif;?>
				<?php if($page_layout != 'ns') : ?>
				</div>
				<div class="post-widgets col-md-4 <?php if($page_layout == 'ls') echo 'col-md-pull-8' ?>">
					<?php get_sidebar();?>
				</div>
			</div>
				<?php endif; ?>
		<?php 
		/*
		* action_after_blog_page hook
		* @hooked end_div 10
		*/
		do_action( 'action_after_blog_page', $page_details ); 
		?>
	</div>
</section>
<?php do_action( 'action_below_blog_page', $page_details ); ?>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer(); ?>

