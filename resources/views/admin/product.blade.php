@extends('layouts.admin-layout')
@section('content')
    @include('includes.admin-header')
    @include('includes.admin-sidebar')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-xxl">

                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Products</h4>
                                    </div><!--end col-->
                                </div> <!--end row-->
                            </div><!--end card-header-->
                            <div class="card-body pt-0">


                                <form action="{{ route('attributes.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @foreach ($attributes as $attribute)
                                                <div class="mb-3 row">
                                                    <label class="col-sm-2 col-form-label">
                                                        {{ $attribute->AT_Inputs }}
                                                    </label>

                                                    <div class="col-sm-10">
                                                        @switch($attribute->AT_Structure)
                                                            {{-- Single line text --}}
                                                            @case('string')
                                                            @case('text')
                                                                <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Multi line text --}}
                                                            @case('textarea')
                                                                <textarea name="AT_Inputs[{{ $attribute->AT_Id }}]" id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}" rows="4" class="form-control">{{ old('AT_Inputs.' . $attribute->AT_Id) }}</textarea>
                                                            @break

                                                            {{-- Number --}}
                                                            @case('number')
                                                                <input type="number" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Email --}}
                                                            @case('email')
                                                                <input type="email" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Password --}}
                                                            @case('password')
                                                                <input type="password" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Phone --}}
                                                            @case('tel')
                                                                <input type="tel" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- URL --}}
                                                            @case('url')
                                                                <input type="url" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Date --}}
                                                            @case('date')
                                                                <input type="date" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Date + Time --}}
                                                            @case('datetime')
                                                                <input type="datetime-local"
                                                                    name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- Time --}}
                                                            @case('time')
                                                                <input type="time" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                            @break

                                                            {{-- File upload --}}
                                                            @case('file')
                                                                <input type="file" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control">
                                                            @break

                                                            {{-- Checkbox (single true/false) --}}
                                                            @case('checkbox')
                                                                <div class="form-check">
                                                                    <input type="checkbox"
                                                                        name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                        id="AT_Inputs_{{ $attribute->AT_Id }}" value="1"
                                                                        {{ old('AT_Inputs.' . $attribute->AT_Id) ? 'checked' : '' }}
                                                                        class="form-check-input">
                                                                    <label class="form-check-label"
                                                                        for="AT_Inputs_{{ $attribute->AT_Id }}">
                                                                        {{ $attribute->AT_Inputs }}
                                                                    </label>
                                                                </div>
                                                            @break

                                                            {{-- Radio (Yes/No example — customize as needed) --}}
                                                            @case('radio')
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                        id="AT_Inputs_{{ $attribute->AT_Id }}_yes" value="Yes"
                                                                        {{ old('AT_Inputs.' . $attribute->AT_Id) == 'Yes' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="AT_Inputs_{{ $attribute->AT_Id }}_yes">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                        id="AT_Inputs_{{ $attribute->AT_Id }}_no" value="No"
                                                                        {{ old('AT_Inputs.' . $attribute->AT_Id) == 'No' ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="AT_Inputs_{{ $attribute->AT_Id }}_no">No</label>
                                                                </div>
                                                            @break

                                                            {{-- Select dropdown (options come from AT_Options column, comma separated) --}}
                                                            @case('select')
                                                                <select name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}" class="form-control">
                                                                    <option value="">-- Select {{ $attribute->AT_Inputs }}
                                                                        --</option>
                                                                    @if (!empty($attribute->AT_Options))
                                                                        @foreach (explode(',', $attribute->AT_Options) as $option)
                                                                            <option value="{{ trim($option) }}"
                                                                                {{ old('AT_Inputs.' . $attribute->AT_Id) == trim($option) ? 'selected' : '' }}>
                                                                                {{ trim($option) }}
                                                                            </option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            @break

                                                            {{-- Color picker --}}
                                                            @case('color')
                                                                <input type="color" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id, '#000000') }}"
                                                                    class="form-control form-control-color">
                                                            @break

                                                            {{-- Fallback --}}

                                                            @default
                                                                <input type="text" name="AT_Inputs[{{ $attribute->AT_Id }}]"
                                                                    id="AT_Inputs_{{ $attribute->AT_Id }}"
                                                                    placeholder="Enter {{ $attribute->AT_Inputs }}"
                                                                    value="{{ old('AT_Inputs.' . $attribute->AT_Id) }}"
                                                                    class="form-control">
                                                        @endswitch

                                                        @error('AT_Inputs.' . $attribute->AT_Id)
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endforeach

                                            <div class="mb-3 row">
                                                <div class="col-sm-10">
                                                    <button class="btn btn-primary float-end">
                                                        {{ isset($attribute) ? 'Update' : 'Submit' }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div> <!--end row-->
                    </div><!--end card-body-->
                </div><!--end card-->
            </div> <!--end col-->
        </div><!--end row-->




        <!--end footer-->
    </div>
    <!-- end page content -->

    </div>

    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
@endsection
