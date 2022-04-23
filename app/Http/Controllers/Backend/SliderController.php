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
}
