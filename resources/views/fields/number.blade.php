<div class="section-set {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <input type="{{ $field['type'] }}"
           name="{{ $field['name'] }}"
           value="{{ old($field['name'], \setting($field['name'], array_get($field, 'value'))) }}"
           class="{{ array_get( $field, 'class') }}"
           id="{{ $field['name'] }}"
           @if( $maxAttr = array_get($field, 'max')) max="{{ $maxAttr }}" @endif
           @if( $minAttr = array_get($field, 'min')) min="{{ $minAttr }}" @endif">

    @if ($errors->has($field['name'])) <small class="text-danger">{{ $errors->first($field['name']) }}</small> @endif
</div>