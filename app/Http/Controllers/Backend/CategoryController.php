<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Category;
use Image;

class CategoryController extends Controller
{
    public function DisplayCategories()
    {
        $categories = Category::latest()->get();
        return view('admin.category.category_all',compact('categories'));
    }
}
