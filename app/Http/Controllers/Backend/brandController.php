<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class brandController extends Controller
{

    public function brandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand_view', compact('brands'));
    }

    public function brandStore(Request $request)
    {
        $request->validate([
            'brand_hin' => 'required',
            'brand_en' => 'required',
            'brand_image' => 'required'
        ]);
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
        $save_url = 'upload/brand/' . $name_gen;
        Brand::create([
            'brand_name_en' => $request->brand_en,
            'brand_name_hin' => $request->brand_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '_', $request->brand_en)),
            'brand_slug_hin' => str_replace(' ', '_', $request->brand_hin),
            'brand_image' => $save_url

        ]);
        $notification = [
            'message' => 'Brand created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function brandEdit($id)
    {
        $brand = Brand::FindOrFail($id);
        return view('backend.brand_edit', compact('brand'));
    }

    public function brandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300, 300)->save('upload/brand/' . $name_gen);
            $save_url = 'upload/brand/' . $name_gen;
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_en,
                'brand_name_hin' => $request->brand_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '_', $request->brand_en)),
                'brand_slug_hin' => str_replace(' ', '_', $request->brand_hin),
                'brand_image' => $save_url

            ]);
            $notification = [
                'message' => 'Brand updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_en,
                'brand_name_hin' => $request->brand_hin,
                'brand_slug_en' => strtolower(str_replace(' ', '_', $request->brand_en)),
                'brand_slug_hin' => str_replace(' ', '_', $request->brand_hin),
            ]);
            $notification = [
                'message' => 'Brand updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('all.brand')->with($notification);
        }
    }
}