<?php

namespace App\Http\Controllers\Admin;

use App\Child;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveMidwifeRequest;
use App\Mail\MidwifeAccountCreated;
use App\Midwife;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MidwifeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $records = Midwife::with('users')->get();
        return view('admin.midwives.index')->with(compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.midwives.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveMidwifeRequest $request)
    {
        $midwife = new Midwife();
        $midwife->first_name = $request->input('first_name');
        $midwife->last_name = $request->input('last_name');
        // email and password need to be handled specially because the need to respect config values on an edit.
        $midwife->email = e($request->input('email'));
        $midwife->phone = $request->input('phone');

        // generate random password
        $password = Str::random(8);
        $hashed_password = Hash::make($password);

        $midwife->password = $hashed_password;
        $midwife->nic = $request->input('nic');
        $midwife->cases = $request->input('cases');
        $midwife->save();

        // sending account created mail
        Mail::to($request->input('email'))->send(new MidwifeAccountCreated($midwife, $password));

        return redirect()->route('admin.midwives.index')->with('success', 'Midwife Created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Midwife $midwife)
    {
        return view('admin.midwives.show')->with(compact('midwife'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Midwife $midwife)
    {
        return view('admin.midwives.edit')->with(compact('midwife'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveMidwifeRequest $request, Midwife $midwife)
    {
        $midwife->first_name = $request->input('first_name');
        $midwife->last_name = $request->input('last_name');
        $midwife->email = e($request->input('email'));
        $midwife->phone = $request->input('phone');
        $midwife->nic = $request->input('nic');
        $midwife->cases = $request->input('cases');
        $midwife->save();

        return redirect()->route('admin.midwives.index')->with('success', 'Midwife Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Midwife $midwife)
    {
        $midwife->delete();
        return back()->with('success', 'Midwife Deleted!');
    }

    public function showUser(User $user)
    {
        return view('admin.midwives.parent')->with(compact('user'));
    }

    public function showChild(Child $child)
    {
        return view('admin.midwives.child')->with(compact('child'));
    }
}
