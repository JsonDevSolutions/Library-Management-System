@extends('layouts.admin')

@section('css-files')
    <!-- App css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>

    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="warning-header-modalLabel">Add New Category</h4>
                    <button style="color:white;" type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Name</label>
                        <input type="text" id="name" class="form-control" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="example-textarea" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="4" name="description" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div> <!-- end modal dialog-->
</div> <!-- end modal-->

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/create-category" class="btn btn-danger mb-2 me-2">
                    <i class="mdi mdi-basket me-1"></i> Add New Category
                </a>
                <button type="button" class="btn btn-light mb-2">Export</button>
            </div>
            <h4 id = "trial" class="page-title">Category List</h4>
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
    <div class="col-12">
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th style="width: 100px;">Category ID</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)

                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <form method="post" action="{{ route('categories.destroy',$category->id) }}">
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-info btn-sm"><i class="mdi mdi-pencil"></i></a>
                            
                            @method('delete')
                            @csrf
                            <button  type="submit" class="btn btn-danger btn-sm"><i class="mdi mdi-trash-can-outline"></i></button>
                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    
</div>


@endsection
@section('javascript-files')
    <!-- bundle -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Datatables js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable Init js -->
    <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
@endsection