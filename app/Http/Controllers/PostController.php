<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Session;
use Image;
use Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all(); // Category input 
        return view('admin.posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'featured_image' => 'required|image'
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title); // Define slug
        if($request->hasFile('featured_image')) { 
            $featured_image = $request->file('featured_image'); // Get image file
            $filename = time() . '.' . $featured_image->getClientOriginalExtension(); // Rename image to unique name using time
            $location = public_path('images/posts/' . $filename); // Define location path to save the image
            Image::make($featured_image)->save($location); // Save the image to $location path
            $post->featured_image = $filename; // Save only file name, no image
        }
        $post->save();
        Session::flash('success', 'Your post has been saved successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all(); // Category input
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title); 
        if ($request->hasFile('featured_image')) {
            $featured_image = $request->file('featured_image');
            $filename = time() . '.' . $featured_image->getClientOriginalExtension();
            $location = public_path('images/posts/' . $filename);
            Image::make($featured_image)->resize(800, 400)->save($location);
            $oldFileName = $post->featured_image; // Temporary old file name, to ease deleting later after the image deleted
            // Update the database
            $post->featured_image = $filename; // Tell the database the filename
            // Delete old photo - Go to filesystem.php in config folder, update the local with the current working path
            Storage::delete($oldFileName);
        }
        $post->save();
        Session::flash('success', 'Your post has been edit successfully');
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        Session::flash('success', 'The post has been sent to trash!');
        return redirect()->back();
    }

    public function trash()
    {
        $trashedPosts = Post::onlyTrashed()->get(); //  Get all item which is $deleted_at column is not null
        return view('admin.posts.trash', compact('trashedPosts'));
    }

    public function restore($id) 
    {
        $post = Post::withTrashed()->where('id', $id)->first();
        $post->restore();
        Session::flash('success', 'Post restored successfully');
        return redirect()->route('post.index');
    }

    public function emptyTrash($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first(); // Instead of get(), use first() to catch single item. get() return collection array.
        $post->forceDelete();
        Session::flash('success', 'Post deleted permanently');
        return redirect()->back();
    }
}
