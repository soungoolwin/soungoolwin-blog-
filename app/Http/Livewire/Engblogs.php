<?php

namespace App\Http\Livewire;

use App\Models\EngBlog;
use Livewire\Component;

class Engblogs extends Component
{
    public $search = '';
    protected $filteredBlogs;
    public function render()
    {
        $this->filteredBlogs = EngBlog::latest()->filter(request(['category','author']), $this->search);
        return view('livewire.engblogs', [
            'blogs'=>$this->filteredBlogs->paginate(6)->withQueryString(),
            'bloglanguage'=>'english',
            'searchforCategoryDropDown'=>$this->search
        ]);
    }
}
