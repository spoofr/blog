<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\Setting;

class PageController extends Controller
{
    public function index() 
    {
        $posts = Post::orderBy('created_at', 'desc')->get(); 
        $categories = Category::take(5)->get();        
        $setting = Setting::first(); // Use first() because it has only one row instance

        
        return view('index', compact('posts', 'categories', 'setting'));
    }

    public function singlePage($slug) 
    {
        $single_post = Post::where('slug', $slug)->first(); 

        $next_id = Post::where('id', '<', $single_post->id)->max('id'); // Filter post, which is greater than post id, and pick the minimum number. Eg: Current is 3, it will pick 4
        $prev_id = Post::where('id', '>', $single_post->id)->min('id');
        $next_post = Post::find($next_id); // Get single post
        $prev_post = Post::find($prev_id); 
        
        $tags = Tag::all();   
        $categories = Category::take(5)->get();        
        $setting = Setting::first(); // Use first() because it has only one row instance
        
        return view('single', compact('single_post', 'categories', 'setting', 'next_post', 'prev_post', 'tags'));

        // Just create a link like this {{ route('post.single', $post->slug) }} 
    }

    public function categoryPage($id) 
    {
        $category = Category::find($id);
        $posts = Post::orderBy('created_at', 'desc')->get(); 
        $categories = Category::take(5)->get();        
        $setting = Setting::first(); // Use first() because it has only one row instance
        $tags = Tag::all();  

        return view('category', compact('categories', 'setting', 'category', 'posts', 'tags'));
    }

    public function tagPage($id) 
    {
        $tag = Tag::find($id);
        $posts = Post::orderBy('created_at', 'desc')->get(); 
        $categories = Category::take(5)->get();        
        $setting = Setting::first(); // Use first() because it has only one row instance
        $tags = Tag::all();  

        return view('tag', compact('tag', 'setting', 'categories', 'posts', 'tags'));
    }
}
