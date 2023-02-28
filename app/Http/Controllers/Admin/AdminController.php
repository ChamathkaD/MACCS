<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveAdminRequest;
use App\Mail\AdminAccountCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $records = Admin::all();
        return view('admin.admin.index')->with(compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveAdminRequest $request)
    {
        $admin = new Admin();
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        // generating password
        $password = Str::random(8);
        $hashed_password = Hash::make($password);

        $admin->password = $hashed_password;

        if ($request->input('type') == 'super administrator') {
            $admin->is_super = true;
        } else {
            $admin->is_super = false;
        }

        $admin->save();

        // sending mail
        Mail::to($request->input('email'))->send(new AdminAccountCreated($admin, $password));

        return redirect()->back()->with('success', 'Admin Created Successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Admin $admin)
    {
        return view('admin.admin.edit')->with(compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveAdminRequest $request, Admin $admin)
    {
        $admin->name = $request->input('name');
        $admin->email = $request->input('email');

        if ($request->input('type') == 'super administrator') {
            $admin->is_super = true;
        } else {
            $admin->is_super = false;
        }

        $admin->save();
        return redirect()->route('admin.admins.index')->with('success', 'Admin Updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Admin $admin)
    {
        // check if we are not trying to delete ourselves
        if ($admin->id === Auth::guard('admin')->id()) {
            return back()->withErrors('We would feel really bad if you deleted yourself, please reconsider.');
        }

        $admin->delete();
        return back()->with('success', 'Admin Deleted!');
    }
}
