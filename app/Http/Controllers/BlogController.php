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
        return view('livewire.myanblogs');
    }
    public function allEngBlogs()
    {
        return view('blogs.all-blogs');
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
