<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\EngBlog;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.publish-blog', [
            'categories'=>Category::all()
        ]);
    }
    public function store()
    {
        if (request('language')==='English') {
            $blogtable = "blogs";
        } else {
            $blogtable = "eng_blogs";
        }
        $formData = request()->validate([
            'title'=>['required'],
            'slug'=>['required', Rule::unique($blogtable, 'slug')],
            'image'=>['required'],
            'body'=>['required'],
            'category_id'=>['required', Rule::exists('categories', 'id')]
        ]);
        $formData['user_id']= auth()->id();
        $formData['intro'] = substr($formData['body'], 0, 100);
        Blog::create($formData);

        return redirect('/');
    }
}
