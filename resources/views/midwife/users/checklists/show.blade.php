@extends('layouts.app')

@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                   {{ $group->group_name }} Months Checklist
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            {{ $group->group_name }} Months Checklist
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">

        <div class="block block-themed">
            <div class="block-header bg-smooth">
                <h3 class="block-title">
                    Your Baby at {{ $group->group_name }} Months
                </h3>
            </div>
            <div class="block-content block-content-full">

                @foreach($group->categories as $category)
                    <h2 class="content-heading border-bottom mb-4 pb-2">{{ $category->category_name }}</h2>
                    @foreach($category->checklists as $checklist)
                        <div class="custom-control custom-checkbox custom-control-success mb-1">
                            <input
                                type="checkbox"
                                class="custom-control-input"
                                id="{{ $checklist->id }}"
                                name="checklist[]"
                                value="{{ $checklist->id }}"
                                {{ $child->checklists()->where('checklist_id', $checklist->id)->exists() ? 'checked' : '' }}
                                disabled
                            >
                            <label class="custom-control-label" for="{{ $checklist->id }}">{{ $checklist->checklist }}</label>
                        </div>
                    @endforeach
                @endforeach

            </div>
        </div>

    </div>

@endsection
