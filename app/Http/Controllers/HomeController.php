<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_count = Post::count();
        $category_count = Category::count();
        $tags_count = Tag::count();
        $users_count = User::count();   
        return view('admin.home', compact('category_count', 'post_count', 'tags_count', 'users_count'));
    }
}
