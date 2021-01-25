<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Order;
use App\Models\PendingProof;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('/profile/index');
    }

    public function designs(Request $request)
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('profile.design.index', compact('orders'));
    }

    public function updateProfile(Request $request)
    {

        $this->validate(request(), [
            'name' => 'required',
        ]);

        $user = User::where('id', Auth::user()->id)->first();

        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->office = $request->office;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->company = $request->company;
        $user->company_trn = $request->company_trn;
        if($user->save()) {
            return response()->json(['message' => 'Profile successfully updated!']);
        }

    }
}
