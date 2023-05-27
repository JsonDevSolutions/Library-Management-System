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
            <h4 id = "trial" class="page-title">Edit Publisher</h4>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="modal-content">
        <form class="needs-validation" novalidate action="{{ route('publishers.update',$publisher->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Publisher Name</label>
                    <input type="text" value="{{ $publisher->name }}" class="form-control" name="name" required>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('publishers.index') }}" class="btn btn-danger">Close</a>
                <button type="submit" class="btn btn-success">Update</button>
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