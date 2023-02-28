@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
@endpush

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                   Create Appointment
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Create Appointment
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-7">
                <div class="content">

                    @if(Session::has('success'))
                        <x-Alert type="success" :message="Session::get('success')"></x-Alert>
                    @endif


                    <div class="block block-themed">
                        <div class="block-header bg-smooth">
                            <h3 class="block-title">
                                Create Appointment
                            </h3>
                        </div>
                        <div class="block-content">

                            <form class="form-horizontal p-4" action="{{ route('midwife.appointments.store') }}" method="POST">

                                @csrf

                                <input type="hidden" name="user_id" value="{{ $user->id }}">

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="date">Date</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            class="js-datepicker form-control form-control-alt @error('date') is-invalid @enderror"
                                            id="date"
                                            name="date"
                                            data-week-start="1"
                                            data-autoclose="true"
                                            data-today-highlight="true"
                                            data-date-format="yyyy-mm-dd"
                                            placeholder="yyyy-mm-dd"
                                            value="{{ old('date') }}"
                                        >
                                        @error('date')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="time">Time</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="time"
                                            class="form-control form-control-alt @error('time') is-invalid @enderror"
                                            name="time"
                                            id="time"
                                            value="{{ old('time') }}"
                                        >
                                        @error('time')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="venue">Venue</label>
                                    <div class="col-sm-9">
                                        <input
                                            type="text"
                                            class="form-control form-control-alt @error('venue') is-invalid @enderror"
                                            id="venue"
                                            placeholder="Enter Venue"
                                            name="venue"
                                            value="{{ old('venue') }}"
                                        >
                                        @error('venue')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label text-right" for="notes">Notes</label>
                                    <div class="col-sm-9">
                                        <textarea
                                            name="notes"
                                            id="notes"
                                            class="form-control form-control-alt"
                                            placeholder="Drop a note"
                                        ></textarea>
                                        @error('notes')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <x-SubmitButton :btnText="'Create Appointment'" :cancelBtnRoute="url('/')"></x-SubmitButton>
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
