<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\SaveAppointmentRequest;
use App\Mail\MidwifeAppointmentScheduled;
use App\Midwife;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $send = Auth::user()->appointments;

        return view('users.appointments.sent', [
            'records' => $send
        ]);
    }

    public function received()
    {
        $inbox = Appointment::where('user_id', Auth::id())->get();

        return view('users.appointments.received', [
            'records' => $inbox
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('users.appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveAppointmentRequest $request)
    {
        $user = User::find(Auth::id());
        $date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $time = $request->input('time');
        $venue = $request->input('venue');

        $user->appointments()->create([
            'midwife_id' => $user->midwife_id,
            'date' => $date,
            'time' => $time,
            'venue' => $venue,
            'notes' => $request->input('notes'),
        ]);

        // sending mail
        $email = Midwife::find($user->midwife_id)->email;
        Mail::to($email)->send(new MidwifeAppointmentScheduled($date, $time, $venue));

        return redirect()->route('appointments.index')->with('success', 'Appointment Created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Appointment $appointment)
    {
        return view('users.appointments.edit')->with(compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(SaveAppointmentRequest $request, Appointment $appointment)
    {
        $appointment->reschedule_date = Carbon::parse($request->input('reschedule_date'))->format('Y-m-d');
        $appointment->reschedule_time = $request->input('reschedule_time');
        $appointment->reschedule_venue = $request->input('reschedule_venue');
        $appointment->reschedule_notes = $request->input('reschedule_notes');
        $appointment->save();

        return redirect()->route('appointments.index')->with('success', 'Appointment Rescheduled!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function cancel(Appointment $appointment)
    {
        $appointment->is_canceled = true;
        $appointment->save();
        return back()->with('success', 'Appointment Canceled!');
    }

    public function approve(Appointment $appointment)
    {
        $appointment->is_approved = true;
        $appointment->is_declined = false;
        $appointment->save();
        return back()->with('success', 'Appointment Approved!');
    }

    public function decline(Appointment $appointment)
    {
        $appointment->is_declined = true;
        $appointment->is_approved = false;
        $appointment->save();
        return back()->with('success', 'Appointment Declined!');
    }
}
