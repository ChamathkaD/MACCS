<li class="timeline-event">
    <div class="timeline-event-icon bg-primary">
        <i class="fas fa-smile"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Child Head Circumference</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless table-vcenter font-size-sm mb-0">
                    <thead>
                    <tr class="text-uppercase table-primary">
                        <th class="font-w700">Year</th>
                        <th class="font-w700">Head Circumference</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($child->headMeasurements as $headMeasurement)
                        <tr>
                            <td class="font-w600">
                                {{ \Carbon\Carbon::parse($headMeasurement->updated_at)->format('Y') }}
                            </td>
                            <td class="font-w600">
                                {{ $headMeasurement->head_circumference_measurements }} cm
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</li>
