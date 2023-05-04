<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Shelve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use League\CommonMark\Extension\CommonMark\Node\Block\HtmlBlock;

class ShelveController extends Controller
{

    public function index()
    {
        $shelves = Shelve::orderBy('id', 'DESC')->get();

        return view('shelves.shelves', compact('shelves'));
    }


    public function create()
    {
        $blocks = Block::all();

        return view('shelves.create-shelve', compact('blocks'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'block_id' => 'required',
            'name' => 'required|max:255|regex:/^[^0-9]*$/'
        ],[
            'name.regex' => 'The :attribute field must not contain any numeric characters.'
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        $validatedData = $validator->validated();

        Shelve::create($validatedData);

        $shelveName = $request->name;

        return redirect()->route('shelves.index')->with('added', 'Shelve ' . $shelveName . ' added successfully!');


    }


    public function show(Shelve $shelve)
    {
        //
    }

    public function edit($id)
    {
        $blocks = Block::all();
        $shelve = Shelve::find($id);

        return view('shelves.edit-shelve', ['shelve' => $shelve], ['blocks' => $blocks]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'block_id' => 'required',
            'name' => 'required|max:255|regex:/^[^0-9]*$/'
        ],[
            'name.regex' => 'The :attribute field must not contain any numeric characters.'
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData = $validator->validated();
        $shelve = Shelve::find($id);
        $shelve->update($validatedData);

        return Redirect::route('shelves.index')->with('updated', 'Shelve updated successfully!');

    }


    public function destroy($id)
    {
        $shelve = Shelve::find($id);
        $shelveName = $shelve->name;
        $shelve->delete();
        return Redirect::back()->with('deleted', 'Shelve ' . $shelveName . ' deleted successfully');
    }
}
