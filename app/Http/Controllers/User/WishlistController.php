<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{

    public function viewWishlist()
    {
        return view('frontend.wishlist.index');
    }

    public function getWishlistProduct()
    {
        $wishlist = Wishlist::with('product')->where('user_id', auth()->user()->id)->latest()->get();
        return response()->json($wishlist);
    }

    public function removeWishlist($id)
    {
        Wishlist::where('user_id', auth()->user()->id)->where('id', $id)->delete();
        return response()->json(['success' => 'Product Successfully removed']);
    }
}
