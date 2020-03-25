<ul class="nav nav-tabs">
    <li @if($active=='restaurant') @endif>
        <a href="{{route('master-admin.restaurant.edit',$restaurant)}}">Restaurant
            Profile</a>
    </li>
    <li @if($active=='menu') @endif>
        <a href="{{route('master-admin.menu.index',['restaurant'=>$restaurant])}}">{{__('Menu')}}</a>
    </li>
    <li @if($active=='delivery') @endif>
        <a href="{{route('master-admin.delivery-location.index',['restaurant'=>$restaurant])}}">Delivery
            Settings</a>
    </li>
    <li @if($active=='takeaway') @endif>
        <a href="{{route('master-admin.takeaway-location.index',['restaurant'=>$restaurant])}}">Takeaway
            Settings</a>
    </li>
    <li @if($active=='promotions') @endif>
        <a href="{{route('master-admin.promotion.index',['restaurant'=>$restaurant])}}">Promotions</a>
    </li>
</ul>
