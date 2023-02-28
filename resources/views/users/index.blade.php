@extends('layouts.app')

@section('content')

    <div class="bg-image overflow-hidden" style="background-image: url({{ asset('assets/media/photos/photo28@2x.jpg') }});">
        <div class="bg-primary-dark-op">
            <div class="content content-narrow content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                    <div class="flex-sm-fill">
                        <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">{{ config('app.name') }} Dashboard</h1>
                        <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Welcome Parent</h2>
                    </div>
                    <div class="flex-sm-00-auto mt-3 mt-sm-0 ml-sm-3">
                        <span class="d-inline-block invisible" data-toggle="appear" data-timeout="350">
                            <a class="btn btn-primary px-4 py-2" data-toggle="click-ripple" href="{{ route('children.create') }}">
                                <i class="fa fa-plus mr-1"></i> Create Child
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content">

        <h3>My Children ({{ $children->count() }})</h3>

        <div class="row">

            @foreach($children as $child)

                <div class="col-md-6 col-xl-4">

                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">
                                <i class="fa fa-child text-muted mr-1"></i> Child {{ $loop->index + 1 }}
                            </h3>
                            <div class="block-options">
                                <a href="{{ route('children.edit', $child->id) }}" class="btn-block-option" data-toggle="block-option">
                                    <i class="si si-pencil"></i>
                                </a>

                                <form
                                    action="{{ route('children.destroy', $child->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Do you want to delete {{ $child->full_name }}?')"
                                    class="btn-block-option"
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn-block-option"
                                        data-toggle="block-option"
                                    >
                                        <i class="si si-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                        <div class="block-content">
                            <ul class="nav-items font-size-sm">
                                <li>
                                    <a class="media py-2" href="{{ route('children.show', $child->id) }}">
                                        <div class="mr-3 ml-2 overlay-container overlay-bottom">
                                            <img class="img-avatar img-avatar48" src="{{ asset('assets/media/avatars/avatar1.jpg') }}" alt="">
                                            <span class="overlay-item item item-tiny item-circle border border-2x border-white bg-success"></span>
                                        </div>
                                        <div class="media-body">
                                            <div class="font-w600">{{ $child->fullname }}</div>
                                            <div class="font-w400 text-muted">{{ $child->health_status }}</div>
                                        </div>
                                    </a>
                                </li>
                            </ul>

                            <div class="text-center push">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-light dropdown-toggle" id="dropdown-default-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        My Checklist
                                    </button>
                                    <div class="dropdown-menu font-size-sm" aria-labelledby="dropdown-default-light" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
                                        @foreach(\App\Group::all() as $group)
                                            <a class="dropdown-item" href="{{ route('children.checklist.edit', [$child->id, $group->id]) }}">{{ $group->group_name }} Months Checklist</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            @endforeach

        </div>
    </div>

@endsection
