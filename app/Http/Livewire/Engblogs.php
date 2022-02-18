<?php

namespace App\Http\Livewire;

use App\Models\EngBlog;
use Livewire\Component;

class Engblogs extends Component
{
    public $search = '';
    public function render()
    {
        $filteredBlogs = EngBlog::latest()->filter(request(['category','author']), $this->search)->orderBy('id', 'DESC');
        return view('livewire.engblogs', [
            'blogs'=>$filteredBlogs->paginate(6)->withQueryString(),
            'bloglanguage'=>'english',
            'searchforCategoryDropDown'=>$this->search
        ]);
    }
}
