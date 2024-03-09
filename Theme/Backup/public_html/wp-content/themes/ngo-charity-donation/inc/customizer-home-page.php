<?php
/**
 * NGO Charity Donation: Customizer-home-page
 *
 * @subpackage NGO Charity Donation
 * @since 1.0
 */

	//  Home Page Panel
	$wp_customize->add_panel( 'ngo_charity_donation_custompage_panel', array(
		'title' => esc_html__( 'Custom Page Settings', 'ngo-charity-donation' ),
		'priority' => 2,
	));
	// Top Header
    $wp_customize->add_section('ngo_charity_donation_top',array(
        'title' => __('Contact info', 'ngo-charity-donation'),
        'priority' => 3,
        'panel' => 'ngo_charity_donation_custompage_panel',
    ) );
    $wp_customize->add_setting( 'ngo_charity_donation_section_contact_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_contact_heading', array(
		'label'       => esc_html__( 'Contact Settings', 'ngo-charity-donation' ),	
		'description' => __( 'Add contact info in the below feilds', 'ngo-charity-donation' ),		
		'section'     => 'ngo_charity_donation_top',
		'settings'    => 'ngo_charity_donation_section_contact_heading',
	) ) );
    $wp_customize->add_setting('ngo_charity_donation_call_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_call_text',array(
		'label' => esc_html__('Add Phone Text','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_top',
		'setting' => 'ngo_charity_donation_call_text',
		'type'    => 'text'
	));
    $wp_customize->add_setting('ngo_charity_donation_call_number',array(
		'default' => '',
		'sanitize_callback' => 'ngo_charity_donation_sanitize_phone_number'
	));
	$wp_customize->add_control('ngo_charity_donation_call_number',array(
		'label' => esc_html__('Add Phone Number','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_top',
		'setting' => 'ngo_charity_donation_call_number',
		'type'    => 'text'
	));
	$wp_customize->add_setting('ngo_charity_donation_call_icon',array(
		'default'	=> 'fas fa-phone-volume',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_call_icon',array(
		'label'	=> __('Add Call Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_top',
		'setting'	=> 'ngo_charity_donation_call_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('ngo_charity_donation_email_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_email_text',array(
		'label' => esc_html__('Add Email Text','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_top',
		'setting' => 'ngo_charity_donation_email_text',
		'type'    => 'text'
	));
    $wp_customize->add_setting('ngo_charity_donation_email_address',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_email'
	));
	$wp_customize->add_control('ngo_charity_donation_email_address',array(
		'label' => esc_html__('Add Email Address','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_top',
		'setting' => 'ngo_charity_donation_email_address',
		'type'    => 'text'
	));
	$wp_customize->add_setting('ngo_charity_donation_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_email_icon',array(
		'label'	=> __('Add Email Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_top',
		'setting'	=> 'ngo_charity_donation_email_icon',
		'type'		=> 'icon'
	)));
    $wp_customize->add_setting('ngo_charity_donation_donate_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_donate_btn_text',array(
		'label' => esc_html__('Add Donate Button Text','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_top',
		'setting' => 'ngo_charity_donation_donate_btn_text',
		'type'    => 'text'
	));
    $wp_customize->add_setting('ngo_charity_donation_donate_btn_link',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_charity_donation_donate_btn_link',array(
		'label' => esc_html__('Add Donate Button URL','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_top',
		'setting' => 'ngo_charity_donation_donate_btn_link',
		'type'    => 'url'
	));

	// Social Media
    $wp_customize->add_section('ngo_charity_donation_urls',array(
        'title' => __('Social Media', 'ngo-charity-donation'),
        'priority' => 3,
        'panel' => 'ngo_charity_donation_custompage_panel',
    ) );
    $wp_customize->add_setting( 'ngo_charity_donation_section_social_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_social_heading', array(
		'label'       => esc_html__( 'Social Media Settings', 'ngo-charity-donation' ),
		'description' => __( 'Add social media links in the below feilds', 'ngo-charity-donation' ),			
		'section'     => 'ngo_charity_donation_urls',
		'settings'    => 'ngo_charity_donation_section_social_heading',
	) ) );
	$wp_customize->add_setting(
		'header_social_icon_enable',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'header_social_icon_enable',
			array(
				'settings'        => 'header_social_icon_enable',
				'section'         => 'ngo_charity_donation_urls',
				'label'           => __( 'Check to show social fields', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_twitter_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_twitter_heading', array(
		'label'       => esc_html__( 'Twitter Settings', 'ngo-charity-donation' ),			
		'section'     => 'ngo_charity_donation_urls',
		'settings'    => 'ngo_charity_donation_twitter_heading',
	) ) );
   	$wp_customize->add_setting('ngo_charity_donation_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_twitter_icon',array(
		'label'	=> __('Add Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_urls',
		'setting'	=> 'ngo_charity_donation_twitter_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_twitter', array(
		'selector' => '.social-icon a i',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_twitter',
	) );
	$wp_customize->add_setting('ngo_charity_donation_twitter',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_charity_donation_twitter',array(
		'label' => esc_html__('Add URL','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_urls',
		'setting' => 'ngo_charity_donation_twitter',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ngo_charity_donation_header_twt_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new  NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_header_twt_target',
			array(
				'settings'        => 'ngo_charity_donation_header_twt_target',
				'section'         => 'ngo_charity_donation_urls',
				'label'           => __( 'Open link in a new tab', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_linkedin_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_linkedin_heading', array(
		'label'       => esc_html__( 'Linkedin Settings', 'ngo-charity-donation' ),			
		'section'     => 'ngo_charity_donation_urls',
		'settings'    => 'ngo_charity_donation_linkedin_heading',
	) ) );
	$wp_customize->add_setting('ngo_charity_donation_linkedin_icon',array(
		'default'	=> 'fab fa-linkedin',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_linkedin_icon',array(
		'label'	=> __('Add Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_urls',
		'setting'	=> 'ngo_charity_donation_linkedin_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_linkedin',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_charity_donation_linkedin',array(
		'label' => esc_html__('Add URL','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_urls',
		'setting' => 'ngo_charity_donation_linkedin',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ngo_charity_donation_header_linkedin_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new  NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_header_linkedin_target',
			array(
				'settings'        => 'ngo_charity_donation_header_linkedin_target',
				'section'         => 'ngo_charity_donation_urls',
				'label'           => __( 'Open link in a new tab', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_youtube_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_youtube_heading', array(
		'label'       => esc_html__( 'Youtube Settings', 'ngo-charity-donation' ),			
		'section'     => 'ngo_charity_donation_urls',
		'settings'    => 'ngo_charity_donation_youtube_heading',
	) ) );
	$wp_customize->add_setting('ngo_charity_donation_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_youtube_icon',array(
		'label'	=> __('Add Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_urls',
		'setting'	=> 'ngo_charity_donation_youtube_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_youtube',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_charity_donation_youtube',array(
		'label' => esc_html__('Add URL','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_urls',
		'setting' => 'ngo_charity_donation_youtube',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ngo_charity_donation_header_youtube_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new  NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_header_youtube_target',
			array(
				'settings'        => 'ngo_charity_donation_header_youtube_target',
				'section'         => 'ngo_charity_donation_urls',
				'label'           => __( 'Open link in a new tab', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_ins_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_ins_heading', array(
		'label'       => esc_html__( 'Instagram Settings', 'ngo-charity-donation' ),			
		'section'     => 'ngo_charity_donation_urls',
		'settings'    => 'ngo_charity_donation_ins_heading',
	) ) );
	$wp_customize->add_setting('ngo_charity_donation_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_instagram_icon',array(
		'label'	=> __('Add Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_urls',
		'setting'	=> 'ngo_charity_donation_instagram_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_instagram',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_charity_donation_instagram',array(
		'label' => esc_html__('Add URL','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_urls',
		'setting' => 'ngo_charity_donation_instagram',
		'type'    => 'url'
	));
	$wp_customize->add_setting(
		'ngo_charity_donation_header_instagram_target',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new  NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_header_instagram_target',
			array(
				'settings'        => 'ngo_charity_donation_header_instagram_target',
				'section'         => 'ngo_charity_donation_urls',
				'label'           => __( 'Open link in a new tab', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);

    //Slider
	$wp_customize->add_section( 'ngo_charity_donation_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'ngo-charity-donation' ),
		'priority'   => 3,
		'panel' => 'ngo_charity_donation_custompage_panel',
	) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_slide_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_slide_heading', array(
		'label'       => esc_html__( 'Slider Settings', 'ngo-charity-donation' ),
		'description' => __( 'Slider Image Dimension ( 600px x 700px )', 'ngo-charity-donation' ),		
		'section'     => 'ngo_charity_donation_slider_section',
		'settings'    => 'ngo_charity_donation_section_slide_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_slider_arrows',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_slider_arrows',
			array(
				'settings'        => 'ngo_charity_donation_slider_arrows',
				'section'         => 'ngo_charity_donation_slider_section',
				'label'           => __( 'Check To show Slider', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);

	$ngo_charity_donation_args = array('numberposts' => -1);
	$post_list = get_posts($ngo_charity_donation_args);
	$ngo_charity_donation_i = 0;
	$pst_sls[]= __('Select','ngo-charity-donation');
	foreach ($post_list as $key => $p_post) {
		$pst_sls[$p_post->ID]=$p_post->post_title;
	}
	for ( $ngo_charity_donation_i = 1; $ngo_charity_donation_i <= 4; $ngo_charity_donation_i++ ) {
		$wp_customize->add_setting('ngo_charity_donation_post_setting'.$ngo_charity_donation_i,array(
			'sanitize_callback' => 'ngo_charity_donation_sanitize_select',
		));
		$wp_customize->add_control('ngo_charity_donation_post_setting'.$ngo_charity_donation_i,array(
			'type'    => 'select',
			'choices' => $pst_sls,
			'label' => __('Select post','ngo-charity-donation'),
			'section' => 'ngo_charity_donation_slider_section',
			'active_callback' => 'ngo_charity_donation_slider_dropdown',
		));
	}
	wp_reset_postdata();

	$wp_customize->add_setting(
		'ngo_charity_donation_slider_excerpt_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_slider_excerpt_show_hide',
			array(
				'settings'        => 'ngo_charity_donation_slider_excerpt_show_hide',
				'section'         => 'ngo_charity_donation_slider_section',
				'label'           => __( 'Show Hide excerpt', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => 'ngo_charity_donation_slider_dropdown',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_slider_excerpt_count',array(
		'default'=> 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'ngo_charity_donation_sanitize_integer'
	));
	$wp_customize->add_control(new NGO_Charity_Donation_Slider_Custom_Control( $wp_customize, 'ngo_charity_donation_slider_excerpt_count',array(
		'label' => esc_html__( 'Excerpt Limit','ngo-charity-donation' ),
		'section'=> 'ngo_charity_donation_slider_section',
		'settings'=>'ngo_charity_donation_slider_excerpt_count',
		'input_attrs' => array(
			'reset'			   => 20,
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
        'active_callback' => 'ngo_charity_donation_slider_dropdown',
	)));
	$wp_customize->add_setting(
		'ngo_charity_donation_slider_button_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_slider_button_show_hide',
			array(
				'settings'        => 'ngo_charity_donation_slider_button_show_hide',
				'section'         => 'ngo_charity_donation_slider_section',
				'label'           => __( 'Show Hide Button', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => 'ngo_charity_donation_slider_dropdown',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_slider_read_more',array(
		'default' => 'DONATE NOW',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ngo_charity_donation_slider_read_more',array(
		'label' => esc_html__('Button Text','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_slider_section',
		'setting' => 'ngo_charity_donation_slider_read_more',
		'type'    => 'text',
		'active_callback' => 'ngo_charity_donation_slider_dropdown',
	));

	$wp_customize->add_setting( 'ngo_charity_donation_slider_content_alignment',
		array(
			'default' => 'LEFT-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Text_Radio_Button_Custom_Control( $wp_customize, 'ngo_charity_donation_slider_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Slider Content Alignment', 'ngo-charity-donation' ),
			'section' => 'ngo_charity_donation_slider_section',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','ngo-charity-donation'),
	            'CENTER-ALIGN' => __('CENTER','ngo-charity-donation'),
	            'RIGHT-ALIGN' => __('RIGHT','ngo-charity-donation'),
			),
			'active_callback' => 'ngo_charity_donation_slider_dropdown',
		)
	) );

	// Volunteer Section
	$wp_customize->add_section( 'ngo_charity_donation_volunteer_section' , array(
    	'title'      => __( 'Volunteer Section Settings', 'ngo-charity-donation' ),
		'priority'   => 4,
		'panel' => 'ngo_charity_donation_custompage_panel',

	) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_volunteer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_volunteer_heading', array(
		'label'       => esc_html__( 'Volunteer Settings', 'ngo-charity-donation' ),		
		'section'     => 'ngo_charity_donation_volunteer_section',
		'settings'    => 'ngo_charity_donation_section_volunteer_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_volunteer_show_hide',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_volunteer_show_hide',
			array(
				'settings'        => 'ngo_charity_donation_volunteer_show_hide',
				'section'         => 'ngo_charity_donation_volunteer_section',
				'label'           => __( 'Check To show Section', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_volunteer_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_volunteer_title',array(
		'label'	=> esc_html__('Section Title ','ngo-charity-donation'),
		'section'	=> 'ngo_charity_donation_volunteer_section',
		'type'		=> 'text',
		'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
	));
	$wp_customize->add_setting('ngo_charity_donation_volunteer_btn_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_volunteer_btn_text',array(
		'label'	=> esc_html__('Section Button Text','ngo-charity-donation'),
		'section'	=> 'ngo_charity_donation_volunteer_section',
		'type'		=> 'text',
		'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
	));
	$wp_customize->add_setting('ngo_charity_donation_volunteer_btn_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_charity_donation_volunteer_btn_link',array(
		'label'	=> esc_html__('Section Button URL','ngo-charity-donation'),
		'section'	=> 'ngo_charity_donation_volunteer_section',
		'type'		=> 'url',
		'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
	));
	$wp_customize->add_setting('ngo_charity_donation_volunteer_increament',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_volunteer_increament',array(
		'label'	=> esc_html__('Volunteer Box Increament','ngo-charity-donation'),
		'section'	=> 'ngo_charity_donation_volunteer_section',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
		'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
	));

	$ngo_charity_donation_volunteer = get_theme_mod('ngo_charity_donation_volunteer_increament');

	for ($ngo_charity_donation_i=1; $ngo_charity_donation_i <= $ngo_charity_donation_volunteer ; $ngo_charity_donation_i++) {

		$wp_customize->add_setting('ngo_charity_donation_volunteer_box_icon'.$ngo_charity_donation_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('ngo_charity_donation_volunteer_box_icon'.$ngo_charity_donation_i,array(
			'label'	=> esc_html__('Icon ','ngo-charity-donation').$ngo_charity_donation_i,
			'section'	=> 'ngo_charity_donation_volunteer_section',
			'type'		=> 'text',
			'input_attrs' => array(
            	'placeholder' => __( 'fas fa-envelope','ngo-charity-donation' ),
        	),
			'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
		));
		$wp_customize->add_setting('ngo_charity_donation_volunteer_box_number'.$ngo_charity_donation_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('ngo_charity_donation_volunteer_box_number'.$ngo_charity_donation_i,array(
			'label'	=> esc_html__('Number ','ngo-charity-donation').$ngo_charity_donation_i,
			'section'	=> 'ngo_charity_donation_volunteer_section',
			'type'		=> 'text',
			'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
		));
		$wp_customize->add_setting('ngo_charity_donation_volunteer_box_title'.$ngo_charity_donation_i,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('ngo_charity_donation_volunteer_box_title'.$ngo_charity_donation_i,array(
			'label'	=> esc_html__('Title ','ngo-charity-donation').$ngo_charity_donation_i,
			'section'	=> 'ngo_charity_donation_volunteer_section',
			'type'		=> 'text',
			'active_callback' => 'ngo_charity_donation_volunteer_dropdown',
		));
	}

	//Footer
    $wp_customize->add_section( 'ngo_charity_donation_footer_copyright', array(
    	'title'      => esc_html__( 'Footer Text', 'ngo-charity-donation' ),
    	'priority' => 6,
    	'panel' => 'ngo_charity_donation_custompage_panel',
	) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_footer_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_footer_heading', array(
		'label'       => esc_html__( 'Footer Settings', 'ngo-charity-donation' ),		
		'section'     => 'ngo_charity_donation_footer_copyright',
		'settings'    => 'ngo_charity_donation_section_footer_heading',
		'priority' => 1,
	) ) );
    $wp_customize->add_setting('ngo_charity_donation_footer_text',array(
		'default'	=> 'NGO Charity WordPress Theme',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_charity_donation_footer_text',array(
		'label'	=> esc_html__('Copyright Text','ngo-charity-donation'),
		'section'	=> 'ngo_charity_donation_footer_copyright',
		'type'		=> 'textarea'
	));
	$wp_customize->add_setting( 'ngo_charity_donation_footer_content_alignment',
		array(
			'default' => 'CENTER-ALIGN',
			'transport' => 'refresh',
			'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Text_Radio_Button_Custom_Control( $wp_customize, 'ngo_charity_donation_footer_content_alignment',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Footer Content Alignment', 'ngo-charity-donation' ),
			'section' => 'ngo_charity_donation_footer_copyright',
			'choices' => array(
				'LEFT-ALIGN' => __('LEFT','ngo-charity-donation'),
	            'CENTER-ALIGN' => __('CENTER','ngo-charity-donation'),
	            'RIGHT-ALIGN' => __('RIGHT','ngo-charity-donation'),
			),
			'active_callback' => '',
		)
	) );
	$wp_customize->add_setting( 'ngo_charity_donation_footer_widget',
		array(
			'default' => '4',
			'transport' => 'refresh',
			'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Text_Radio_Button_Custom_Control( $wp_customize, 'ngo_charity_donation_footer_widget',
		array(
			'type' => 'select',
			'label' => esc_html__('Footer Per Column','ngo-charity-donation'),
			'section' => 'ngo_charity_donation_footer_copyright',
			'choices' => array(
				'1' => __('1','ngo-charity-donation'),
	            '2' => __('2','ngo-charity-donation'),
	            '3' => __('3','ngo-charity-donation'),
	            '4' => __('4','ngo-charity-donation'),
			)
		)
	) );