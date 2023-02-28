<div class="col-sm-12">
    <div class="block block-themed">
        <div class="block-header block-header-default bg-modern">
            <h3 class="block-title">
                <i class="fas fa-syringe mr-1"></i> Immunization Records
            </h3>
        </div>
        <div class="block-content">
            <table class="table table-sm table-vcenter table-borderless table-hover">
                <thead>
                <tr class="table-danger">
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Batch No</th>
                    <th>Immunization Age</th>
                    <th>Type of Vaccine</th>
                    <th>Date of Vaccine</th>
                    <th class="d-none d-sm-table-cell" style="width: 15%;">Adverse Effects</th>
                    <th class="text-center">BCG Scare</th>

                </tr>
                </thead>
                <tbody>
                @forelse($child->immunizations as $immunization)
                    <tr>
                        <th class="text-center" scope="row">{{ $loop->index + 1 }}</th>
                        <td class="font-w600 font-size-sm">
                            {{ $immunization->batch_no }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $immunization->age }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $immunization->type_of_vaccine }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $immunization->date_of_vaccine }}
                        </td>
                        <td class="d-none d-sm-table-cell">
                            {{ $immunization->adverse_effects_following_immunization }}
                        </td>
                        <td class="d-none d-sm-table-cell text-center">
                            @if($immunization->type_of_vaccine == 'BCG')
                                {{ $immunization->bcg_scare == 1 ? 'Yes' : 'No' }}
                            @else
                                -
                            @endif
                        </td>

                    </tr>
                @empty

                    <tr class="text-center">
                        <td colspan="7">
                            <i class="si si-info mr-1"></i>
                            No Immunization Records
                        </td>
                    </tr>

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
