<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubSubCategory;

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

    public function subsubCategoryView()
    {
        $subsubcategory = SubSubCategory::latest()->get();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        return view('backend.sub_subcategory_view', compact('subsubcategory', 'categories'));
    }

    public function getSubCategory($category_id)
    {
        $subcat = Subcategory::where('category_id', $category_id)->get();

        return json_encode($subcat);
    }

    public function getSubSubCategory($subcategory_id)
    {
        $subsubcat = SubSubcategory::where('subcategory_id', $subcategory_id)->get();

        return json_encode($subsubcat);
    }

    public function subSubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'subsubcategory_name_hin' => 'required',
        ]);

        SubSubCategory::create([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '_', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '_', $request->subsubcategory_name_hin)

        ]);
        $notification = [
            'message' => 'Sub_subCategory created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function subSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = Subcategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subsubcategories = SubSubCategory::findOrFail($id);
        return view('backend.subsubcategory_edit', compact('categories', 'subcategories', 'subsubcategories'));
    }

    public function subsubUpdate(Request $request, $id)
    {
        SubSubCategory::where('id', $id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '_', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '_', $request->subsubcategory_name_hin)

        ]);
        $notification = [
            'message' => 'Sub_subCategory updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('all.subsubCategory')->with($notification);
    }

    public function subsubDelete($id)
    {
        SubSubCategory::findOrFail($id)->delete();
        $notification = [
            'message' => 'Sub_subCategory deleted Successfully',
            'alert-type' => 'info'
        ];
        return redirect()->back()->with($notification);
    }
}