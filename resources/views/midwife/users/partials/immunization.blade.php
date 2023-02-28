<li class="timeline-event">
    <div class="timeline-event-icon bg-danger">
        <i class="fas fa-syringe"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Immunizations</h3>
            <div class="block-options">
                <a href="{{ route('midwife.children.immunizations.create', $child->id) }}" type="button" class="btn btn-sm btn-outline-danger">Add Immunization</a>
            </div>
        </div>
        <div class="block-content block-content-full">
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
                    <th class="text-center" style="width: 100px;">Actions</th>
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
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="{{ route('midwife.immunizations.edit', $immunization->id) }}" type="button" class="btn btn-sm btn-light">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </a>

                                    <form
                                        action="{{ route('midwife.immunizations.destroy', $immunization->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Do you want to delete?')"
                                    >
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-light"
                                        >
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</li>
