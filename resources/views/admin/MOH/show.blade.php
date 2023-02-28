@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    MOH
                    <a href="{{ route('admin.moh.edit') }}" class="btn btn-sm btn-success ml-3">Update MOH</a>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                             MOH
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="row">
            <div class="col-sm-12">

                    <div class="col-md-12">
                        <div class="block">
                            <div class="block-header ">
                                <h3 class="block-title">MOH Information</h3>

                            </div>
                            <div class="block-content">
                                <div class="row">

                                    <div class="col-6">
                                        <p class="font-w600 mb-2">
                                            Division No
                                        </p>
                                        <p>
                                            {{ $moh->division_no ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p class="font-w600 mb-2">
                                            Division Address
                                        </p>
                                        <p>
                                            {{ $moh->division_address ?? '-' }}
                                        </p>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-6">
                                        <p class="font-w600 mb-2">
                                            Sub Division No
                                        </p>
                                        <p>
                                            {{ $moh->sub_division_no ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <p class="font-w600 mb-2">
                                            Show Division Address
                                        </p>
                                        <p>
                                            {{ $moh->sub_division_address ?? '-' }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>

    </div>

@endsection
