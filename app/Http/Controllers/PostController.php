<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Image;

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
        $tags = Tag::all(); // Category input         
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required',
            'featured_image' => 'required|image',
            'name' => 'required'
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str_slug($request->title); // Define slug
        if($request->hasFile('featured_image')) { 
            $image_file = $request->file('featured_image'); // Get image file
            $image_file_name = time() . '.' . $image_file->getClientOriginalExtension(); // Rename image to unique name using time
            $image_location = public_path('images/posts/' . $image_file_name); // Define location path to save the image
            Image::make($image_file)->save($image_location); // Save the image to $location path
            $post->featured_image = $image_file_name; // Save only the file name, not image file
        }
        $post->save();
        $post->tags()->attach($request->name); // This do the trick for pivot table association, The tags() come from the Post.php model. The attach() method is used to attach post_table with tag_table, then store it in post_tag table
        Session::flash('success', 'Your post has been saved successfully');
        return redirect()->route('post.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $post = Post::find($id);
        $categories = Category::all(); // Category input
        $tags = Tag::all(); // Tag input        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
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
        $post->slug = str_slug($request->title); // Define slug
        if ($request->hasFile('featured_image')) {
            $image_file = $request->file('featured_image');
            $image_file_name = time() . '.' . $image_file->getClientOriginalExtension();
            $image_file_location = public_path('images/posts/' . $image_file_name);
            $temp_image_file_name = $post->featured_image; // Temporary old file name, to ease deleting later after the image deleted
            Image::make($image_file)->save($image_file_location);
            $post->featured_image = $image_file_name; // Tell the database the filename
            // Delete old photo - Go to filesystem.php in config folder, update the local with the current working path
            Storage::delete($temp_image_file_name);
        }
        $post->save();
        $post->tags()->sync($request->name); // name is for tag        
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
        $trashed_posts = Post::onlyTrashed()->get(); //  Get all item which is $deleted_at column is not null
        return view('admin.posts.trash', compact('trashed_posts'));
    }

    public function restore($id) 
    {
        $trashed_posts = Post::withTrashed()->where('id', $id)->first();
        $trashed_posts->restore();
        Session::flash('success', 'Post restored successfully');
        return redirect()->route('post.index');
    }

    public function emptyTrash($id)
    {
        $trashed_posts = Post::withTrashed()->where('id', $id)->first(); // Instead of get(), use first() to catch single item. get() return collection array.
        $trashed_posts->forceDelete();
        Session::flash('success', 'Post deleted permanently');
        return redirect()->back();
    }
}
