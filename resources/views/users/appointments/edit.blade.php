@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endpush

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Reschedule Appointment
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                          Reschedule Appointment
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-9">
                <div class="content">

                    <div class="block block-themed">
                        <div class="block-header bg-smooth">
                            <h3 class="block-title">
                                Reschedule Appointment
                            </h3>
                        </div>
                        <div class="block-content">

                            <form class="form-horizontal p-4" action="{{ route('appointments.update', $appointment->id) }}" method="POST">

                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="reschedule_date">Reschedule Date</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            class="js-datepicker form-control form-control-alt @error('reschedule_date') is-invalid @enderror"
                                            id="reschedule_date"
                                            name="reschedule_date"
                                            data-week-start="1"
                                            data-autoclose="true"
                                            data-today-highlight="true"
                                            data-reschedule_date-format="yyyy-mm-dd"
                                            placeholder="yyyy-mm-dd"
                                            value="{{ old('reschedule_date') }}"
                                        >
                                        @error('reschedule_date')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="reschedule_time">Reschedule Time</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="time"
                                            class="form-control form-control-alt @error('reschedule_time') is-invalid @enderror"
                                            name="reschedule_time"
                                            id="reschedule_time"
                                            value="{{ old('reschedule_time') }}"
                                        >
                                        @error('reschedule_time')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="reschedule_venue">Reschedule Venue</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            class="form-control form-control-alt @error('reschedule_venue') is-invalid @enderror"
                                            id="reschedule_venue"
                                            placeholder="Enter Venue"
                                            name="reschedule_venue"
                                            value="{{ old('reschedule_venue') }}"
                                        >
                                        @error('reschedule_venue')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="reschedule_notes">Notes</label>
                                    <div class="col-sm-9">
                                        <textarea
                                            name="reschedule_notes"
                                            id="reschedule_notes"
                                            class="form-control form-control-alt @error('reschedule_notes') is-invalid @enderror"
                                            placeholder="Drop a note"
                                        ></textarea>
                                        @error('reschedule_notes')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <x-SubmitButton :btnText="'Reschedule Appointment'" :cancelBtnRoute="url('/')"></x-SubmitButton>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script>jQuery(function(){ One.helpers(['datepicker']); });</script>
@endpush
