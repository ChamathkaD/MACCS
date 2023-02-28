<li class="timeline-event">
    <div class="timeline-event-icon bg-smooth">
        <i class="fas fa-child"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Child Information</h3>
        </div>
        <div class="block-content block-content-full">
            <div class="row">

                <div class="col-6">
                    <p class="font-w600 mb-2">
                        Name
                    </p>
                    <p>
                        {{$child->full_name}}
                    </p>
                </div>
                <div class="col-6">
                    <p class="font-w600 mb-2">
                        Birthday
                    </p>
                    <p>
                        {{$child->birthday}}
                    </p>
                </div>

            </div>
            <div class="row">

                <div class="col-6">
                    <p class="font-w600 mb-2">
                        Birth Weight
                    </p>
                    <p>
                        {{$child->birth_weight}} Kg
                    </p>
                </div>
                <div class="col-6">
                    <p class="font-w600 mb-2">
                        Health Status
                    </p>
                    <p>
                        {{$child->health_status}}
                    </p>
                </div>

            </div>
        </div>
    </div>
</li>
