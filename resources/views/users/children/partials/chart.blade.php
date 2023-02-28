<div class="col-sm-12">
    <div class="block block-rounded block-mode-loading-oneui">
        <div class="block-header">
            <h3 class="block-title">Weights</h3>
        </div>

        <div class="block-content p-0 bg-body-light text-center">

            {!! $chart->container() !!}

        </div>

    </div>
</div>

@if($chart)
    @push('js')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
        {!! $chart->script() !!}
    @endpush
@endif

