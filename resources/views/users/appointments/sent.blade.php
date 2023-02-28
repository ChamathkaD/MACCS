@extends('layouts.app')


@section('content')

    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Sent Appointments
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="{{ url('/') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Sent Appointments
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="block">
            <div class="block-header">
                <h3 class="block-title">Sent Appointments</h3>
            </div>
            <div class="block-content">

                <table class="js-table-checkable table table-hover table-vcenter">
                    <thead>
                    <tr>
                        <th class="text-center" style="width: 70px;">
                            <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                <input type="checkbox" class="custom-control-input" id="check-all" name="check-all">
                                <label class="custom-control-label" for="check-all"></label>
                            </div>
                        </th>
                        <th style="width: 25%;">Midwife</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Date</th>
                        <th class="d-none d-sm-table-cell" style="width: 10%;">Time</th>
                        <th class="d-none d-sm-table-cell" style="width: 20%;">Where</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                        <th class="d-none d-sm-table-cell" style="width: 15%;">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($records as $record)

                            <tr>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox custom-control-primary d-inline-block">
                                        <input type="checkbox" class="custom-control-input" id="row_1" name="row_1">
                                        <label class="custom-control-label" for="row_1"></label>
                                    </div>
                                </td>
                                <td class="font-size-sm">
                                    <p class="font-w600 mb-1">
                                        <a href="#">
                                            {{ \App\Midwife::find($record->midwife_id)->full_name }}
                                        </a>
                                    </p>
                                    <p class="text-muted mb-0">
                                        {{ isset($record->reschedule_notes) ? $record->reschedule_notes : $record->notes }}
                                    </p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="font-size-sm text-muted">
                                        {{ isset($record->reschedule_date) ? $record->reschedule_date : $record->date }}
                                    </em>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    <em class="font-size-sm text-muted">
                                        {{ isset($record->reschedule_time) ? \Carbon\Carbon::parse($record->reschedule_time)->format('h:i A') : \Carbon\Carbon::parse($record->time)->format('h:i A') }}
                                    </em>
                                </td>
                                <td class="font-size-sm">
                                    <p class="font-w600 mb-1">
                                        {{ isset($record->reschedule_venue) ? $record->reschedule_venue : $record->venue }}
                                    </p>
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    @if($record->is_approved == false && $record->is_declined == false && $record->is_canceled == true)
                                        <span class="badge badge-secondary">Canceled</span>
                                    @elseif($record->is_approved == false && $record->is_declined == false)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($record->is_approved == true)
                                        <span class="badge badge-success">Approved</span>
                                    @elseif($record->is_declined == true)
                                        <span class="badge badge-danger">Declined</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-toolbar mb-2" role="toolbar" aria-label="Icons Toolbar with button groups">
                                        <div class="btn-group btn-group-sm mr-2 mb-2" role="group" aria-label="Icons File group">
                                            <a
                                                href="{{ route('appointments.edit', $record->id) }}"
                                                type="button"
                                                class="btn btn-primary {{ $record->is_approved == true || $record->is_canceled == true || $record->is_declined == true ? 'disabled' : '' }}"
                                            >
                                                <i class="fa fa-fw fa-clock"></i>
                                            </a>
                                            <a
                                                href="{{ route('appointments.cancel', $record->id) }}"
                                                onclick="return confirm('Do you want to cancel? ')"
                                                type="button"
                                                class="btn btn-danger {{ $record->is_approved == true || $record->is_canceled == true || $record->is_declined == true ? 'disabled' : '' }}"
                                            >
                                                <i class="fa fa-fw fa-times"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>jQuery(function(){ One.helpers(['table-tools-checkable']); });</script>
@endpush
