<div class="leftside-menu">

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/lms-logo.png') }}" alt="" height="50">
            <!-- <img src="{{ asset('assets/images/logo.png') }}" alt="" height="16"> -->
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm.png') }}" alt="" height="16">
        </span>
    </a>

    <!-- LOGO -->
    <a href="index.html" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/logo_sm_dark.png') }}" alt="" height="16">
        </span>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Main Menu</li>
            <li class="side-nav-item">
                <a href="{{ url('/admin/dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Books </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEmail">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ url('/admin/books') }}">Book List</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/books/create') }}">Add New Book</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarBorrowers" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Borrowers </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarBorrowers">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBorrowerStudent" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Student </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBorrowerStudent">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ url('/admin/borrowers-students') }}">List of Students</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/borrowers-students-add') }}">Add New Student</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBorrowerStaff" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Staff </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBorrowerStaff">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ url('/admin/borrowers-staff') }}">List of Staff</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/admin/borrowers-staff-add') }}">Add New Staff</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarIssuedBook" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Borrow Books </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarIssuedBook">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ url('/admin/borrowbooks') }}">Borrowed Book List</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBorrowBook" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Select Borrower </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBorrowBook">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ url('/admin/borrowbooks-student-add') }}">Student</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/borrowbooks-staff-add')}}">Staff</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="returned-books" class="side-nav-link">
                    <i class="uil-calender"></i>
                    <span> Return Books </span>
                </a>
            </li>

            <li class="side-nav-title side-nav-item">Sub Menu</li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarPages" aria-expanded="false" aria-controls="sidebarPages" class="side-nav-link">
                    <i class="uil-wrench"></i>
                    <span> Maintenance </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarPages">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarAuthor" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Author </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarAuthor">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{url('/admin/authors')}}">Author List</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/authors/create')}}">Add New Author</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPublisher" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Publisher </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPublisher">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{url('/admin/publishers')}}">Publisher List</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/publishers-add')}}">Add New Publisher</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBooktype" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Book Type </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBooktype">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{url('/admin/booktypes')}}">Book Type List</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/booktypes-add')}}">Add New Book Type</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarPagesAuth" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Category </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarPagesAuth">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{url('/admin/categories')}}">Category List</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/create-category')}}">Add New Category</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarBorrowerType" aria-expanded="false" aria-controls="sidebarPagesAuth">
                                <span> Borrower Type </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarBorrowerType">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{url('/admin/borrowertypes')}}">Borrower Type List</a>
                                    </li>
                                    <li>
                                        <a href="{{url('/admin/borrowertypes-add')}}">Add New Borrower Type</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarAccounts" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> User Account </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarAccounts">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ url('/admin/useraccounts') }}">User Account List</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/useraccounts-add') }}">Add New User</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarReports" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                    <i class="uil-envelope"></i>
                    <span> Reports </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarReports">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ url('/admin/useraccounts') }}">Report 1</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/useraccounts-add') }}">Report 2</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="side-nav-item">
                <a href="landing.html" target="_blank" class="side-nav-link">
                    <i class="uil-globe"></i>
                    <span> Settings </span>
                </a>
            </li>

        </ul>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>