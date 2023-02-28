<li class="timeline-event">
    <div class="timeline-event-icon bg-success">
        <i class="fas fa-star"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Newborn Health Record</h3>
        </div>
        <div class="block-content block-content-full">

            @if(isset($child->newborn->birthday))

                <div class="row">

                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Birthday
                        </p>
                        <p>
                            {{ $child->newborn->birthday ?? '-' }}
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Apgar Score
                        </p>
                        <p>
                            {{ $child->newborn->apgar_score ?? '-' }}
                        </p>
                    </div>

                </div>
                <div class="row">

                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Birth Weight
                        </p>
                        <p>
                            {{ $child->newborn->birth_weight ?? '-' }} KGs
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Birth Height
                        </p>
                        <p>
                            {{ $child->newborn->birth_height ?? '-' }} Inches
                        </p>
                    </div>

                </div>
                <div class="row">

                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Birth HCM
                        </p>
                        <p>
                            {{ $child->newborn->birth_hcm ?? '-' }} cm
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Skin
                        </p>
                        <p>
                            {{ $child->newborn->skin ?? '-' }}
                        </p>
                    </div>

                </div>
                <div class="row">

                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Eyes
                        </p>
                        <p>
                            {{ $child->newborn->eyes ?? '-' }}
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="font-w600 mb-2">
                            Temperature
                        </p>
                        <p>
                            {{ $child->newborn->temperature ?? '-' }} Celsius
                        </p>
                    </div>

                </div>
                <div class="row">

                    <div class="col-12">
                        <p class="font-w600 mb-2">
                            Notes
                        </p>
                        <p>
                            {{ $child->newborn->notes ?? '-' }}
                        </p>
                    </div>

                </div>

            @endif

        </div>
    </div>
</li>
