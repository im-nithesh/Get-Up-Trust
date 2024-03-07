<?php
/**
 * The template for displaying 404 page.
 *
 * @copyright  Copyright (c) 2024, THE FATEK LAB
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

get_header(); ?>

    <section class="section-padding">
        <div class="container">
            <div class="row text-center mx-auto">
                <div class="col-lg-12 col-12">
                    <h1 class="mb-5"><?php esc_html_e( 'Nothing Found Here', 'charitable_trust' ); ?></h1>
                    <p class="text-muted mb-5"><?php esc_html_e( 'It looks like nothing was found at this location.', 'charitable_trust' ); ?></p>
                </div>
            </div>
        </div>
    </section>

<?php get_template_part( 'donate' ); ?>
<?php get_footer(); ?>
<?php wp_footer(); ?>