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
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="/admin/authors/create" class="btn btn-danger mb-2">
                    <i class="mdi mdi-basket me-1"></i> Add New Author
                </a>
            </div>
            <h4 id = "trial" class="page-title">Author List</h4>
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
                    <th style="width: 100px;">Author ID</th>
                    <th>Author Name</th>
                    <th style="width: 200px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)

                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>
                        <form method="post" action="{{ route('authors.destroy',$author->id) }}">
                            <a href="{{ route('authors.edit',$author->id) }}" class="btn btn-info btn-sm"><i class="uil uil-pen"></i></a>
                            @method('delete')
                            @csrf
                            <button  type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash"></i></button>
                            <a href="{{ route('authors.edit',$author->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></a>
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