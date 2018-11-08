<?php

function mosportfolio_enqueue_scripts() {
	//Add css files	
	wp_register_style( 'roboto.min', get_template_directory_uri() . '/fonts/Roboto/css/roboto.min.css' );
	wp_register_style( 'montserrat.min', get_template_directory_uri() . '/fonts/Montserrat/css/montserrat.min.css' );
	wp_register_style( 'font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_register_style( 'bootstrap.min', get_template_directory_uri() .  '/css/bootstrap.min.css' );

	wp_register_style( 'animate.min', get_template_directory_uri() .  '/plugins/wow/animate.min.css' );

	wp_register_style( 'owl.carousel.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.carousel.min.css' );
	wp_register_style( 'owl.theme.default.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.theme.default.min.css' );
	wp_register_style( 'jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.css' );

	wp_register_style( 'main.min', get_template_directory_uri() . '/css/main.min.css' );
	//wp_register_style( 'main', get_template_directory_uri() . '/css/main.css' );
	//wp_register_style( 'theme-style', get_stylesheet_uri() );	

	wp_enqueue_style( 'roboto.min' );
	wp_enqueue_style( 'montserrat.min' );
	wp_enqueue_style( 'font-awesome.min' );
	wp_enqueue_style( 'bootstrap.min' );
	wp_enqueue_style( 'jquery.fancybox.min' );
	
	wp_enqueue_style( 'animate.min' );

	wp_enqueue_style( 'owl.carousel.min' );
	wp_enqueue_style( 'owl.theme.default.min' );

	wp_enqueue_style( 'main.min' );
	//wp_enqueue_style( 'main' );
	//wp_enqueue_style( 'theme-style' );
	
	
	//Add JS files
	wp_register_script('bootstrap.min', get_template_directory_uri() .  '/js/bootstrap.min.js', 'jquery', NULL, true);

	wp_register_script('owl.carousel.min', get_template_directory_uri() . '/plugins/owlcarousel/owl.carousel.min.js', 'jquery', NULL, true);
	
	wp_register_script('jquery.fancybox.min', get_template_directory_uri() . '/plugins/fancybox/jquery.fancybox.min.js', 'jquery', NULL, true);

	wp_register_script('jPages.min', get_template_directory_uri() . '/plugins/jPages/jPages.min.js', 'jquery', NULL, true);
	
	wp_register_script('jquery.isotope.min', get_template_directory_uri() . '/plugins/isotope/jquery.isotope.min.js', 'jquery', NULL, true);
	wp_register_script('jquery.sticky.min', get_template_directory_uri() . '/plugins/jquery.sticky.min.js', 'jquery', NULL, true);

	wp_register_script('slimscroll.min', get_template_directory_uri() . '/plugins/slimscroll/jquery.slimscroll.min.js', 'jquery', NULL, true);
	wp_register_script('wow.min', get_template_directory_uri() . '/plugins/wow/wow.min.js', 'jquery', NULL, true);

	wp_register_script('waypoints.min', get_template_directory_uri() . '/plugins/jquery.counterup/waypoints.min.js', 'jquery', NULL, true);
	wp_register_script('jquery.counterup.min', get_template_directory_uri() . '/plugins/jquery.counterup/jquery.counterup.min.js', 'jquery', NULL, true);

	wp_register_script('typed.min', get_template_directory_uri() . '/plugins/typed.js/lib/typed.min.js', 'jquery', NULL, true);
	
	wp_register_script('jquery.lazy.min', get_template_directory_uri() . '/plugins/jquery.lazy-master/jquery.lazy.min.js', 'jquery', NULL, true);
	
	//wp_register_script('main.min', get_template_directory_uri() . '/js/main.min.js', 'jquery');
	wp_register_script('main', get_template_directory_uri() . '/js/main.js', 'jquery', NULL, true);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min' );	
	wp_enqueue_script( 'owl.carousel.min' );
	wp_enqueue_script( 'jquery.fancybox.min' );
	wp_enqueue_script( 'jPages.min' );
	wp_enqueue_script( 'jquery.isotope.min' );
	wp_enqueue_script( 'jquery.sticky.min' );
	wp_enqueue_script( 'slimscroll.min' );
	wp_enqueue_script( 'wow.min' );
	wp_enqueue_script( 'waypoints.min' );
	wp_enqueue_script( 'jquery.counterup.min' );
	wp_enqueue_script( 'typed.min' );
	wp_enqueue_script( 'jquery.lazy.min' );
	wp_enqueue_script( 'main.min' );
	//wp_enqueue_script( 'main' );

}
add_action( 'wp_enqueue_scripts', 'mosportfolio_enqueue_scripts' );
function mosportfolio_admin_enqueue_scripts(){
	wp_register_style( 'font-awesome.min', get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.min.css' );
	wp_register_style( 'custom-admin', get_template_directory_uri() . '/css/custom-admin.css' );
	wp_enqueue_style( 'font-awesome.min' );
	wp_enqueue_style( 'custom-admin' );

	wp_enqueue_media();
	wp_register_script('custom-admin', get_template_directory_uri() . '/js/custom-admin.js', 'jquery');
	wp_enqueue_script('custom-admin');


}
add_action( 'admin_enqueue_scripts', 'mosportfolio_admin_enqueue_scripts' );

