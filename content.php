<?php 
global $mosportfolio_options;
$grid = $mosportfolio_options['blog-archive-grid'];
if($grid == '4') { $colsize = 3; }
elseif($grid == '3') { $colsize = 4; }
elseif($grid == '2') { $colsize = 6; }
else { $colsize = 12; }
if (is_single()) $colsize = 12;
$n = 1;
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_before_blog_page_loop', $page_details );
?>
		<div class="row blogs" >
		<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="col-md-<?php echo $colsize?> <?php if ($colsize < 6 ) echo 'col-sm-6';?>">

						<div class="blog-content<?php if ($mosportfolio_options['blog-archive-content-layout'] == 2) echo ' row' ?>">
		                	<?php
		                	if ($mosportfolio_options['blog-archive-content-layout'] == 2 AND $mosportfolio_options['blog-archive-section1-width']) :
			                	$sec_1 = $mosportfolio_options['blog-archive-section1-width'];
			                	$slice = explode("-",$sec_1);
			                	$num = 12 - end($slice);
			                	$sec_2 = $slice[0] . '-' . $slice[1] . '-' . $num;
			                endif
		                	?>
		                	<div class="sec-1 <?php  echo $sec_1 ?>">
		                	<?php foreach ($mosportfolio_options['blog-archive-section1'] as $shortcodes) : ?>
		                		<?php echo do_shortcode( $shortcodes ) ?>
		                	<?php endforeach; ?>
		                	</div>
		                	<div class="sec-2 <?php  echo $sec_2 ?>">		                		
		                	<?php foreach ($mosportfolio_options['blog-archive-section2'] as $shortcodes) : ?>
		                		<?php echo do_shortcode( $shortcodes ) ?>
		                	<?php endforeach; ?>
		                	</div>  
		                </div> 


			</div>

			<?php if ($grid > 1 AND $n%$grid == 0) echo '</div><div class="row blogs">'; $n++;?>
		<?php endwhile;?>
		</div>
<?php do_action( 'action_below_blog_page_loop', $page_details );?>
