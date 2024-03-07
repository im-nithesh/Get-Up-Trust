<div class="donate-section">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12 mx-auto text-center">
                <form class="custom-form donate-form" action="#" method="get" role="form">
                    <h3 class="mb-3">Make a donation</h3>

                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <h5 class="mt-1">Personal Info</h5>
                        </div>

                        <div class="col-lg-4 col-6 mt-2">
                            <input type="text" name="donation-name" id="donation-name" class="form-control" placeholder="Name" required>
                        </div>

                        <div class="col-lg-4 col-6 mt-2">
                            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" class="form-control" placeholder="Phone Number" required>
                        </div>

                        <div class="col-lg-4 col-12 mt-2">
                            <input type="email" name="donation-email" id="donation-email" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Email Address" required>
                        </div>

                        <div class="col-lg-12 col-12 mt-2">
                            <textarea name="message" rows="5" class="form-control" id="message" placeholder="Your Message"></textarea>
                        </div>

                        <div class="col-lg-12 col-12">
                            <h5 class="mt-3 pt-1">Scan the QR</h5>
                            
                            <div class="d-flex justify-content-center align-items-center text-center mx-auto">
                                <a href="upi://pay?pa=eze0152289@cub&pn=GET%20UP%20CHARITABLE%20TRUST&cu=INR" target="_blank"><h6>UPI ID: <span id="upi-id">eze0152289@cub</span></h6></a>
                                <button type="button" class="copy-btn"> 
                                    <i class="bi bi-clipboard"></i>
                                    <span class="copy-info">Copy</span>
                                </button>
                            </div>
                            <img src="<?php echo get_theme_file_uri('/images/qr-code.png') ?>" alt="QR-CODE">
                        </div>

                        <div class="col-lg-12 col-12 mt-0">
                            <button type="submit" class="form-control mt-4">Submit Donation</button>
                        </div>
                    </div>

                    <button type="button" class="close-btn"><i class="bi bi-x-lg"></i></button>
                </form>
            </div>

        </div>
    </div>
</div>