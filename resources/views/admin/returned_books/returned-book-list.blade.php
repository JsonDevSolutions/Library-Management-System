@extends('layouts.admin')

@section('additional_css_files')
    <!-- Datatables css -->
    <link href="{{ asset('assets/css/vendor/dataTables.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/vendor/responsive.bootstrap5.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 id = "trial" class="page-title">Returned Book List</h4>
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
    <div class="col-12">
        <div class="card" style="padding:20px;">
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th style="width: 100px;">Code</th>
                        <th>Book Name</th>
                        <th>Description</th>
                        <th style="width: 90px;">Date Borrowed</th>
                        <th>Borrower Name</th>
                        <th>ID Number</th>
                        <th>Date Returned</th>
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
                        <td>{{ 
                        $dateTime = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $borrowed_book->date_returned)->format('m-d-Y h:iA')
                        }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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