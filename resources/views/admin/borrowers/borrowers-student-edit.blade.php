@extends('layouts.admin')

@section('additional_css_files')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/students" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-clipboard-outline me-1"></i> Students List
                </a>
            </div>
            <h4 id = "trial" class="page-title">Edit Student Info</h4>
        </div>
    </div>
    
</div>
<div class="row">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<div class="row">
    <div class="modal-content">
        <form class="needs-validation" novalidate action="{{ route('borrowers-students.update',$borrowers_student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">ID Number</label>
                                <input type="text" value="{{ $borrowers_student->id_number }}" class="form-control" name="id_number" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">First Name</label>
                                <input type="text" value="{{ $borrowers_student->first_name }}" class="form-control" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Middle Name</label>
                                <input type="text" value="{{ $borrowers_student->middle_name }}" class="form-control" name="middle_name">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Last Name</label>
                                <input type="text" value="{{ $borrowers_student->last_name }}" class="form-control" name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Grade Level</label>
                                <select data-toggle="select2" title="grade_level" name="grade_level">
                                    <option value="0">Select Grade Level</option>
                                    @foreach ($yearlevels as $yearlevel)
                                        <option value="{{ $yearlevel->name }}" {{ ( $yearlevel->name == $borrowers_student->grade_level) ? 'selected' : '' }}>{{ $yearlevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-body">
                            <div class="mt-3 text-center">
                                <img id="imageResult" src="{{ $borrowers_student->profile_path ? url('student_profile/' . $borrowers_student->profile_path) : url(asset('assets/images/users/avatar-5.jpg')) }}" alt="shreyu"
                                class="img-thumbnail avatar-lg rounded" />
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Upload Profile Picture</label>
                                <input id="upload" type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="profile_pic">
                            </div>
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">Address</label>
                                <textarea class="form-control" rows="4" name="address" required>{{ $borrowers_student->address }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Section</label>
                                <input type="text" value="{{ $borrowers_student->section }}" class="form-control" name="section" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ url('/admin/borrowers-student-list') }}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                <i class="mdi mdi-arrow-left"></i> Back to Student List </a>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <div class="text-sm-end">
                                <button style="width: 120px;" type="submit" class="btn btn-success"> <i class="mdi mdi-content-save-outline me-1"></i> Update </button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div> <!-- end modal footer -->
            <div class="modal-footer">
            </div>
        </form>
    </div> <!-- end modal content-->
</div>


@endsection
@section('javascript-extra-files')
    <script>
    function readURL(input) {
        if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
        $('#imageResult')
        .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
        }
        }

        $(function () {
        $('#upload').on('change', function () {
        readURL(input);
        });
        });
    </script>
@endsection