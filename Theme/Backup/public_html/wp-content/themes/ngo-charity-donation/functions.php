<?php
/**
 * NGO Charity Donation functions and definitions
 *
 * @subpackage NGO Charity Donation
 * @since 1.0
 */

//woocommerce//
//shop page no of columns
function ngo_charity_donation_woocommerce_loop_columns() {
	$retrun = get_theme_mod( 'ngo_charity_donation_archieve_item_columns', 3 );
    return $retrun;
}
add_filter( 'loop_shop_columns', 'ngo_charity_donation_woocommerce_loop_columns' );
function ngo_charity_donation_woocommerce_products_per_page() {
		$retrun = get_theme_mod( 'ngo_charity_donation_archieve_shop_perpage', 6 );
    return $retrun;
}
add_filter( 'loop_shop_per_page', 'ngo_charity_donation_woocommerce_products_per_page' );
// related products
function ngo_charity_donation_related_products_args( $args ) {
    $defaults = array(
        'posts_per_page' => get_theme_mod( 'ngo_charity_donation_related_shop_perpage', 3 ),
        'columns'        => get_theme_mod( 'ngo_charity_donation_related_item_columns', 3),
    );

    $args = wp_parse_args( $defaults, $args );

    return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'ngo_charity_donation_related_products_args' );
function ngo_charity_donation_related_products_heading($translated_text, $text, $domain) {
    $heading = get_theme_mod('woocommerce_related_products_heading', 'Related products');

    if ($text === 'Related products' && $domain === 'woocommerce') {
        $translated_text = $heading;
    }
    return $translated_text;
}
add_filter('gettext', 'ngo_charity_donation_related_products_heading', 20, 3);
// breadcrumb seperator
function ngo_charity_donation_woocommerce_breadcrumb_separator($defaults) {
    $separator = get_theme_mod('woocommerce_breadcrumb_separator', ' / ');

    // Update the separator
    $defaults['delimiter'] = $separator;

    return $defaults;
}
add_filter('woocommerce_breadcrumb_defaults', 'ngo_charity_donation_woocommerce_breadcrumb_separator');
//woocommerce-end//

// Get start function
function ngo_charity_donation_custom_admin_notice() {
    // Check if the notice is dismissed
    if (!get_user_meta(get_current_user_id(), 'dismissed_admin_notice', true)) {
        // Check if not on the theme documentation page
        $current_screen = get_current_screen();
        if ($current_screen && $current_screen->id !== 'appearance_page_ngo-charity-donation-guide-page') {
            $theme = wp_get_theme();
            ?>
            <div class="notice notice-info is-dismissible">
                <div class="notice-div">
                    <div>
                        <p class="theme-name"><?php echo esc_html($theme->get('Name')); ?></p>
                        <p><?php _e('For information and detailed instructions, check out our theme documentation.', 'ngo-charity-donation'); ?></p>
                    </div>
                    <a class="button-primary" href="themes.php?page=ngo-charity-donation-guide-page"><?php _e('Theme Documentation', 'ngo-charity-donation'); ?></a>
                </div>
            </div>
        <?php
        }
    }
}
add_action('admin_notices', 'ngo_charity_donation_custom_admin_notice');
// Dismiss notice function
function ngo_charity_donation_dismiss_admin_notice() {
    update_user_meta(get_current_user_id(), 'dismissed_admin_notice', true);
}
add_action('wp_ajax_ngo_charity_donation_dismiss_admin_notice', 'ngo_charity_donation_dismiss_admin_notice');
// Enqueue scripts and styles
function ngo_charity_donation_enqueue_admin_script($hook) {
    // Admin JS
    wp_enqueue_script('ngo-charity-donation-admin.js', get_theme_file_uri('/assets/js/ngo-charity-donation-admin.js'), array('jquery'), true);

    // Enqueue custom CSS for the dashboard
    wp_enqueue_style('ngo-charity-donation-dashboard-css', get_theme_file_uri('/inc/dashboard/dashboard.css'));

    wp_localize_script('ngo-charity-donation-admin.js', 'ngo_charity_donation_scripts_localize', array(
        'ajax_url' => esc_url(admin_url('admin-ajax.php'))
    ));
}
add_action('admin_enqueue_scripts', 'ngo_charity_donation_enqueue_admin_script');
// Reset the dismissed notice status when the theme is switched
function ngo_charity_donation_after_switch_theme() {
    delete_user_meta(get_current_user_id(), 'dismissed_admin_notice');
}
add_action('after_switch_theme', 'ngo_charity_donation_after_switch_theme');
//get-start-function-end//

