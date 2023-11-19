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
                @if($offered_course->count() > 0)
                @foreach ($offered_course as $offered_courses)
                <div class="col-lg-4 col-md-6 mb-4" data-category="{{ $offered_courses->position->position }}">
                        <div class="card">
                            <img style="object-fit: fill"  src="{{ asset('storage/course/images/course/' . $offered_courses->course_picture) }}" class="card-img-top fixed-image" alt="Course Image">
                            <div class="card-body">
                                <h5 class="card-title" style="color:#004225; font-weight: 900;">{{ $offered_courses->position->position }}</h5>
                                <h5 class="card-title" style="color:#004225; font-weight: 900;">{{ $offered_courses->course->course }}</h5>
                                <h5 class="card-title">{{ $offered_courses->user->name }}</h5>
                                <p class="card-text">{{ $offered_courses->course_description }}</p>
                                <p> Scheduled at : <span style="color: red">{{ \Carbon\Carbon::parse($offered_courses->scheduled_at)->format('F j, Y / h:i A')}}</span></p>
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
                    {{-- <div class="text-center mb-5">
                        <h5 style="color: red;">No courses available right now</h5>
                    </div> --}}
                @endif
                {{-- <div class="text-center">
                    <button onclick="window.location.href = '/courses'" class="btn btn-primary">View more</button>
                </div> --}}
            </div>
        </div>
    </section>


@include('components._Footer')