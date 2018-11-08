<?php
    //Contact Section
    Redux::setSection( $opt_name, array(
        'title'            => __( 'Contact Section', 'redux-framework-demo' ),
        'id'               => 'sections-contact',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array( 
            array(
                'id'       => 'sections-contact-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-contact-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-contact .content-wrap' ),
                'title'          => __( 'Spacing Option', 'redux-framework-demo' ),
            ),         
            array(
                'id'       => 'sections-contact-border',
                'type'     => 'border',
                'title'    => __( 'Contact Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-contact' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-contact-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-contact-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ), 
            array(
                'id'       => 'sections-contact-title',
                'type'     => 'text',
                'title'    => __( 'Contact Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br&gt;&lt;/br&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),   
            array(
                'id'       => 'sections-contact-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Contact Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-contact-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-contact-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Contact Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-contact-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-contact-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Contact Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-contact-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-contact-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Contact Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-contact-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-contact-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ) ); 