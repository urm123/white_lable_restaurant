<span @if($active=='restaurant') class="active" @endif>
    <a href="{{route('admin.restaurant.own')}}">
        {{__('Profile')}}
    </a>
</span>
<span @if($active=='delivery') class="active" @endif>
    <a href="{{route('admin.delivery-location.index')}}">
        Delivery Settings
    </a>
</span>
<span @if($active=='delivery') class="active" @endif>
    <a href="{{ url('admin/global-settings') }}">
        Global Settings
    </a>
</span>
{{--<span @if($active=='takeaway') class="active" @endif>--}}
{{--    <a href="{{route('admin.takeaway-location.index')}}">--}}
{{--        Takeaway Settings--}}
{{--    </a>--}}
{{--</span>--}}
{{--<span @if($active=='promotion') class="active" @endif>--}}
{{--     <a href="{{route('admin.promotion.index')}}">--}}
{{--         Promotions--}}
{{--     </a>--}}
{{--</span>--}}
