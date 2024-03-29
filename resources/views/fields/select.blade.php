<div class="row">
    <div class="col-md-6">
        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        <select name="{{ $field['name'] }}" class="{{ array_get( $field, 'class') }}" id="{{ $field['name'] }}">
            @foreach(array_get($field, 'options', []) as $val => $label)
                <option @if( old($field['name'], \setting($field['name'])) == $val ) selected
                        @endif value="{{ $val }}">{{ $label }}</option>
            @endforeach
        </select>
        @if ($errors->has($field['name'])) <em style="color:red;">{{ $errors->first($field['name']) }}</em> @endif
    </div>
</div>
