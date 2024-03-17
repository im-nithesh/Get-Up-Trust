<?php
    /*
    Template Name: Charitable_Trust_Gallery
    */
get_header(); ?>

<nav class="navbar navbar-expand-lg bg-light shadow-lg">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="<?php echo get_theme_file_uri('/images/logo.png') ?>" class="logo img-fluid" alt="Get-Up Charity Logo">
            <span>
                Get-Up Charitable Trust
                <!-- <small>Non-profit Organization</small> -->
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#top">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="/#section_4">Testimonials</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_5">Contact</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="nav-link custom-btn custom-border-btn btn donate-btn" href="#">Donate</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
                    <div class="custom-block-wrap album">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/diwali_01.jpg') ?>" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Diwali Celebration</h5>
                            </div>

                            <button type="button" class="custom-btn btn" data-folder="986">View Album</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap album">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/getto_01.jpg') ?>" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Get-To-Gether Party</h5>
                            </div>

                            <button type="button" class="custom-btn btn" data-folder="990">View Album</button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <div class="custom-block-wrap album">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/medic_01.jpg') ?>" class="custom-block-image img-fluid" alt="">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Medical Camp</h5>
                            </div>

                            <button type="button" class="custom-btn btn" data-folder="Medical_Camp">View Album</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    
    <?php get_template_part( 'popup' ); ?>

    <?php the_content(); ?>
    
    <?php get_template_part( 'contact' ); ?>
</main>

<?php get_template_part( 'donate' ); ?>

<?php get_footer(); ?>