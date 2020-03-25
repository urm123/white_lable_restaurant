<div class="section-set {{ $errors->has($field['name']) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
    <textarea @if( $rows = array_get($field, 'rows') )
              rows="{{ $rows }}"
              @endif
              @if( $cols = array_get($field, 'cols') )
              cols="{{ $cols }}"
              @endif
              name="{{ $field['name'] }}"
              class="{{ array_get( $field, 'class') }}"
              id="{{ $field['name'] }}"
              placeholder="@if(array_get($field, 'placeholder') ){{ $field['placeholder'] }} @else {{ $field['label'] }} @endif">{{ old($field['name'], \setting($field['name'])) }}</textarea>

    @if ($errors->has($field['name'])) <small style="color:red;">{{ $errors->first($field['name']) }}</small> @endif
</div>
