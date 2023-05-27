@extends('layouts.admin')

@section('additional_css_files')
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<div class="row" style="margin-top:20px;">
    <div class="col-sm-4">
        <div class="card widget-flat bg-danger text-white">
            <div class="card-body">
                <div class="avatar-sm rounded float-end">
                    <span class="avatar-title bg-white h3 my-0 text-danger rounded">
                        <i class="mdi mdi-book-alert-outline"></i>
                    </span>
                </div>
                <h5 class="text-uppercase mt-0" title="Number of Customers">Books to be Return</h5>
                @foreach ($books_to_be_returns as $books_to_be_return)
                <h3 class="mt-3 mb-3">{{ $books_to_be_return->total_borrowers }}</h3>
                @endforeach
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-sm-4">
        <div class="card widget-flat bg-success text-white">
            <div class="card-body">
                <div class="avatar-sm rounded float-end">
                    <span class="avatar-title bg-white h3 my-0 text-success rounded">
                        <i class="mdi mdi-book-arrow-right-outline"></i>
                    </span>
                </div>
                <h5 class="text-uppercase mt-0" title="Number of Customers">Returned Books</h5>
                @foreach ($returned_books as $returned_book)
                <h3 class="mt-3 mb-3">{{ $returned_book->total_returned_books }}</h3>
                @endforeach
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-sm-4">
        <div class="card widget-flat bg-primary text-white">
            <div class="card-body">
                <div class="avatar-sm rounded float-end">
                    <span class="avatar-title bg-white h3 my-0 text-primary rounded">
                        <i class="mdi mdi-book-outline"></i>
                    </span>
                </div>
                <h5 class="text-uppercase mt-0" title="Number of Customers">Borrowed Books</h5>
                @foreach ($total_borrowed_books as $total_borrowed_book)
                <h3 class="mt-3 mb-3">{{ $total_borrowed_book->total_borrowed_books }}</h3>
                @endforeach
                
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 id = "trial" class="page-title">Borrowed Book List</h4>
        </div>
    </div>
    
</div>
<div class="row">
    @if ($message = Session::get('success'))
        <div class="alert alert-success bg-success text-white" role="alert">
            <i class="dripicons-checkmark me-2"></i> <strong>{{ $message }}</strong>
        </div>
    @endif
</div>
<div class="row">
    <div class="card col-12" style="padding: 30px;">
        <table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th style="width: 100px;">Code</th>
                    <th>Book Name</th>
                    <th>Description</th>
                    <th style="width: 90px;">Date Borrowed</th>
                    <th>Borrower Name</th>
                    <th>ID Number</th>
                    <th style="width: 50px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowed_books as $borrowed_book)
                <tr>
                    <td>{{ $borrowed_book->code }}</td>
                    <td>
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="{{ $borrowed_book->book_cover_photo ? url('book_cover/' . $borrowed_book->book_cover_photo) : url(asset('assets/images/users/avatar-1.jpg')) }}" class="rounded-circle avatar-xs" alt="friend">
                                </div>
                                <div class="flex-grow-1 ms-2"><h5 class="my-0">{{ $borrowed_book->name }}</h5></div>
                            </div>
                        </div>
                    </td>
                    <td>{{ $borrowed_book->description }}</td>
                    <td>{{ $borrowed_book->date_borrowed }}</td>
                    <td>{{ $borrowed_book->full_name }}</td>
                    <td>{{ $borrowed_book->id_number }}</td>
                    <td>
                        <form method="post" action="{{ route('borrowers-staff.destroy',$borrowed_book->borrowed_id) }}">
                            <a href="{{ route('borrowers-staff.edit',$borrowed_book->borrowed_id) }}" class="btn btn-info btn-sm"><i class="uil uil-pen"></i></a>
                            @method('delete')
                            @csrf
                            <button  type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash"></i></button>
                            <a href="{{ route('borrowers-staff.edit',$borrowed_book->borrowed_id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></a>
                            <a href="/admin/borrowed-books/return/{{ $borrowed_book->borrowed_id }}" class="btn btn-info btn-sm">Return</a>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



@endsection
@section('javascript-extra-files')

    <!-- Datatables js -->
    <script src="{{ asset('assets/js/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/responsive.bootstrap5.min.js') }}"></script>

    <!-- Datatable Init js -->
    <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>
@endsection