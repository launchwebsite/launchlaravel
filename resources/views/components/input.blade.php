@props(['title', 'name', 'value'])

<div class="mb-3 row">
    <label for="example-text-input" class="col-sm-2 col-form-label text-end">{{ $title }}</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" name="{{ $name }}" id="example-text-input"
            value="{{ $value }}" />
    </div>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</div>
