<h2>
    Hi, {{\Illuminate\Support\Facades\Auth::user()->first_name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</h2>
<hr class="breadcrumb-hr mydetail-bread">

<div class="row main-breadcrumb">
    <ul>
        <li @if($active=='orders') class="active" @endif>
            <a href="{{route('user.reservations')}}">My Orders & Reservations </a>
        </li>
        <li @if($active=='favourites') class="active" @endif>
            <a href="{{route('user.favourites')}}">My Favorites </a>
        </li>
        <li @if($active=='details') class="active" @endif>
            <a href="{{route('user.profile')}}">My Details </a>
        </li>
    </ul>
</div>
