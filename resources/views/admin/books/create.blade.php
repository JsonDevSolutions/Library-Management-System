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
                    <a href="/admin/books" class="btn btn-danger mb-2">
                        <i class="mdi mdi-clipboard-outline me-1"></i> Book List
                    </a>
                </div>
                <h4 id = "trial" class="page-title">Add New Book</h4>
            </div>
        </div>
    </div>
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="modal-content">
            <form class="needs-validation" novalidate action="{{ route('books.store') }}" method="POST" autocomplete="off"  enctype="multipart/form-data">
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success bg-success text-white" role="alert">
                        <i class="dripicons-checkmark me-2"></i> <strong>{{ $message }}</strong>
                    </div>
                @endif
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="modal-body">
                                <div class="mt-3 text-center">
                                    <img id="imageResult" src="{{ asset('assets/images/users/avatar-5.jpg') }}" alt="shreyu"
                                    class="img-thumbnail avatar-lg rounded" />
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Upload Book Cover Photo</label>
                                    <input id="upload" type="file" onchange="readURL(this);" accept="image/png, image/gif, image/jpeg" class="form-control" name="profile_pic">
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Code</label>
                                    <input type="text" class="form-control" name="code" required>
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="example-textarea" class="form-label">Description</label>
                                    <textarea class="form-control" rows="4" name="description" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Author</label>
                                    <select data-toggle="select2" title="author" id="author" name="author_id">
                                        <option value="0">Select Author</option>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select data-toggle="select2" title="category" id="category" name="category_id">
                                        <option value="0">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Publisher</label>
                                    <select data-toggle="select2" title="publisher" id="publisher" name="publisher_id">
                                        <option value="0">Select Publisher</option>
                                        @foreach ($publishers as $publisher)
                                            <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Book Type</label>
                                    <select data-toggle="select2" title="book_type" id="book_type" name="book_type_id">
                                        <option value="0">Select Book Type</option>
                                        @foreach ($book_types as $book_type)
                                            <option value="{{ $book_type->id }}">{{ $book_type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 position-relative" id="datepicker1">
                                    <label class="form-label">Date Published</label>
                                    <input type="text" id="publish_date" class="form-control" data-provide="datepicker" data-date-container="#datepicker1" name="publish_date">
                                </div>
                                <div class="mb-3">
                                    <label for="simpleinput" class="form-label">Quantity</label>
                                    <input type="text" class="form-control" name="quantity">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="{{ url('/admin/books') }}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                                    <i class="mdi mdi-arrow-left"></i> Back to Book List </a>
                            </div> <!-- end col -->
                            <div class="col-lg-6">
                                <div class="text-sm-end">
                                    <button style="width: 120px;" type="submit" id="save_book" class="btn btn-success"> <i class="mdi mdi-content-save-outline me-1"></i> Save </button>
                                </div>
                            </div> <!-- end col -->
                        </div>
                    </div>
                </div> <!-- end modal footer -->
            </form>
        </div> <!-- end modal content-->
    </div>
@endsection
@section('javascript-extra-files')
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection