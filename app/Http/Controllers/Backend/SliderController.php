<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function sliderView()
    {
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('sliders'));
    }

    //slider store process
    public function sliderStore(Request $request)
    {
        $request->validate([
            'slider_img' => 'required'
        ]);
        //store slider image using image intervention package
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
        $save_url = 'upload/slider/' . $name_gen;
        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,

        ]);
        $notification = [
            'message' => 'Slider created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function sliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit', compact('slider'));
    }

    public function sliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('slider_img')) {
            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('upload/slider/' . $name_gen);
            $save_url = 'upload/slider/' . $name_gen;
            Slider::findOrFail($slider_id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,

            ]);
            $notification = [
                'message' => 'Slider updated Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('manage-slider')->with($notification);
        } else {
            Slider::findOrFail($slider_id)->update([
            'title' => $request->title,
            'description' => $request->description
            ]);
            $notification = [
                'message' => 'Slider updated without Image Successfully',
                'alert-type' => 'success'
            ];
            return redirect()->route('manage-slider')->with($notification);
        }
    }

    public function sliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        unlink($slider->slider_img);
        $slider->delete();
        $notification = [
            'message' => 'Slider deleted Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function slideInactive($id)
    {
       $slider = Slider::findOrFail($id);
       $slider->update([
           'status' => 0
       ]);

       $notification = [
        'message' => 'Slider is Inactive now',
        'alert-type' => 'info'
    ];
    return redirect()->back()->with($notification);
    }

    public function slideActive($id)
    {
       $slider = Slider::findOrFail($id);
       $slider->update([
           'status' => 1
       ]);

       $notification = [
        'message' => 'Slider is Active now',
        'alert-type' => 'info'
    ];
    return redirect()->back()->with($notification);
    }
}
