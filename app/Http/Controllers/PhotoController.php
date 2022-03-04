<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PhotoController extends Controller
{
    public function showPhotos()
    {
        return view('dashboard.photolist', [
            'photos'=>Photo::all()
        ]);
    }

    public function deletePhoto(Photo $photo)
    {
        $photo->delete();
        return back();
    }

    public function showEditPhotoForm(Photo $photo)
    {
        return view('dashboard.edit-photo-form', [
            'photo'=>$photo
        ]);
    }

    public function storePhotoEditData(Photo $photo)
    {
        $formData = request()->validate([
            'name'=>['required'],
            'source'=>['required'],
        ]);
        $photo->update($formData);
        return redirect('/photo/list');
    }

    public function storePhoto()
    {
        $formData = request()->validate([
            'name'=>['required', Rule::unique('youtubes', 'name')],
            'source'=>['required', Rule::unique('youtubes', 'source')],
        ]);

        Photo::create($formData);
        return back();
    }
}
