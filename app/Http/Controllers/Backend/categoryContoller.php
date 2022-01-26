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
        return view('backend.category_view', compact('category'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_en' => 'required',
            'category_hin' => 'required',
            'caterogy_icon' => 'required'
        ]);

        Category::create([
            'category_name_en' => $request->category_en,
            'category_name_hin' => $request->category_hin,
            'category_slug_en' => strtolower(str_replace(' ', '_', $request->category_en)),
            'category_slug_hin' => str_replace(' ', '_', $request->category_hin),
            'caterogy_icon' => $request->caterogy_icon

        ]);
        $notification = [
            'message' => 'Category created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category_edit', compact('category'));
    }

    public function categoryUpdate(Request $request)
    {
        $cart_id = $request->id;
        $category = Category::findOrFail($cart_id);
        $category->update([
            'category_name_en' => $request->category_en,
            'category_name_hin' => $request->category_hin,
            'category_slug_en' => strtolower(str_replace(' ', '_', $request->category_en)),
            'category_slug_hin' => str_replace(' ', '_', $request->category_hin),
            'caterogy_icon' => $request->caterogy_icon
        ]);

        $notification = [
            'message' => 'Category updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.category')->with($notification);
    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        $notification = [
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}