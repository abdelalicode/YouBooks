<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // $books = Book::inRandomOrder()->paginate(8);
        $books = Book::orderBy('created_at', 'desc')->paginate(8);
        return view('books.index', compact('books'));
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $bookdetails = Book::find($id);

        return view('books.details', compact('bookdetails'));
    }


    public function reserved()
    {
        $resbooks = Book::where('reserved', 1)->get();
        return view('books.reserved', compact('resbooks'));
    }

    public function store(Request $request)
    {
        $title = $request->title;
        $author = $request->author;
        $details = $request->details;

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'details' => 'required'
        ]);

        Book::create([
            'title' => $title,
            'author' => $author,
            'details' => $details
        ]);

        return redirect()->route('book.index');
    }
}
