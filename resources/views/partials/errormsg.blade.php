@if ($errors->has($field))
<div class="{{ $class }}">
    <span class="error-message">{{ $errors->first($field) }}</span>
</div>
@endif
