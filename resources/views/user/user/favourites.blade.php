@extends('layouts.app')

@section('content')
    <section class="confirm-address">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="delivery-method">
                        <div class="col-sm-3">
                            @include('includes.user-header',['active'=>'favourites'])
                        </div>
                        <div class="col-sm-9">
                            <div class="row my-favourites-row">

                                @foreach($user->menuItems as $menu_item)

                                    <div class="col-md-3">
                                        <a href="{{route('user.restaurant.menu')}}">
                                            <div class="favourites-card">
                                                @if($menu_item->logo)
                                                    <img src="{{ asset('storage/'.$menu_item->logo) }}">
                                                @else
                                                    <img src="{{asset('img/default.jpg')}}" alt="">
                                                @endif
                                                <h3>{{$menu_item->name}}</h3>
                                                <p>{{$menu_item->menu->name}}
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        document.querySelectorAll('.favourites-card img').forEach(function (favourite_image) {
            favourite_image.style.height = favourite_image.clientWidth + 'px';
        });


        window.addEventListener('load', function () {
            var max_height = 0;
            document.querySelectorAll('.favourites-card').forEach(function (favourite) {
                if (favourite.clientHeight > max_height) {
                    max_height = favourite.clientHeight;
                }
            });
            document.querySelectorAll('.favourites-card').forEach(function (favourite) {
                favourite.style.height = max_height + 'px';
            });
        });
    </script>
@endsection
