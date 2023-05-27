@extends('layouts.admin')

@section('additional_css_files')
    <!-- App css -->
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/borrowers-students" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-clipboard-outline me-1"></i> Students List
                </a>
            </div>
            <h4 id = "trial" class="page-title">Add New Student</h4>
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
    @if ($message = Session::get('success'))
        <div class="alert alert-success bg-success text-white" role="alert">
            <i class="dripicons-checkmark me-2"></i> <strong>{{ $message }}</strong>
        </div>
    @endif
</div>

<form class="needs-validation" novalidate action="{{ route('borrowers-students.store') }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="row">
        <div class="card">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">ID Number</label>
                                <input type="text" class="form-control" name="id_number" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middle_name">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Grade Level</label>
                                <select data-toggle="select2" title="grade_level" name="grade_level">
                                    <option value="0">Select Grade Level</option>
                                    @foreach ($yearlevels as $yearlevel)
                                        <option value="{{ $yearlevel->name }}">{{ $yearlevel->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-body">
                            <div class="mt-3 text-center">
                                <img id="imageResult" src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="shreyu"
                                class="img-thumbnail avatar-lg rounded" />
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Upload Profile Picture</label>
                                <input id="upload" type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="profile_pic">
                            </div>
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">Address</label>
                                <textarea class="form-control" rows="4" name="address" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Section</label>
                                <input type="text" class="form-control" name="section" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div> <!-- end modal footer -->
            <div class="row row-cols-2">
                <div class="col-lg6">
                    <a href="{{ url('/admin/borrowers-students') }}" class="btn fw-semibold btn-outline-secondary" style="margin-left: 15px;">
                        <i class="mdi mdi-arrow-left"></i> Back to Students List </a>
                </div> <!-- end col -->
                <div class="d-flex flex-row-reverse">
                    <button style="width: 120px;margin-right: 15px;" type="submit" class="btn btn-success"> <i class="mdi mdi-content-save-outline me-1"></i> Save </button>
                </div> <!-- end col -->
            </div>
            <div class="row" style="padding: 10px;"></div>
        </div> <!-- end modal content-->
    </div>
</form>

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