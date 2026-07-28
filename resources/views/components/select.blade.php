@props(['selected', 'value', 'name', 'default'])

<div class="mb-3">
    <select class="form-select" id="exampleFormControlSelect1" name="{{ $name }}">
        @if (!$default)
            <option value=""> ---- {{ $selected }} ----</option>
        @endif

        @foreach ($value as $item)
        {{ $item->id }}
            <option value="{{ $item->id }}" {{ ($item->id == $default) ? 'selected' : '' }}>{{ $item->card_title }}</option>
        @endforeach
    </select>

    @error($name)
        <span class="error ps-2">{{ $message }}</span>
    @enderror
</div>
