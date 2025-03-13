@props([
    "type" => "text",
    "name",
    "label",
    "placeholder" => "",
    "error" => false
])

<div class="mb-3">
    @isset($label)
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @endisset

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}" {{ $attributes->merge(["class" => "form-control ".($error ? "is-invalid" : "")]) }}>

    @isset($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endisset
</div>
