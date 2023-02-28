@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit MOH
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit MOH
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="block block-themed">
            <div class="block-header">
                <h3 class="block-title">
                    Edit MOH
                </h3>
            </div>

            <div class="block-content">

                <form class="form-horizontal p-4" action="{{ route('admin.moh.update') }}" method="POST">

                    @csrf
                    @method('PUT')
                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="division_no" class="col-form-label">Division No</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('division_no') is-invalid @enderror"
                                    id="division_no"
                                    placeholder="Enter Division No"
                                    name="division_no"
                                    value="{{ $moh->division_no ?? null }}"
                                >
                                @error('division_no')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label class=" col-form-label " for="division_address">Division Address</label>

                                        <textarea
                                            name="division_address"
                                            id="division_address"
                                            class="form-control form-control-alt @error('division_address') is-invalid @enderror"
                                            placeholder="Division Address"
                                        >{{ $moh->division_address ?? null }}</textarea>
                                    @error('division_address')
                                    <small class="invalid-feedback">
                                        {{ $message }}
                                    </small>
                                    @enderror

                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_division_no" class="col-form-label">Sub Division No</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('sub_division_no') is-invalid @enderror"
                                    id="sub_division_no"
                                    placeholder="Enter Sub Division No"
                                    name="sub_division_no"
                                    value="{{ $moh->sub_division_no ?? null }}"
                                >
                                @error('sub_division_no')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group ">
                                <label class=" col-form-label " for="sub_division_address">Sub Division Address</label>

                                <textarea
                                    name="sub_division_address"
                                    id="sub_division_address"
                                    class="form-control form-control-alt @error('sub_division_address') is-invalid @enderror"
                                    placeholder="Sub Division Address"
                                >{{ $moh->sub_division_address ?? null }}</textarea>
                                @error('sub_division_address')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror

                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <x-SubmitButton :btnText="'Update Admin'" :cancelBtnRoute="url('/')"></x-SubmitButton>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
