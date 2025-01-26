@php
    $class ??=null
@endphp

<div @class(['form-group', $class])>
    <label for="{{ $name }}">{{ $label??ucfirst($name) }}</label>
    <select name="{{ $name }}[]" id="{{ $name }}" class="@error($name) is-invalid @enderror" multiple>
        @foreach ($options as $key=>$option)
            <option value="{{ $key }}" @selected($value->contains($key)) >{{ $option }}</option>
        @endforeach
    </select>
    @error($name)
         <div class="invalid-feedback">
            {{ $message }}
         </div>
    @enderror
</div>
