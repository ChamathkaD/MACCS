<?php

namespace App\Http\Controllers\Midwife;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Midwife;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MidwifeDashboardController extends Controller
{
    public function index()
    {
        return view('midwife.index');
    }

    public function showProfile()
    {
        return view('midwife.profile');
    }

    public function saveProfile(Request $request)
    {
        $midwife = Midwife::findOrFail(Auth::guard('midwife')->id());

        app('App\Http\Requests\ImageUploadRequest')->handleImages('image', 'img/midwives/', $midwife, 'image');

        $midwife->first_name = $request->input('first_name');
        $midwife->last_name = $request->input('last_name');
        $midwife->email = e($request->input('email'));
        $midwife->phone = $request->input('phone');
        $midwife->nic = $request->input('nic');
        $midwife->save();

        return redirect()->back()->with('success', 'Profile Saved!');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        // check if the hash passwords are match
        if (Hash::check($request->current_password, Auth::guard('midwife')->user()->password)) {
            // hashing the new password
            $hashed_password = Hash::make($request->password_confirmation);
            // update password
            Midwife::where('id', Auth::guard('midwife')->id())->update([
                'password' => $hashed_password,
            ]);
            // return redirect to back with success message
            return back()->with('success', 'Your Password has been updated!');
        } else {
            return back()->withErrors(['current_password' => 'Your current password is not valid. Please enter your valid password.']);
        }

    }
}
