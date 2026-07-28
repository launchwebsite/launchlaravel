@props(['title', 'name', 'value', 'placeholder'])

<div class="mb-3 row ">
    {{-- <label class="form-label" for="message">{{ $title }}</label> --}}
    <textarea class="cs_form_field cs_radius_10" placeholder="{{ $placeholder }}" name="{{ $name }}" rows="5"
        id="message" spellcheck="true">{{ $value }}</textarea>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</div>
