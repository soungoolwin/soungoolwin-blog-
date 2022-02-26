<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        return response()->json([
            'url'=>'https://i.ibb.co/Kb95WX3/effects-tried-0-photos-added-0-origin-gallery-total-effects-actions-0-remix-data-tools-used-tilt-shi.jpg"'
        ]);
    }
}
