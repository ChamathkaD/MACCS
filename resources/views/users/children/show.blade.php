@extends('layouts.app')

@section('content')


    <div class="bg-image" style="background-image: url({{ asset('assets/media/photos/photo8@2x.jpg') }});">
        <div class="bg-black-50">
            <div class="content content-full text-center">
                <div class="my-3">
                    <img class="img-avatar img-avatar-thumb" src="{{ asset('assets/media/avatars/avatar13.jpg') }}" alt="">
                </div>
                <h1 class="h2 text-white mb-0">{{ $child->full_name }}</h1>
                <span class="text-white-75">{{ $child->birthday }}</span>
            </div>
        </div>
    </div>

    <div class="bg-white border-bottom">
        <div class="content content-boxed">
            <div class="row items-push text-center">
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Birthday</div>
                    <a class="link-fx font-size-h3" href="javascript:void(0)">{{ $child->birthday }}</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Date of Registration</div>
                    <a class="link-fx font-size-h3" href="javascript:void(0)">{{ $child->date_of_registration }}</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Birth Weight</div>
                    <a class="link-fx font-size-h3" href="javascript:void(0)">{{ $child->birth_weight }} Kg</a>
                </div>
                <div class="col-6 col-md-3">
                    <div class="font-size-sm font-w600 text-muted text-uppercase">Health Status</div>
                    <a class="link-fx font-size-h3" href="javascript:void(0)">{{ $child->health_status }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content content-boxed">
        <div class="row">
            <div class="col-md-6 col-xl-6">

                @livewire('modal.weight.create', ['child_id' => $child->id])

                @include('users.children.partials.newborn')

            </div>
            <div class="col-md-6 col-xl-6">

                @livewire('modal.height.create', ['child_id' => $child->id])

                @livewire('modal.head-circumference.create', ['child_id' => $child->id])

            </div>
        </div>

        <div class="row">

            @if($chart)
                @include('users.children.partials.chart')
            @endif

            @include('users.children.partials.immunization')

        </div>

    </div>

@endsection

