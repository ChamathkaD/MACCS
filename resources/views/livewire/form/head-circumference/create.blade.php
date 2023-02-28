<div class="pb-4">

    <div class="form-group">
        <label for="head_circumference" class="col-form-label">Head Circumference</label>
        <input
            type="text"
            class="form-control form-control-alt @error('head_circumference') is-invalid @enderror"
            id="head_circumference"
            placeholder="Enter Head Circumference"
            wire:model="head_circumference"
        >
        @error('head_circumference')
        <small class="invalid-feedback">
            {{ $message }}
        </small>
        @enderror
    </div>

    <button wire:click="save" class="btn btn-primary btn-block">Add Head Circumference</button>

</div>
