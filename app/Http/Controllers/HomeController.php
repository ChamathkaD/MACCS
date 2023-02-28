<?php

namespace App\Http\Controllers;

use App\Child;
use App\Http\Requests\SaveUserRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     */
    public function index()
    {
        return view('users.index', [
            'children' => $this->getChildren()
        ]);
    }

    public function showProfile()
    {
        return view('users.profile');
    }

    public function saveProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());

        app('App\Http\Requests\ImageUploadRequest')->handleImages('image', 'img/users/', $user, 'image');

        $user->type = $request->input('type');
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->city = $request->input('city');
        $user->province = $request->input('province');
        $user->postal = $request->input('postal');
        $user->birthday = $request->input('birthday');
        $user->nic = $request->input('nic');
        $user->save();

        return redirect()->back()->with('success', 'Profile Saved!');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        // check if the hash passwords are match
        if (Hash::check($request->current_password, Auth::user()->password)) {
            // hashing the new password
            $hashed_password = Hash::make($request->password_confirmation);
            // update password
            User::where('id', Auth::id())->update([
                'password' => $hashed_password,
            ]);
            // return redirect to back with success message
            return back()->with('success', 'Your Password has been updated!');
        } else {
            return back()->withErrors(['current_password' => 'Your current password is not valid. Please enter your valid password.']);
        }
    }

    protected function getChildren()
    {
        return Child::where('user_id', Auth::id())->get();
    }
}
