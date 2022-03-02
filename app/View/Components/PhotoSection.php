<?php

namespace App\View\Components;

use App\Models\Photo;
use Illuminate\View\Component;

class PhotoSection extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.photo-section', [
            'photos'=>Photo::orderBy('id', 'DESC')->paginate(2)->withQueryString()
        ]);
    }
}
