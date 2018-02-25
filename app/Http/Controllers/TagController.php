<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.tags.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' =>'required'
        ]);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();

        Session::flash('success', 'Tag created successfully');
        return redirect()->route('tag.index');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tag' =>'required'
        ]);
        $tags = Tag::find($id);
        $tag->tag = $request->tag;
        $tag->save();
        Session::flash('success', 'Tag updated successfully');        
        return redirect()->back();
    }

    public function destroy($id)
    {
        Tag::destroy($id);
        Session::flash('success', 'Tag deleted successfully');        
        return redirect()->back();        
    }
}
