<?php

namespace App\Http\Controllers;

use App\Mail\SubscriberMail;
use App\Models\Blog;
use App\Models\Category;
use App\Models\EngBlog;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    //FOR MYANMAR BLOG
    public function createmblog()
    {
        return view('dashboard.publish-mblog', [
            'categories'=>Category::all()
        ]);
    }
    public function storemblog()
    {
        $formData = request()->validate([
            'title'=>['required'],
            'slug'=>['required', Rule::unique('eng_blogs', 'slug')],
            'intro'=>['required'],
            'body'=>['required'],
            'image'=>['required'],
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id']= auth()->id();

        Blog::create($formData);
        $formData['btn_url']= "https://soungoolwin.com/mblogs/{$formData['slug']}";

        $subscribers = Subscriber::all();

        $subscribers->each(function ($subscriber) use ($formData) {
            Mail::to($subscriber->email)->send(new SubscriberMail($formData));
        });
        return redirect('/');
    }
    public function showallmyanmarblogs()
    {
        return view('dashboard.mblogslist', [
            'blogs'=>Blog::all()
        ]);
    }
    public function deletemblog(Blog $blog)
    {
        $blog->delete();
        return back();
    }

    public function showmblogeditform(Blog $blog)
    {
        return view('dashboard.edit-mblog', [
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }

    public function editmblog(Blog $blog)
    {
        $formData = request()->validate([
            'title'=>['required'],
            'slug'=>['required'],
            'intro'=>['required'],
            'body'=>['required'],
            'image'=>['required'],
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id']= auth()->id();

        $blog->update($formData);
        return redirect('/mblog/list');
    }


    //for english blogs

    public function createeblog()
    {
        return view('dashboard.publish-eblog', [
            'categories'=>Category::all()
        ]);
    }

    public function storeeblog()
    {
        $formData = request()->validate([
            'title'=>['required'],
            'slug'=>['required', Rule::unique('eng_blogs', 'slug')],
            'intro'=>['required'],
            'body'=>['required'],
            'image'=>['required'],
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id']= auth()->id();
        
        EngBlog::create($formData);
        
        $subscribers = Subscriber::all();
        $formData['btn_url']= "https://soungoolwin.com/eblogs/{$formData['slug']}";

        $subscribers->each(function ($subscriber) use ($formData) {
            Mail::to($subscriber->email)->send(new SubscriberMail($formData));
        });

        return redirect('/');
    }



    public function showallenglishblogs()
    {
        return view('dashboard.eblogslist', [
            'blogs'=>EngBlog::all()
        ]);
    }

    public function deleteeblog(EngBlog $blog)
    {
        $blog->delete();
        return back();
    }

    public function showeblogeditform(EngBlog $blog)
    {
        return view('dashboard.edit-eblog', [
            'blog'=>$blog,
            'categories'=>Category::all()
        ]);
    }
    public function editeblog(EngBlog $blog)
    {
        $formData = request()->validate([
            'title'=>['required'],
            'slug'=>['required'],
            'intro'=>['required'],
            'body'=>['required'],
            'image'=>['required'],
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id']= auth()->id();
        $blog->update($formData);
        
        return redirect('eblog/list');
    }
}
