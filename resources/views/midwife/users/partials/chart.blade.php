<li class="timeline-event">
    <div class="timeline-event-icon bg-amethyst">
        <i class="fas fa-chart-line"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Summery</h3>
        </div>
        <div class="block-content block-content-full">
            {!! $chart->container() !!}
        </div>
    </div>
</li>

@if($chart)
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    @endpush
@endif
