<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $books = Book::inRandomOrder()->paginate(8);

        $books = Book::orderBy('created_at', 'desc')->paginate(8);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        // $title = $request->title;
        // $author = $request->author;
        // $details = $request->details;

        // $request->validate([
        //     'title' => 'required',
        //     'author' => 'required',
        //     'details' => 'required'
        // ]);

        // Book::create([
        //     'title' => $title,
        //     'author' => $author,
        //     'details' => $details
        // ]);

        Book::create($request->validated());
        return redirect()->route('book.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        // $id = $request->id;
        // $bookdetails = Book::find($id);

        return view('books.details', compact('book'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
       return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        
        $book->update($request->all());
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index');
    }
}
