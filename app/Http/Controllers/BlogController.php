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
    public function allMyanBlogs()
    {
        return view('blogs.all-blogs', [
            'blogs'=>Blog::orderBy('id', 'DESC')->paginate(6),
            'bloglanguage'=>'myanmar'
        ]);
    }
    public function allEngBlogs()
    {
        return view('blogs.all-blogs', [
            'blogs'=>EngBlog::orderBy('id', 'DESC')->paginate(6),
            'bloglanguage'=>'english'
        ]);
    }
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
