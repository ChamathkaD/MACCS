@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    {{ $midwife->full_name }}
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ route('admin.midwives.index') }}">All Midwives & Parents</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $midwife->full_name }}
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
                                            {{$midwife->full_name}}

                                        </p>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Number of Cases
                                        </p>
                                        <p>
                                            {{$midwife->cases}}
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
                                            {{$midwife->nic}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Birthday
                                        </p>
                                        <p>
                                            {{$midwife->birthday}}
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
                                            {{$midwife->phone}}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            E-mail
                                        </p>
                                        <p>
                                            {{$midwife->email}}
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
                                            {{$midwife->province}}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                           City
                                        </p>
                                        <p>
                                            {{$midwife->city}}
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
                                            {{$midwife->address}}
                                        </p>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="block-content">
                                        <p class="font-w600 mb-2">
                                            Postal Code
                                        </p>
                                        <p>
                                            {{$midwife->postal}}
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
                            <i class="fas fa-child text-muted mr-1"></i> Parents ({{ $midwife->users->count() }})
                        </h3>
                    </div>
                    @foreach($midwife->users as $user)
                    <div class="block-content">
                        <ul class="nav-items font-size-sm">
                            <li>
                                <a class="media" href="{{ route('midwife.show.child', $user->id) }}">
                                    <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                        <img class="img-avatar img-avatar32" src="{{ isset($user->image) ? asset('uploads/img/users/' . $user->image) : asset('assets/media/avatars/avatar1.jpg') }}" alt="">
                                        <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                    </div>

                                    <div class="media-body">
                                        <div class="font-w600">{{ $user->full_name }}</div>
                                        <div class="font-w400 text-muted">{{ $user->type }}</div>

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
