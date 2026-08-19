@props(['title', 'name', 'value', 'folder', 'imagesize'])

<div class="flex flex-col items-center gap-3 w-full">

    <!-- Choose File Button -->
    <label for="{{ $name }}"
        class="inline-block w-full max-w-[200px] px-4 py-2 bg-white border border-gray-300
            rounded-md text-center cursor-pointer whitespace-nowrap overflow-visible">
        Choose File ({{ $title }} {{ $imagesize ?? '' }})
    </label>

    <!-- Hidden File Input -->
    <input type="file" name="{{ $name }}" id="{{ $name }}" class="hidden">

    <!-- Image Preview -->
    @if ($value)
        @if(Str::endsWith($value, ['mp4','webm','mov','avi']))
            <video width="200" controls>
                <source src="/storage/uploads/{{ $folder }}/{{ $value }}">
            </video>
        @else
            <img src="/storage/uploads/{{ $folder }}/{{ $value }}" class="max-w-[200px] rounded-md">
        @endif
    @endif

    @error($name)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror

</div>