// tag count
function display_post_tag_count() {
    $tags = get_the_tags();
    $tag_count = ($tags) ? count($tags) : 0;
    $tag_text = ($tag_count === 1) ? 'tag' : 'tags'; // Check for pluralization
    echo $tag_count . ' ' . $tag_text;
}

//media post format
function construction_firm_get_media($type = array()){
	$content = apply_filters( 'the_content', get_the_content() );
  	$output = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $output = get_media_embedded_in_content( $content, $type );
    return $output;
  }
}

// front page template
function ngo_charity_donation_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'ngo_charity_donation_front_page_template' );

// excerpt function
function ngo_charity_donation_custom_excerpt() {
    $excerpt = get_the_excerpt();
    $plain_text_excerpt = wp_strip_all_tags($excerpt);
    
    // Get dynamic word limit from theme mod
    $word_limit = esc_attr(get_theme_mod('ngo_charity_donation_post_excerpt', '30'));
    
    // Limit the number of words
    $limited_excerpt = implode(' ', array_slice(explode(' ', $plain_text_excerpt), 0, $word_limit));

    echo esc_html($limited_excerpt);
}

// typography
function ngo_charity_donation_fonts_scripts() {
	$ngo_charity_donation_headings_font = esc_html(get_theme_mod('ngo_charity_donation_headings_text'));
	$ngo_charity_donation_body_font = esc_html(get_theme_mod('ngo_charity_donation_body_text'));

	if( $ngo_charity_donation_headings_font ) {
		wp_enqueue_style( 'ngo-charity-donation-headings-fonts', '//fonts.googleapis.com/css?family='. $ngo_charity_donation_headings_font );
	} else {
		wp_enqueue_style( 'ngo-charity-donation-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $ngo_charity_donation_body_font ) {
		wp_enqueue_style( 'ngo-charity-donation-body-fonts', '//fonts.googleapis.com/css?family='. $ngo_charity_donation_body_font );
	} else {
		wp_enqueue_style( 'ngo-charity-donation-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'ngo_charity_donation_fonts_scripts' );

// Footer Text
function ngo_charity_donation_copyright_link() {
    $footer_text = get_theme_mod('ngo_charity_donation_footer_text', esc_html__('NGO Charity WordPress Theme', 'ngo-charity-donation'));
    $credit_link = esc_url('https://www.ovationthemes.com/wordpress/free-ngo-charity-wordpress-theme/');

    echo '<a href="' . $credit_link . '" target="_blank">' . esc_html($footer_text) . '<span class="footer-copyright">' . esc_html__(' By Ovation Themes', 'ngo-charity-donation') . '</span></a>';
}

// custom sanitizations
// dropdown
function ngo_charity_donation_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}
// slider custom control
if ( ! function_exists( 'ngo_charity_donation_sanitize_integer' ) ) {
	function ngo_charity_donation_sanitize_integer( $input ) {
		return (int) $input;
	}
}
// range contol
function ngo_charity_donation_sanitize_number_absint( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}
// select post page
function ngo_charity_donation_sanitize_select( $ngo_charity_donation_input, $setting ){
    $ngo_charity_donation_input = sanitize_key($ngo_charity_donation_input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $ngo_charity_donation_input, $choices ) ? $ngo_charity_donation_input : $setting->default );
}
// toggle switch
function ngo_charity_donation_callback_sanitize_switch( $value ) {
	// Switch values must be equal to 1 of off. Off is indicator and should not be translated.
	return ( ( isset( $value ) && $value == 1 ) ? 1 : 'off' );
}
//choices control
function ngo_charity_donation_sanitize_choices( $ngo_charity_donation_input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $ngo_charity_donation_input, $control->choices ) ) {
        return $ngo_charity_donation_input;
    } else {
        return $setting->default;
    }
}
// phone number
function ngo_charity_donation_sanitize_phone_number( $phone ) {
  return preg_replace( '/[^\d+]/', '', $phone );
}
// Sanitize Sortable control.
function ngo_charity_donation_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

