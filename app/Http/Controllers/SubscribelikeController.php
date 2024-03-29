<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\EngBlog;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribelikeController extends Controller
{
    public function storetomblogstable(Blog $blog)
    {
        $blog->like();//this like function is defined at Blog model. This is one kind of refactoring.
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

    public function storetosubscribetable()
    {
        if (!auth()->user()->isSubscribe) {
            Subscriber::create([
                'email'=>auth()->user()->email,
                'user_id'=>auth()->user()->id
            ]);
        } else {
            Subscriber::find(auth()->user()->isSubscribe->id)->delete();
        }

        return back();
    }
}
