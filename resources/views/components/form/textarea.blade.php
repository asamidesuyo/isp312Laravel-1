@props([
    "name",
    "label",
    "placeholder" => "",
    "error" => false,
    "value" => ""
])

<div class="mb-3">
    @isset($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endisset

        <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" cols="30" rows="5" {{ $attributes->merge(["class" => "form-control ".($error ? "is-invalid" : "")]) }}>{{ $value }}</textarea>

    @isset($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endisset
</div>
