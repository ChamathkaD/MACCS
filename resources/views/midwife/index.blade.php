@extends('layouts.app')

@section('content')

    <div class="bg-image overflow-hidden" style="background-image: url({{ asset('assets/media/photos/photo17@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">{{ config('app.name') }} Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome Midwife</h2>
                    </div>
                    <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                        <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                            <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="{{ route('midwife.users.create') }}">
                                <i class="fa fa-plus mr-1"></i> Create Parent
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content content-narrow">

        <div class="row">
            <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                <a class="block block-rounded block-link-pop border-left border-primary border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Children</div>
                        <div class="font-size-h2 font-w400 text-dark">{{ \App\Child::count() }}</div>
                    </div>
                </a>
            </div>
            <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                <a class="block block-rounded block-link-pop border-left border-warning border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Midwives</div>
                        <div class="font-size-h2 font-w400 text-dark">{{ \App\Midwife::count() }}</div>
                    </div>
                </a>
            </div>
            <div class="col-4 col-md-4 col-lg-4 col-xl-4">
                <a class="block block-rounded block-link-pop border-left border-success border-4x" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Parents</div>
                        <div class="font-size-h2 font-w400 text-dark">{{ \App\User::count() }}</div>
                    </div>
                </a>
            </div>
        </div>

    </div>

@endsection
