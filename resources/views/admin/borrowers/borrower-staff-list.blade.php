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
                <a href="/admin/borrowers-staff-add" class="btn btn-danger mb-2">
                    <i class="mdi mdi-clipboard-plus-outline me-1"></i> Add New Staff
                </a>
            </div>
            <h4 id = "trial" class="page-title">Staff List</h4>
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
                        <th style="width: 100px;">Staff ID</th>
                        <th>Staff Name</th>
                        <th>Address</th>
                        <th style="width: 90px;">Designation</th>
                        <th style="width: 50px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                    <tr>
                        <td>{{ $staff->id_number }}</td>
                        <td>
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ $staff->profile_path ? url('staff_profile/' . $staff->profile_path) : url(asset('assets/images/users/avatar-1.jpg')) }}" class="rounded-circle avatar-xs" alt="friend">
                                    </div>
                                    <div class="flex-grow-1 ms-2"><h5 class="my-0">{{ $staff->full_name }}</h5></div>
                                </div>
                            </div>
                        </td>
                        <td>{{ $staff->address }}</td>
                        <td>{{ $staff->designation }}</td>
                        <td>
                            <form method="post" action="{{ route('borrowers-staff.destroy',$staff->id) }}">
                                <a href="{{ route('borrowers-staff.edit',$staff->id) }}" class="btn btn-info btn-sm"><i class="uil uil-pen"></i></a>
                                @method('delete')
                                @csrf
                                <button  type="submit" class="btn btn-danger btn-sm"><i class="uil uil-trash"></i></button>
                                <a href="{{ route('borrowers-staff.edit',$staff->id) }}" class="btn btn-success btn-sm"><i class="mdi mdi-eye"></i></a>
                            </form>
                        </td>
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