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

            <div id="no-available-message" style="display: none; color: red; font-weight: 900; text-align: center;">No available courses for the selected option.</div>


            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4" data-course="Frontend">
                    <div class="card">
                        @foreach ($offered_course as $offered_courses)
                        <img src="{{ asset('storage/course/images/course/' . $offered_courses->course_picture) }}" class="card-img-top fixed-image" alt="Course 1">
                        <div class="card-body">
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">{{$offered_courses->position->position}}</h5>
                            <h5 class="card-title" style="color:#004225; font-weight: 900;">{{$offered_courses->course->course}}</h5>
                            <h5 class="card-title">{{$offered_courses->user->name}}</h5>
                            <p class="card-text">{{$offered_courses->course_description}}</p>
                            <a href="#" class="btn btn-primary" @if(auth()->check() && (auth()->user()->user_role == 'instructor' || auth()->user()->user_role == 'admin')) style="display: none" @endif>Enroll now</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@include('components._Footer')