<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Illuminate\Http\Request;

class OthersController extends Controller
{
    public function youtubeandpodcast()
    {
        return view('components.others', [
            'videos'=>Youtube::paginate(4)->withQueryString()
        ]);
    }
}
