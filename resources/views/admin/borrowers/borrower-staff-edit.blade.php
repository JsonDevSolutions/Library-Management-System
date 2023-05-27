@extends('layouts.admin')

@section('additional_css_files')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/borrowers-staff" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-clipboard-outline me-1"></i> Staff List
                </a>
            </div>
            <h4 id = "trial" class="page-title">Edit Staff Info</h4>
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
    <form class="needs-validation" novalidate action="{{ route('borrowers-staff.update',$borrowers_staff->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">ID Number</label>
                                <input type="text" value="{{ $borrowers_staff->id_number }}" class="form-control" name="id_number" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">First Name</label>
                                <input type="text" value="{{ $borrowers_staff->first_name }}" class="form-control" name="first_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Middle Name</label>
                                <input type="text" value="{{ $borrowers_staff->middle_name }}" class="form-control" name="middle_name">
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Last Name</label>
                                <input type="text" value="{{ $borrowers_staff->last_name }}" class="form-control" name="last_name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <select data-toggle="select2" title="designation" name="designation">
                                    <option value="0">Select Grade Level</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->designation_name }}" {{ ( $designation->designation_name == $borrowers_staff->designation) ? 'selected' : '' }}>{{ $designation->designation_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="modal-body">
                            <div class="mt-3 text-center">
                                <img id="imageResult" src="{{ $borrowers_staff->profile_path ? url('staff_profile/' . $borrowers_staff->profile_path) : url(asset('assets/images/users/avatar-5.jpg')) }}" alt="shreyu"
                                class="img-thumbnail avatar-lg rounded" />
                            </div>
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Upload Profile Picture</label>
                                <input id="upload" type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="profile_pic">
                            </div>
                            <div class="mb-3">
                                <label for="example-textarea" class="form-label">Address</label>
                                <textarea class="form-control" rows="4" name="address" required>{{ $borrowers_staff->address }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-cols-2">
                <div class="col-lg6">
                    <a href="{{ url('/admin/borrowers-staff') }}" class="btn fw-semibold btn-outline-secondary" style="margin-left: 15px;">
                        <i class="mdi mdi-arrow-left"></i> Back to Students List </a>
                </div> <!-- end col -->
                <div class="d-flex flex-row-reverse">
                    <button style="width: 120px;margin-right: 15px;" type="submit" class="btn btn-success"> <i class="mdi mdi-content-save-outline me-1"></i> Update </button>
                </div> <!-- end col -->
            </div>
            <div class="row" style="padding: 10px;"></div>
        </div>
    </form>
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