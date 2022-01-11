<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class categoryContoller extends Controller
{
    public function categoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category_view', 'category');
    }
}