<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryDropdown extends Component
{
    public $searchValue;
    public $bloglanguage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($search, $bloglanguage)
    {
        $this->searchValue = $search;
        $this->bloglanguage = $bloglanguage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */


    public function render()
    {
        return view('components.category-dropdown', [
            'categories'=>Category::all(),
            'bloglanguage'=>$this->bloglanguage,
            'currentCategory'=>Category::firstWhere('name', request('category')),
            'searchValue'=>$this->searchValue
        ]);
    }
}
