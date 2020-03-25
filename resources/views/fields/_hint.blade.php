@if($hint = array_get($field, 'hint'))
    <small class="form-text text-muted">
        {{ $hint }}
    </small>
@endif

@if ($errors->has($field['name']))
    <small class="text-danger">
        {{ $errors->first($field['name']) }}
    </small>
@endif