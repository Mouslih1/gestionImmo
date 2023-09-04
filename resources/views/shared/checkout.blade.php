@php
    $name ??= null;
    $label ??= ucfirst($name);
    $class ??= null;
@endphp

<div class="form-check form-switch mt-3 {{ $class }}">
    <input type="hidden" name="{{ $name }}" value="0">
    <input @if(old($name, $value == false)) checked @endif
           type="checkbox" name="{{ $name }}" value="1" role="switch"
           class="form-check-input @error($name) is-invalid @enderror">
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
