@props(['title', 'name', 'value', 'folder', 'imagesize'])

<div class="flex flex-col items-center gap-3 w-full">

    <!-- Choose File Button -->
    <label for="{{ $name }}"
        style="display: inline-block; width: 100%; max-width: 200px; padding: 6px 16px;
           border-radius: 6px; text-align: left;
           cursor: pointer; background-color: rgba(255,255,255,0.4);">
        ({{ $title }} {{ $imagesize }})
    </label>

    <!-- Hidden File Input -->
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden">

    <!-- Image Preview -->
    @if ($value)
        <img src="/storage/uploads/{{ $folder }}/{{ $value }}" alt=""
            class="max-w-[200px] rounded-md">
    @endif

    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

</div>
