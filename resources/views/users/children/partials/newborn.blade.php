<div class="block block-themed">
    <div class="block-header block-header-default">
        <h3 class="block-title">
            <i class="fa fa-child mr-1"></i> Newborn Health Records
        </h3>
    </div>
    <div class="block-content">
        <div class="row">

            <div class="col-6">
                <p class="font-w600 mb-2">
                    Birthday
                </p>
                <p>
                    {{ $child->birthday ?? '-' }}
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
                    {{ $child->birth_weight ?? '-' }}
                </p>
            </div>
            <div class="col-6">
                <p class="font-w600 mb-2">
                    Birth Height
                </p>
                <p>
                    {{ $child->newborn->birth_height ?? '-' }}
                </p>
            </div>

        </div>
        <div class="row">

            <div class="col-6">
                <p class="font-w600 mb-2">
                    Birth HCM
                </p>
                <p>
                    {{ $child->newborn->birth_hcm ?? '-' }}
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
                    {{ $child->newborn->temperature ?? '-' }}
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
    </div>
</div>
