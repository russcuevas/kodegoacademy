@include('components._Header')
@include('components._Navbar')

    <header class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="glitch-wrapper">
                    <div class="glitch" data-glitch="Welcome to KodeGo">Welcome to KodeGo</div>
                </div>
                <p>The #1 tutorial for beginner programmers, upskilling platform</p>
                <a class="btn btn-primary text-black" href="/courses" role="button">Enroll Now</a>
            </div>

            <div class="col-lg-6 js-tilt" data-tilt>
                <img src="{{ asset('page/images/headerlogo.png') }}" alt="Image" class="img-fluid">
            </div>
        </div>
    </header>


    <section data-aos="fade-up" data-aos-duration="2000" class="about" id="about">
        <div class="container">
            <div class="row">
            <h1 class="title text-center" style="color: #9fef00">About Us</h1>
            <div class="col-lg-6 text-left">
                <p class="text-white">KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.
                KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.</p>
                <p class="text-white">KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.
                KodeGo gives individuals,
                businesses and universities the tools they need to
                continuously improve their programming skills.</p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('page/images/navlogo.png') }}" alt="Logo" class="img-fluid flip" id="autoFlipImage">
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


    <section data-aos="fade-up" data-aos-duration="2000" class="course vh-100" style="margin-top: 100px;" id="course">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h1 class="title" style="color: #9fef00">Our Courses</h1>
                </div>
            </div>
            <div class="row">
                @if($offered_course->count() > 0)
                @foreach ($offered_course as $offered_courses)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <img style="object-fit: fill"  src="{{ asset('storage/course/images/course/' . $offered_courses->course_picture) }}" class="card-img-top fixed-image" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#004225; font-weight: 900;">{{ $offered_courses->position->position }}</h5>
                                <h5 class="card-title" style="color:#004225; font-weight: 900;">{{ $offered_courses->course->course }}</h5>
                                <h5 class="card-title" style="color:red; font-weight: 900;">Remaining slots : {{ $offered_courses->available }}</h5>
                                <hr>
                                <h5 class="card-title">{{ $offered_courses->user->name }}</h5>
                                <p class="card-text" style="font-style: italic; color: black;">"{{ $offered_courses->course_description }}"</p>
                                <p> <i class="fa-regular fa-clock"></i> Scheduled : <span style="color: red">{{ \Carbon\Carbon::parse($offered_courses->scheduled_at)->format('F j, Y / h:i A')}}</span></p>
                                <p> <i class="fa-solid fa-hourglass-end"></i> End : <span style="color: red">{{ \Carbon\Carbon::parse($offered_courses->end_at)->format('F j, Y / h:i A') }}</span></p>
                                @if(auth()->check() && auth()->user()->user_role == 'user')
                                    <form class="enrollmentForm" id="enrollmentForm" action="{{ route('userenroll', ['offered_course' => $offered_courses->id]) }}" method="post">
                                        @csrf
                                        <input type="hidden" name="offered_id" value="{{ $offered_courses->id }}">
                                        <button type="button" class="btn btn-primary enroll-btn" data-offered-id="{{ $offered_courses->id }}" data-course-name="{{ $offered_courses->course->course }}" onclick="confirmEnrollment(this)">Enroll now</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="text-center mb-5">
                        <h5 style="color: red;">No courses available right now</h5>
                    </div>
                @endif
                <div class="text-center">
                    <button onclick="window.location.href = '/courses'" class="btn btn-primary">View more</button>
                </div>
            </div>
        </div>
    </section>

    <section data-aos="fade-up" data-aos-duration="2000" class="contact vh-100" style="margin-top: 150px" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h1 class="title" style="color: #9fef00">Contact Us</h1>
                    <form class="contactForm" action="{{ route('submitcontact') }}" method="POST">
                        @csrf
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

    <footer class="py-3 bg-dark text-white">
        <div class="container text-center">
            Made by: Russel Vincent C. Cuevas 2023
        </div>
    </footer>

@include('components._Footer')