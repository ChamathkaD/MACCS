<div class="pb-4">

    <div class="form-group">
        <label for="height" class="col-form-label">Height</label>
        <input
            type="text"
            class="form-control form-control-alt @error('height') is-invalid @enderror"
            id="height"
            placeholder="Enter Height"
            wire:model="height"
        >
        @error('height')
        <small class="invalid-feedback">
            {{ $message }}
        </small>
        @enderror
    </div>

    <button wire:click="save" class="btn btn-primary btn-block">Add Height</button>

</div>
