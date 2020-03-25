<div class="row sub-breadcrumb">
    <ul>
        <li @if($active=='profile') class="active" @endif >
            <a href="{{route('user.profile')}}"> {{__('Profile')}} </a>
        </li>
        <li @if($active=='password') class="active" @endif >
            <a href="{{route('user.password')}}">Password </a>
        </li>
        <li @if($active=='address') class="active" @endif >
            <a href="{{route('user.address')}}">Address </a>
        </li>
        {{--        <li @if($active=='dining') class="active" @endif >--}}
        {{--            <a href="{{route('user.dining')}}"> Dining Preference</a>--}}
        {{--        </li>--}}
        {{--        <li @if($active=='communication') class="active" @endif >--}}
        {{--            <a href="{{route('user.communication')}}"> Communication Preferences</a>--}}
        {{--        </li>--}}
        {{--        <li @if($active=='payment') class="active" @endif >--}}
        {{--            <a href="{{route('user.payment')}}"> Payment</a>--}}
        {{--        </li>--}}
    </ul>
</div>

<hr class="breadcrumb-hr mydetail-bread">

