<?php
    /*
    Template Name: Charitable_Trust_Gallery
    */
get_header(); ?>

<main class="gallery-page">
    <div class="gallery-hero">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-12 my-auto">
                    <h1>Explore Our Gallery</h1>
                </div>
            </div>
        </div>
    </div>
    
    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/diwali_01.jpg') ?>" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Diwali Celebration</h5>
                            </div>

                            <button type="button" class="custom-btn btn">View Album</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/getto_01.jpg') ?>" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Get-To-Gether Party</h5>
                            </div>

                            <button type="button" class="custom-btn btn">View Album</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="custom-block-wrap">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/medic_01.jpg') ?>" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Medical Camp</h5>
                            </div>

                            <button type="button" class="custom-btn btn">View Album</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php the_content(); ?>
    
    <?php get_template_part( 'contact' ); ?>
</main>

<?php get_template_part( 'donate' ); ?>

<?php get_footer(); ?>