// customizer dropdown
function ngo_charity_donation_slider_dropdown(){
	if(get_option('ngo_charity_donation_slider_arrows') == true ) {
		return true;
	}
	return false;
}
function ngo_charity_donation_volunteer_dropdown(){
	if(get_option('ngo_charity_donation_volunteer_show_hide') == true ) {
		return true;
	}
	return false;
}

// theme setup
function ngo_charity_donation_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( "align-wide" );
	add_theme_support( "wp-block-styles" );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'title-tag' );
	add_theme_support('custom-background',array(
		'default-color' => 'ffffff',
	));
	add_image_size( 'ngo-charity-donation-featured-image', 2000, 1200, true );
	add_image_size( 'ngo-charity-donation-thumbnail-avatar', 100, 100, true );

	$GLOBALS['content_width'] = 525;
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ngo-charity-donation' ),
	) );

	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio','quote',) );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', ngo_charity_donation_fonts_url() ) );
}
add_action( 'after_setup_theme', 'ngo_charity_donation_setup' );

// widgets
function ngo_charity_donation_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ngo-charity-donation' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'ngo-charity-donation' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your pages and posts', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'ngo-charity-donation' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget_container"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ngo-charity-donation' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ngo-charity-donation' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ngo-charity-donation' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ngo-charity-donation' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Category Dropdown', 'ngo-charity-donation' ),
		'id'            => 'product-cat',
		'description'   => __( 'Add widgets here to appear in your header.', 'ngo-charity-donation' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ngo_charity_donation_widgets_init' );

// google fonts
function ngo_charity_donation_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Inter:wght@100;200;300;400;500;600;700;800;900';
	$font_family[] = 'Outfit:wght@100;200;300;400;500;600;700;800;900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

//Enqueue scripts and styles.
function ngo_charity_donation_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ngo-charity-donation-fonts', ngo_charity_donation_fonts_url(), array() );

	//Bootstarp
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'ngo-charity-donation-style', get_stylesheet_uri() );

	wp_style_add_data('ngo-charity-donation-style', 'rtl', 'replace');

	// Theme Customize CSS.
	require get_parent_theme_file_path( 'inc/extra_customization.php' );
	wp_add_inline_style( 'ngo-charity-donation-style',$ngo_charity_donation_custom_style );

	//font-awesome
	wp_enqueue_style( 'font-awesome-style', get_template_directory_uri().'/assets/css/fontawesome-all.css' );

	// Block Style
	wp_enqueue_style( 'ngo-charity-donation-block-style', get_template_directory_uri().'/assets/css/blocks.css' );

	//Custom JS
	wp_enqueue_script( 'ngo-charity-donation-custom.js', get_theme_file_uri( '/assets/js/theme-script.js' ), array( 'jquery' ), true );

	//Nav Focus JS
	wp_enqueue_script( 'ngo-charity-donation-navigation-focus', get_theme_file_uri( '/assets/js/navigation-focus.js' ), array( 'jquery' ), true );

	//Bootstarp JS
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ),true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ngo_charity_donation_scripts' );

function ngo_charity_donation_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'ngo-charity-donation-block-editor-style', trailingslashit( esc_url ( get_template_directory_uri() ) ) . '/assets/css/editor-blocks.css' );

	// Add custom fonts.
	wp_enqueue_style( 'ngo-charity-donation-fonts', ngo_charity_donation_fonts_url(), array() );
}
add_action( 'enqueue_block_editor_assets', 'ngo_charity_donation_block_editor_styles' );

# Load scripts and styles.(fontawesome)
add_action( 'customize_controls_enqueue_scripts', 'ngo_charity_donation_customize_controls_register_scripts' );

function ngo_charity_donation_customize_controls_register_scripts() {
	
	wp_enqueue_style( 'ngo-charity-donation-ctypo-customize-controls-style', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
}

// enque files
require get_parent_theme_file_path( '/inc/custom-header.php' );
require get_parent_theme_file_path( '/inc/template-tags.php' );
require get_parent_theme_file_path( '/inc/template-functions.php' );
require get_parent_theme_file_path( '/inc/customizer.php' );
require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );
require get_parent_theme_file_path( '/inc/typofont.php' );
require get_parent_theme_file_path( '/inc/wptt-webfont-loader.php' );
require get_parent_theme_file_path( '/inc/breadcrumb.php' );
require get_parent_theme_file_path( 'inc/sortable/sortable_control.php' );