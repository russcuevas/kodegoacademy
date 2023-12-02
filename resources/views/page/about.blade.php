@include('components._Header')
@include('components._Navbar')

    <section class="about" id="about">
        <div class="container">
            <div class="row">
            <h1 class="title text-center" style="color: #9fef00">About Us</h1>
            <div class="col-lg-6 text-left">
                <p class="text-white">KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.</p>
                <p class="text-white"> <span style="font-size: 20px; font-weight: 900; color: #9fef00;">- Mission -</span> <br>
                At Kodego Academy, our mission is to facilitate a seamless journey for individuals seeking proficiency in programming languages. We are dedicated to providing an unparalleled educational experience that equips learners with the skills and knowledge needed to master coding languages. Our commitment lies in demystifying the world of programming, making it accessible to all who aspire to embark on this transformative journey. Through a dynamic curriculum, hands-on projects, and a supportive community, we empower our students to excel in the art and science of coding, fostering a passion for innovation and problem-solving.                </p>
                <p class="text-white"> <span style="font-size: 20px; font-weight: 900; color: #9fef00;">- Vision -</span> <br>
                Our vision at Kodego Academy is to be the foremost destination for individuals aspiring to master programming languages. We envision a future where our graduates are not only proficient coders but also influential contributors to the ever-evolving tech landscape. By staying at the forefront of technological advancements, continuously refining our curriculum, and fostering a culture of continuous learning, we aim to be the driving force behind a global community of skilled programmers who shape the future through their expertise and creativity
                </p>
            </div>

            <div class="col-lg-6 text-center">
                <img style="margin-top: 200px" src="{{ asset('page/images/navlogo.png') }}" alt="Logo" class="img-fluid flip" id="autoFlipImage">
            </div>

            </div>
        </div>

        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="text-white p-4">
                        <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/networking.png') }}" alt=""></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="text-white p-4">
                            <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/security.png') }}" alt=""></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="text-white p-4">
                            <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/programming.jpg') }}" alt=""></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="text-white p-4">
                        <h2 class="text-white"><img class="container-image" src="{{ asset('page/images/sampleimage.png') }}" alt=""></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('components._Footer')