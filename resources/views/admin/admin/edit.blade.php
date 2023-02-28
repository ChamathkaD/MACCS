@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Edit Admin
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit Admin
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
                    Edit Admin
                </h3>
            </div>

            <div class="block-content">

                <form class="form-horizontal p-4" action="{{ route('admin.admins.update', $admin->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input
                                    type="text"
                                    class="form-control form-control-alt @error('name') is-invalid @enderror"
                                    id="name"
                                    placeholder="Enter Name"
                                    name="name"
                                    value="{{$admin->name}}"
                                >
                                @error('name')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="type" class="col-form-label">Admin Type</label>
                                <select class="custom-select form-control form-control-alt @error('type') is-invalid @enderror" id="type" name="type">
                                    <option selected disabled>Select Admin Type</option>
                                    <option value="administrator" {{ $admin->is_super == false ? 'selected' : '' }}>Administrator</option>
                                    <option value="super administrator" {{ $admin->is_super == true ? 'selected' : '' }}>Super Administrator</option>

                                </select>
                                @error('type')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">


                            <div class="form-group">
                                <label for="email" class="col-form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control form-control-alt @error('email') is-invalid @enderror"
                                    id="email"
                                    placeholder="Enter Email"
                                    name="email"
                                    value="{{$admin->email}}"
                                >
                                @error('email')
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
