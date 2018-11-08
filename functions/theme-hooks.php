<?php
add_action( 'init', 'text_layout_manager' );
function text_layout_manager () {
    global $mosportfolio_options;
    //Page Title
    if ($mosportfolio_options['sections-title-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_title', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_title', 'start_row', 11, 1 );
        add_action( 'action_before_title', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_title', 'end_div', 10, 1 );
        add_action( 'action_after_title', 'end_div', 11, 1 );
        add_action( 'action_after_title', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-title-text-layout'] == 'container-fliud') {
        add_action( 'action_before_title', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_title', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-title-text-layout'] == 'container-full') {
        add_action( 'action_before_title', 'start_full_width', 10, 1 );
        add_action( 'action_after_title', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_title', 'start_container', 10, 1 );
        add_action( 'action_after_title', 'end_div', 10, 1 );
    }
    //Breadcrumbs
    if ($mosportfolio_options['sections-breadcrumbs-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_breadcrumb', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_breadcrumb', 'start_row', 11, 1 );
        add_action( 'action_before_breadcrumb', 'start_container_col_10', 12, 1 );

        add_action( 'action_below_breadcrumb', 'end_div', 10, 1 );
        add_action( 'action_below_breadcrumb', 'end_div', 11, 1 );
        add_action( 'action_below_breadcrumb', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-breadcrumbs-text-layout'] == 'container-fliud') {
        add_action( 'action_before_breadcrumb', 'start_container_fluid', 10, 1 );
        add_action( 'action_below_breadcrumb', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-breadcrumbs-text-layout'] == 'container-full') {
        add_action( 'action_before_breadcrumb', 'start_full_width', 10, 1 );
        add_action( 'action_below_breadcrumb', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_breadcrumb', 'start_container', 10, 1 );
        add_action( 'action_below_breadcrumb', 'end_div', 10, 1 );
    }
    //Banner
    if ($mosportfolio_options['sections-banner-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_banner_title', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_banner_title', 'start_row', 11, 1 );
        add_action( 'action_before_banner_title', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_banner_url', 'end_div', 10, 1 );
        add_action( 'action_after_banner_url', 'end_div', 11, 1 );
        add_action( 'action_after_banner_url', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-banner-text-layout'] == 'container-fliud') {
        add_action( 'action_before_banner_title', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_banner_url', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-banner-text-layout'] == 'container-full') {
        add_action( 'action_before_banner_title', 'start_full_width', 10, 1 );
        add_action( 'action_after_banner_url', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_banner_title', 'start_container', 10, 1 );
        add_action( 'action_after_banner_url', 'end_div', 10, 1 );
    }
    //Content
    $url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $post_id = url_to_postid( $url );
    $text_layout = ( get_post_meta( $post_id, '_mosportfolio_text_layout', true ) ) ?  get_post_meta( $post_id, '_mosportfolio_text_layout', true ) : $mosportfolio_options['sections-contact-text-layout'];
    if ($text_layout == 'container-fliud-spacing') {
        add_action( 'action_before_page', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_page', 'start_row', 11, 1 );
        add_action( 'action_before_page', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_page', 'end_div', 10, 1 );
        add_action( 'action_after_page', 'end_div', 11, 1 );
        add_action( 'action_after_page', 'end_div', 12, 1 );   
    } elseif ($text_layout == 'container-fliud') {
        add_action( 'action_before_page', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_page', 'end_div', 10, 1 );
    } elseif ($text_layout == 'container-full') {
        add_action( 'action_before_page', 'start_full_width', 10, 1 );
        add_action( 'action_after_page', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_page', 'start_container', 10, 1 );
        add_action( 'action_after_page', 'end_div', 10, 1 );
    }
    //About
    if ($mosportfolio_options['sections-about-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_about', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_about', 'start_row', 11, 1 );
        add_action( 'action_before_about', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_about', 'end_div', 10, 1 );
        add_action( 'action_after_about', 'end_div', 11, 1 );
        add_action( 'action_after_about', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-about-text-layout'] == 'container-fliud') {
        add_action( 'action_before_about', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_about', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-about-text-layout'] == 'container-full') {
        add_action( 'action_before_about', 'start_full_width', 10, 1 );
        add_action( 'action_after_about', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_about', 'start_container', 10, 1 );
        add_action( 'action_after_about', 'end_div', 10, 1 );
    }
    //Portfolio
    if ($mosportfolio_options['sections-portfolio-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_portfolio', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_portfolio', 'start_row', 11, 1 );
        add_action( 'action_before_portfolio', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_portfolio', 'end_div', 10, 1 );
        add_action( 'action_after_portfolio', 'end_div', 11, 1 );
        add_action( 'action_after_portfolio', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-portfolio-text-layout'] == 'container-fliud') {
        add_action( 'action_before_portfolio', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_portfolio', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-portfolio-text-layout'] == 'container-full') {
        add_action( 'action_before_portfolio', 'start_full_width', 10, 1 );
        add_action( 'action_after_portfolio', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_portfolio', 'start_container', 10, 1 );
        add_action( 'action_after_portfolio', 'end_div', 10, 1 );
    }
    //Works
    if ($mosportfolio_options['sections-work-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_work', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_work', 'start_row', 11, 1 );
        add_action( 'action_before_work', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_work', 'end_div', 10, 1 );
        add_action( 'action_after_work', 'end_div', 11, 1 );
        add_action( 'action_after_work', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-work-text-layout'] == 'container-fliud') {
        add_action( 'action_before_work', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_work', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-work-text-layout'] == 'container-full') {
        add_action( 'action_before_work', 'start_full_width', 10, 1 );
        add_action( 'action_after_work', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_work', 'start_container', 10, 1 );
        add_action( 'action_after_work', 'end_div', 10, 1 );
    }
    //Service
    if ($mosportfolio_options['sections-service-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_service', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_service', 'start_row', 11, 1 );
        add_action( 'action_before_service', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_service', 'end_div', 10, 1 );
        add_action( 'action_after_service', 'end_div', 11, 1 );
        add_action( 'action_after_service', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-service-text-layout'] == 'container-fliud') {
        add_action( 'action_before_service', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_service', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-service-text-layout'] == 'container-full') {
        add_action( 'action_before_service', 'start_full_width', 10, 1 );
        add_action( 'action_after_service', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_service', 'start_container', 10, 1 );
        add_action( 'action_after_service', 'end_div', 10, 1 );
    }
    //Counter
    if ($mosportfolio_options['sections-counter-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_counter', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_counter', 'start_row', 11, 1 );
        add_action( 'action_before_counter', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_counter', 'end_div', 10, 1 );
        add_action( 'action_after_counter', 'end_div', 11, 1 );
        add_action( 'action_after_counter', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-counter-text-layout'] == 'container-fliud') {
        add_action( 'action_before_counter', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_counter', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-counter-text-layout'] == 'container-full') {
        add_action( 'action_before_counter', 'start_full_width', 10, 1 );
        add_action( 'action_after_counter', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_counter', 'start_container', 10, 1 );
        add_action( 'action_after_counter', 'end_div', 10, 1 );
    }
    //Blog
    if ($mosportfolio_options['sections-blog-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_blog', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_blog', 'start_row', 11, 1 );
        add_action( 'action_before_blog', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_blog', 'end_div', 10, 1 );
        add_action( 'action_after_blog', 'end_div', 11, 1 );
        add_action( 'action_after_blog', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-blog-text-layout'] == 'container-fliud') {
        add_action( 'action_before_blog', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_blog', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-blog-text-layout'] == 'container-full') {
        add_action( 'action_before_blog', 'start_full_width', 10, 1 );
        add_action( 'action_after_blog', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_blog', 'start_container', 10, 1 );
        add_action( 'action_after_blog', 'end_div', 10, 1 );
    }
    //Button
    if ($mosportfolio_options['sections-button-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_button', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_button', 'start_row', 11, 1 );
        add_action( 'action_before_button', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_button', 'end_div', 10, 1 );
        add_action( 'action_after_button', 'end_div', 11, 1 );
        add_action( 'action_after_button', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-button-text-layout'] == 'container-fliud') {
        add_action( 'action_before_button', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_button', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-button-text-layout'] == 'container-full') {
        add_action( 'action_before_button', 'start_full_width', 10, 1 );
        add_action( 'action_after_button', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_button', 'start_container', 10, 1 );
        add_action( 'action_after_button', 'end_div', 10, 1 );
    }
    //Contact
    if ($mosportfolio_options['sections-contact-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_contact', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_contact', 'start_row', 11, 1 );
        add_action( 'action_before_contact', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_contact', 'end_div', 10, 1 );
        add_action( 'action_after_contact', 'end_div', 11, 1 );
        add_action( 'action_after_contact', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-contact-text-layout'] == 'container-fliud') {
        add_action( 'action_before_contact', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_contact', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-contact-text-layout'] == 'container-full') {
        add_action( 'action_before_contact', 'start_full_width', 10, 1 );
        add_action( 'action_after_contact', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_contact', 'start_container', 10, 1 );
        add_action( 'action_after_contact', 'end_div', 10, 1 );
    }
    //Welcome
    if ($mosportfolio_options['sections-welcome-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_welcome', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_welcome', 'start_row', 11, 1 );
        add_action( 'action_before_welcome', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_welcome', 'end_div', 10, 1 );
        add_action( 'action_after_welcome', 'end_div', 11, 1 );
        add_action( 'action_after_welcome', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-welcome-text-layout'] == 'container-fliud') {
        add_action( 'action_before_welcome', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_welcome', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-welcome-text-layout'] == 'container-full') {
        add_action( 'action_before_welcome', 'start_full_width', 10, 1 );
        add_action( 'action_after_welcome', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_welcome', 'start_container', 10, 1 );
        add_action( 'action_after_welcome', 'end_div', 10, 1 );
    }
    //Team
    if ($mosportfolio_options['sections-team-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_team', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_team', 'start_row', 11, 1 );
        add_action( 'action_before_team', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_team', 'end_div', 10, 1 );
        add_action( 'action_after_team', 'end_div', 11, 1 );
        add_action( 'action_after_team', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-team-text-layout'] == 'container-fliud') {
        add_action( 'action_before_team', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_team', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-team-text-layout'] == 'container-full') {
        add_action( 'action_before_team', 'start_full_width', 10, 1 );
        add_action( 'action_after_team', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_team', 'start_container', 10, 1 );
        add_action( 'action_after_team', 'end_div', 10, 1 );
    }
    //Testimonial
    if ($mosportfolio_options['sections-testimonial-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_testimonial', 'start_row', 11, 1 );
        add_action( 'action_before_testimonial', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 11, 1 );
        add_action( 'action_after_testimonial', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-testimonial-text-layout'] == 'container-fliud') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-testimonial-text-layout'] == 'container-full') {
        add_action( 'action_before_testimonial', 'start_full_width', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_testimonial', 'start_container', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    }
    //Gallery
    if ($mosportfolio_options['sections-gallery-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_gallery', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_gallery', 'start_row', 11, 1 );
        add_action( 'action_before_gallery', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_gallery', 'end_div', 10, 1 );
        add_action( 'action_after_gallery', 'end_div', 11, 1 );
        add_action( 'action_after_gallery', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-gallery-text-layout'] == 'container-fliud') {
        add_action( 'action_before_gallery', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_gallery', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-gallery-text-layout'] == 'container-full') {
        add_action( 'action_before_gallery', 'start_full_width', 10, 1 );
        add_action( 'action_after_gallery', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_gallery', 'start_container', 10, 1 );
        add_action( 'action_after_gallery', 'end_div', 10, 1 );
    }
    //Widgets
    if ($mosportfolio_options['sections-widgets-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_widgets', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_widgets', 'start_row', 11, 1 );
        add_action( 'action_before_widgets', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_widgets', 'end_div', 10, 1 );
        add_action( 'action_after_widgets', 'end_div', 11, 1 );
        add_action( 'action_after_widgets', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-widgets-text-layout'] == 'container-fliud') {
        add_action( 'action_before_widgets', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_widgets', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-widgets-text-layout'] == 'container-full') {
        add_action( 'action_before_widgets', 'start_full_width', 10, 1 );
        add_action( 'action_after_widgets', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_widgets', 'start_container', 10, 1 );
        add_action( 'action_after_widgets', 'end_div', 10, 1 );
    }
    //Footer
    if ($mosportfolio_options['sections-footer-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_footer', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_footer', 'start_row', 11, 1 );
        add_action( 'action_before_footer', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_footer', 'end_div', 10, 1 );
        add_action( 'action_after_footer', 'end_div', 11, 1 );
        add_action( 'action_after_footer', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['sections-footer-text-layout'] == 'container-fliud') {
        add_action( 'action_before_footer', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_footer', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['sections-footer-text-layout'] == 'container-full') {
        add_action( 'action_before_footer', 'start_full_width', 10, 1 );
        add_action( 'action_after_footer', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_footer', 'start_container', 10, 1 );
        add_action( 'action_after_footer', 'end_div', 10, 1 );
    }
    //Blog Page
    if ($mosportfolio_options['blog-archive-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_blog_page', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_blog_page', 'start_row', 11, 1 );
        add_action( 'action_before_blog_page', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_blog_page', 'end_div', 10, 1 );
        add_action( 'action_after_blog_page', 'end_div', 11, 1 );
        add_action( 'action_after_blog_page', 'end_div', 12, 1 );   
    } elseif ($mosportfolio_options['blog-archive-text-layout'] == 'container-fliud') {
        add_action( 'action_before_blog_page', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_blog_page', 'end_div', 10, 1 );
    } elseif ($mosportfolio_options['blog-archive-text-layout'] == 'container-full') {
        add_action( 'action_before_blog_page', 'start_full_width', 10, 1 );
        add_action( 'action_after_blog_page', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_blog_page', 'start_container', 10, 1 );
        add_action( 'action_after_blog_page', 'end_div', 10, 1 );
    }
    
}


add_action( 'action_before_team_page', 'start_container', 10, 1 );
add_action( 'action_after_team_page', 'end_div', 10, 1 );

add_action( 'action_before_team_tab_page', 'start_container', 10, 1 );
add_action( 'action_after_team_tab_page', 'end_div', 10, 1 );

add_action( 'action_before_team_tab_page', 'start_container', 10, 1 );
add_action( 'action_after_team_tab_page', 'end_div', 10, 1 );



add_action( 'action_team_archive_page', 'team_archive_page_fnc', 10, 1 );

add_action( 'action_team_archive', 'start_row', 10, 1 );
add_action( 'action_team_archive', 'team_archive_page_fnc', 20, 1 );
add_action( 'action_team_archive', 'end_div', 30, 1 );


function team_archive_page_fnc () {
    global $mosportfolio_options;
    $members = $mosportfolio_options['sections-team-slides'];
    $padding = ($mosportfolio_options['sections-team-padding']) ? '' : 'no-padding' ;
    $layout = $mosportfolio_options['sections-team-layout'];
    $count = $mosportfolio_options['sections-team-count'];
    $n = 1;
    if($layout == '3col') $colsize = 4;
    elseif($layout == '4col') $colsize = 3;
    else $colsize = 6;
    foreach ($members as $member) : ?>
        <div class="col-sm-6 col-md-<?php echo $colsize ?> <?php echo $padding ?>">
            <div class="team-unit">
            <?php if ($member['attachment_id']) {
                echo wp_get_attachment_image( $member['attachment_id'], 'team-img', false, array('class' => 'img-responsive img-centered img-team') );
                }
            ?>
                <div class="details">
                    <h2 class="name"><?php echo $member['title'] ?></h2>
                <?php if ($member['description']) : ?>
                    <p class="desc"><?php echo $member['description'] ?></p>
                <?php endif; ?>
                    <ul class="list-unstyled info">
                    <?php if($member['address']) : ?>
                        <li class="member-address"><i class="fa fa-map-marker"></i> <?php echo $member['address'] ?></li>
                    <?php endif; ?>
                    <?php if($member['organization']) : ?>
                        <li class="member-organization"><i class="fa fa-building"></i> <?php echo $member['organization'] ?></li>
                    <?php endif; ?>
                    <?php if($member['phone']) : ?>
                        <li class="member-phone"><a href="tel:<?php echo $member['phone'] ?>"><i class="fa fa-phone"></i> <?php echo $member['phone'] ?></a></li>
                    <?php endif; ?>
                    <?php if($member['email']) : ?>
                        <li class="member-email"><a href="mailto:<?php echo $member['email'] ?>"><i class="fa fa-envelope"></i> <?php echo $member['email'] ?></a></li>
                    <?php endif; ?>
                    <?php if($member['facebook']) : ?>
                        <li class="member-facebook"><a href="<?php echo $member['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                    <?php endif; ?>
                    <?php if($member['twitter']) : ?>
                        <li class="member-twitter"><a href="<?php echo $member['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                    <?php endif; ?>
                    <?php if($member['linkedin']) : ?>
                        <li class="member-linkedin"><a href="<?php echo $member['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                    <?php endif; ?>
                    <?php if($member['google-plus']) : ?>
                        <li class="member-google-plus"><a href="<?php echo $member['google-plus'] ?>" target="_blank"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                    <?php endif; ?>
                    <?php if($member['instagram']) : ?>
                        <li class="member-instagram"><a href="<?php echo $member['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
                    <?php endif; ?>
                    <?php if($member['youtube']) : ?>
                        <li class="member-youtube"><a href="<?php echo $member['youtube'] ?>" target="_blank"><i class="fa fa-youtube"></i> Youtube</a></li>
                    <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    <?php 
        if($n>=$count) break; $n++;
    endforeach;

}
add_action( 'action_team_tab_archive_page', 'start_row', 10, 1 );
add_action( 'action_team_tab_archive_page', 'action_team_tab_archive_page_fnc', 20, 1 );
add_action( 'action_team_tab_archive_page', 'end_div', 30, 1 );
function action_team_tab_archive_page_fnc () {
    global $mosportfolio_options;
    $members = $mosportfolio_options['sections-team-slides'];
    $n = 1;
    ?>
    <div class="col-md-4">
    <ul class="nav nav-pills nav-stacked">
    <?php foreach ($members as $member) : ?>
        <li <?php if($n == 1) echo 'class="active"' ?>>
            <a href="#tab-<?php echo $n ?>" data-toggle="pill">
            <?php if ($member['attachment_id']) : ?>
                <span class="small-img">
                        <?php echo wp_get_attachment_image( $member['attachment_id'], 'team-img', false, array('class' => 'img-responsive img-team', 'width'=> '80px', 'height' => '80xp') ); ?>
                </span>
            <?php endif;?>
                <span class="desc">
                <?php echo $member['title'] ?><br  />                
                <?php if($member['organization']) : ?>
                    <?php echo $member['organization'] ?>
                <?php endif; ?>
                </span>                
            </a>
        </li>
    <?php $n++; endforeach; ?>
    </ul>
    </div>
    <div class="tab-content col-md-8">
    <?php $n = 1; ?>
    <?php foreach ($members as $member) : ?>
        <div class="tab-pane <?php if($n == 1) echo 'active';?>" id="tab-<?php echo $n ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="content-part">
                        <h3><?php echo $member['title'] ?></h3>
                        <ul class="list-unstyled info">
                        <?php if($member['address']) : ?>
                            <li class="member-address"><i class="fa fa-map-marker"></i> <?php echo $member['address'] ?></li>
                        <?php endif; ?>
                        <?php if($member['organization']) : ?>
                            <li class="member-organization"><i class="fa fa-building"></i> <?php echo $member['organization'] ?></li>
                        <?php endif; ?>
                        <?php if($member['phone']) : ?>
                            <li class="member-phone"><a href="tel:<?php echo $member['phone'] ?>"><i class="fa fa-phone"></i> <?php echo $member['phone'] ?></a></li>
                        <?php endif; ?>
                        <?php if($member['email']) : ?>
                            <li class="member-email"><a href="mailto:<?php echo $member['email'] ?>"><i class="fa fa-envelope"></i> <?php echo $member['email'] ?></a></li>
                        <?php endif; ?>
                        <?php if($member['facebook']) : ?>
                            <li class="member-facebook"><a href="<?php echo $member['facebook'] ?>" target="_blank"><i class="fa fa-facebook"></i> Facebook</a></li>
                        <?php endif; ?>
                        <?php if($member['twitter']) : ?>
                            <li class="member-twitter"><a href="<?php echo $member['twitter'] ?>" target="_blank"><i class="fa fa-twitter"></i> Twitter</a></li>
                        <?php endif; ?>
                        <?php if($member['linkedin']) : ?>
                            <li class="member-linkedin"><a href="<?php echo $member['linkedin'] ?>" target="_blank"><i class="fa fa-linkedin"></i> LinkedIn</a></li>
                        <?php endif; ?>
                        <?php if($member['google-plus']) : ?>
                            <li class="member-google-plus"><a href="<?php echo $member['google-plus'] ?>" target="_blank"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                        <?php endif; ?>
                        <?php if($member['instagram']) : ?>
                            <li class="member-instagram"><a href="<?php echo $member['instagram'] ?>" target="_blank"><i class="fa fa-instagram"></i> Instagram</a></li>
                        <?php endif; ?>
                        <?php if($member['youtube']) : ?>
                            <li class="member-youtube"><a href="<?php echo $member['youtube'] ?>" target="_blank"><i class="fa fa-youtube"></i> Youtube</a></li>
                        <?php endif; ?>
                        </ul>
                    </div>
                </div> 
                <div class="col-md-6">
                    <?php if ($member['attachment_id']) {
                        echo wp_get_attachment_image( $member['attachment_id'], 'team-img', false, array('class' => 'img-responsive img-centered img-team') );
                        }
                    ?>
                
                </div> 
            </div>


        <?php if ($member['description']) : ?>
            <p class="desc"><?php echo $member['description'] ?></p>
        <?php endif; ?>
        </div>
    <?php $n++; endforeach; ?>
    </div><!-- tab content -->
    <?php 
}

add_action( 'action_before_faq_page', 'start_container', 10, 1 );
add_action( 'action_after_faq_page', 'end_div', 10, 1 );

add_action( 'action_before_contact_page', 'start_container', 10, 1 );
add_action( 'action_after_contact_page', 'end_div', 10, 1 );






add_action( 'action_before_section_blog_loop_item', 'action_before_general_blog_loop_item_fnc', 10, 1 );
function action_before_general_blog_loop_item_fnc () {
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
    $alt_tag = mos_alt_generator(get_the_ID());
} 
    ?>

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
    if (has_post_thumbnail()):
        $attachment_alt = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
    ?>
        <div class="blog-img-container">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('col-4-full', array('class' => 'img-responsive img-blog img-centered', 'alt' => $alt_tag['inner'] . get_the_title()))?></a>
        </div>
    <?php endif;
}

add_action( 'action_before_section_blog_loop_item_title', 'action_before_general_blog_loop_item_title_fnc', 10, 1 );
function action_before_general_blog_loop_item_title_fnc () {
    ?>
    <div class="content blog">
    <?php
}
add_action( 'action_section_blog_loop_item_title', 'action_blog_loop_general_item_title_fnc', 10, 1 );
function action_blog_loop_general_item_title_fnc () {
    if (is_single()) : ?>
        <h2 class="blog-title" title="<?php the_title(); ?>"><?php the_title(); ?></h2>
    <?php else : ?>
        <h2 class="blog-title" title="<?php the_title(); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> </h2>
    <?php endif;
}
add_action( 'action_after_blog_section_loop_item_title', 'action_general_post_meta_fnc', 5, 1 );
add_action( 'action_after_blog_section_loop_item_title', 'action_general_post_content_fnc', 10, 1 );
function action_general_post_meta_fnc () {
    global $mosportfolio_options;
    if($mosportfolio_options['blog-archive-meta']) : ?>
        <ul class="list-unstyled post-meta">
            <?php if($mosportfolio_options['blog-archive-meta-options']['author']) : ?>
                <li><i class="fa fa-user"></i> <?php echo ucfirst(get_the_author()); ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['date']) : ?>
                <li><i class="fa fa-calendar"></i> <?php echo get_the_date('j M Y');  ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['tags']) : ?>
                <!-- <li><?php the_category( ', ' ); ?></li> -->
                <li><?php the_tags( '<i class="fa fa-tags"></i> Tags: ', ', ' ); ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['comment']) : ?>
                <li><i class="fa fa-comments"></i> <?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' ); ?></li>
            <?php endif; ?>
        </ul>
    <?php endif;
}
function action_general_post_content_fnc() {
    global $mosportfolio_options; 
    $excerpt = $mosportfolio_options['blog-use-excerpt'];
    $limit = $mosportfolio_options['blog-use-excerpt-limit'];
    $readmore = $mosportfolio_options['blog-use-excerpt-readmore-text'];
    //edit_post_link( 'Edit Post' );
    if (is_single() OR !$excerpt) : ?>
        <div class="desc"><?php the_content()?></div>        
    <?php else: ?>
        <div class="desc"><?php echo wp_trim_words(get_the_content(), $limit, '')?></div>
        <a href="<?php the_permalink(); ?>" class="btn btn-blog"><?php echo $readmore?></a>
    <?php endif;
}
add_action( 'action_after_blog_section_loop_item', 'action_after_general_blog_loop_item_fnc', 10, 1 );
function action_after_general_blog_loop_item_fnc () {
    ?>
        </div>
    </div>
    <?php 
}

/*Final Blog looping*/
add_action( 'action_before_blog_page_loop_item', 'post_wrapper_start_fnc', 10, 1 );
add_action( 'action_before_blog_page_loop_item', 'post_img_container_start_fnc', 20, 1 );

add_action( 'action_before_blog_page_loop_item_title', 'post_thumbnail_fnc', 10, 1 );
add_action( 'action_before_blog_page_loop_item_title', 'post_meta_fnc', 20, 1 );
add_action( 'action_before_blog_page_loop_item_title', 'end_div', 30, 1 );

add_action( 'action_blog_page_loop_item_title', 'action_blog_loop_general_item_title_fnc', 10, 1 );
add_action( 'action_after_blog_page_loop_item_title', 'action_general_post_content_fnc', 10, 1 );
add_action( 'action_after_blog_page_loop_item_title', 'action_general_post_content_fnc', 10, 1 );


add_action( 'action_after_page_blog_loop_item', 'end_div', 10, 1 );/*end of post_wrapper_start_fnc*/

function post_wrapper_start_fnc () {
    ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php 
}
function post_img_container_start_fnc () {
    ?>
    <div class="blog-img-container">
    <?php 
}
function post_thumbnail_fnc() {
	global $mosportfolio_options;
    ?>

    <?php 
    if (has_post_thumbnail()):
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
            $alt_tag = mos_alt_generator(get_the_ID());
        } 
        ?>
    	<?php if (is_single()) : ?>
        	<?php if($page_layout != 'ns') : ?>
        		<?php the_post_thumbnail('blog-image', array('class' => 'img-responsive img-blog img-centered', 'alt' => $alt_tag['inner'] . get_the_title()))?>
        	<?php else : ?>
        		<?php the_post_thumbnail('blog-image-full', array('class' => 'img-responsive img-blog img-centered', 'alt' => $alt_tag['inner'] . get_the_title()))?>
        	<?php endif; ?>
        <?php else : ?>
        	<?php
        	$img_url = get_the_post_thumbnail_url();
        	$width = ( $mosportfolio_options['blog-archive-grid-img']['width'] ) ? $mosportfolio_options['blog-archive-grid-img']['width'] : '750';
        	$height = ( $mosportfolio_options['blog-archive-grid-img']['height'] ) ? $mosportfolio_options['blog-archive-grid-img']['height'] : '750';
        	?>
        	<a href="<?php the_permalink() ?>"><img src="<?php echo aq_resize($img_url, $width, $height, true) ?>" alt="<?php echo $alt_tag['inner'] . get_the_title() ?>"></a>
        <?php endif ?>
    <?php endif;
}
function post_meta_fnc () {
    global $mosportfolio_options;
    if($mosportfolio_options['blog-archive-meta']) : ?>
        <ul class="list-unstyled post-meta">
            <?php if($mosportfolio_options['blog-archive-meta-options']['date']) : ?>
                <li class="date"><i class="fa fa-calendar"></i> <?php echo get_the_date('j M Y');  ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['author']) : ?>
                <li class="author"><i class="fa fa-user"></i> <?php echo ucfirst(get_the_author()); ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['tags']) : ?>
                <li class="tags"><?php the_tags( '<i class="fa fa-tags"></i> ', ', ' ); ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['categories']) : ?>
                <li class="categories"><i class="fa fa-folder"></i> <?php the_category( ', ' ); ?></li>
            <?php endif; ?>
            <?php if($mosportfolio_options['blog-archive-meta-options']['comment']) : ?>
                <li class="comments"><i class="fa fa-comments"></i> <?php comments_popup_link( '0 Comments', '1 Comment', '% Comments' ); ?></li>
            <?php endif; ?>
        </ul>
    <?php endif;
}



add_action( 'action_contact_form', 'contact_form_fnc', 10, 1 );
function contact_form_fnc () {
    global $mosportfolio_options;
    $short_code = $mosportfolio_options['sections-contact-shortcode'];
    ?>
    <div class="form-wrapper">
    <?php echo do_shortcode( $short_code ); ?>
    </div>
    <?php  
}

//add_action( 'action_before_contact_page_form', 'contact_info', 10, 1 );
add_action( 'action_contact_page_form', 'form_generator', 10, 1 );

function contact_info () {
    global $mosportfolio_options;
    $contact_phone = $mosportfolio_options['contact-phone'][0];
    $contact_email = $mosportfolio_options['contact-email'][0];
    $contact_address = $mosportfolio_options['contact-address'][0]; 
    ?> 
    <ul class="list-inline contact-info">
        <li class="contact-address"><?php echo $contact_address['description']?></li>
        <li class="contact-email"><a href="mailto:<?php echo $contact_email ?>"><?php echo $contact_email ?></a></li>
        <li class="contact-phone"><a href="tel:<?php echo preg_replace('/[^0-9]/', '', $contact_phone); ?>"><span class="hidden-md hidden-lg">Tap to Call</span><span class="hidden-xs hidden-sm"><?php echo $contact_phone ?></span></a></li>
    </ul>
    <?php
}
function form_generator () {
    global $mosportfolio_options;
    $short_code = $mosportfolio_options['contact-page-shortcode'];
        echo '<div class="form-container">';
        echo do_shortcode( $short_code );
        echo '</div>';
}

add_action( 'action_testimonial_archive_page', 'testimonial_archive_fnc', 10, 1 );
function testimonial_archive_fnc ($page_details) {
    global $mosportfolio_options;
    $grid = $mosportfolio_options['testimonial-page-grid'];
    if($grid == '4') { $colsize = 3; }
    elseif($grid == '3') { $colsize = 4; }
    elseif($grid == '2') { $colsize = 6; }
    else { $colsize = 12; }
    $count = ($mosportfolio_options['testimonial-page-count']) ? $mosportfolio_options['testimonial-page-count'] : '-1';
    $args = array(
        'posts_per_page'=>$count,
        'post_type'=>'testimonial',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );
    $query = new WP_Query($args); 
    $n = 1;
    ?>
    <?php if ($query -> have_posts()) : ?>
        <div class="row testimonials">
        <?php  while ($query -> have_posts()) : $query -> the_post(); ?>
            <?php
            $designation = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_designation', true );
            $image = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_image', true );
            $oembed = get_post_meta( get_the_ID(), '_mosportfolio_testimonial_oembed', true );
            ?>
            <div class="col-md-<?php echo $colsize?> <?php if ($colsize < 6 ) echo 'col-sm-6';?>">
                <div class="testimonial-content">
                    <h4 class="author"><?php the_title() ?></h4>
                    <p class="designation"><?php echo $designation ?></p>
                    <div class="desc"><?php the_content(); ?></div>         
                <?php if ($oembed) {
                    $slice = explode("=",$oembed);
                    $video_id = end($slice);                    
                }               
                ?>
                <?php if($video_id) : ?>
                    <div class="img-section">
                        <?php $final_image = ($image) ? $image : 'https://img.youtube.com/vi/'.$video_id.'/maxresdefault.jpg'; ?>
                        <img src="<?php echo $final_image ?>" alt="<?php echo mos_alt_generator(get_the_ID()) . $author ?>" class="img-responsive">
                        <span id="<?php echo $video_id ?>" class="video-icon"></span>
                    </div>
                <?php endif; ?>   
                </div>    
            </div>
            <?php if ($grid > 1 AND $n%$grid == 0 AND $n<$count) echo '</div><div class="row testimonials">'; $n++;?>
        <?php endwhile;?>
        </div>
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
    <?php wp_reset_postdata();
}
add_action( 'action_faq_archive_page', 'faq_archive_fnc', 10, 1 );
function faq_archive_fnc ($page_details) {
    global $mosportfolio_options;
    $count = ($mosportfolio_options['faq-page-count']) ? $mosportfolio_options['faq-page-count'] : '-1' ;               
    $args = array(
        'posts_per_page'=>$count,
        'post_type'=>'faq',
        'order' => 'ASC',
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
    );
    $query = new WP_Query($args); 
    ?>
    <?php if ($query -> have_posts()) : ?>
        <div class="panel-group accordion" id="faq">
        <?php 
        while ($query -> have_posts()) : $query -> the_post(); 
        ?>
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#faq-<?php echo get_the_ID()?>"><?php the_title() ?></a>
                    </h4>
                </div>
                <div id="faq-<?php echo get_the_ID()?>" class="panel-collapse collapse">
                    <div class="panel-body"><?php the_content() ?></div>
                </div>
            </div>
        <?php endwhile;?>
        </div> 

        <div class="pagination-wrapper faq-pagination"> 
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
    <?php wp_reset_postdata();
}
add_action( 'action_below_footer', 'back_to_top_fnc', 10, 1 );
function back_to_top_fnc () {
    ?>
    <a href="javascript:void(0)" class="scrollup" style="display: none;"><img src="<?php echo get_template_directory_uri() ?>/images/icon_top.png" width="40" height="40" alt="Back To Top"></a>
    <?php 
}
function start_container () { ?><div class="container"><?php }
function start_container_fluid () { ?><div class="container-fluid"><?php }
function start_start_full_width () { ?><div class="start_full_width"><?php }
function start_row () { ?><div class="row"><?php }
function start_container_col_10 () { ?><div class="col-lg-10 col-lg-offset-1 col-lg-offset-right-1"><?php }


function start_col_1 () { ?><div class="col-md-1"><?php }
function start_col_2 () { ?><div class="col-md-2"><?php }
function start_col_3 () { ?><div class="col-md-3"><?php }
function start_col_4 () { ?><div class="col-md-4"><?php }
function start_col_5 () { ?><div class="col-md-5"><?php }
function start_col_6 () { ?><div class="col-md-6"><?php }
function start_col_8 () { ?><div class="col-md-8"><?php }
function start_col_7 () { ?><div class="col-md-7"><?php }
function start_col_9 () { ?><div class="col-md-9"><?php }
function start_col_10 () { ?><div class="col-md-10"><?php }
function start_col_11 () { ?><div class="col-md-11"><?php }
function start_col_12 () { ?><div class="col-md-12"><?php }

function start_text_center () { ?><div class="text-center"><?php }
function start_text_right () { ?><div class="text-right"><?php }
function start_text_left () { ?><div class="text-left"><?php }
function end_div () { ?></div><?php }
/*function wpdocs_who_is_hook( $a, $b ) {
    echo '<code>';
        print_r( $a );
    echo '</code>';
 
    echo '<br />'.$b;
}
add_action( 'wpdocs_i_am_hook', 'wpdocs_who_is_hook', 10, 2 );
$a = array(
    'eye patch'  => 'yes',
    'parrot'     => true,
    'wooden leg' => 1
);
$b = __( 'And Hook said: "I ate ice cream with Peter Pan."', 'textdomain' ); 
do_action( 'wpdocs_i_am_hook', $a, $b );*/
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) AND $post->post_type == 'page' ) {
        $classes[] = $post->post_type . '-' . $post->post_name;
    } else {
        $classes[] = $post->post_type . '-archive';
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );