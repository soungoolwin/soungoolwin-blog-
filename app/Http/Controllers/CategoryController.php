<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function showandeditcategories()
    {
        return view('dashboard.showandadd-category', [
            'categories'=>Category::all()
        ]);
    }

    public function storecategory()
    {
        $formData = request()->validate([
            'name'=> ['required', Rule::unique('categories', 'name')],
            'slug'=> ['required',  Rule::unique('categories', 'slug')],
        ]);

        Category::create($formData);
        return back();
    }

    public function deletecategory(Category $category)
    {
        $category->delete();
        return back();
    }

    public function showeditcategoryform(Category $category)
    {
        return view('dashboard.edit-category-form', [
            'category'=>$category
        ]);
    }

    public function storecategoryeditdata(Category $category)
    {
        $formData = request()->validate([
            'name'=> ['required'],
            'slug'=> ['required'],
        ]);
        $category->update($formData);
        return redirect('/category/list');
    }
}
