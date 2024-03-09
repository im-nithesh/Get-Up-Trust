<?php

	$ngo_charity_donation_custom_style= "";
/*---------------------------Width -------------------*/

$ngo_charity_donation_theme_width = get_theme_mod( 'ngo_charity_donation_width_options','full_width');

if($ngo_charity_donation_theme_width == 'full_width'){

$ngo_charity_donation_custom_style .='body{';

	$ngo_charity_donation_custom_style .='max-width: 100%;';

$ngo_charity_donation_custom_style .='}';

}else if($ngo_charity_donation_theme_width == 'Container'){

$ngo_charity_donation_custom_style .='body{';

	$ngo_charity_donation_custom_style .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='@media screen and (max-width:600px){';

$ngo_charity_donation_custom_style .='body{';

    $ngo_charity_donation_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$ngo_charity_donation_custom_style .='} }';

}else if($ngo_charity_donation_theme_width == 'container_fluid'){

$ngo_charity_donation_custom_style .='body{';

	$ngo_charity_donation_custom_style .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='@media screen and (max-width:600px){';

$ngo_charity_donation_custom_style .='body{';

    $ngo_charity_donation_custom_style .='max-width: 100%; padding-right:0px; padding-left: 0px';
    
$ngo_charity_donation_custom_style .='} }';
}

// ----------------sticky header------------

	if (false === get_option('ngo_charity_donation_sticky_header')) {
	    add_option('ngo_charity_donation_sticky_header', 'off');
	}

	// Define the custom CSS based on the 'ngo_charity_donation_sticky_header' option

	if (get_option('ngo_charity_donation_sticky_header', 'off') !== 'on') {
	    $ngo_charity_donation_custom_style .= '.menu_header.fixed {';
	    $ngo_charity_donation_custom_style .= 'position: static;';
	    $ngo_charity_donation_custom_style .= '}';
	}

	if (get_option('ngo_charity_donation_sticky_header', 'off') !== 'off') {
	    $ngo_charity_donation_custom_style .= '.menu_header.fixed {';
	    $ngo_charity_donation_custom_style .= 'position: fixed; background: #fff; box-shadow: 0px 3px 10px 2px #eee;';
	    $ngo_charity_donation_custom_style .= '}';

	    $ngo_charity_donation_custom_style .= '.admin-bar .fixed {';
	    $ngo_charity_donation_custom_style .= ' margin-top: 32px;';
	    $ngo_charity_donation_custom_style .= '}';
	}

/*---------------------------Scroll-top-position -------------------*/

$ngo_charity_donation_scroll_options = get_theme_mod( 'ngo_charity_donation_scroll_options','right_align');

if($ngo_charity_donation_scroll_options == 'right_align'){

$ngo_charity_donation_custom_style .='.scroll-top button{';

	$ngo_charity_donation_custom_style .='';

$ngo_charity_donation_custom_style .='}';

}else if($ngo_charity_donation_scroll_options == 'center_align'){

$ngo_charity_donation_custom_style .='.scroll-top button{';

	$ngo_charity_donation_custom_style .='right: 0; left:0; margin: 0 auto; top:85% !important';

$ngo_charity_donation_custom_style .='}';

}else if($ngo_charity_donation_scroll_options == 'left_align'){

$ngo_charity_donation_custom_style .='.scroll-top button{';

	$ngo_charity_donation_custom_style .='right: auto; left:5%; margin: 0 auto';

$ngo_charity_donation_custom_style .='}';
}

//-----------logo-max-height------------

$ngo_charity_donation_logo_max_height = get_theme_mod('ngo_charity_donation_logo_max_height','100');

if($ngo_charity_donation_logo_max_height != false){

$ngo_charity_donation_custom_style .='.custom-logo-link img{';

	$ngo_charity_donation_custom_style .='max-height: '.esc_html($ngo_charity_donation_logo_max_height).'px;';

$ngo_charity_donation_custom_style .='}';
}

/*---------------------------text-transform-------------------*/

