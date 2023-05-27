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
            <div class="page-title-right">
                <a href="/admin/publishers" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-clipboard-outline me-1"></i> Publisher List
                </a>
            </div>
            <h4 id = "trial" class="page-title">Add New Publisher</h4>
        </div>
    </div>
    
</div>
<div class="row">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <i class="dripicons-checkmark me-2"></i> <strong>{{ $message }}</strong>
        </div>
    @endif
</div>

<div class="row">
    <div class="modal-content">
        <form class="needs-validation" novalidate action="{{ route('publishers.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Publisher Name</label>
                    <input type="text" id="name" class="form-control" name="name" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
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