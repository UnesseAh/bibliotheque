<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $books = Book::with( 'author','genre')->get();
        return view('books.books', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('books.create-book', compact('genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'summary' => 'required|max:255',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
            'image' => 'required|mimes:jpeg,png,jpg,gif,jfif'
        ],[
            'image.mimes' => 'Image must be of type jpeg, png, jpg, gif or jfif only',
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        if($image = $request->file('image')){
            $image->move('image/', $image->getClientOriginalName());
            $validatedData['image'] = $image->getClientOriginalName();
        }

        $bookName = $request->title;
        Book::create($validatedData);

        return Redirect::route('books.index')->with('added', 'Book "' . $bookName.'" Added Successfully');
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
        $genres = Genre::all();
        $authors = Author::all();
        return view('books.edit-book', compact('book', 'genres', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),  [
            'title' => 'required|max:255',
            'summary' => 'required|max:255',
            'genre_id' => 'required|exists:genres,id',
            'author_id' => 'required|exists:authors,id',
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        if($image = $request->file('image')){
            $image->move('image/', $image->getClientOriginalName());
            $validatedData['image'] = $image->getClientOriginalName();
        }else {
                unset($validatedData['image']);
        }

        $bookName = $request->title;

        $book->update($validatedData);

        return Redirect::route('books.index')->with('updated', 'Book "' . $bookName . '" updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $bookTitle = $book->title;
        $book->delete();
        return Redirect::route('books.index')->with('deleted', 'Book "' . $bookTitle . '" deleted successfully!');
    }
}
