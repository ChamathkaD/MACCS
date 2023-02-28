<div class="alert alert-{{ $type }} alert-dismissable" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <h3 class="alert-heading font-w300 my-2">
        @if($type == 'success')
            {{ ucfirst($type) }}
        @elseif($type == 'danger')
            {{ ucfirst('error') }}
        @elseif($type == 'warning')
            {{ ucfirst($type) }}
        @endif
    </h3>
    <p class="mb-0">{{ $message }}</p>
</div>
