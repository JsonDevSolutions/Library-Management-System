@extends('layouts.admin')

{{-- @section('css-files')
    <!-- App css -->
    
@endsection --}}

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/borrowed-books" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-clipboard-outline me-1"></i> Borrowed Book List
                </a>
            </div>
            <h4 id = "trial" class="page-title">Borrow Book</h4>
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
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row" >
                        <label  class="font-20 fw-bold text-danger" style="text-align-last: center;">Staff Information</label>
                    </div>
                    <div class="mt-3 text-center">
                        <img id="staff_photo" src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="shreyu"
                        class="img-thumbnail avatar-lg rounded" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Borrower Name</label>
                        <select data-toggle="select2" title="category" onchange="GetStaffInfo(this.value)" name="borrower_id_number">
                            <option value="0">Select Borrower</option>
                            @foreach ($staffs as $staff)
                                <option value="{{ $staff->id_number }}">{{ $staff->full_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">ID Number</label>
                        <input type="text" id="id_number" class="form-control" readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Address</label>
                        <textarea class="form-control" rows="4" id="address" readonly=""></textarea>
                    </div>
                    <div class="mb-3" id="student">
                        <label for="simpleinput" class="form-label">Designation</label>
                        <input type="text" id="designation" class="form-control" readonly="">
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
        <div class="col-md-6 col-xxl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <label class="font-20 fw-bold text-danger" style="text-align-last: center;">Book Information</label>
                    </div>
                    <div class="mt-3 text-center">
                        <img id="book_photo" src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="shreyu"
                        class="img-thumbnail avatar-lg rounded" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Book Name</label>
                        <select data-toggle="select2" title="author" name="book_id" onchange="GetBookInfo(this.value)" required>
                            <option value="0">Select Book</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" rows="4" id="book_description" readonly="" required></textarea>
                    </div>
                    <div class="mb-3 position-relative" id="datepicker1">
                        <label class="form-label">Date Published</label>
                        <input type="text" id="publish_date" class="form-control" readonly="">
                    </div>
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Quantity</label>
                        <input data-toggle="touchspin" type="text" value="1" name="quantity">
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
<script>
    function GetStaffInfo(Str) {
            $url = '/admin/borrowers-students/' + Str;

            $.ajax({
            url: $url,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#id_number').val(data.id_number);
                $('#address').val(data.address);
                $('#designation').val(data.designation);

                var profile_photo = document.getElementById("staff_photo");
                    profile_photo.src = "{{ url(asset('staff_profile/')) }}" + '/' + data.profile_path;
            }
        });
    }

    function GetBookInfo(Str) {
            $url1 = '/admin/books/';
            $url = $url1.concat(Str);

            $.ajax({
            url: $url,
            type: 'GET',
            dataType: 'JSON',
            success: function(data) {
                $('#book_description').val(data.description);
                $('#publish_date').val(data.publish_date);
                var imageElement = document.getElementById("book_photo");
                imageElement.src = "{{ url(asset('book_cover/')) }}" + '/' + data.book_cover_photo;
            }
        });
    }
</script>

    <!-- bundle -->
@endsection

{{-- var startTime = new Date();
            var endTime = new Date();
                var responseTime = endTime - startTime; 
                console.log('Response time: ' + responseTime + 'ms');
                console.log(data);
                console.log(data.id_number); --}}