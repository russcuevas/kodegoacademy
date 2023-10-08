@include('components._Header')
@include('components._Navbar')

 <section class="contact vh-100" style="margin-top: 100px;" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="title" style="color: #9fef00">Contact Us</h1>
                    <form id="contactForm" action="" method="POST">

                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Your email">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label text-white">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Your mobile number">
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label text-white">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <div id="loading-container" style="display: none;">
                            <div id="loading-spinner" class="spinner"></div>
                        </div>
                        <div id="backdrop" style="display: none;"></div>

                    </form>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.271894918059!2d121.15400981436803!3d13.84412669026964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b4c700e8f459%3A0x855d1ea7aaf3d4d3!2sCalingatan%2C%20Mataasnakahoy%2C%20Batangas!5e0!3m2!1sen!2sph!4v1632633081205!5m2!1sen!2sph"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>


                    <p style="color: #9fef00">
                        Call us at: <a href="tel:+123456789" style="color: white;">09495749302</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
@include('components._Footer')