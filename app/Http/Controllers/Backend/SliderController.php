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
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view', compact('slider'));
    }
}
