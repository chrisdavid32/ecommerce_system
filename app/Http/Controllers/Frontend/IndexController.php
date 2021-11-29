<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IndexController extends Controller
{

    public function index()
    {
        return view('frontend.index');
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function store(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        //$newName = $request->name;
        //dd($newName);
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            $ft = @unlink(public_path('upload/user_image/' . $data->profile_photo_path));
            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_image'), $fileName);
            $data['profile_photo_path'] = $fileName;
        }
        $data->save();
        $notification = array(
            'message' => 'User profile updated successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function changePassword()
    {
        return view('frontend.profile.change_password');
    }
}