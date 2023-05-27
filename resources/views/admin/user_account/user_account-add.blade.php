@extends('layouts.admin')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/borrowed-books" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-clipboard-outline me-1"></i> User Account List
                </a>
            </div>
            <h4 id = "trial" class="page-title">Add New User</h4>
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

<form class="needs-validation" novalidate action="{{ route('borrowbooks.store') }}" method="POST" autocomplete="off">
    @csrf
    <div class="row">
        <div class="col-md-12 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row" >
                        <label  class="font-20 fw-bold text-danger" style="text-align-last: center;">User Account Information</label>
                    </div>
                    <div class="mt-3 text-center">
                        <img id="imageResult" src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="shreyu"
                        class="img-thumbnail avatar-lg rounded" />
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Upload Profile Picture</label>
                        <input id="upload" type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="profile_pic">
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">ID Number</label>
                        <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                    </div>
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input class="form-control" type="text" id="fullname" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailaddress" class="form-label">Email address</label>
                        <input class="form-control" type="email" id="emailaddress" required placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" placeholder="Enter your password">
                            <div class="input-group-text" data-password="false">
                                <span class="password-eye"></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">User Type</label>
                        <select data-toggle="select2" title="category" name="borrower_id_number">
                            <option value="0">Select User Type</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Assistant Administrator">Assistant Administrator</option>
                            <option value="Staff">Staff</option>
                            <option value="Student">Student</option>
                        </select>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="modal-footer">
        </div> <!-- end modal footer -->
    </div>
    <div class="row row-cols-2">
        <div class="col-lg6">
            <a href="{{ url('/admin/borrowed-books') }}" class="btn fw-semibold btn-danger">
                <i class="mdi mdi-arrow-left"></i> Back to Borrowed List </a>
        </div> <!-- end col -->
        <div class="d-flex flex-row-reverse">
            <button style="width: 120px;" type="submit" class="btn btn-success"> <i class="mdi mdi-content-save-outline me-1"></i> Save </button>
        </div> <!-- end col -->
    </div>
</form>
@endsection
@section('javascript-extra-files')


<script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
{{-- <script src="{{ asset('student_profile/') }}"> --}}
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

{{-- var startTime = new Date();
            var endTime = new Date();
                var responseTime = endTime - startTime; 
                console.log('Response time: ' + responseTime + 'ms');
                console.log(data);
                console.log(data.id_number); --}}