<div class="row">
    <div class="col-md-6">
        <label class="lbl-setting" for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        <input type="{{ $field['type'] }}"
               name="{{ $field['name'] }}"
               value="{{ old($field['name'], \setting($field['name'])) }}"
               class="{{ array_get( $field, 'class') }}"
               id="{{ $field['name'] }}"
               placeholder="@if(array_get($field, 'placeholder') ){{ $field['placeholder'] }} @else {{ $field['label'] }} @endif">
    </div>
</div>
