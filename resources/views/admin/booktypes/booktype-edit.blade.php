@extends('layouts.admin')

@section('css-files')
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 id = "trial" class="page-title">Edit Book Type</h4>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="modal-content">
        <form class="needs-validation" novalidate action="{{ route('booktypes.update',$booktype->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Book Type Name</label>
                    <input type="text" value="{{ $booktype->name }}" class="form-control" name="name" required>
                </div>
            </div>
            <div class="modal-footer">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ url('/admin/authors') }}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                <i class="mdi mdi-arrow-left"></i> Back to Book List </a>
                        </div> <!-- end col -->
                        <div class="col-lg-6">
                            <div class="text-sm-end">
                                <button style="width: 120px;" type="submit" class="btn btn-success"> <i class="mdi mdi-content-save-outline me-1"></i> Update </button>
                            </div>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div> <!-- end modal footer -->
        </form>
    </div> <!-- end modal content-->
</div>


@endsection
@section('javascript-files')
    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
@endsection