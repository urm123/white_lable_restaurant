 <div class="row mb-15">
    <div class="col-sm-12">
        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
        <input type="hidden" name="{{ $field['name'] }}" value="0" @if(old($field['name'], \setting($field['name']))) checked="checked" @endif />
        <label class="setting-switch">
            <input @if(isset($field['class'])){{ "class='" . $field['class'] ."'" }}@endif type="checkbox"  name="{{ $field['name'] }}" id="{{ $field['name'] }}" value="1" @if(old($field['name'], \setting($field['name']))) checked="checked" @endif >
            <label for="{{ $field['name'] }}" data-on="ON" data-off="OFF" class="label-success"></label>
        </label>
    </div>
</div>
