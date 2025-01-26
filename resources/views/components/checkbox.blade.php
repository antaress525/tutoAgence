<label for="{{ $name }}" class="form-check form-switch">
    {{ $label }}
    <input type="hidden" name="{{ $name }}" @checked(old($value,$name)) value="0">
    <input type="checkbox" name="{{ $name }}" @checked(old($name,$value ?? false)) value="1" id="{{ $name }}" class="form-check-input">
    @error($name)
         <div class="invalid-feedback">
            {{ $message }}
         </div>
    @enderror
</label>
