<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $with = ['author'];
    public function random()
    {
        return view('blogs.home', [
            'blogs'=>Blog::inRandomOrder()->limit(2)->get()
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog'=>$blog
        ]);
    }
    public function index()
    {
        return view('blogs.all-blogs', [
            'blogs'=>Blog::latest()->paginate(6)
        ]);
    }
}
