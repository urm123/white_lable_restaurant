<div class="side-bar-ad">
    <h1>
        @php
            $hour = \Carbon\Carbon::now()->hour;
        @endphp
        @if($hour>=0&&$hour<12)
            Good Morning
        @endif
        @if($hour>=12&&$hour<15)
            Good Afternoon
        @endif
        @if($hour>=15&&$hour<24)
            Good Evening
        @endif, {{\Illuminate\Support\Facades\Auth::user()->restaurant()->withTrashed()->first()->name}}</h1>
    {{--    <p>Shop Online <!-- Button --> <label class="switch">--}}
    {{--            <input type="checkbox" checked id="online_check">--}}
    {{--            <span class="slider round"></span>--}}
    {{--        </label></p>--}}
    <ul>
        <li>
            <hr>
        </li>
        <li @if($active=='delivery') class="active" @endif ><a
                href="{{route('admin.delivery.index')}}"> Deliveries
                <div class="notification-count">{{$delivery_count}}</div>
            </a></li>
        <li>
            <hr>
        </li>
        <li @if($active=='takeaway') class="active" @endif ><a href="{{route('admin.takeaway.index')}}">Takeaways
                <div class="notification-count">{{$takeaway_count}}</div>
            </a>
        </li>
        <li>
            <hr>
        </li>
        <li @if($active=='reservation') class="active" @endif ><a
                href="{{route('admin.reservation.index')}}">{{__("Reservations")}}
                <div class="notification-count">{{$reservation_count}}</div>
            </a>
        </li>
        <li>
            <hr>
        </li>
        <li @if($active=='menu') class="active" @endif ><a href="{{route('admin.menu.index')}}">{{__('Menu')}}</a>
        </li>
        <li>
            <hr>
        </li>
        <li @if($active=='reports') class="active" @endif ><a
                href="{{route('admin.report.index')}}">Reports</a>
        </li>
        <li>
            <hr>
        </li>
        <li @if($active=='customer') class="active" @endif >
            <a href="{{route('admin.review.index')}}">Customers</a>
        </li>
        <li>
            <hr>
        </li>
        {{--        <li @if($active=='') class="active" @endif ><a--}}
        {{--                    href="#">Billing</a>--}}
        {{--        </li>--}}
        {{--        <li>--}}
        {{--            <hr>--}}
        {{--        </li>--}}
        <li @if($active=='settings') class="active" @endif ><a
                href="{{route('admin.restaurant.own')}}">Settings</a>
        </li>
    </ul>
</div>
