<?php

namespace App\Http\Controllers;

use App\Models\Block;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BlockController extends Controller
{

    public function index()
    {
        $blocks = Block::all();
        return view('blocks.blocks', compact('blocks'));
    }


    public function create()
    {
        return view('blocks.create-block');
    }


    public function store(Request $request)
    {
        $blockName = $request->name;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|regex:/^[^0-9]*$/'
        ],[
            'name.regex' => 'The :attribute field must not contain any numeric characters.'
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }
        Block::create($validator->validated());

        return Redirect::route('show.blocks')->with('added', 'Block "' . $blockName . '" added successfully!');

    }

    public function edit(Block $block)
    {
        return view('blocks.edit-block', compact('block'));
    }

    public function update(Request $request, Block $block)
    {
        $blockName = $block->name;

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255|unique:blocks|regex:/^[^0-9]*$/'
        ],[
            'name.regex' => 'The :attribute field must not contain any numeric characters.',
            'name.unique' => 'The name ' . $request->name . ' has already been taken'
        ]);

        if($validator->fails()){
            return Redirect::back()
                ->withErrors($validator)
                ->withInput();
        }

        $block->update($validator->validated());

        return Redirect::route('show.blocks')->with('updated', 'Block "' . $blockName . '" updated successfully!');


    }

    public function destroy(Block $block)
    {
        $blockName = $block->name;

        $block->delete();

        return Redirect::back()->with('deleted', 'Block "' . $blockName . '" deleted successfully!');
    }
}
