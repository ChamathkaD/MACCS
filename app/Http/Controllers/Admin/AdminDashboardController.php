<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveAdminRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function showProfile()
    {
        return view('admin.profile');
    }

    public function saveProfile(SaveAdminRequest $request)
    {
        $admin = Admin::findOrFail(Auth::guard('admin')->id());

        app('App\Http\Requests\ImageUploadRequest')->handleImages('image', 'img/admins/', $admin, 'image');

        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->input('type') == 'super administrator') {
            $admin->is_super = true;
        } else {
            $admin->is_super = false;
        }

        $admin->save();

        return redirect()->back()->with('success', 'Profile Saved!');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        // check if the hash passwords are match
        if (Hash::check($request->current_password, Auth::guard('admin')->user()->password)) {
            // hashing the new password
            $hashed_password = Hash::make($request->password_confirmation);
            // update password
            Admin::where('id', Auth::guard('admin')->id())->update([
                'password' => $hashed_password,
            ]);
            // return redirect to back with success message
            return back()->with('success', 'Your Password has been updated!');
        } else {
            return back()->withErrors(['current_password' => 'Your current password is not valid. Please enter your valid password.']);
        }

    }
}
