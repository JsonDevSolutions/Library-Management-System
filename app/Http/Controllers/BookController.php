<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
            ->join('book_types', 'books.book_type_id', '=', 'book_types.id')
            ->select('books.id', 'books.code', 'books.name', 'books.description', 'books.publish_date', 'books.quantity', 'books.book_cover_photo', 'authors.name As author_name', 'categories.name As category_name', 'publishers.name As publisher_name', 'book_types.name As book_type_name')
            ->get();

        //$books = DB::table('books')->orderByDesc('id')->get();
        return response(view('admin.books.books', compact('books')));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = DB::table('authors')->get();
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $book_types = DB::table('book_types')->get();

        return response(view('admin.books.create', compact('authors', 'categories', 'publishers', 'book_types')));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'book_type_id' => 'required',
            'profile_pic' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');

        $input = $request->all();
        $input['publish_date'] = $date;

        if ($image = $request->file('profile_pic')) {
            $destinationPath = 'book_cover/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['book_cover_photo'] = "$profileImage";
        }

        Book::create($input);

        return redirect('/admin/books/create')
        ->with('success','Book Successfully Save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = DB::table('authors')->get();
        $categories = DB::table('categories')->get();
        $publishers = DB::table('publishers')->get();
        $book_types = DB::table('book_types')->get();

        return response(view('admin.books.books-edit',compact('book', 'authors', 'categories', 'publishers', 'book_types')));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'description' => 'required',
            'author_id' => 'required',
            'category_id' => 'required',
            'publisher_id' => 'required',
            'book_type_id' => 'required',
            'profile_pic' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $date = Carbon::parse($request->input('publish_date'))->format('Y-m-d');

        $input = $request->all();
        $input['publish_date'] = $date;

        if ($image = $request->file('profile_pic')) {
            $image_path = DB::table('books')->where('id', $book->id)->first();

            File::delete('book_cover/'. $image_path->book_cover_photo);

            $destinationPath = 'book_cover/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['book_cover_photo'] = "$profileImage";
        }else{
            unset($input['profile_pic']);
        }

        $book->update($input);

        return redirect()->route('books.index')
        ->with('success','Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $image_path = $book->book_cover_photo;
        // Delete book cover photo from folder
        File::delete('book_cover/' . $image_path);

        $book->delete();

        return redirect()->action('App\Http\Controllers\BookController@index')
        ->with('success','Book deleted successfully');
    }
}
