@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    All Parents
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Parents
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="row">
            <div class="col-sm-12">

                @if(Session::has('success'))
                    <x-Alert type="success" :message="Session::get('success')"></x-Alert>
                @endif

                <div class="row row-deck">

                    <div class="col-lg-12">
                        <div class="block block-mode-loading-oneui block-themed">
                            <div class="block-header bg-amethyst">
                                <h3 class="block-title">All Parents & Children</h3>
                            </div>

                            <div class="block-content block-content-full">

                                <div class="table-responsive">

                                    <table class="js-table-sections table table-hover table-vcenter">
                                        <thead>
                                        <tr>
                                            <th style="width: 30px;"></th>
                                            <th class="font-w700" style="width: 80px;">ID</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center" style="width: 100px;">Photo</th>
                                            <th class="font-w700">Full Name</th>
                                            <th class="font-w700">Phone</th>
                                            <th class="font-w700">Email</th>
                                            <th class="d-none d-sm-table-cell font-w700 text-center">Type</th>
                                            <th class="font-w700 text-center" style="width: 60px;">Action</th>
                                        </tr>
                                        </thead>

                                        @foreach($records as $user)
                                            <tbody class="js-table-sections-header">
                                                <tr>
                                                    <td class="text-center">
                                                        <i class="fa fa-angle-right text-muted"></i>
                                                    </td>
                                                    <td>
                                                        <span class="font-w600">
                                                            {{ $loop->index + 1 }}
                                                        </span>
                                                    </td>
                                                    <td class="d-none d-sm-table-cell text-center">
                                                        <img class="img-avatar img-avatar32" src="{{ isset($user->image) ? asset('uploads/img/users/' . $user->image) : asset('assets/media/avatars/avatar15.jpg') }}" alt="">
                                                    </td>
                                                    <td class="font-w600">
                                                        <a href="{{ route('midwife.users.show', $user->id) }}">
                                                            {{$user->fullname}}
                                                        </a>
                                                    </td>
                                                    <td class="font-w600">
                                                        {{$user->phone}}
                                                    </td>
                                                    <td class="font-w600">
                                                        {{$user->email}}
                                                    </td>
                                                    <td class="font-w600 text-center">
                                                        {{$user->type}}
                                                    </td>
                                                    <td class="text-center">

                                                        <div class="btn-group">
                                                            <a
                                                                href="{{ route('midwife.users.edit', [$user->id]) }}"
                                                                class="btn btn-sm btn-light"
                                                                data-toggle="tooltip"
                                                                data-placement="left"
                                                                title="Edit {{ $user->fullname }}"
                                                            >
                                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                                            </a>

                                                            <form
                                                                action="{{ route('midwife.users.destroy', $user->id) }}"
                                                                method="POST"
                                                                onsubmit="return confirm('Do you want to delete {{ $user->full_name }}?')"
                                                            >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    type="submit"
                                                                    class="btn btn-sm btn-light"
                                                                    data-toggle="tooltip"
                                                                    data-placement="left"
                                                                    title="Delete {{ $user->full_name }}"
                                                                >
                                                                    <i class="fa fa-fw fa-times"></i>
                                                                </button>
                                                            </form>

                                                        </div>

                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tbody class="font-size-sm">
                                            <tr class="table-primary">
                                                <td class="text-center">ID</td>
                                                <td colspan="2">Full Name</td>
                                                <td>Birthday</td>
                                                <td>Date of Registration</td>
                                                <td>Birth Weight</td>
                                                <td colspan="2">Health Status</td>
                                            </tr>
                                                @foreach($user->children as $child)
                                                    <tr>
                                                        <td class="text-center">{{ $loop->index + 1 }}</td>
                                                        <td colspan="2">
                                                            <a href="{{ route('midwife.show.child', $child->id) }}">
                                                                {{ $child->full_name }}
                                                            </a>
                                                        </td>
                                                        <td>{{ $child->birthday }}</td>
                                                        <td>{{ $child->date_of_registration }}</td>
                                                        <td>{{ $child->birth_weight }} KGs</td>
                                                        <td colspan="2">{{ $child->health_status }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        @endforeach
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection

@push('js')
    <script>jQuery(function(){ One.helpers(['table-tools-sections']); });</script>
@endpush
