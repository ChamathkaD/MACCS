<div class="pb-4">

    <div class="form-group">
        <label for="weight" class="col-form-label">Weight</label>
        <input
            type="text"
            class="form-control form-control-alt @error('weight') is-invalid @enderror"
            id="name"
            placeholder="Enter Weight"
            wire:model="weight"
        >
        @error('weight')
        <small class="invalid-feedback">
            {{ $message }}
        </small>
        @enderror
    </div>

    <button wire:click="save" class="btn btn-primary btn-block">Add Weight</button>

</div>
