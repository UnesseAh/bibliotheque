<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return view('authors.authors', compact('authors'));
    }

    public function create()
    {
        return view('authors.create-authors');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255|regex:/^[^0-9]*$/',
            'last_name' => 'required|max:255|regex:/^[^0-9]*$/',
            'age' => 'required|integer|min:1|max:100',
            'country' => 'required|max:255|regex:/^[^0-9]*$/',
            'image' => 'required|mimes:jpeg,png,jpg,gif'
        ],[
            'first_name.regex' => 'First name must not contain any digits',
            'last_name.regex' => 'Last name must not contain any digits',
            'age.digits_between' => 'Age must be between 1 and 100',
            'country' => 'Country must not contain any digits',
            'image.mimes' => 'Image must be of type jpeg, png, jpg, or gif only',
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();

        if($image = $request->file('image')){
            $image->move('image/' , $image->getClientOriginalName());
            $validatedData['image'] = $image->getClientOriginalName();
        }

        Author::create($validatedData);

        $firstName = $request->get('first_name');
        $lastName  = $request->get('last_name');

        return \redirect()->route('authors.index')->with('added', 'Author "' . $firstName . ' '. $lastName . '" added successfully');
    }

    public function show(Author $author)
    {
        //
    }

    public function edit(Author $author)
    {

        return view('authors.edit-authors', compact('author'));
    }


    public function update(Request $request, Author $author)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255|regex:/^[^0-9]*$/',
            'last_name' => 'required|max:255|regex:/^[^0-9]*$/',
            'age' => 'required|integer|min:1|max:100',
            'country' => 'required|max:255|regex:/^[^0-9]*$/',
        ],[
            'first_name.regex' => 'First name must not contain any digits',
            'last_name.regex' => 'Last name must not contain any digits',
            'age.digits_between' => 'Age must be between 1 and 100',
            'country' => 'Country must not contain any digits',
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

        $author->update($validatedData);

        $firstName = $request->get('first_name');
        $lastName = $request->get('last_name');

        return redirect()->route('authors.index')->with('updated', 'Author "' . $firstName . ' ' . $lastName . '" updated successfully!');


    }

    public function destroy(Author $author)
    {
        $firstName = $author->first_name;
        $lastName = $author->last_name;

        $author->delete();

        return Redirect::back()->with('deleted', 'Author "' . $firstName . ' ' . $lastName . '" deleted successfully!');
    }
}
