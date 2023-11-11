        {{-- ADD FORTE MODAL --}}
        <a href="#" class="btn btn-primary mb-2" id="add-tech-link" data-toggle="modal" data-target="#add-tech-modal" style="font-size: 20px">Add techstacks +</a>

        <div class="modal fade" id="add-tech-modal" tabindex="-1" role="dialog" aria-labelledby="addTechModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTechModal">Add techstacks</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addPositionForm" action="{{ route('addposition') }}" method="POST" class="addPositionForm">
                        @csrf
                        <div class="form-group">
                            <label for="position">Position:</label>
                            <input type="text" name="position" class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">Add position</button>
                        </div>
                        </form>

                        <hr>

                        <form id="addCourseForm" action="{{ route('addcourse') }}" method="POST" class="addCourseForm">
                            @csrf
                            <div class="form-group">
                                <label for="position_id">Position:</label>
                                <select name="position_id" id="position_id" class="form-control">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->position }}</option>
                                    @endforeach
                                </select>
                                <label for="course">Course:</label>
                                <input type="text" name="course" class="form-control">
                                <button type="submit" class="btn btn-primary mt-2">Add course</button>
                            </div>
                        </form>

                        <hr>

                        <h5>Course list</h5>
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Course</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($positions as $position)
                                    @foreach ($position->courses as $course)
                                        <tr>
                                            <td>{{ $position->position }}</td>
                                            <td>{{ $course->course }}</td>
                                            {{-- <td>
                                                <a href=""><i class="fa-solid fa-pen"></i></a>
                                                |
                                                <a href=""><i class="fa-solid fa-x"></i></a>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- END ADD FORTE --}}
        
        {{-- ADD COURSE MODAL --}}
        <a href="#" class="btn btn-primary mb-2" id="add-course-link" data-toggle="modal" data-target="#add-course-modal" style="font-size: 20px">Add course +</a>

        <div class="modal fade" id="add-course-modal" tabindex="-1" role="dialog" aria-labelledby="addCourseModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCourseModal">Add course</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addCourseForm" action="" method="POST" class="addCourseForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="profile_picture">Course picture:</label>
                            <input type="file" id="profile_picture" name="course_picture" accept=".jpg, .jpeg, .png" style="display: none;"><br>
                            <label for="profile_picture" id="profile_picture_label">
                                <img src="" alt="Course picture" width="100" height="100" style="cursor: pointer">
                                Click to choose a picture
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="position_id">Position:</label>
                            <select name="position_id" class="form-control" id="position_id">
                                <option value="">Backend</option>
                            </select>
                        </div>

                        <div class="form-group">
                             <label for="offered_id">Course:</label>
                             <select name="offered_id" id="offered_id" class="form-control">
                                <option value="">PHP/MYSQL</option>
                             </select>
                        </div>

                        <div class="form-group">
                            <label for="course_description">Course description:</label>
                            <textarea name="course_description" id="course_description" class="form-control" cols="30" rows="5" maxlength="150"></textarea>
                        </div>

                        <div class="form-group">
                                <label for="course_instructor">Course instructor:</label>
                                <select name="course_instructor" class="form-control" id="course_instructor">
                                        <option value="">Charlie</option>
                                        <option value="">Jeffrey</option>
                                </select>
                        </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- END ADD COURSE --}}