<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class brandController extends Controller
{

    public function brandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand_view', compact('brands'));
    }

    public function brandStore(Request $request)
    {

    }
}