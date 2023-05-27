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
            <h4 id = "trial" class="page-title">Edit Category</h4>
        </div>
    </div>
    
</div>

<div class="row">
    <div class="modal-content">
        <form class="needs-validation" novalidate action="{{ route('categories.update',$category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="modal-body">
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">Name</label>
                    <input type="text" value="{{ $category->name }}" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="example-textarea" class="form-label">Description</label>
                    <textarea class="form-control" rows="4" name="description" required>{{ $category->description }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Close</a>
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