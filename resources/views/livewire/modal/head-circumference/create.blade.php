<div>

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-smile-beam text-muted mr-1"></i> Head Circumference Measurement
            </h3>
            <div class="block-options">
                <a href="#" class="btn-block-option" data-toggle="modal" data-target="#modal-create-head-circumference">
                    <i class="si si-plus"></i>
                </a>
            </div>
        </div>
        <div class="block-content">

            <table class="table table-sm table-vcenter table-borderless">
                <tbody>
                @foreach($records as $record)
                    <tr>
                        <th class="font-w600 font-size-sm" scope="row">
                            {{ \Carbon\Carbon::parse($record->updated_at)->format('Y') }}
                        </th>
                        <td class="font-w600 font-size-sm">
                            <i class="fa fa-smile-beam text-muted mr-1"></i>
                            {{ number_format($record->head_circumference_measurements, 1) }} cm
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ \Carbon\Carbon::parse($record->updated_at)->format('Y-m-d') }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button wire:click="delete({{ $record->id }})" type="button" class="btn btn-sm btn-light">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <div class="modal" id="modal-create-head-circumference" tabindex="-1" role="dialog" aria-labelledby="modal-create-head-circumference" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">
                            <i class="fa fa-weight text-muted mr-1"></i>
                            Add Head Circumference
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        @livewire('form.head-circumference.create', ['child_id' => $child_id])
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
