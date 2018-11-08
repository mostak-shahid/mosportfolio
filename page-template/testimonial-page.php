<?php /*Template Name: Testimonial Page Template*/  ?>
<?php 
global $mosportfolio_options;
$grid = $mosportfolio_options['testimonial-page-grid'];
if($grid == '4') { $colsize = 3; }
elseif($grid == '3') { $colsize = 4; }
elseif($grid == '2') { $colsize = 6; }
else $colsize = 12;
$all_sections = get_post_meta( get_the_ID(), '_mosportfolio_page_section_layout', true );
$sections = ( @$all_sections["Enabled"] ) ? @$all_sections["Enabled"] : $mosportfolio_options['page-layout-settings']['Enabled'];
?>
<?php 
get_header(); 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial_page_content', $page_details ); 
?>

<?php $page_layout = get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true )? get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true ) : $mosportfolio_options['general-page-layout']; ?>
<section id="testimonial-page" class="page-content">
	<div class="content-wrap">

		<?php 
		/*
		* action_before_testimonial_page hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_page', $page_details ); 
		?>
		<?php if($page_layout != 'ns') : ?>
			<div class="row">
				<div class="<?php if($page_layout != 'ns' ) echo 'col-md-8'; if($page_layout == 'ls') echo ' col-md-push-4' ?>">
			<?php endif; ?>
				<?php if ( have_posts() ) :?>
					<?php get_template_part( 'content', 'page' ) ?>	
					

		<?php
		$count = ($mosportfolio_options['testimonial-page-count']) ? $mosportfolio_options['testimonial-page-count'] : '-1' ;
		$args = array(
			'posts_per_page'=>$count,
			'post_type'=>'testimonial',
        	'paged' => get_query_var('paged') ? get_query_var('paged') : 1
		);
		$query = new WP_Query($args); 
		$count_posts = wp_count_posts('testimonial');
		$total = ($count > 0)? $count : $count_posts->publish;
		$n = 1;
		?>
		<?php if ($query -> have_posts()) : ?>	
			<div class="testimonials">
				<div class="row">
				<?php 
				while ($query -> have_posts()) : $query -> the_post(); 
					$designation = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_designation', true );
					$image = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_image', true );
					$oembed = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_oembed', true );
					?>
						<div class="col-md-<?php echo $colsize;?>">
			                <div class="testimonial-content<?php if ($mosportfolio_options['testimonial-page-content-layout'] == 2) echo ' row' ?>">
			                	<?php
			                	if ($mosportfolio_options['testimonial-page-content-layout'] == 2 AND $mosportfolio_options['testimonial-page-section1-width']) :
				                	$sec_1 = $mosportfolio_options['testimonial-page-section1-width'];
				                	$slice = explode("-",$sec_1);
				                	$num = 12 - end($slice);
				                	$sec_2 = $slice[0] . '-' . $slice[1] . '-' . $num;
				                endif
			                	?>
			                	<div class="sec-1 <?php  echo $sec_1 ?>">
			                	<?php foreach ($mosportfolio_options['testimonial-page-section1'] as $shortcodes) : ?>
			                		<?php echo do_shortcode( $shortcodes ) ?>
			                	<?php endforeach; ?>
			                	</div>
			                	<div class="sec-2 <?php  echo $sec_2 ?>">		                		
			                	<?php foreach ($mosportfolio_options['testimonial-page-section2'] as $shortcodes) : ?>
			                		<?php echo do_shortcode( $shortcodes ) ?>
			                	<?php endforeach; ?>
			                	</div>  
			                </div> 
						</div>	
					<?php if ($n%$grid == 0 AND $n<$total) echo '</div><div class="row">'; $n++;?>
					<?php if ($count>0 AND $n>$count) break;?>
				<?php endwhile;?>
				</div>
			</div>
		<?php endif; ?>
		<?php wp_reset_postdata();?>
        <div class="pagination-wrapper testimonial-pagination"> 
            <nav class="navigation pagination" role="navigation">
                <div class="nav-links">
                <?php 
                $big = 999999999; // need an unlikely integer
                 echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $query->max_num_pages,
                    'prev_text'          => __('Prev'),
                    'next_text'          => __('Next')
                ) );
                ?>
                </div>
            </nav>
        </div>

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
		* action_after_testimonial_page hook
		* @hooked end_div 10
		*/
		do_action( 'action_after_testimonial_page', $page_details ); 
		?>
	</div>
</section>
<?php do_action( 'action_below_page_content', $page_details );  ?>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer(); ?>
