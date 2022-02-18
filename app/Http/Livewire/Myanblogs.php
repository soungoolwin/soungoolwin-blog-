<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Myanblogs extends Component
{
    public $search = '';
    public function render()
    {
        //This will fetch data with multiple filtered for myanblogs.blade.php
        $filteredBlogs = Blog::filter(request(['category','author','search']), $this->search)->orderBy('id', 'DESC');

        return view('livewire.myanblogs', [
            'blogs'=>$filteredBlogs->paginate(6)->withQueryString(),
            'bloglanguage'=>'myanmar',
            'searchforCategoryDropDown'=>$this->search
        ]);
    }
}

//passing bloglanguage and searchforCategoryDropdown is for category-dropdown.blade.php
