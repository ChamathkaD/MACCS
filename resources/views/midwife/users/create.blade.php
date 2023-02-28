@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                   Create Parents
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Create Parents
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
            <div class="block-header bg-amethyst">
                <h3 class="block-title">
                    Create Parents
                </h3>
            </div>
            <div class="block-content">

                <form class="form-horizontal p-4" action="{{ route('midwife.users.store') }}" method="POST">

                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="col-form-label">Parent Type</label>
                                <select class="custom-select form-control form-control-alt @error('type') is-invalid @enderror" id="type" name="type">
                                    <option selected disabled>Select Parent Type</option>
                                    <option value="Mother" {{ old('type') == "Mother" ? 'selected' : '' }}>Mother</option>
                                    <option value="Father" {{ old('type') == "Father" ? 'selected' : '' }}>Father</option>

                                </select>
                                @error('type')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="first_name" class="col-form-label">First Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('first_name') is-invalid @enderror"
                                    id="first_name"
                                    placeholder="Enter First Name"
                                    name="first_name"
                                    value="{{old('first_name')}}"
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
                                      value="{{old('last_name')}}"
                                >
                                @error('last_name')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('phone') is-invalid @enderror"
                                    id="phone"
                                    placeholder="Enter Phone"
                                    name="phone"
                                      value="{{old('phone')}}"
                                >
                                 @error('phone')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control form-control-alt @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Enter Email"
                                    name="email"
                                      value="{{old('email')}}"
                                >
                                 @error('email')
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
                                      value="{{old('birthday')}}"
                                >
                                 @error('birthday')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="nic" class="col-form-label">NIC No</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('nic') is-invalid @enderror"
                                    id="nic"
                                    placeholder="Enter NIC No"
                                    name="nic"
                                      value="{{old('nic')}}"
                                >
                                 @error('nic')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address" class="col-form-label">Address </label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('address') is-invalid @enderror"
                                    id="address"
                                    placeholder="Enter Address"
                                    name="address"
                                      value="{{old('address')}}"
                                >
                                 @error('address')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-form-label">City </label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('city') is-invalid @enderror"
                                    id="city"
                                    placeholder="Enter City"
                                    name="city"
                                      value="{{old('city')}}"
                                >
                                 @error('city')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="province" class="col-form-label">Province </label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('province') is-invalid @enderror"
                                    id="province"
                                    placeholder="Enter Province"
                                    name="province"
                                      value="{{old('province')}}"
                                >
                                 @error('province')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="postal" class="col-form-label">Postal Code</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('postal') is-invalid @enderror"
                                    id="postal"
                                    placeholder="Enter Postal Code"
                                    name="postal"
                                      value="{{old('postal')}}"
                                >
                                 @error('postal')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <x-SubmitButton :btnText="'Create Parent'" :cancelBtnRoute="url('/')"></x-SubmitButton>
                    </div>

                </form>

            </div>
        </div>
        <!-- END Your Block -->
    </div>

@endsection
