@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    {{ $user->full_name }}
                    <a href="{{ route('midwife.appointments.create', $user->id) }}" type="button" class="btn btn-outline-primary ml-3">
                        <i class="fas fa-calendar-check mr-1"></i> Create Appointment
                    </a>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('midwife.users.index') }}">All Parents & Children</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $user->full_name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content content-boxed">
        <div class="row">
            <div class="col-md-7 col-xl-8">

                <ul class="timeline timeline-alt py-0">
                    <li class="timeline-event">
                        <div class="timeline-event-icon bg-default">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="timeline-event-block block invisible" data-toggle="appear">
                            <div class="block-header">
                                <h3 class="block-title">Personal Information</h3>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Name
                                        </p>
                                        <p>
                                            {{$user->full_name}}

                                        </p>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Type
                                        </p>
                                        <p>
                                            {{$user->type}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            NIC Number
                                        </p>
                                        <p>
                                            {{$user->nic}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Birthday
                                        </p>
                                        <p>
                                            {{$user->birthday}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                           Phone Number
                                        </p>
                                        <p>
                                            {{$user->phone}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            E-mail
                                        </p>
                                        <p>
                                            {{$user->email}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-event">
                        <div class="timeline-event-icon bg-modern">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                        <div class="timeline-event-block block invisible" data-toggle="appear">
                            <div class="block-header">
                                <h3 class="block-title">Location</h3>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                           Province
                                        </p>
                                        <p>
                                            {{$user->province}}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                           City
                                        </p>
                                        <p>
                                            {{$user->city}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Address
                                        </p>
                                        <p>
                                            {{$user->address}}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Postal Code
                                        </p>
                                        <p>
                                            {{$user->postal}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-5 col-xl-4">

                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            <i class="fas fa-child text-muted mr-1"></i> Children ({{ $user->children->count() }})
                        </h3>
                    </div>
                    @foreach($user->children as $child)
                    <div class="block-content">
                        <ul class="nav-items font-size-sm">
                            <li>
                                <a class="media" href="{{ route('midwife.show.child', $child->id) }}">
                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                        <img class="img-avatar img-avatar48" src="{{ asset('assets/media/avatars/avatar1.jpg') }}" alt="">
                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                    </div>

                                    <div class="media-body">
                                        <div class="font-w600">{{ $child->full_name }}</div>
                                        <div class="font-w400 text-muted">{{ $child->birthday }}</div>

                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

@endsection
