<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Ecomment;
use App\Models\EngBlog;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'bloglanguage'=>'mblogs',
            'comments'=>$blog->comments
        ]);
    }
    public function showEngBlog(EngBlog $blog)
    {
        return view('blogs.show', [
            'blog'=>$blog,
            'bloglanguage'=>'eblogs',
            'comments'=>$blog->comments
        ]);
    }
}
;
