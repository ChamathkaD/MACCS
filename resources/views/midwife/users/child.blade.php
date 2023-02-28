@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    {{ $child->full_name }}
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
                            {{ $child->full_name }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content content-boxed">
        <div class="row">
            <div class="col-md-12 col-xl-12">

                <ul class="timeline timeline-alt py-0">
                    @include('midwife.users.partials.info')
                    @include('midwife.users.partials.newborn')
                    @include('midwife.users.partials.immunization')
                    @include('midwife.users.partials.weight')
                    @include('midwife.users.partials.height')
                    @include('midwife.users.partials.hcm')
                    @if($chart)
                        @include('midwife.users.partials.chart')
                    @endif
                    @include('midwife.users.partials.checklist')
                </ul>

            </div>
        </div>
    </div>

@endsection
