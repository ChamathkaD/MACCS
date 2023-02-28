<div>

    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-weight text-muted mr-1"></i> Child Weight
            </h3>
            <div class="block-options">
                <a href="#" class="btn-block-option" data-toggle="modal" data-target="#modal-create-weight">
                    <i class="si si-plus"></i>
                </a>
            </div>
        </div>
        <div class="block-content">

            <table class="js-table-sections table table-hover table-vcenter">

                @foreach($records as $key => $record)
                    <tbody class="js-table-sections-header">
                    <tr>
                        <td class="text-center">
                            <i class="fa fa-angle-right text-muted"></i>
                        </td>
                        <td class="font-w600 font-size-sm text-primary" colspan="2">
                            <div class="py-1">
                                {{ $key }}
                            </div>
                        </td>
                        <td class="font-w600 font-size-sm" colspan="2">
                            <div class="py-1">
                                {{ $loop->index + 1 }} Year
                            </div>
                        </td>
                    </tr>
                    </tbody>

                    <tbody class="font-size-sm">
                        @foreach($record as $rec)
                            <tr>
                                <td><i class="fa fa-weight"></i></td>
                                <td class="text-center">{{ \Carbon\Carbon::parse($rec->updated_at)->format('F') }}</td>
                                <td class="font-w600 font-size-sm">{{ number_format($rec->weight, 1) }} KGs</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($rec->updated_at)->format('Y-m-d') }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button wire:click="delete({{ $rec->id }})" type="button" class="btn btn-sm btn-light">
                                            <i class="fa fa-fw fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                @endforeach

            </table>

        </div>
    </div>

    <div class="modal" id="modal-create-weight" tabindex="-1" role="dialog" aria-labelledby="modal-create-weight" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-transparent mb-0">
                    <div class="block-header">
                        <h3 class="block-title">
                            <i class="fa fa-weight text-muted mr-1"></i>
                            Add Weight
                        </h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        @livewire('form.weight.create', ['child_id' => $child_id])
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


@push('js')
    <script>jQuery(function(){ One.helpers(['table-tools-sections']); });</script>
@endpush