$ngo_charity_donation_text_transform = get_theme_mod( 'ngo_charity_donation_menu_text_transform','CAPITALISE');
if($ngo_charity_donation_text_transform == 'CAPITALISE'){

$ngo_charity_donation_custom_style .='nav#top_gb_menu ul li a{';

	$ngo_charity_donation_custom_style .='text-transform: capitalize ; font-size: 14px;';

$ngo_charity_donation_custom_style .='}';

}else if($ngo_charity_donation_text_transform == 'UPPERCASE'){

$ngo_charity_donation_custom_style .='nav#top_gb_menu ul li a{';

	$ngo_charity_donation_custom_style .='text-transform: uppercase ; font-size: 14px;';

$ngo_charity_donation_custom_style .='}';

}else if($ngo_charity_donation_text_transform == 'LOWERCASE'){

$ngo_charity_donation_custom_style .='nav#top_gb_menu ul li a{';

	$ngo_charity_donation_custom_style .='text-transform: lowercase ; font-size: 14px;';

$ngo_charity_donation_custom_style .='}';
}
 
 // slider- content -alignment

$ngo_charity_donation_slider_content_alignment = get_theme_mod( 'ngo_charity_donation_slider_content_alignment','LEFT-ALIGN');

if($ngo_charity_donation_slider_content_alignment == 'LEFT-ALIGN'){

$ngo_charity_donation_custom_style .='#slider .carousel-caption {';

	$ngo_charity_donation_custom_style .='text-align:left; right: 55%; left: 15%;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='@media screen and (max-width:800px){';

$ngo_charity_donation_custom_style .='#slider .carousel-caption{';

    $ngo_charity_donation_custom_style .='right: 30%; left: 15%;';
    
$ngo_charity_donation_custom_style .='} }';


}else if($ngo_charity_donation_slider_content_alignment == 'CENTER-ALIGN'){

$ngo_charity_donation_custom_style .='#slider .carousel-caption {';

	$ngo_charity_donation_custom_style .='text-align:center; right: 15%; left: 15%;';

$ngo_charity_donation_custom_style .='}';


}else if($ngo_charity_donation_slider_content_alignment == 'RIGHT-ALIGN'){

$ngo_charity_donation_custom_style .='#slider .carousel-caption {';

	$ngo_charity_donation_custom_style .='text-align:right; right: 15%; left: 55%;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='@media screen and (max-width:800px){';

$ngo_charity_donation_custom_style .='#slider .carousel-caption{';

    $ngo_charity_donation_custom_style .='right: 15%; left: 30%;';
    
$ngo_charity_donation_custom_style .='} }';

}

//related products
if( get_option( 'ngo_charity_donation_related_product',true) != 'on') {

$ngo_charity_donation_custom_style .='.related.products{';

	$ngo_charity_donation_custom_style .='display: none;';
	
$ngo_charity_donation_custom_style .='}';
}

if( get_option( 'ngo_charity_donation_related_product',true) != 'off') {

$ngo_charity_donation_custom_style .='.related.products{';

	$ngo_charity_donation_custom_style .='display: block;';
	
$ngo_charity_donation_custom_style .='}';
}

// footer text alignment
$ngo_charity_donation_footer_content_alignment = get_theme_mod( 'ngo_charity_donation_footer_content_alignment','CENTER-ALIGN');

if($ngo_charity_donation_footer_content_alignment == 'LEFT-ALIGN'){

$ngo_charity_donation_custom_style .='.site-info{';

	$ngo_charity_donation_custom_style .='text-align:left; padding-left: 30px;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='.site-info a{';

	$ngo_charity_donation_custom_style .='padding-left: 30px;';

$ngo_charity_donation_custom_style .='}';


}else if($ngo_charity_donation_footer_content_alignment == 'CENTER-ALIGN'){

$ngo_charity_donation_custom_style .='.site-info{';

	$ngo_charity_donation_custom_style .='text-align:center;';

$ngo_charity_donation_custom_style .='}';


}else if($ngo_charity_donation_footer_content_alignment == 'RIGHT-ALIGN'){

$ngo_charity_donation_custom_style .='.site-info{';

	$ngo_charity_donation_custom_style .='text-align:right; padding-right: 30px;';

$ngo_charity_donation_custom_style .='}';

$ngo_charity_donation_custom_style .='.site-info a{';

	$ngo_charity_donation_custom_style .='padding-right: 30px;';

$ngo_charity_donation_custom_style .='}';

}

// slider button
$mobile_button_setting = get_option('ngo_charity_donation_slider_button_mobile_show_hide', '1');
$main_button_setting = get_option('ngo_charity_donation_slider_button_show_hide', '1');

$ngo_charity_donation_custom_style .= '#slider .home-btn {';

if ($main_button_setting == 'off') {
    $ngo_charity_donation_custom_style .= 'display: none;';
}

$ngo_charity_donation_custom_style .= '}';

// Add media query for mobile devices
$ngo_charity_donation_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_button_setting == 'off' || $mobile_button_setting == 'off') {
    $ngo_charity_donation_custom_style .= '#slider .home-btn { display: none; }';
}
$ngo_charity_donation_custom_style .= '}';


// scroll button
$mobile_scroll_setting = get_option('ngo_charity_donation_scroll_enable_mobile', '1');
$main_scroll_setting = get_option('ngo_charity_donation_scroll_enable', '1');

$ngo_charity_donation_custom_style .= '.scrollup {';

if ($main_scroll_setting == 'off') {
    $ngo_charity_donation_custom_style .= 'display: none;';
}

$ngo_charity_donation_custom_style .= '}';

// Add media query for mobile devices
$ngo_charity_donation_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_scroll_setting == 'off' || $mobile_scroll_setting == 'off') {
    $ngo_charity_donation_custom_style .= '.scrollup { display: none; }';
}
$ngo_charity_donation_custom_style .= '}';

// theme breadcrumb
$mobile_breadcrumb_setting = get_option('ngo_charity_donation_enable_breadcrumb_mobile', '1');
$main_breadcrumb_setting = get_option('ngo_charity_donation_enable_breadcrumb', '1');

$ngo_charity_donation_custom_style .= '.archieve_breadcrumb {';

if ($main_breadcrumb_setting == 'off') {
    $ngo_charity_donation_custom_style .= 'display: none;';
}

$ngo_charity_donation_custom_style .= '}';

// Add media query for mobile devices
$ngo_charity_donation_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_breadcrumb_setting == 'off' || $mobile_breadcrumb_setting == 'off') {
    $ngo_charity_donation_custom_style .= '.archieve_breadcrumb { display: none; }';
}
$ngo_charity_donation_custom_style .= '}';

