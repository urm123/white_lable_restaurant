<div class="row">
    <div class="col-md-6">
        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        <p>{{ $field['hint'] }}</p>
        <div class="image-uploader">
            @if( $filePath = $field['name'])
                <div class="{{ array_get( $field, 'preview_class') }}" >
                    <img src="{{ asset('storage/'.setting($field['name'])) }}" alt="{{ $field['name'] }}">
                </div>
            @endif
            <input type="file"
                   name="{{ $field['name'] }}"
                   class="{{ array_get( $field, 'class') }}"
                   id="{{ array_get($field, 'name') }}">
        </div>
        @if ($errors->has($field['name'])) <small class="text-danger">{{ $errors->first($field['name']) }}</small> @endif
    </div>
</div>
