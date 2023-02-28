<?php

namespace App\Http\Controllers\Midwife;

use App\Appointment;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveAppointmentRequest;
use App\Mail\UserAppointmentScheduled;
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
        $send = Auth::guard('midwife')->user()->appointments;

        return view('midwife.appointments.sent', [
            'records' => $send
        ]);
    }

    public function received()
    {
        $inbox = Appointment::where('midwife_id', Auth::guard('midwife')->id())->get();

        return view('midwife.appointments.received', [
            'records' => $inbox
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(User $user)
    {
        return view('midwife.appointments.create')->with(compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(SaveAppointmentRequest $request)
    {
        $midwife = Midwife::find(Auth::guard('midwife')->id());

        $date = Carbon::parse($request->input('date'))->format('Y-m-d');
        $time = $request->input('time');
        $venue = $request->input('venue');

        $midwife->appointments()->create([
            'user_id' => $request->input('user_id'),
            'date' => $date,
            'time' => $time,
            'venue' => $venue,
            'notes' => $request->input('notes'),
        ]);

        // sending mail
        $email = User::find($request->input('user_id'))->email;
        Mail::to($email)->send(new UserAppointmentScheduled($date, $time, $venue));

        return redirect()->route('midwife.appointments.index')->with('success', 'Appointment Created!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Appointment $appointment)
    {
        return view('midwife.appointments.edit')->with(compact('appointment'));
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

        return redirect()->route('midwife.appointments.index')->with('success', 'Appointment Rescheduled!');
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
