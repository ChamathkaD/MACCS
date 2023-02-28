<li class="timeline-event">
    <div class="timeline-event-icon bg-amethyst">
        <i class="fas fa-arrow-alt-circle-up"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Child Height</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="table-responsive">
                <table class="table table-hover table-sm table-borderless table-vcenter font-size-sm mb-0">
                    <thead>
                    <tr class="text-uppercase bg-amethyst-lighter">
                        <th class="font-w700">Year</th>
                        <th class="font-w700">Height (Inches)</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($child->heights as $height)
                        <tr>
                            <td class="font-w600">
                                {{ \Carbon\Carbon::parse($height->updated_at)->format('Y') }}
                            </td>
                            <td class="font-w600">
                                {{ number_format($height->height, 1) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</li>
