@php
    $class ??= null;
    $name ??= null;
    $value ??= '';
    $placeHolder ??= null;
    $label ??= ucfirst($name);
@endphp

<div @class($class)>
    <label class="mb-1" for="{{ $name }}">{{ $label }}</label>
    <select class="form-control @error($name) is-invalid @enderror" name="{{ $name }}[]" id="{{ $name }}"
        multiple={{ $multiple }}>
        @foreach ($options as $k => $v)
            <option @selected($value->contains($k)) value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
