<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\EngBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageController extends Controller
{
    public function storetomblog()
    {
        // $blog_id = Blog::last()->id === null ?  1 : ++Blog::last()->id;
        // $blog = new Blog();
        // $blog->id = $blog_id;
        // $blog->exists = true;
        // $image=$blog->addMediaFromRequest('uploadtomblog')->toMediaCollection('images', 's3');

        $photo = request()->file('uploadtomblog');
        $path = $photo->store('mblogs', 's3');
        $url = Storage::disk('s3')->url($path);
         
        return response()->json([

            'url'=>$url
        ]);
    }

    public function storetoeblog()
    {
        // $blog_id = EngBlog::last()->id == [] ?  1 : ++EngBlog::last()->id;
        // $blog = new EngBlog();
        // $blog->id = $blog_id;
        // $blog->exists = true;
        // $image=$blog->addMediaFromRequest('uploadtoeblog')->toMediaCollection('images', 's3');

        $photo = request()->file('uploadtoeblog');
        $path = $photo->store('eblogs', 's3');
        $url = Storage::disk('s3')->url($path);
         
        return response()->json([

            'url'=>$url
        ]);
    }
}
