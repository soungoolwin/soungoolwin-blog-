<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Ecomment;
use App\Models\EngBlog;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storetomblogstable(Blog $blog)
    {
        request()->validate([
            'comment'=>'required'
        ]);

        Comment::create([
            'body'=>request('comment'),
            'user_id'=>auth()->user()->id,
            'blog_id'=>$blog->id
        ]);
        return back();
    }

    public function storetoeblogstable(EngBlog $blog)
    {
        request()->validate([
            'comment'=>'required'
        ]);

        Ecomment::create([
            'body'=>request('comment'),
            'user_id'=>auth()->user()->id,
            'eng_blog_id'=>$blog->id
        ]);
        return back();
    }
    public function delcmtmblogstable(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function delcmteblogstable(Ecomment $comment)
    {
        $comment->delete();
        return back();
    }
}
