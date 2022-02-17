<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Myanblogs extends Component
{
    public $search = '';
    protected $filteredBlogs;
    public function render()
    {
        $this->filteredBlogs = Blog::latest()->filter(request(['category','author','search']), $this->search);

        return view('livewire.myanblogs', [
            'blogs'=>$this->filteredBlogs->paginate(6)->withQueryString(),
            'bloglanguage'=>'myanmar',
            'searchforCategoryDropDown'=>$this->search
        ]);
    }
}
