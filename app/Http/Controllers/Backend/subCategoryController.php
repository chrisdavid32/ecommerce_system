<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subCategoryController extends Controller
{
    public function subCategoryView()
    {
        $subcategory = Subcategory::latest()->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.subcategory_view', compact('subcategory', 'categories'));
    }

    public function subCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required'
        ]);

        Subcategory::create([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '_', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '_', $request->subcategory_name_hin)

        ]);
        $notification = [
            'message' => 'SubCategory created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function subCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = Subcategory::findOrFail($id);
        return view('backend.subcategory_edit', compact('categories', 'subcategory'));
    }

    public function subCategoryUpdate(Request $request)
    {
        $subcat_id = $request->id;
        Subcategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '_', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '_', $request->subcategory_name_hin)

        ]);
        $notification = [
            'message' => 'SubCategory updated Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->route('all.subCategory')->with($notification);
    }

    public function subCategoryDelete($id)
    {
        Subcategory::findOrFail($id)->delete();
        $notification = [
            'message' => 'SubCategory Deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}