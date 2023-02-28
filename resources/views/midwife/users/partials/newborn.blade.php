<li class="timeline-event">
    <div class="timeline-event-icon bg-success">
        <i class="fas fa-star"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Newborn Health Record</h3>
            @if(!isset($child->newborn->birth_height))

                <div class="block-options">
                    <a href="{{ route('midwife.children.newborns.create', $child->id) }}" type="button" class="btn btn-sm btn-outline-success">Add Newborn Record</a>
                </div>

            @else

                <div class="block-options">

                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="{{ route('midwife.newborns.edit', $child->newborn->id) }}" type="button" class="btn btn-sm btn-outline-success">Edit Newborn Record</a>
                        </li>
                        <li class="list-inline-item">
                            <form
                                action="{{ route('midwife.newborns.destroy', $child->newborn->id) }}"
                                method="POST"
                                onsubmit="return confirm('Do you want to delete?')"
                            >
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                >
                                    Delete
                                </button>
                            </form>
                        </li>
                    </ul>

                </div>

            @endif
        </div>
        <div class="block-content block-content-full">

            @if(isset($child->newborn->birth_height))

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
                            {{ $child->birth_weight ?? '-' }} KGs
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
