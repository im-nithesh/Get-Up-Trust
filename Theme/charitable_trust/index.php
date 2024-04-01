<?php get_header(); ?>

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
                    <a class="nav-link click-scroll" href="#section_2">About</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_3">Gallery</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link click-scroll" href="#section_4">Testimonials</a>
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

<main id="main">

    <section class="hero-section hero-section-full-height">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-12 col-12 p-0">
                    <div id="hero-slide" class="carousel carousel-fade slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo get_theme_file_uri('/images/slide/slide-1.png') ?>" class="carousel-image img-fluid" alt="banner-slide-1">
                                
                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h2>Transforming<br>Lives</h2>
                                    
                                    <!-- <p>Professional charity theme based on Bootstrap 5.2.2</p> -->
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="<?php echo get_theme_file_uri('/images/slide/slide-2.png') ?>" class="carousel-image img-fluid" alt="banner-slide-2">
                                
                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h2>Give Hope<br>Today</h2>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <img src="<?php echo get_theme_file_uri('/images/slide/slide-3.png') ?>" class="carousel-image img-fluid" alt="banner-slide-2">
                                
                                <div class="carousel-caption d-flex flex-column justify-content-end">
                                    <h2>Empowering<br>Change</h2>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#hero-slide" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#hero-slide" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-10 col-12 text-center mx-auto">
                    <h1 class="mb-5">Welcome to Get-Up Charity</h1>
                </div>

                <div class="col-lg-3 col-6 mb-4 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <img src="<?php echo get_theme_file_uri('/images/icons/recruitment.png') ?>" class="featured-block-image img-fluid" alt="employ-icon">

                            <p class="featured-block-text">We <br> <strong>Employ</strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-4 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <img src="<?php echo get_theme_file_uri('/images/icons/heart.png') ?>" class="featured-block-image img-fluid" alt="find-fund-icon">

                            <p class="featured-block-text"> We <br> <strong>Find & Fund</strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-md-4 mb-0 mb-lg-0 mb-md-4">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <img src="<?php echo get_theme_file_uri('/images/icons/receive.png') ?>" class="featured-block-image img-fluid" alt="Care-icon">

                            <p class="featured-block-text">We <br> <strong>Care For You</strong></p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-md-4 mb-0 mb-lg-0">
                    <div class="featured-block d-flex justify-content-center align-items-center">
                        <div class="d-block">
                            <img src="<?php echo get_theme_file_uri('/images/icons/scholarship.png') ?>" class="featured-block-image img-fluid" alt="Educate-icon">

                            <p class="featured-block-text">We <br> <strong>Educate</strong></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-padding section-bg" id="section_2">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-12 mb-5 mb-lg-0">
                    <img src="<?php echo get_theme_file_uri('/images/about-us.jpg') ?>" class="custom-text-box-image img-fluid" alt="Getup-trust-Team">
                </div>

                <div class="col-lg-6 col-12">
                    <div class="custom-text-box">

                        <h5 class="mb-3">Get-Up Charitable Trust</h5>

                        <p class="mb-0">It's wonderful to hear that the government and various NGO’s are committed to supporting differently abled individuals. Similarly Get-Up charitable Trust, we are also enhancing the educational development for children of persons with disabilities, creating pathways for them to access government benefits, and offering professional development opportunities for those who are completely paralyzed are crucial initiatives. Additionally, promoting disabled individuals in sports to compete at national or international levels is a great way to empower them and promote inclusivity. These efforts aim to improve the lives and opportunities for people with disabilities.</p></div>
                    
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Our Mission</h5>

                                <p>Disability Rights an inclusive world that provides equal opportunity for individuals with disabilities to freely participate in a society with equity, dignity and respect.</p>

                                <!-- <ul class="custom-list mt-2">
                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Charity Theme
                                    </li>

                                    <li class="custom-list-item d-flex">
                                        <i class="bi-check custom-text-box-icon me-2"></i>
                                        Semantic HTML
                                    </li>
                                </ul> -->
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box mb-lg-0">
                                <h5 class="mb-3">Our Vision</h5>

                                <p>Disability Rights advocates, educates, investigates, and litigates to protect and advance the rights, dignity, equal opportunities, self-determination and choices for all people with disabilities.</p>

                            </div>
                        </div>

                        <!-- <div class="col-lg-6 col-md-6 col-12">
                            <div class="custom-text-box d-flex flex-wrap d-lg-block mb-lg-0">
                                <div class="counter-thumb"> 
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="1" data-to="2009" data-speed="1000"></span>
                                        <span class="counter-number-text"></span>
                                    </div>

                                    <span class="counter-text">Founded</span>
                                </div> 

                                <div class="counter-thumb mt-4"> 
                                    <div class="d-flex">
                                        <span class="counter-number" data-from="1" data-to="120" data-speed="1000"></span>
                                        <span class="counter-number-text">B</span>
                                    </div>

                                    <span class="counter-text">Donations</span>
                                </div> 
                            </div>
                        </div> -->
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="about-section section-padding">
        <div class="container">
            <div class="row">

                <div class="col-lg-6 col-md-5 col-12">
                    <img src="<?php echo get_theme_file_uri('/images/avatar/founder.jpg') ?>" class="about-image mx-lg-auto bg-light shadow-lg img-fluid" alt="Getup-trust-founder">
                </div>

                <div class="col-lg-6 col-md-7 col-12">
                    <div class="custom-text-block">
                        <h2 class="mb-0">Mahendran Annadurai</h2>

                        <h5 class="mb-lg-4 mb-md-4">Founder / President</h5>

                        <p>He is also a differently abled person who has experienced the challenges faced by others with disabilities since childhood. Now, he holds a prominent position in a private company, with his main goal being to enhance the lives of people with disabilities as much as possible.</p>

                        <ul class="social-icon mt-4">
                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-twitter"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-facebook"></a>
                            </li>

                            <li class="social-icon-item">
                                <a href="#" class="social-icon-link bi-instagram"></a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="cta-section section-padding section-bg">
        <div class="container">
            <div class="row justify-content-center align-items-center">

                <div class="col-lg-5 col-12 ms-auto">
                    <h2 class="mb-lg-0 mb-3">Make an impact. <br> Save lives.</h2>
                </div>

                <div class="col-lg-5 col-12">
                    <a class="custom-btn btn donate-btn" href="#">Make a donation</a>
                </div>

            </div>
        </div>
    </section>


    <section class="section-padding" id="section_3">
        <div class="container">
            <div class="row mb-3">

                <div class="col-lg-12 col-12 text-center mb-4">
                    <h2>Our Gallery</h2>
                </div>

                <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                    <div class="custom-block-wrap album">
                        <img src="<?php echo get_theme_file_uri('/images/gallery/diwali_01.jpg') ?>" class="custom-block-image img-fluid" alt="Gallery-image">

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
                        <img src="<?php echo get_theme_file_uri('/images/gallery/getto_01.jpg') ?>" class="custom-block-image img-fluid" alt="Gallery-image">

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
                        <img src="<?php echo get_theme_file_uri('/images/gallery/medic_01.jpg') ?>" class="custom-block-image img-fluid" alt="Gallery-image">

                        <div class="custom-block">
                            <div class="custom-block-body text-center">
                                <h5 class="mb-3">Medical Camp</h5>
                            </div>

                            <button type="button" class="custom-btn btn" data-folder="">View Album</button>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row text-center">
                <div class="col-lg-4 col-md-6 col-12 mt-4 mx-auto">
                    <a href="/gallery" class="custom-btn btn">View our Gallery</a>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial-section section-padding section-bg" id="section_4">
        <div class="container">
            <div class="row text-center">

                <div class="col-lg-8 col-12 mx-auto">
                    <h2 class="mb-lg-3">Our Happy People</h2>
                    
                        <div id="testimonial-carousel" class="carousel carousel-fade slide" data-bs-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito charity theme</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">User</span>, Test</small>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor mauris quis metus tempor orci</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">User</span>, Test</small>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Lorem Ipsum dolor sit amet, consectetur adipsicing kengan omeg kohm tokito charity theme</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">User</span>, Test</small>
                                    </div>
                                </div>

                                <div class="carousel-item">
                                    <div class="carousel-caption">
                                        <h4 class="carousel-title">Sed leo nisl, posuere at molestie ac, suscipit auctor mauris quis metus tempor orci</h4>

                                        <small class="carousel-name"><span class="carousel-name-title">User</span>, Test</small>
                                    </div>
                                </div>

                                    <ol class="carousel-indicators">
                                        <li data-bs-target="#testimonial-carousel" data-bs-slide-to="0" class="active">
                                            <img src="<?php echo get_theme_file_uri('/images/avatar/user-icon.png') ?>" class="img-fluid rounded-circle avatar-image" alt="avatar">
                                        </li>

                                        <li data-bs-target="#testimonial-carousel" data-bs-slide-to="1" class="">
                                            <img src="<?php echo get_theme_file_uri('/images/avatar/user-icon.png') ?>" class="img-fluid rounded-circle avatar-image" alt="avatar">
                                        </li>

                                        <li data-bs-target="#testimonial-carousel" data-bs-slide-to="2" class="">
                                            <img src="<?php echo get_theme_file_uri('/images/avatar/user-icon.png') ?>" class="img-fluid rounded-circle avatar-image" alt="avatar">
                                        </li>

                                        <li data-bs-target="#testimonial-carousel" data-bs-slide-to="3" class="">
                                            <img src="<?php echo get_theme_file_uri('/images/avatar/user-icon.png') ?>" class="img-fluid rounded-circle avatar-image" alt="avatar">
                                        </li>
                                    </ol>

                            </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <?php get_template_part( 'popup' ); ?>
    
    <?php get_template_part( 'contact' ); ?>
    
</main>

<?php get_template_part( 'donate' ); ?>

<?php get_footer(); ?>