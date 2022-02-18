<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\EngBlog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function random()
    {
        return view('blogs.home', [
            'blogs'=>Blog::inRandomOrder()->limit(2)->get()
        ]);
    }
    // -----for all-blogs page -----//
    public function allMyanBlogs()
    {
        return view('blogs.all-blogs', [
            'bloglanguage'=>'myanmar'
        ]);
    }
    public function allEngBlogs()
    {
        return view('blogs.all-blogs', [
            'bloglanguage'=>'english'
        ]);
    }
    // -----for all-blogs page -----//
    public function showMyanBlog(Blog $blog)
    {
        return view('blogs.show', [
            'blog'=>$blog,
        ]);
    }
    public function showEngBlog(EngBlog $blog)
    {
        return view('blogs.show', [
            'blog'=>$blog,
        ]);
    }
}
