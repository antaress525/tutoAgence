@php
    $type ??= 'text';
    $value ??= '';
    $class ??= null;
@endphp

<div @class(['form-group', $class])>
    @if ($type == 'textarea')
        <label for="{{ $name }}">{{ $label??Str::ucfirst($name) }}</label>
        <textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}">{{ old($name,$value) }}</textarea>
    @else
        <label for="{{ $name }}">{{ $label??Str::ucfirst($name) }}</label>
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror" name="{{ $name }}" value="{{ old($name,$value) }}" id="{{ $name }}" placeholder="{{ $label??$name }}">
    @endif
    @error($name)
         <div class="invalid-feedback">
            {{ $message }}
         </div>
    @enderror
</div>
