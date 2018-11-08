<?php 
global $mosportfolio_options;
$animation = $mosportfolio_options['sections-work-animation'];
$animation_delay = ( $mosportfolio_options['sections-work-animation-delay'] ) ? $mosportfolio_options['sections-work-animation-delay'] : 0;
$title = $mosportfolio_options['sections-work-title'];
$content = $mosportfolio_options['sections-work-content'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_work', $page_details ); 
?>
<section id="section-work" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_work hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_work', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>                        
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
    'posts_per_page' => 8
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
                        
					   <div class="col-md-4 col-md-offset-4"><a href="<?php echo do_shortcode( $mosportfolio_options['sections-work-url'] ); ?>" class="btn btn-block btn-portfolio">More Works</a></div>
					</div>
		<?php 
		/*
		* action_after_work hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_work', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_work', $page_details  ); ?>