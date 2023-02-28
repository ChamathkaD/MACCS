@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    <span class="font-weight-normal">{{ $child->full_name }}</span>
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
                            Create Immunization
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="block block-themed">
            <div class="block-header bg-amethyst">
                <h3 class="block-title">
                    Create Immunization
                </h3>
            </div>
            <div class="block-content">

                <form class="form-horizontal p-4" action="{{ route('midwife.children.immunizations.store', $child->id) }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="batch_no" class="col-form-label">Batch No</label>
                        <input
                            type="text"
                            class="form-control form-control-alt @error('batch_no') is-invalid @enderror"
                            id="batch_no"
                            placeholder="Enter Batch No"
                            name="batch_no"
                            value="{{old('batch_no')}}"
                        >
                        @error('batch_no')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="age" class="col-form-label">Immunization Age</label>
                        <input
                            type="text"
                            class="form-control form-control-alt @error('age') is-invalid @enderror"
                            id="age"
                            placeholder="Enter Immunization Age"
                            name="age"
                            value="{{old('age')}}"
                        >
                        @error('age')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Type of Vaccine</label>
                        <select
                            class="custom-select form-control-alt @error('type_of_vaccine') is-invalid @enderror"
                            id="type_of_vaccine"
                            name="type_of_vaccine">
                            <option disabled selected>Please select</option>
                            @foreach(\App\Immunization::vaccines() as $key => $vaccine)
                                <option value="{{ $key }}">{{ $vaccine }}</option>
                            @endforeach
                        </select>
                        @error('type_of_vaccine')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_vaccine" class="col-form-label">Date of Vaccine</label>
                        <input
                            type="date"
                            class="form-control form-control-alt @error('date_of_vaccine') is-invalid @enderror"
                            id="date_of_vaccine"
                            placeholder="Enter Date of Vaccine"
                            name="date_of_vaccine"
                            value="{{old('date_of_vaccine')}}"
                        >
                        @error('date_of_vaccine')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="adverse_effects_following_immunization" class="col-form-label">Adverse Effects Following Immunization </label>
                        <textarea
                            name="adverse_effects_following_immunization"
                            id="adverse_effects_following_immunization"
                            placeholder="Enter Adverse Effects Following Immunization"
                            class="form-control form-control-alt @error('adverse_effects_following_immunization') is-invalid @enderror"
                        >{{old('adverse_effects_following_immunization')}}</textarea>
                        @error('adverse_effects_following_immunization')
                        <small class="invalid-feedback">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">BCG Scare</label>
                        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                            <input type="radio" class="custom-control-input" id="bcg_scare1" name="bcg_scare" value="1">
                            <label class="custom-control-label" for="bcg_scare1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline custom-control-primary">
                            <input type="radio" class="custom-control-input" id="bcg_scare2" name="bcg_scare" value="0">
                            <label class="custom-control-label" for="bcg_scare2">No</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <x-SubmitButton :btnText="'Create Immunization'" :cancelBtnRoute="url('/')"></x-SubmitButton>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
