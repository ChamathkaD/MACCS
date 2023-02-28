<li class="timeline-event">
    <div class="timeline-event-icon bg-dark">
        <i class="fas fa-check-square"></i>
    </div>
    <div class="timeline-event-block block invisible" data-toggle="appear">
        <div class="block-header">
            <h3 class="block-title">Checklists</h3>
        </div>
        <div class="block-content block-content-full">
            @foreach(\App\Group::all() as $group)
                <a class="btn btn-dark btn-sm m-2" href="{{ route('midwife.children.checklist.edit', [$child->id, $group->id]) }}">{{ $group->group_name }} Months Checklist</a>
            @endforeach
        </div>
    </div>
</li>