// single post and page breadcrumb
$mobile_single_breadcrumb_setting = get_option('ngo_charity_donation_single_enable_breadcrumb_mobile', '1');
$main_single_breadcrumb_setting = get_option('ngo_charity_donation_single_enable_breadcrumb', '1');

$ngo_charity_donation_custom_style .= '.single_breadcrumb {';

if ($main_single_breadcrumb_setting == 'off') {
    $ngo_charity_donation_custom_style .= 'display: none;';
}

$ngo_charity_donation_custom_style .= '}';

// Add media query for mobile devices
$ngo_charity_donation_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_single_breadcrumb_setting == 'off' || $mobile_single_breadcrumb_setting == 'off') {
    $ngo_charity_donation_custom_style .= '.single_breadcrumb { display: none; }';
}
$ngo_charity_donation_custom_style .= '}';

// woocommerce breadcrumb
$mobile_woo_breadcrumb_setting = get_option('ngo_charity_donation_woocommerce_enable_breadcrumb_mobile', '1');
$main_woo_breadcrumb_setting = get_option('ngo_charity_donation_woocommerce_enable_breadcrumb', '1');

$ngo_charity_donation_custom_style .= '.woocommerce-breadcrumb {';

if ($main_woo_breadcrumb_setting == 'off') {
    $ngo_charity_donation_custom_style .= 'display: none;';
}

$ngo_charity_donation_custom_style .= '}';

// Add media query for mobile devices
$ngo_charity_donation_custom_style .= '@media screen and (max-width: 600px) {';
if ($main_woo_breadcrumb_setting == 'off' || $mobile_woo_breadcrumb_setting == 'off') {
    $ngo_charity_donation_custom_style .= '.woocommerce-breadcrumb { display: none; }';
}
$ngo_charity_donation_custom_style .= '}';