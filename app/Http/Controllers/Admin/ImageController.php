<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\EngBlog;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ImageController extends Controller
{
    public function storetomblog()
    {
        $blog_id = Blog::last()->id === null ?  1 : ++Blog::last()->id;
        $blog = new Blog();
        $blog->id = $blog_id;
        $blog->exists = true;
        $image=$blog->addMediaFromRequest('uploadtomblog')->toMediaCollection('images', 's3');
         
        return response()->json([

            'url'=>$image->getUrl('thumbnail')
        ]);
    }

    public function storetoeblog()
    {
        $blog_id = EngBlog::last()->id == [] ?  1 : ++EngBlog::last()->id;
        $blog = new EngBlog();
        $blog->id = $blog_id;
        $blog->exists = true;
        $image=$blog->addMediaFromRequest('uploadtoeblog')->toMediaCollection('images', 's3');
         
        return response()->json([

            'url'=>$image->getUrl('thumbnail')
        ]);
    }
}
