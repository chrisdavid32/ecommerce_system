<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponView()
    {
        $coupons = Coupon::orderBy('id', 'DESC')->get();
        return view('backend.coupon.view_coupon', compact('coupons'));
    }

    public function couponStore(Request $request)
    {
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required'
        ]);

        Coupon::create([
            'coupon_name' =>  strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity

        ]);
        $notification = [
            'message' => 'Coupon created Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }

    public function couponEdit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupons'));
    }

    public function couponUpdate(Request $request, $id)
    {
        Coupon::findOrFail($id)->update([
            'coupon_name' =>  strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity

        ]);
        $notification = [
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('manage-coupons')->with($notification);
    }

    public function couponDelete($id)
    {
        Coupon::findOrFail($id)->delete();
        $notification = [
            'message' => 'Coupon Updated Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->back()->with($notification);
    }
}
