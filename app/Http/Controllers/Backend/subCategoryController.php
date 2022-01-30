<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class subCategoryController extends Controller
{
    public function subCategoryView()
    {
        $subcategory = Subcategory::letest()->get();
        return view('backend.subcategory', compact('subcategory'));
    }
}