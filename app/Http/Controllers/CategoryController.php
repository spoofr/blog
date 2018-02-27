<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'Your category has been saved successfully');
        return redirect()->route('category.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->name; 
        $category->save();
        Session::flash('success', 'Your category has been edit successfully');
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        foreach($category->posts as $post){ // Delete all post associated to the categories
            $post->forceDelete();
        }
        $category->delete();
        Session::flash('success', 'Your category has been deleted successfully');
        return redirect()->route('category.index');
    }
}
