@include('components._Header')
@include('components._Navbar')

    <section class="course vh-100" style="margin-top: 100px;" id="course">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h1 class="title" style="color: #9fef00">OFFERED COURSES</h1>
                </div>
            </div>

            <section style="margin-left: 11px; margin-bottom: 5px;" class="course-select mt-4">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-md-4">
                            <label for="course-select" class="form-label text-end" style="color: #9fef00">Select a Course:</label>
                            <select style="font-weight: 900;" class="form-select" id="course-select">
                                <option value="">All course</option>
                                <option value="Frontend">Frontend</option>
                                <option value="Backend">Backend</option>
                                <option value="Cybersecurity">Cybersecurity</option>
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-course="Frontend">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">Frontend</h5>
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">HTML5/CSS</h5>
                            <h5 class="card-title">Mr. Emerson Pingol</h5>
                            <p class="card-text">Enhance your frontend skills</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Backend">
                    <div class="card">
                        <img src="{{ asset('page/images/security.png') }}" class="card-img-top fixed-image" alt="Course 3">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">Backend</h5>
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">PHP/MYSQL</h5>
                            <h5 class="card-title">Mr. Charlie Devera</h5>
                            <p class="card-text">Enhance your backend skills</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Cybersecurity">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">Cybersecurity</h5>
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">Penetration Testing</h5>
                            <h5 class="card-title">Mr. Russel Vincent Cuevas</h5>
                            <p class="card-text">Enhance your cybersecurity</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Frontend">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">Frontend</h5>
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">HTML5/CSS</h5>
                            <h5 class="card-title">Mr. Emerson Pingol</h5>
                            <p class="card-text">Enhance your frontend skills</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Backend">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">Backend</h5>
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">PHP/MYSQL</h5>
                            <h5 class="card-title">Mr. Charlie Devera</h5>
                            <p class="card-text">Enhance your backend skills</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Cybersecurity">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title">Cybersecurity</h5>
                            <h5 class="card-title">Penetration Testing</h5>
                            <h5 class="card-title">Mr. Russel Vincent Cuevas</h5>
                            <p class="card-text">Enhance your cybersecurity</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-4 col-md-6 mb-4" data-course="Frontend">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title">Frontend</h5>
                            <h5 class="card-title">HTML5/CSS</h5>
                            <h5 class="card-title">Mr. Emerson Pingol</h5>
                            <p class="card-text">Enhance your frontend skills</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Backend">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title">Backend</h5>
                            <h5 class="card-title">PHP/MYSQL</h5>
                            <h5 class="card-title">Mr. Charlie Devera</h5>
                            <p class="card-text">Enhance your backend skills</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4" data-course="Cybersecurity">
                    <div class="card">
                        <img src="{{ asset('page/images/sampleimage.png') }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title">Cybersecurity</h5>
                            <h5 class="card-title">Penetration Testing</h5>
                            <h5 class="card-title">Mr. Russel Vincent Cuevas</h5>
                            <p class="card-text">Enhance your cybersecurity</p>
                            <a href="#" class="btn btn-primary">Enroll now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@include('components._Footer')