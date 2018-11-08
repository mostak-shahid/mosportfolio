<?php /*Template Name: Recent Work Page Template*/?>
<?php 
global $mosportfolio_options;
$all_sections = get_post_meta( get_the_ID(), '_mosportfolio_page_section_layout', true );
$sections = ( @$all_sections["Enabled"] ) ? @$all_sections["Enabled"] : $mosportfolio_options['page-layout-settings']['Enabled'];
?>
<?php 
get_header(); 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_page', $page_details ); 
?>

<?php $page_layout = get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true )? get_post_meta( get_the_ID(), '_mosportfolio_page_layout', true ) : $mosportfolio_options['general-page-layout']; ?>
<section id="page" class="page-content">
	<div class="content-wrap">
		<?php 
		/*
		* action_before_page hook
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
				<?php endif; ?>			
<?php
                        $terms = mos_get_terms ("work-category");
                        ?>
					<div id="works">
        <?php if ($terms) : ?>
            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">All Works</a></li>
            <?php foreach ($terms as $term) : ?>
                <li><a class="btn btn-default" href="#" data-filter=".<?php echo $term["slug"] ?>"><?php echo $term["name"] ?></a></li>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
            <!--/#portfolio-filter-->
<?php 
$args = array(
    'post_type' => 'work',
    'posts_per_page' => -1
);
$query = new WP_Query( $args ); ?>
<?php if ( $query->have_posts() ) : ?>
            <div class="row">
                <div class="portfolio-items">
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php
        $class = ''; 
        $term_list = get_the_terms($post->ID, 'work-category');
        foreach($term_list as $term_single) {
            $class .= $term_single->slug . ' '; //do something here
        }
        ?>
                    <div class="portfolio-item <?php echo $class ?> col-xs-12 col-sm-4 col-md-3 single-work">
                        <div class="recent-work-wrap">
                            <img class="img-responsive" src="<?php echo aq_resize(get_the_post_thumbnail_url(), 290) ?>" width="290" height="179" alt="<?php echo get_the_title() ?>">
                            <h4 class="project-title text-center"><?php echo get_the_title() ?></h4>
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <a class="preview" data-fancybox="gallery-<?php echo get_the_ID() ?>" data-caption="<?php echo get_the_title() ?>" href="<?php echo get_the_post_thumbnail_url() ?>"><i class="fa fa-plus"></i></a>
                                <?php if (get_post_meta( get_the_ID(), '_mosportfolio_work_website', true )) : ?>
                                    <a class="preview" href="<?php echo get_post_meta( get_the_ID(), '_mosportfolio_work_website', true ); ?>" target="_blank"><i class="fa fa-chain"></i></a>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="hidden">
                        <?php 
                        $images = get_post_meta( get_the_ID(), '_mosportfolio_work_gallery_images', true );
                        //var_dump($images);
                        foreach ($images as $attachment_id => $url) :
                        ?>
                        <a data-fancybox="gallery-<?php echo get_the_ID() ?>" data-caption="<?php echo get_the_title() ?>" href="<?php echo wp_get_attachment_url( $attachment_id ) ?>"></a>
                        <?php endforeach ?>
                        </div>
                    </div>
                    <!--/.portfolio-item-->
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>                
                </div>
            </div>  
<?php else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
					
					</div>
				
			<?php if($page_layout != 'ns') : ?>
				</div>
				<div class="page-widgets col-md-4 <?php if($page_layout == 'ls') echo 'col-md-pull-8' ?>">
					<?php get_sidebar('page');?>
				</div>
			</div>
			<?php endif; ?>
		<?php 
		/*
		* action_after_page hook
		* @hooked end_div 10
		*/
		do_action( 'action_after_page', $page_details ); 
		?>
	</div>
</section>
<?php do_action( 'action_below_page', $page_details ); ?>
<?php if($sections ) { foreach ($sections as $key => $value) { get_template_part( 'template-parts/section', $key );}}?>
<?php get_footer(); ?>