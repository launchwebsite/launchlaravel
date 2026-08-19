@props(['title', 'name', 'value'])

<div class="mb-3 row ">
    <label class="form-label" for="message">{{ $title }}</label>
    <textarea class="form-control" name="{{ $name }}" rows="5" id="message">{{ $value }}</textarea>
    @error($name)
        <span class="error">{{ $message }}</span>
    @enderror
</div>

