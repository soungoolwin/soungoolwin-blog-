<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OthersController extends Controller
{
    public function youtubeandpodcast()
    {
        return view('components.others', [
            'videos'=>Youtube::paginate(4)->withQueryString()
        ]);
    }

    public function showYtvideos()
    {
        return view('dashboard.videolist', [
            'videos'=>Youtube::all()
        ]);
    }

    public function deleteVideo(Youtube $video)
    {
        $video->delete();
        return back();
    }

    public function showEditVideoForm(Youtube $video)
    {
        return view('dashboard.edit-video-form', [
            'video'=>$video
        ]);
    }

    public function storeVideoEditData(Youtube $video)
    {
        $formData = request()->validate([
            'name'=> ['required'],
            'source'=> ['required']
        ]);
        $video->update($formData);
        return redirect('/youtube/list');
    }
    
    public function storevideo()
    {
        $formData = request()->validate([
            'name'=>['required', Rule::unique('youtubes', 'name')],
            'source'=>['required', Rule::unique('youtubes', 'source')],
        ]);

        Youtube::create($formData);
        return back();
    }
}
