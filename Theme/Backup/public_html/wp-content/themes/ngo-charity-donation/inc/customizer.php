<?php
/**
 * NGO Charity Donation: Customizer
 *
 * @subpackage NGO Charity Donation
 * @since 1.0
 */

function ngo_charity_donation_customize_register( $wp_customize ) {

	wp_enqueue_style('customizercustom_css', esc_url( get_template_directory_uri() ). '/assets/css/customizer.css');

	// fontawesome icon-picker

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	// Add custom control.
  	require get_parent_theme_file_path( 'inc/switch/control_switch.php' );

  	require get_parent_theme_file_path( 'inc/custom-control.php' );

  	//Register the sortable control type.
	$wp_customize->register_control_type( 'NGO_charity_donation_Control_Sortable' );

  	// Add homepage customizer file
  	require get_template_directory() . '/inc/customizer-home-page.php';

	// pro section
 	$wp_customize->add_section('ngo_charity_donation_pro', array(
        'title'    => __('UPGRADE NGO CHARITY PREMIUM', 'ngo-charity-donation'),
        'priority' => 1,
    ));
    $wp_customize->add_setting('ngo_charity_donation_pro', array(
        'default'           => null,
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control(new NGO_Charity_Donation_Pro_Control($wp_customize, 'ngo_charity_donation_pro', array(
        'label'    => __('NGO CHARITY PREMIUM', 'ngo-charity-donation'),
        'section'  => 'ngo_charity_donation_pro',
        'settings' => 'ngo_charity_donation_pro',
        'priority' => 1,
    )));

    //Logo
    $wp_customize->add_setting('ngo_charity_donation_logo_max_height',array(
		'default'=> '100',
		'transport' => 'refresh',
		'sanitize_callback' => 'ngo_charity_donation_sanitize_integer'
	));
	$wp_customize->add_control(new NGO_charity_donation_Slider_Custom_Control( $wp_customize, 'ngo_charity_donation_logo_max_height',array(
		'label'	=> esc_html__('Logo Width','ngo-charity-donation'),
		'section'=> 'title_tagline',
		'settings'=>'ngo_charity_donation_logo_max_height',
		'input_attrs' => array(
			'reset' 		   => 100,
            'step'             => 1,
			'min'              => 0,
			'max'              => 250,
        ),
        'priority' =>9,
	)));
	$wp_customize->add_setting('ngo_charity_donation_logo_title',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_logo_title',
			array(
				'settings'        => 'ngo_charity_donation_logo_title',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Title', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_logo_text',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_logo_text',
			array(
				'settings'        => 'ngo_charity_donation_logo_text',
				'section'         => 'title_tagline',
				'label'           => __( 'Show Site Tagline', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);

	// typography
	$wp_customize->add_section( 'ngo_charity_donation_typography_settings', array(
		'title'       => __( 'Typography Settings', 'ngo-charity-donation' ),
		'priority'       => 3,
	) );
	$ngo_charity_donation_font_choices = array(
		'' => 'Select',
		'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
		'Open Sans:400italic,700italic,400,700' => 'Open Sans',
		'Oswald:400,700' => 'Oswald',
		'Playfair Display:400,700,400italic' => 'Playfair Display',
		'Montserrat:400,700' => 'Montserrat',
		'Raleway:400,700' => 'Raleway',
		'Droid Sans:400,700' => 'Droid Sans',
		'Lato:400,700,400italic,700italic' => 'Lato',
		'Arvo:400,700,400italic,700italic' => 'Arvo',
		'Lora:400,700,400italic,700italic' => 'Lora',
		'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
		'Oxygen:400,300,700' => 'Oxygen',
		'PT Serif:400,700' => 'PT Serif',
		'PT Sans:400,700,400italic,700italic' => 'PT Sans',
		'PT Sans Narrow:400,700' => 'PT Sans Narrow',
		'Cabin:400,700,400italic' => 'Cabin',
		'Fjalla One:400' => 'Fjalla One',
		'Francois One:400' => 'Francois One',
		'Josefin Sans:400,300,600,700' => 'Josefin Sans',
		'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
		'Arimo:400,700,400italic,700italic' => 'Arimo',
		'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
		'Bitter:400,700,400italic' => 'Bitter',
		'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
		'Roboto:400,400italic,700,700italic' => 'Roboto',
		'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
		'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
		'Roboto Slab:400,700' => 'Roboto Slab',
		'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
		'Rokkitt:400' => 'Rokkitt',
	);
	$wp_customize->add_setting( 'ngo_charity_donation_section_typo_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_typo_heading', array(
		'label'       => esc_html__( 'Typography Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_typography_settings',
		'settings'    => 'ngo_charity_donation_section_typo_heading',
	) ) );
	$wp_customize->add_setting( 'ngo_charity_donation_headings_text', array(
		'sanitize_callback' => 'ngo_charity_donation_sanitize_fonts',
	));
	$wp_customize->add_control( 'ngo_charity_donation_headings_text', array(
		'type' => 'select',
		'description' => __('Select your suitable font for the headings.', 'ngo-charity-donation'),
		'section' => 'ngo_charity_donation_typography_settings',
		'choices' => $ngo_charity_donation_font_choices
	));
	$wp_customize->add_setting( 'ngo_charity_donation_body_text', array(
		'sanitize_callback' => 'ngo_charity_donation_sanitize_fonts'
	));
	$wp_customize->add_control( 'ngo_charity_donation_body_text', array(
		'type' => 'select',
		'description' => __( 'Select your suitable font for the body.', 'ngo-charity-donation' ),
		'section' => 'ngo_charity_donation_typography_settings',
		'choices' => $ngo_charity_donation_font_choices
	) );
   
    // Theme General Settings
    $wp_customize->add_section('ngo_charity_donation_theme_settings',array(
        'title' => __('Theme General Settings', 'ngo-charity-donation'),
        'priority' => 3
    ) );
    $wp_customize->add_setting( 'ngo_charity_donation_section_sticky_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_sticky_heading', array(
		'label'       => esc_html__( 'Sticky Header Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_theme_settings',
		'settings'    => 'ngo_charity_donation_section_sticky_heading',
	) ) );
    $wp_customize->add_setting(
		'ngo_charity_donation_sticky_header',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_sticky_header',
			array(
				'settings'        => 'ngo_charity_donation_sticky_header',
				'section'         => 'ngo_charity_donation_theme_settings',
				'label'           => __( 'Show Sticky Header', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_section_loader_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_loader_heading', array(
		'label'       => esc_html__( 'Loader Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_theme_settings',
		'settings'    => 'ngo_charity_donation_section_loader_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_theme_loader',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => 'off',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(
		new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_theme_loader',
			array(
				'settings'        => 'ngo_charity_donation_theme_loader',
				'section'         => 'ngo_charity_donation_theme_settings',
				'label'           => __( 'Show Site Loader', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);

	$wp_customize->add_setting('ngo_charity_donation_loader_style',array(
        'default' => 'style_one',
        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
	));
	$wp_customize->add_control('ngo_charity_donation_loader_style',array(
        'type' => 'select',
        'label' => __('Select Loader Design','ngo-charity-donation'),
        'section' => 'ngo_charity_donation_theme_settings',
        'choices' => array(
            'style_one' => __('Circle','ngo-charity-donation'),
            'style_two' => __('Bar','ngo-charity-donation'),
        ),
	) );
	
	$wp_customize->add_setting( 'ngo_charity_donation_section_width_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_width_heading', array(
		'label'       => esc_html__( 'Theme Width Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_theme_settings',
		'settings'    => 'ngo_charity_donation_section_width_heading',
	) ) );
	$wp_customize->add_setting('ngo_charity_donation_width_options',array(
        'default' => 'full_width',
        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
	));
	$wp_customize->add_control('ngo_charity_donation_width_options',array(
        'type' => 'select',
        'label' => __('Theme Width Option','ngo-charity-donation'),
        'section' => 'ngo_charity_donation_theme_settings',
        'choices' => array(
            'full_width' => __('Fullwidth','ngo-charity-donation'),
            'Container' => __('Container','ngo-charity-donation'),
            'container_fluid' => __('Container Fluid','ngo-charity-donation'),
        ),
	) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_menu_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_menu_heading', array(
		'label'       => esc_html__( 'Menu Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_theme_settings',
		'settings'    => 'ngo_charity_donation_section_menu_heading',
	) ) );
	$wp_customize->add_setting('ngo_charity_donation_menu_text_transform',array(
        'default' => 'CAPITALISE',
        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
	));
	$wp_customize->add_control('ngo_charity_donation_menu_text_transform',array(
        'type' => 'select',
        'label' => __('Menus Text Transform','ngo-charity-donation'),
        'section' => 'ngo_charity_donation_theme_settings',
        'choices' => array(
            'CAPITALISE' => __('CAPITALISE','ngo-charity-donation'),
            'UPPERCASE' => __('UPPERCASE','ngo-charity-donation'),
            'LOWERCASE' => __('LOWERCASE','ngo-charity-donation'),
        ),
	) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_scroll_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_scroll_heading', array(
		'label'       => esc_html__( 'Scroll Top Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_theme_settings',
		'settings'    => 'ngo_charity_donation_section_scroll_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_scroll_enable',
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
			'ngo_charity_donation_scroll_enable',
			array(
				'settings'        => 'ngo_charity_donation_scroll_enable',
				'section'         => 'ngo_charity_donation_theme_settings',
				'label'           => __( 'Show Scroll Top', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_scroll_options',
		array(
			'default' => 'right_align',
			'transport' => 'refresh',
			'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Text_Radio_Button_Custom_Control( $wp_customize, 'ngo_charity_donation_scroll_options',
		array(
			'type' => 'select',
			'label' => esc_html__( 'Scroll Top Alignment', 'ngo-charity-donation' ),
			'section' => 'ngo_charity_donation_theme_settings',
			'choices' => array(
				'left_align' => __('LEFT','ngo-charity-donation'),
				'center_align' => __('CENTER','ngo-charity-donation'),
				'right_align' => __('RIGHT','ngo-charity-donation'),
			)
		)
	) );
	$wp_customize->add_setting('ngo_charity_donation_scroll_top_icon',array(
		'default'	=> 'fas fa-chevron-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Ngo_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_scroll_top_icon',array(
		'label'	=> __('Add Scroll Top Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_theme_settings',
		'setting'	=> 'ngo_charity_donation_scroll_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting(
		'ngo_charity_donation_enable_custom_cursor',
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
			'ngo_charity_donation_enable_custom_cursor',
			array(
				'settings'        => 'ngo_charity_donation_enable_custom_cursor',
				'section'         => 'ngo_charity_donation_theme_settings',
				'label'           => __( 'show custom cursor', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);

	// Post Layouts
	$wp_customize->add_panel( 'ngo_charity_donation_post_panel', array(
		'title' => esc_html__( 'Post Layout', 'ngo-charity-donation' ),
		'priority' => 4,
	));
    $wp_customize->add_section('ngo_charity_donation_layout',array(
        'title' => __('Single-Post Layout', 'ngo-charity-donation'),
        'panel' => 'ngo_charity_donation_post_panel',
    ) );
    $wp_customize->add_setting( 'ngo_charity_donation_section_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_post_heading', array(
		'label'       => esc_html__( 'Single Post Structure', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_layout',
		'settings'    => 'ngo_charity_donation_section_post_heading',
	) ) );
	$wp_customize->add_setting( 'ngo_charity_donation_single_post_option',
		array(
			'default' => 'single_right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Radio_Image_Control( $wp_customize, 'ngo_charity_donation_single_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Single Post Page Layout', 'ngo-charity-donation' ),
			'section' => 'ngo_charity_donation_layout',
			'choices' => array(

				'single_right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'ngo-charity-donation' )
				),
				'single_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'ngo-charity-donation' )
				),
				'single_full_width' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'ngo-charity-donation' )
				),
			)
		)
	) );
	$wp_customize->add_setting('ngo_charity_donation_single_post_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_single_post_date',
			array(
				'settings'        => 'ngo_charity_donation_single_post_date',
				'section'         => 'ngo_charity_donation_layout',
				'label'           => __( 'Show Date', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_single_post_date', array(
		'selector' => '.date-box',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_single_post_date',
	) );
	$wp_customize->add_setting('ngo_charity_donation_single_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_single_date_icon',array(
		'label'	=> __('date Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_layout',
		'setting'	=> 'ngo_charity_donation_single_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_single_post_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_single_post_admin',
			array(
				'settings'        => 'ngo_charity_donation_single_post_admin',
				'section'         => 'ngo_charity_donation_layout',
				'label'           => __( 'Show Author/Admin', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_single_post_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_single_post_admin',
	) );
	$wp_customize->add_setting('ngo_charity_donation_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_single_author_icon',array(
		'label'	=> __('Author Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_layout',
		'setting'	=> 'ngo_charity_donation_single_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_single_post_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_single_post_comment',
			array(
				'settings'        => 'ngo_charity_donation_single_post_comment',
				'section'         => 'ngo_charity_donation_layout',
				'label'           => __( 'Show Comment', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_single_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_single_comment_icon',array(
		'label'	=> __('comment Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_layout',
		'setting'	=> 'ngo_charity_donation_single_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_single_post_tag_count',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_single_post_tag_count',
			array(
				'settings'        => 'ngo_charity_donation_single_post_tag_count',
				'section'         => 'ngo_charity_donation_layout',
				'label'           => __( 'Show tag count', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_single_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_single_tag_icon',array(
		'label'	=> __('tag Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_layout',
		'setting'	=> 'ngo_charity_donation_single_tag_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_single_post_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_single_post_tag',
			array(
				'settings'        => 'ngo_charity_donation_single_post_tag',
				'section'         => 'ngo_charity_donation_layout',
				'label'           => __( 'Show Tags', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_single_post_tag', array(
		'selector' => '.single-tags',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_single_post_tag',
	) );
	$wp_customize->add_setting('ngo_charity_donation_similar_post',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_similar_post',
			array(
				'settings'        => 'ngo_charity_donation_similar_post',
				'section'         => 'ngo_charity_donation_layout',
				'label'           => __( 'Show Similar post', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_similar_text',array(
		'default' => 'Explore More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ngo_charity_donation_similar_text',array(
		'label' => esc_html__('Similar Post Heading','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_layout',
		'setting' => 'ngo_charity_donation_similar_text',
		'type'    => 'text'
	));
	$wp_customize->add_section('ngo_charity_donation_archieve_post_layot',array(
        'title' => __('Archieve-Post Layout', 'ngo-charity-donation'),
        'panel' => 'ngo_charity_donation_post_panel',
    ) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_archive_post_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_archive_post_heading', array(
		'label'       => esc_html__( 'Archieve Post Structure', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_archieve_post_layot',
		'settings'    => 'ngo_charity_donation_section_archive_post_heading',
	) ) );
    $wp_customize->add_setting( 'ngo_charity_donation_post_option',
		array(
			'default' => 'right_sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Radio_Image_Control( $wp_customize, 'ngo_charity_donation_post_option',
		array(
			'type'=>'select',
			'label' => __( 'select Post Page Layout', 'ngo-charity-donation' ),
			'section' => 'ngo_charity_donation_archieve_post_layot',
			'choices' => array(
				'right_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/2column.jpg',
					'name' => __( 'Right Sidebar', 'ngo-charity-donation' )
				),
				'left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/left.png',
					'name' => __( 'Left Sidebar', 'ngo-charity-donation' )
				),
				'one_column' => array(
					'image' => get_template_directory_uri().'/assets/images/1column.jpg',
					'name' => __( 'One Column', 'ngo-charity-donation' )
				),
				'three_column' => array(
					'image' => get_template_directory_uri().'/assets/images/3column.jpg',
					'name' => __( 'Three Column', 'ngo-charity-donation' )
				),
				'four_column' => array(
					'image' => get_template_directory_uri().'/assets/images/4column.jpg',
					'name' => __( 'Four Column', 'ngo-charity-donation' )
				),
				'grid_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-sidebar.jpg',
					'name' => __( 'Grid-Right-Sidebar Layout', 'ngo-charity-donation' )
				),
				'grid_left_sidebar' => array(
					'image' => get_template_directory_uri().'/assets/images/grid-left.png',
					'name' => __( 'Grid-Left-Sidebar Layout', 'ngo-charity-donation' )
				),
				'grid_post' => array(
					'image' => get_template_directory_uri().'/assets/images/grid.jpg',
					'name' => __( 'Grid Layout', 'ngo-charity-donation' )
				)
			)
		)
	) );
	$wp_customize->add_setting( 'ngo_charity_donation_grid_column',
		array(
			'default' => '3_column',
			'transport' => 'refresh',
			'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		)
	);
	$wp_customize->add_control( new NGO_Charity_Donation_Text_Radio_Button_Custom_Control( $wp_customize, 'ngo_charity_donation_grid_column',
		array(
			'type' => 'select',
			'label' => esc_html__('Grid Post Per Row','ngo-charity-donation'),
			'section' => 'ngo_charity_donation_archieve_post_layot',
			'choices' => array(
				'1_column' => __('1','ngo-charity-donation'),
	            '2_column' => __('2','ngo-charity-donation'),
	            '3_column' => __('3','ngo-charity-donation'),
	            '4_column' => __('4','ngo-charity-donation'),
			)
		)
	) );
	$wp_customize->add_setting('archieve_post_order', array(
        'default' => array('title', 'image', 'meta','excerpt','btn'),
        'sanitize_callback' => 'ngo_charity_donation_sanitize_sortable',
    ));
    $wp_customize->add_control(new NGO_charity_donation_Control_Sortable($wp_customize, 'archieve_post_order', array(
    	'label' => esc_html__('Post Order', 'ngo-charity-donation'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'ngo-charity-donation') ,
        'section' => 'ngo_charity_donation_archieve_post_layot',
        'choices' => array(
            'title' => __('title', 'ngo-charity-donation') ,
            'image' => __('media', 'ngo-charity-donation') ,
            'meta' => __('meta', 'ngo-charity-donation') ,
            'excerpt' => __('excerpt', 'ngo-charity-donation') ,
            'btn' => __('Read more', 'ngo-charity-donation') ,
        ) ,
    )));
	$wp_customize->add_setting('ngo_charity_donation_post_excerpt',array(
		'default'=> 30,
		'transport' => 'refresh',
		'sanitize_callback' => 'ngo_charity_donation_sanitize_integer'
	));
	$wp_customize->add_control(new NGO_Charity_Donation_Slider_Custom_Control( $wp_customize, 'ngo_charity_donation_post_excerpt',array(
		'label' => esc_html__( 'Excerpt Limit','ngo-charity-donation' ),
		'section'=> 'ngo_charity_donation_archieve_post_layot',
		'settings'=>'ngo_charity_donation_post_excerpt',
		'input_attrs' => array(
			'reset'			   => 30,
            'step'             => 1,
			'min'              => 0,
			'max'              => 100,
        ),
	)));
	$wp_customize->add_setting('ngo_charity_donation_read_more_text',array(
		'default' => 'Read More',
		'sanitize_callback' => 'sanitize_text_field'
	)); 
	$wp_customize->add_control('ngo_charity_donation_read_more_text',array(
		'label' => esc_html__('Read More Text','ngo-charity-donation'),
		'section' => 'ngo_charity_donation_archieve_post_layot',
		'setting' => 'ngo_charity_donation_read_more_text',
		'type'    => 'text'
	));
	$wp_customize->add_setting('ngo_charity_donation_read_more_icon',array(
		'default'	=> 'fas fa-arrow-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_charity_donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_read_more_icon',array(
		'label'	=> __('Read More Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_archieve_post_layot',
		'setting'	=> 'ngo_charity_donation_read_more_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_date',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_date',
			array(
				'settings'        => 'ngo_charity_donation_date',
				'section'         => 'ngo_charity_donation_archieve_post_layot',
				'label'           => __( 'Show Date', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_date', array(
		'selector' => '.date-box',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_date',
	) );
	$wp_customize->add_setting('ngo_charity_donation_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_date_icon',array(
		'label'	=> __('date Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_archieve_post_layot',
		'setting'	=> 'ngo_charity_donation_date_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_admin',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_admin',
			array(
				'settings'        => 'ngo_charity_donation_admin',
				'section'         => 'ngo_charity_donation_archieve_post_layot',
				'label'           => __( 'Show Author/Admin', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_admin', array(
		'selector' => '.entry-author',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_admin',
	) );
	$wp_customize->add_setting('ngo_charity_donation_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_author_icon',array(
		'label'	=> __('Author Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_archieve_post_layot',
		'setting'	=> 'ngo_charity_donation_author_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_comment',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_comment',
			array(
				'settings'        => 'ngo_charity_donation_comment',
				'section'         => 'ngo_charity_donation_archieve_post_layot',
				'label'           => __( 'Show Comment', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_comment', array(
		'selector' => '.entry-comments',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_comment',
	) );
	$wp_customize->add_setting('ngo_charity_donation_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_comment_icon',array(
		'label'	=> __('comment Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_archieve_post_layot',
		'setting'	=> 'ngo_charity_donation_comment_icon',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_charity_donation_tag',
		array(
			'type'                 => 'option',
			'capability'           => 'edit_theme_options',
			'theme_supports'       => '',
			'default'              => '1',
			'transport'            => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
		)
	);
	$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch(
			$wp_customize,
			'ngo_charity_donation_tag',
			array(
				'settings'        => 'ngo_charity_donation_tag',
				'section'         => 'ngo_charity_donation_archieve_post_layot',
				'label'           => __( 'Show tag count', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->selective_refresh->add_partial( 'ngo_charity_donation_tag', array(
		'selector' => '.tags',
		'render_callback' => 'ngo_charity_donation_customize_partial_ngo_charity_donation_tag',
	) );
	$wp_customize->add_setting('ngo_charity_donation_tag_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new NGO_Charity_Donation_Fontawesome_Icon_Chooser(
        $wp_customize,'ngo_charity_donation_tag_icon',array(
		'label'	=> __('tag Icon','ngo-charity-donation'),
		'transport' => 'refresh',
		'section'	=> 'ngo_charity_donation_archieve_post_layot',
		'setting'	=> 'ngo_charity_donation_tag_icon',
		'type'		=> 'icon'
	)));

	// header-image
	$wp_customize->add_setting( 'ngo_charity_donation_section_header_image_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_header_image_heading', array(
		'label'       => esc_html__( 'Header Image Settings', 'ngo-charity-donation' ),
		'section'     => 'header_image',
		'settings'    => 'ngo_charity_donation_section_header_image_heading',
		'priority'    =>'1',
	) ) );

	$wp_customize->add_setting('ngo_charity_donation_show_header_image',array(
        'default' => 'on',
        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
	));
	$wp_customize->add_control('ngo_charity_donation_show_header_image',array(
        'type' => 'select',
        'label' => __('Select Option','ngo-charity-donation'),
        'section' => 'header_image',
        'choices' => array(
            'on' => __('With Header Image','ngo-charity-donation'),
            'off' => __('Without Header Image','ngo-charity-donation'),
        ),
	) );

	// breadcrumb
	$wp_customize->add_section('ngo_charity_donation_breadcrumb_settings',array(
        'title' => __('Breadcrumb Settings', 'ngo-charity-donation'),
        'priority' => 4
    ) );
	$wp_customize->add_setting( 'ngo_charity_donation_section_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_breadcrumb_heading', array(
		'label'       => esc_html__( 'theme Breadcrumb Settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_breadcrumb_settings',
		'settings'    => 'ngo_charity_donation_section_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_enable_breadcrumb',
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
			'ngo_charity_donation_enable_breadcrumb',
			array(
				'settings'        => 'ngo_charity_donation_enable_breadcrumb',
				'section'         => 'ngo_charity_donation_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting('ngo_charity_donation_breadcrumb_separator', array(
        'default' => ' / ',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('ngo_charity_donation_breadcrumb_separator', array(
        'label' => __('Breadcrumb Separator', 'ngo-charity-donation'),
        'section' => 'ngo_charity_donation_breadcrumb_settings',
        'type' => 'text',
    ));
	$wp_customize->add_setting( 'ngo_charity_donation_single_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_single_breadcrumb_heading', array(
		'label'       => esc_html__( 'Single post & Page', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_breadcrumb_settings',
		'settings'    => 'ngo_charity_donation_single_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_single_enable_breadcrumb',
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
			'ngo_charity_donation_single_enable_breadcrumb',
			array(
				'settings'        => 'ngo_charity_donation_single_enable_breadcrumb',
				'section'         => 'ngo_charity_donation_breadcrumb_settings',
				'label'           => __( 'Show Breadcrumb', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_setting( 'ngo_charity_donation_woocommerce_breadcrumb_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_woocommerce_breadcrumb_heading', array(
			'label'       => esc_html__( 'Woocommerce Breadcrumb', 'ngo-charity-donation' ),
			'section'     => 'ngo_charity_donation_breadcrumb_settings',
			'settings'    => 'ngo_charity_donation_woocommerce_breadcrumb_heading',
		) ) );
		$wp_customize->add_setting(
			'ngo_charity_donation_woocommerce_enable_breadcrumb',
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
				'ngo_charity_donation_woocommerce_enable_breadcrumb',
				array(
					'settings'        => 'ngo_charity_donation_woocommerce_enable_breadcrumb',
					'section'         => 'ngo_charity_donation_breadcrumb_settings',
					'label'           => __( 'Show Breadcrumb', 'ngo-charity-donation' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'ngo-charity-donation' ),
						'off'    => __( 'Off', 'ngo-charity-donation' ),
					),
					'active_callback' => '',
				)
			)
		);
		$wp_customize->add_setting('woocommerce_breadcrumb_separator', array(
	        'default' => ' / ',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_breadcrumb_separator', array(
	        'label' => __('Breadcrumb Separator', 'ngo-charity-donation'),
	        'section' => 'ngo_charity_donation_breadcrumb_settings',
	        'type' => 'text',
	    ));
	}

	// woocommmerce
	if ( class_exists( 'WooCommerce' ) ) { 
		$wp_customize->add_section('ngo_charity_donation_woocommerce_settings',array(
	        'title' => __('WooCommerce Settings', 'ngo-charity-donation'),
	        'priority' => 4
	    ) );
		$wp_customize->add_setting( 'ngo_charity_donation_section_shoppage_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_shoppage_heading', array(
			'label'       => esc_html__( 'Sidebar Settings', 'ngo-charity-donation' ),
			'section'     => 'ngo_charity_donation_woocommerce_settings',
			'settings'    => 'ngo_charity_donation_section_shoppage_heading',
		) ) );
		$wp_customize->add_setting( 'ngo_charity_donation_shop_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new NGO_Charity_Donation_Radio_Image_Control( $wp_customize, 'ngo_charity_donation_shop_page_sidebar',
			array(
				'type'=>'select',
				'label' => __( 'Show Shop Page Sidebar', 'ngo-charity-donation' ),
				'section'     => 'ngo_charity_donation_woocommerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'ngo-charity-donation' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'ngo-charity-donation' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'ngo-charity-donation' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'ngo_charity_donation_wocommerce_single_page_sidebar',
			array(
				'default' => 'right_sidebar',
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( new NGO_Charity_Donation_Radio_Image_Control( $wp_customize, 'ngo_charity_donation_wocommerce_single_page_sidebar',
			array(
				'type'=>'select',
				'label'           => __( 'Show Single Product Page Sidebar', 'ngo-charity-donation' ),
				'section'     => 'ngo_charity_donation_woocommerce_settings',
				'choices' => array(

					'right_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/2column.jpg',
						'name' => __( 'Right Sidebar', 'ngo-charity-donation' )
					),
					'left_sidebar' => array(
						'image' => get_template_directory_uri().'/assets/images/left.png',
						'name' => __( 'Left Sidebar', 'ngo-charity-donation' )
					),
					'full_width' => array(
						'image' => get_template_directory_uri().'/assets/images/1column.jpg',
						'name' => __( 'Full Width', 'ngo-charity-donation' )
					),
				)
			)
		) );
		$wp_customize->add_setting( 'ngo_charity_donation_section_archieve_product_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_archieve_product_heading', array(
			'label'       => esc_html__( 'Archieve Product Settings', 'ngo-charity-donation' ),
			'section'     => 'ngo_charity_donation_woocommerce_settings',
			'settings'    => 'ngo_charity_donation_section_archieve_product_heading',
		) ) );
		$wp_customize->add_setting('ngo_charity_donation_archieve_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		));
		$wp_customize->add_control('ngo_charity_donation_archieve_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','ngo-charity-donation'),
	        'section' => 'ngo_charity_donation_woocommerce_settings',
	        'choices' => array(
	            '1' => __('One Column','ngo-charity-donation'),
	            '2' => __('Two Column','ngo-charity-donation'),
	            '3' => __('Three Column','ngo-charity-donation'),
	            '4' => __('four Column','ngo-charity-donation'),
	            '5' => __('Five Column','ngo-charity-donation'),
	            '6' => __('Six Column','ngo-charity-donation'),
	        ),
		) );
		$wp_customize->add_setting( 'ngo_charity_donation_archieve_shop_perpage', array(
			'default'              => 6,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'ngo_charity_donation_archieve_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','ngo-charity-donation' ),
			'section'     => 'ngo_charity_donation_woocommerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 30,
			),
		) );
		$wp_customize->add_setting( 'ngo_charity_donation_section_related_heading', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_related_heading', array(
			'label'       => esc_html__( 'Related Product Settings', 'ngo-charity-donation' ),
			'section'     => 'ngo_charity_donation_woocommerce_settings',
			'settings'    => 'ngo_charity_donation_section_related_heading',
		) ) );
		$wp_customize->add_setting('woocommerce_related_products_heading', array(
	        'default' => 'Related products',
	        'sanitize_callback' => 'sanitize_text_field',
	    ));
	    $wp_customize->add_control('woocommerce_related_products_heading', array(
	        'label' => __('Related Products Heading', 'ngo-charity-donation'),
	        'section' => 'ngo_charity_donation_woocommerce_settings',
	        'type' => 'text',
	    ));
		$wp_customize->add_setting('ngo_charity_donation_related_item_columns',array(
	        'default' => '3',
	        'sanitize_callback' => 'ngo_charity_donation_sanitize_choices'
		));
		$wp_customize->add_control('ngo_charity_donation_related_item_columns',array(
	        'type' => 'select',
	        'label' => __('Select No of Columns','ngo-charity-donation'),
	        'section' => 'ngo_charity_donation_woocommerce_settings',
	        'choices' => array(
	            '1' => __('One Column','ngo-charity-donation'),
	            '2' => __('Two Column','ngo-charity-donation'),
	            '3' => __('Three Column','ngo-charity-donation'),
	            '4' => __('four Column','ngo-charity-donation'),
	            '5' => __('Five Column','ngo-charity-donation'),
	            '6' => __('Six Column','ngo-charity-donation'),
	        ),
		) );
		$wp_customize->add_setting( 'ngo_charity_donation_related_shop_perpage', array(
			'default'              => 3,
			'type'                 => 'theme_mod',
			'transport' 		   => 'refresh',
			'sanitize_callback'    => 'ngo_charity_donation_sanitize_number_absint',
			'sanitize_js_callback' => 'absint',
		) );
		$wp_customize->add_control( 'ngo_charity_donation_related_shop_perpage', array(
			'label'       => esc_html__( 'Display Products','ngo-charity-donation' ),
			'section'     => 'ngo_charity_donation_woocommerce_settings',
			'type'        => 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 10,
			),
		) );
		$wp_customize->add_setting(
			'ngo_charity_donation_related_product',
			array(
				'type'                 => 'option',
				'capability'           => 'edit_theme_options',
				'theme_supports'       => '',
				'default'              => '1',
				'transport'            => 'refresh',
				'sanitize_callback'    => 'ngo_charity_donation_callback_sanitize_switch',
			)
		);
		$wp_customize->add_control(new NGO_Charity_Donation_Customizer_Customcontrol_Switch($wp_customize,'ngo_charity_donation_related_product',
			array(
				'settings'        => 'ngo_charity_donation_related_product',
				'section'         => 'ngo_charity_donation_woocommerce_settings',
				'label'           => __( 'show Related Products', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		));
	}

	// mobile width
	$wp_customize->add_section('ngo_charity_donation_mobile_options',array(
        'title' => __('Mobile Media settings', 'ngo-charity-donation'),
        'priority' => 4,
    ) );
    $wp_customize->add_setting( 'ngo_charity_donation_section_mobile_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_mobile_heading', array(
		'label'       => esc_html__( 'Mobile Media settings', 'ngo-charity-donation' ),
		'section'     => 'ngo_charity_donation_mobile_options',
		'settings'    => 'ngo_charity_donation_section_mobile_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_slider_button_mobile_show_hide',
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
			'ngo_charity_donation_slider_button_mobile_show_hide',
			array(
				'settings'        => 'ngo_charity_donation_slider_button_mobile_show_hide',
				'section'         => 'ngo_charity_donation_mobile_options',
				'label'           => __( 'Show Slider Button', 'ngo-charity-donation' ),
				'description' => __('Control wont function if the button is off in the main slider settings.', 'ngo-charity-donation') ,				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'ngo_charity_donation_scroll_enable_mobile',
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
			'ngo_charity_donation_scroll_enable_mobile',
			array(
				'settings'        => 'ngo_charity_donation_scroll_enable_mobile',
				'section'         => 'ngo_charity_donation_mobile_options',
				'label'           => __( 'Show Scroll Top', 'ngo-charity-donation' ),	
				'description' => __('Control wont function if scroll-top is off in the main settings.', 'ngo-charity-donation') ,			
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting( 'ngo_charity_donation_section_mobile_breadcrumb_heading', array(
		'default'           => '',
		'transport'         => 'refresh',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wp_customize->add_control( new NGO_Charity_Donation_Customizer_Customcontrol_Section_Heading( $wp_customize, 'ngo_charity_donation_section_mobile_breadcrumb_heading', array(
		'label'       => esc_html__( 'Mobile Breadcrumb settings', 'ngo-charity-donation' ),
		'description' => __('Controls wont function if the breadcrumb is off in the main breadcrumb settings.', 'ngo-charity-donation') ,
		'section'     => 'ngo_charity_donation_mobile_options',
		'settings'    => 'ngo_charity_donation_section_mobile_breadcrumb_heading',
	) ) );
	$wp_customize->add_setting(
		'ngo_charity_donation_enable_breadcrumb_mobile',
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
			'ngo_charity_donation_enable_breadcrumb_mobile',
			array(
				'settings'        => 'ngo_charity_donation_enable_breadcrumb_mobile',
				'section'         => 'ngo_charity_donation_mobile_options',
				'label'           => __( 'Theme Breadcrumb', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	$wp_customize->add_setting(
		'ngo_charity_donation_single_enable_breadcrumb_mobile',
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
			'ngo_charity_donation_single_enable_breadcrumb_mobile',
			array(
				'settings'        => 'ngo_charity_donation_single_enable_breadcrumb_mobile',
				'section'         => 'ngo_charity_donation_mobile_options',
				'label'           => __( 'Single Post & Page', 'ngo-charity-donation' ),				
				'choices'		  => array(
					'1'      => __( 'On', 'ngo-charity-donation' ),
					'off'    => __( 'Off', 'ngo-charity-donation' ),
				),
				'active_callback' => '',
			)
		)
	);
	if ( class_exists( 'WooCommerce' ) ) {
		$wp_customize->add_setting(
			'ngo_charity_donation_woocommerce_enable_breadcrumb_mobile',
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
				'ngo_charity_donation_woocommerce_enable_breadcrumb_mobile',
				array(
					'settings'        => 'ngo_charity_donation_woocommerce_enable_breadcrumb_mobile',
					'section'         => 'ngo_charity_donation_mobile_options',
					'label'           => __( 'wooCommerce Breadcrumb', 'ngo-charity-donation' ),				
					'choices'		  => array(
						'1'      => __( 'On', 'ngo-charity-donation' ),
						'off'    => __( 'Off', 'ngo-charity-donation' ),
					),
					'active_callback' => '',
				)
			)
		);
	}

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'ngo_charity_donation_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'ngo_charity_donation_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'ngo_charity_donation_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $ngo_charity_donation_i = 1; $ngo_charity_donation_i < ( 1 + $num_sections ); $ngo_charity_donation_i++ ) {
		$wp_customize->add_setting( 'panel_' . $ngo_charity_donation_i, array(
			'default'           => false,
			'sanitize_callback' => 'ngo_charity_donation_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $ngo_charity_donation_i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'ngo-charity-donation' ), $ngo_charity_donation_i ),
			'description'    => ( 1 !== $ngo_charity_donation_i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'ngo-charity-donation' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'ngo_charity_donation_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $ngo_charity_donation_i, array(
			'selector'            => '#panel' . $ngo_charity_donation_i,
			'render_callback'     => 'ngo_charity_donation_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'ngo_charity_donation_customize_register' );

function ngo_charity_donation_customize_partial_blogname() {
	bloginfo( 'name' );
}
function ngo_charity_donation_customize_partial_blogdescription() {
	bloginfo( 'description' );
}
function ngo_charity_donation_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}
function ngo_charity_donation_is_view_with_layout_option() {
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

define('NGO_CHARITY_DONATION_PRO_LINK',__('https://www.ovationthemes.com/wordpress/ngo-charity-wordpress-theme/','ngo-charity-donation'));

/* Pro control */
if (class_exists('WP_Customize_Control') && !class_exists('NGO_Charity_Donation_Pro_Control')):
    class NGO_Charity_Donation_Pro_Control extends WP_Customize_Control{

    public function render_content(){?>
        <label style="overflow: hidden; zoom: 1;">
	        <div class="col-md upsell-btn">
                <a href="<?php echo esc_url( NGO_CHARITY_DONATION_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE NGO CHARITY PREMIUM','ngo-charity-donation');?> </a>
	        </div>
            <div class="col-md">
                <img class="ngo_charity_donation_img_responsive " src="<?php echo esc_url(get_template_directory_uri()); ?>/screenshot.png">
            </div>
	        <div class="col-md">
	            <h3 style="margin-top:10px; margin-left: 20px; text-decoration:underline; color:#333;"><?php esc_html_e('NGO CHARITY PREMIUM - Features', 'ngo-charity-donation'); ?></h3>
                <ul style="padding-top:10px">
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Boxed or fullwidth layout', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Shortcode Support', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Designed with HTML5 and CSS3', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Customizable Design & Code', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Stylish Custom Widgets', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Patterns Background', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'ngo-charity-donation');?> </li>
                    <li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Live Customizer', 'ngo-charity-donation');?> </li>
                   	<li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('AMP Ready', 'ngo-charity-donation');?> </li>
                   	<li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Clean Code', 'ngo-charity-donation');?> </li>
                   	<li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'ngo-charity-donation');?> </li>
                   	<li class="upsell-ngo_charity_donation"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'ngo-charity-donation');?> </li>
                </ul>
        	</div>
		    <div class="col-md upsell-btn upsell-btn-bottom">
	            <a href="<?php echo esc_url( NGO_CHARITY_DONATION_PRO_LINK ); ?>" target="blank" class="btn btn-success btn"><?php esc_html_e('UPGRADE NGO CHARITY PREMIUM','ngo-charity-donation');?> </a>
		    </div>
		    <p><?php printf(__('Please review us if you love our product on %1$sWordPress.org%2$s. </br></br>  Thank You', 'ngo-charity-donation'), '<a target="blank" href="https://wordpress.org/support/theme/ngo-charity-donation/reviews/">', '</a>');
            ?></p>
        </label>
    <?php } }
endif;
