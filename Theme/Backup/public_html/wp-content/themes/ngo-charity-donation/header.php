<?php
/**
 * The header for our theme
 *
 * @subpackage NGO Charity Donation
 * @since 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}
?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ngo-charity-donation' ); ?></a>
	<?php if( get_option('ngo_charity_donation_theme_loader',true) != 'off'){ ?>
		<?php $ngo_charity_donation_loader_option = get_theme_mod( 'ngo_charity_donation_loader_style','style_one');
		if($ngo_charity_donation_loader_option == 'style_one'){ ?>
			<div id="preloader" class="circle">
				<div id="loader"></div>
			</div>
		<?php }
		else if($ngo_charity_donation_loader_option == 'style_two'){ ?>
			<div id="preloader">
				<div class="spinner">
					<div class="rect1"></div>
					<div class="rect2"></div>
					<div class="rect3"></div>
					<div class="rect4"></div>
					<div class="rect5"></div>
				</div>
			</div>
		<?php }?>
	<?php }?>
	<div id="page" class="site">
		<div id="header">
			<div class="wrap_figure">
				<div class="top_bar py-2 text-center text-lg-left text-md-left">
					<div class="container">
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
								<?php if( get_theme_mod('ngo_charity_donation_call_text') != '' || get_theme_mod('ngo_charity_donation_call_number') != '' ){ ?>
									<span><i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_call_icon','fas fa-phone-volume')); ?> mr-3"></i><bdi><?php echo esc_html(get_theme_mod('ngo_charity_donation_call_text','')); ?></bdi> : <?php echo esc_html(get_theme_mod('ngo_charity_donation_call_number','')); ?></span>
								<?php }?>

								<?php if( get_theme_mod('ngo_charity_donation_email_text') != '' || get_theme_mod('ngo_charity_donation_email_address') != '' ){ ?>
									<span class="mx-md-3"><i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_email_icon','fas fa-envelope-open')); ?> mr-3"></i><bdi><?php echo esc_html(get_theme_mod('ngo_charity_donation_email_text','')); ?></bdi> : <?php echo esc_html(get_theme_mod('ngo_charity_donation_email_address','')); ?></span>
								<?php }?>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
								<?php if( get_option('header_social_icon_enable',false) != 'off'){ ?>
								  <?php
						            $ngo_charity_donation_header_twt_target = esc_attr(get_option('ngo_charity_donation_header_twt_target','true'));
						            $ngo_charity_donation_header_linkedin_target = esc_attr(get_option('ngo_charity_donation_header_linkedin_target','true'));
						            $ngo_charity_donation_header_youtube_target = esc_attr(get_option('ngo_charity_donation_header_youtube_target','true'));
						            $ngo_charity_donation_header_instagram_target = esc_attr(get_option('ngo_charity_donation_header_instagram_target','true'));
						          ?>							
								<div class="links text-center text-lg-right text-md-right">
										<?php if( get_theme_mod('ngo_charity_donation_twitter') != ''){ ?>
								            <a target="<?php echo $ngo_charity_donation_header_twt_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ngo_charity_donation_twitter','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_twitter_icon','fab fa-twitter')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('ngo_charity_donation_linkedin') != ''){ ?>
								            <a target="<?php echo $ngo_charity_donation_header_linkedin_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ngo_charity_donation_linkedin','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_linkedin_icon','fab fa-linkedin-in')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('ngo_charity_donation_youtube') != ''){ ?>
								            <a target="<?php echo $ngo_charity_donation_header_youtube_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ngo_charity_donation_youtube','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_youtube_icon','fab fa-youtube')); ?>"></i>
								            </a>
								          <?php }?>
								          <?php if( get_theme_mod('ngo_charity_donation_instagram') != ''){ ?>
								            <a target="<?php echo $ngo_charity_donation_header_instagram_target !='off' ? '_blank' : '' ?>" href="<?php echo esc_url(get_theme_mod('ngo_charity_donation_instagram','')); ?>">
								              <i class="<?php echo esc_attr(get_theme_mod('ngo_charity_donation_instagram_icon','fab fa-instagram')); ?>"></i>
								            </a>
								          <?php }?>
									</div>
							<?php }?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="menu_header py-3">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-sm-6 col-8 align-self-center">
								<div class="logo text-center text-md-left text-sm-left py-3 py-md-0">
							        <?php if ( has_custom_logo() ) : ?>
					            		<?php the_custom_logo(); ?>
						            <?php endif; ?>
					              	<?php $ngo_charity_donation_blog_info = get_bloginfo( 'name' ); ?>
					              	<?php if( get_option('ngo_charity_donation_logo_title',false) != 'off'){ ?>
						                <?php if ( ! empty( $ngo_charity_donation_blog_info ) ) : ?>
						                  	<?php if ( is_front_page() && is_home() ) : ?>
						                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						                  	<?php else : ?>
					                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					                 		<?php endif; ?>
						                <?php endif; ?>
						            	<?php }?>
						                <?php
					                  		$ngo_charity_donation_description = get_bloginfo( 'description', 'display' );
						                  	if ( $ngo_charity_donation_description || is_customize_preview() ) :
						                ?>
						                <?php if( get_option('ngo_charity_donation_logo_text',true) != 'off'){ ?>
					                  	<p class="site-description">
					                    	<?php echo esc_html($ngo_charity_donation_description); ?>
					                  	</p>
					                  <?php }?>
					              	<?php endif; ?>
							    </div>
							</div>
							<div class="col-lg-7 col-md-4 col-sm-6 col-4 align-self-center">
									<div class="toggle-menu gb_menu text-md-right">
										<button onclick="ngo_charity_donation_gb_Menu_open()" class="gb_toggle p-2"><i class="fas fa-ellipsis-h"></i><p class="mb-0"><?php esc_html_e('Menu','ngo-charity-donation'); ?></p></button>
									</div>
				   				<?php get_template_part('template-parts/navigation/navigation'); ?>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-6 col-12 align-self-center">
								<?php if( get_theme_mod('ngo_charity_donation_donate_btn_link') != '' || get_theme_mod('ngo_charity_donation_donate_btn_text') != ''){ ?>
									<p class="donate_btn mb-0 text-center text-md-right"><a href="<?php echo esc_url(get_theme_mod('ngo_charity_donation_donate_btn_link','')); ?>"><i class="fas fa-heart mr-2"></i><?php echo esc_html(get_theme_mod('ngo_charity_donation_donate_btn_text','')); ?></i></a></p>
								<?php }?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>