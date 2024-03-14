<section class="contact-section section-padding" id="section_5">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-12 ms-auto mb-5 mb-lg-0">
                <div class="contact-info-wrap">
                    <h2>Get in touch</h2>

                    <div class="contact-image-wrap">
                        <img src="<?php echo get_theme_file_uri('/images/avatar/founder-01.png') ?>" class="img-fluid avatar-image" alt="">

                        <div class="d-flex flex-column justify-content-center ms-3">
                            <h5 class="mb-0 text-muted"><strong>Mohan Karunakaran</strong></h5>
                            <h6 class="mb-0 text-muted">Chief executive officer</h6>
                        </div>
                    </div>

                    <div class="contact-info">
                        <h5 class="mb-3">Contact Infomation</h5>

                        <div class="col-12 mb-3">
                            <div class="custom-contact-box">
                                <p class="d-flex justify-content-center text-center mb-0">
                                    <i class="bi-telephone me-2"></i>

                                    <a href="tel:+91 92924 26868">
                                        +91 92924 26868 / +91 99764 67565
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="custom-contact-box">
                                <p class="d-flex justify-content-center text-center mb-0">
                                    <i class="bi-envelope me-2"></i>

                                    <a href="mailto:getuptrust@gmail.com">
                                        getuptrust@gmail.com
                                    </a>
                                </p>
                            </div>
                        </div>

                        <!-- <a href="#" class="custom-btn btn mt-3">Get Direction</a> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-12 mx-auto text-center">
                <form class="custom-form contact-form" action="#" method="post" role="form">
                    <h2>Contact form</h2>

                    <p class="mb-4">Or, you can just send an email:
                        <a href="mailto:getuptrust@gmail.com">getuptrust@gmail.com</a>
                    </p>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="form-control" placeholder="Mobile Number" required>
                        </div>
                    </div>
                    
                    
                    
                    <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>

                    <textarea name="message" rows="5" class="form-control" id="message" placeholder="What can we help you?"></textarea>

                    <button type="submit" class="form-control">Send Message</button>
                </form>
            </div>

        </div>
    </div>
</section>