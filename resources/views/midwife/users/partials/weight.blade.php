<li class="timeline-event">
    <div class="timeline-event-icon bg-modern">
        <i class="fas fa-weight"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Child Weight</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless table-vcenter font-size-sm mb-0">
                    <thead>
                    <tr class="text-uppercase bg-modern-lighter">
                        <th class="font-w700">Year</th>
                        <th class="font-w700">Month</th>
                        <th class="font-w700">Weight (Kilograms)</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($child->weights as $weight)
                        <tr>
                            <td class="font-w600">
                                {{ \Illuminate\Support\Carbon::parse($weight->updated_at)->format('Y') }}
                            </td>
                            <td class="font-w600">
                                {{ \Illuminate\Support\Carbon::parse($weight->updated_at)->format('F') }}
                            </td>
                            <td class="font-w600">
                                {{ number_format($weight->weight, 1) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</li>
