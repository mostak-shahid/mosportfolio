<?php 
global $mosportfolio_options;
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
?>
<?php
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
do_action( 'action_avobe_footer', $page_details );
?>
<footer id="footer">
	<div class="content-wrap">
	<?php do_action( 'action_before_footer', $page_details ); ?>
	<?php $footer_layout = $mosportfolio_options['footer-layout'];
		echo do_shortcode( $footer_layout );		
	?>
	<?php do_action( 'action_after_footer', $page_details ); ?>
	</div>
</footer>
<?php
	/**
	 * action_below_footer hook.
	 *
	 * @hooked back_to_top_fnc - 10
	 */
do_action( 'action_below_footer', $page_details ); 
?>
<div class="hidden-md hidden-lg">
    <div class="small-nav top">
        <?php mobile_menu ($mosportfolio_options['misc-sticky-layout']['On Header']);?>
    </div>  
    <div class="small-nav bottom">
        <?php mobile_menu ($mosportfolio_options['misc-sticky-layout']['On Footer']);?>
    </div> 
<?php 
        wp_nav_menu( array(
            'menu'              => 'mobilemenu',
            'theme_location'    => 'mobilemenu',
            'container'         => false,
            'menu_class'        => 'mobile-menu',
            'fallback_cb'       => 'mos_link_to_menu_editor'
        ));
?>   
</div>

<?php wp_footer(); ?>
<style><?php echo $mosportfolio_options['misc-settings-css'] ?></style>
<script><?php echo $mosportfolio_options['misc-settings-js'] ?></script>
</body>
</html>
