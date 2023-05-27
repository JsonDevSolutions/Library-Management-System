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
            <h4 id = "trial" class="page-title">Dashbord</h4>
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="card widget-flat bg-info text-white">
            <div class="card-body">
                <div class="avatar-sm rounded float-end">
                    <span class="avatar-title bg-white h3 my-0 text-success rounded">
                        <i class="mdi mdi-book-arrow-right-outline"></i>
                    </span>
                </div>
                <h5 class="text-uppercase mt-0" title="Number of Books">Number of Books</h5>
                @foreach ($total_books as $total_book)
                <h2 class="my-2" id="active-users-count">{{ $total_book->count }}</h2>
                @endforeach
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-lg-4">
        <div class="card widget-flat bg-info text-white">
            <div class="card-body">
                <div class="avatar-sm rounded float-end">
                    <span class="avatar-title bg-white h3 my-0 text-success rounded">
                        <i class="mdi mdi-book-arrow-right-outline"></i>
                    </span>
                </div>
                <h5 class="text-uppercase mt-0" title="Number of Customers">Number of Borrowers</h5>
                @foreach ($total_borrowers as $total_borrower)
                <h2 class="my-2" id="active-users-count">{{ $total_borrower->count }}</h2>
                @endforeach
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-lg-4">
        <div class="card widget-flat bg-info text-white">
            <div class="card-body">
                <div class="avatar-sm rounded float-end">
                    <span class="avatar-title bg-white h3 my-0 text-success rounded">
                        <i class="mdi mdi-book-arrow-right-outline"></i>
                    </span>
                </div>
                <h5 class="text-uppercase mt-0" title="Number of Customers">Total Books Borrowed</h5>
                @foreach ($borrowed_books as $borrowed_book)
                <h2 class="my-2" id="active-users-count">{{ $borrowed_book->count }}</h2>
                @endforeach
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title">Top 10 Borrowed Books</h4>
                    <a href="javascript:void(0);" class="btn btn-sm btn-link">Export <i class="mdi mdi-download ms-1"></i></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Code</th>
                                <th>Book Name</th>
                                <th>Description</th>
                                <th style="width: 90px;">Number of Times Borrowed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">ASOS Ridley High Waist</h5>
                                    <span class="text-muted font-13">07 April 2018</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">$79.49</h5>
                                    <span class="text-muted font-13">Price</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">82</h5>
                                    <span class="text-muted font-13">Quantity</span>
                                </td>
                                <td>
                                    <h5 class="font-14 my-1 fw-normal">$6,518.18</h5>
                                    <span class="text-muted font-13">Amount</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body pb-0">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="header-title">Recent Activity</h4>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body py-0" data-simplebar style="max-height: 405px;"> 
                <div class="timeline-alt py-0">
                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">You sold an item</a>
                            <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">5 minutes ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">Product on the Bootstrap Market</a>
                            <small>Dave Gamache added
                                <span class="fw-bold">Admin Dashboard</span>
                            </small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">30 minutes ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">Robert Delaney</a>
                            <small>Send you message
                                <span class="fw-bold">"Are you there?"</span>
                            </small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">2 hours ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-primary-lighten text-primary timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">Audrey Tobey</a>
                            <small>Uploaded a photo
                                <span class="fw-bold">"Error.jpg"</span>
                            </small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">14 hours ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-upload bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">You sold an item</a>
                            <small>Paul Burgess just purchased “Hyper - Admin Dashboard”!</small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">16 hours ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-airplane bg-primary-lighten text-primary timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-primary fw-bold mb-1 d-block">Product on the Bootstrap Market</a>
                            <small>Dave Gamache added
                                <span class="fw-bold">Admin Dashboard</span>
                            </small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">22 hours ago</small>
                            </p>
                        </div>
                    </div>

                    <div class="timeline-item">
                        <i class="mdi mdi-microphone bg-info-lighten text-info timeline-icon"></i>
                        <div class="timeline-item-info">
                            <a href="javascript:void(0);" class="text-info fw-bold mb-1 d-block">Robert Delaney</a>
                            <small>Send you message
                                <span class="fw-bold">"Are you there?"</span>
                            </small>
                            <p class="mb-0 pb-2">
                                <small class="text-muted">2 days ago</small>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end timeline -->
            </div> <!-- end slimscroll -->
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