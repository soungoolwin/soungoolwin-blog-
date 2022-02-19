<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\EngBlog;
use Illuminate\Http\Request;

class SubscribelikeController extends Controller
{
    public function storetomblogstable(Blog $blog)
    {
        $blog->like();
        return back();
    }
    public function unstoretomblogstable(Blog $blog)
    {
        $blog->unlike();
        return back();
    }

    public function storetoeblogstable(EngBlog $blog)
    {
        $blog->like();
        return back();
    }
    public function unstoretoeblogstable(EngBlog $blog)
    {
        $blog->unlike();
        return back();
    }
}
