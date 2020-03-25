<ul class="nav nav-tabs">
    <li @if($active=='cuisine') class="active" @endif>
        <a href="{{route('master-admin.cuisine.index')}}">{{__('Cuisines')}}</a>
    </li>
    <li @if($active=='cuisine') class="active" @endif>
        <a href="{{route('master-admin.payment-method.index')}}">Payment Methods</a>
    </li>
    <li @if($active=='user') class="active" @endif>
        <a href="{{route('master-admin.user.index')}}">Users</a>
    </li>
    <li @if($active=='subscription') class="active" @endif>
        <a href="{{route('master-admin.subscription.index')}}">Subscriptions</a>
    </li>
    <li @if($active=='promotion') class="active" @endif>
        <a href="{{route('master-admin.site-promotion.index')}}">Promotions</a>
    </li>
</ul>
