@props(['name', 'value', 'placeholder'])

<div class="mb-3 row">
    {{-- <label for="example-text-input" class="col-sm-2 col-form-label text-end">{{ $title }}</label> --}}
    <div class="col-sm-12">
        <input class="cs_form_field cs_radius_10" placeholder="{{ $placeholder }}" type="text"
            name="{{ $name }}" id="example-text-input" value="{{ $value }}" />
    </div>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</div>
