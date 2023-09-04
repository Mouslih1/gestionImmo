@php
    $type ??= 'text';
    $class ??= null;
    $name ??= null;
    $value ??= '';
    $placeholder ??= null;
    $label ??= ucfirst($name);
@endphp

<div @class($class)>
    <label class="mb-1" for="{{ $name }}">{{ $label }}</label>
    @if ($type == 'textarea')
        <textarea name="{{ $name }}" placeholder="{{ $placeholder }}"
         class="form-control  @error($name) is-invalid @enderror"" id="{{ $name }}" cols="30" rows="5">{{ old($name , $value) }}</textarea>
    @else
        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            class="form-control  @error($name) is-invalid @enderror" value="{{ old($name , $value) }}"
            placeholder="{{ $placeholder }}">
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
