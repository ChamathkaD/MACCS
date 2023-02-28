@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                   Add Child
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Add Child
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        @if(Session::has('success'))
            <x-Alert type="success" :message="Session::get('success')"></x-Alert>
        @endif

        <!-- Your Block -->
        <div class="block block-themed">
            <div class="block-header bg-smooth">
                <h3 class="block-title">
                    Add Child
                </h3>
            </div>
            <div class="block-content">

                <form class="form-horizontal p-4" action="{{ route('children.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('first_name') is-invalid @enderror"
                                    id="first_name"
                                    placeholder="Enter First Name"
                                    name="first_name"
                                    value="{{ old('first_name') }}"
                                >
                                @error('first_name')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-form-label">Last Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('last_name') is-invalid @enderror"
                                    id="last_name"
                                    placeholder="Enter Last Name"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                >
                                @error('last_name')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birthday" class="col-form-label">Birthday</label>
                                <input
                                    type="date"
                                    class="form-control form-control-alt @error('birthday') is-invalid @enderror"
                                    id="birthday"
                                    placeholder="Enter Birthday"
                                    name="birthday"
                                    value="{{ old('birthday') }}"
                                >
                                @error('birthday')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="date_of_registration" class="col-form-label">Date of Registration</label>
                                <input
                                    type="date"
                                    class="form-control form-control-alt @error('date_of_registration') is-invalid @enderror"
                                    id="date_of_registration"
                                    placeholder="Enter Date of Registration"
                                    name="date_of_registration"
                                    value="{{ old('date_of_registration') }}"
                                >
                                @error('date_of_registration')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="birth_weight" class="col-form-label">Birth Weight</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('birth_weight') is-invalid @enderror"
                                    id="birth_weight"
                                    placeholder="Enter Birth Weight"
                                    name="birth_weight"
                                    value="{{ old('birth_weight') }}"
                                >
                                @error('birth_weight')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="health_status">Health Status</label>
                                <select
                                    class="custom-select form-control-alt @error('health_status') is-invalid @enderror"
                                    id="health_status"
                                    name="health_status">
                                    <option disabled selected>Please select</option>
                                    @foreach(\App\Child::status() as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                @error('health_status')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <x-SubmitButton :btnText="'Add My Child'" :cancelBtnRoute="url('/')"></x-SubmitButton>
                    </div>

                </form>

            </div>
        </div>

    </div>

@endsection
