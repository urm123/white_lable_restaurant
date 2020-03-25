@extends('layouts.app')

@section('content')
    <section class="container-fluid home-slider no-gutters">
        <div class="row">
            <div class="col-xs-12">
                <img src="@if(setting('home_main_banner')) {{ asset('storage/'. setting('home_main_banner')) }} @else {{ asset('img/home-slider.jpg') }} @endif" alt=""/>
                <div class="hero-content text-center">
                    <div class="hero-text">
                        {!! setting('main_banner_text') !!}
                    </div>
                    <div class="hero-buttons">
                        <a href="{{route('user.restaurant.menu',['type'=>'delivery'])}}" class="btn order">Order
                            Now</a>
                        <a href="{{route('user.restaurant.menu',['type'=>'reservation'])}}"
                           class="btn reservation">Make
                            a Reservation</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid home-about no-gutters" style="@if(setting('home_middle_banner')) background: url({{ asset('storage/'.setting('home_middle_banner')) }}) no-repeat; @else background: url({{ asset('img/home_middle_banner.png') }}) no-repeat; @endif background-position: right top">
        <div class="row">
            <div class="col-xs-12">
                <div class="container-fluid limit-width">
                    <div class="row">
                        <div class="col-xs-12 home-about-wrapper">
                            <div class="row">
                                <div class="col-md-9 col-xs-12">
                                    <div class="col-xs-12 description">
                                        {!! setting('middle_section_text') !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="col-xs-12 contact-block">
                                        <h3 class="col-xs-12">
                                            PHONE
                                        </h3>
                                        <div class="col-xs-12">
                                            <a href="tel:{{$restaurant->phone}}">{{$restaurant->phone}}</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 contact-block">
                                        <h3 class="col-xs-12">
                                            LOCATION
                                        </h3>
                                        <div class="col-xs-12">
                                            {{$restaurant->county}}<br/>
                                            {{$restaurant->postcode}} <br/>
                                            {{$restaurant->city}}, {{$restaurant->country}}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 contact-block">
                                        <div class="col-xs-12">
                                            <label class="viewOpen" for="modal-state">View Hours&nbsp;&nbsp;<i class="fa fa-clock-o"></i></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container-fluid home-carousel no-gutters">
        <div class="row">
            <div class="col-xs-12 home-page-slider">

                @foreach($restaurant->media as $slider)
                    <div class="col-xs-12">
                        <img src="{{ asset('storage/'.$slider->path) }}" alt=""/>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <script type="text/javascript">
        window.addEventListener('load', function () {
            jQuery('.home-page-slider').slick({
                dots: false,
                arrows: false,
                infinite: true,
                speed: 10000,
                slidesToShow: 2.5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 0,
                hoverable: true,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1.5,
                        }
                    },
                ]
            });
        });
    </script>

    <section class="container-fluid popular-menu-items limit-width">
        <div class="row">
            <div class="col-xs-12">
                <h2 class="col-xs-12">
                    Popular Items
                </h2>
                <div class="col-xs-12 popular-items-slider">
                    @foreach($popular_items as $popular_item)
                        <div class="col-xs-12 menu-item">
                            <div class="col-xs-12 image">
                                @if($popular_item->logo)
                                    <img src="{{ asset('storage/'.$popular_item->logo) }}" alt="" class="img-responsive">
                                @else
                                    <img src="{{asset('img/default.jpg')}}" alt="" class="img-responsive">
                                @endif
                                <button class="btn" type="button" onclick="setFavourite('{{$popular_item->id}}')">
                                    @if($popular_item->favoured)
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                            </div>
                            <h3 class="col-xs-12">
                                {{$popular_item->name}}
                            </h3>
                            <div class="col-xs-12 details">
                                <span>£ {{number_format($popular_item->price,2)}}</span>
                                <button class="btn pull-right" type="button"
                                        onclick="window.location.href='{{route('user.restaurant.menu',['type'=>'delivery'])}}'">
                                    +
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        window.addEventListener('load', function () {
            jQuery('.popular-items-slider').slick({
                dots: false,
                arrows: true,
                infinite: true,
                speed: 200,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 3000,
                responsive: [
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });
        });
    </script>

    <section class="container-fluid home-reservation no-gutters" style="@if(setting('home_bottom_banner')) background: url({{ asset('storage/'.setting('home_bottom_banner')) }}) no-repeat; @else background: url({{ asset('img/reservation-background.png') }}) no-repeat; @endif background-size: cover; background-position: center;">
        <div class="row">
            <div class="col-xs-12">
                <div class="container-fluid limit-width">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="col-xs-12">Make a Reservation</h2>
                            <div class="col-xs-12 text-center sub-title">
                                <button type="btn" class="btn"
                                        onclick="window.location.href='{{route("user.restaurant.menu",['type'=>'reservation'])}}'">
                                    Book your Spot
                                </button>
                            </div>
                            <div class="col-xs-12 text-center description">
                                Call <a href="tel:{{$restaurant->phone}}">{{$restaurant->phone}}</a> or book online
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        window.addEventListener('load', function () {
            jQuery('.col-md-15 img').height(jQuery('.col-md-15 img').width());

            jQuery('.index-content-mob img').height(jQuery('.index-content-mob img').width() / 2);
        });

        function setFavourite(menu_item_id) {
            axios.post('{{route('user.favourite-menu-item')}}', {
                _token: '{{csrf_token()}}',
                menu_item_id: menu_item_id
            })
                .then(function (response) {
                    $.alert({title: 'Success!', content: response.data.message, theme: 'success'});
                })
                .catch(function (error) {
                    if (error.response.status == 401) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please Login to Continue!',
                            theme: 'error'
                        });
                    }
                });
        }
    </script>

    <input type="checkbox" name="modal-state" id="modal-state">
    <div class="modal-overlay">
        <label for="modal-state" class="modal-overlay-close"></label>
        <div class="time_modal">
            <label class="button-close" for="modal-state"><i class="fa fa-times"></i></label>
            <h2>We're Open At These Times</h2>

            @foreach($restaurant->opening_hours as $openingHour)
                <div id="{{$openingHour->day}}" class="op_dateTime">
                    <div class="op_day">{{$openingHour->day}}</div>
                    <div class="op_time">{{$openingHour->opening_time}} - {{$openingHour->closing_time}}</div>
                </div>
                <br>
            @endforeach
        </div>
    </div>

    <script type="application/javascript">
        var now = new Date();
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var checkTime = function() {
            var today = weekday[now.getDay()];
            var timeDiv = document.getElementById('timeDiv');
            var dayOfWeek = now.getDay();
            var hour = now.getHours();
            var minutes = now.getMinutes();

            //add AM or PM
            var suffix = hour >= 12 ? "PM" : "AM";

            // add 0 to one digit minutes
            if (minutes < 10) {
                minutes = "0" + minutes
            };

            if ((dayOfWeek == 0 || dayOfWeek == 6) && hour >= 13 && hour <= 23) {
                hour = ((hour + 11) % 12 + 1); //i.e. show 1:15 instead of 13:15
                timeDiv.innerHTML = 'it\'s ' + today + ' ' + hour + ':' + minutes + suffix + ' - we\'re open!';
                timeDiv.className = 'open';
            }

            else if ((dayOfWeek == 3 || dayOfWeek == 4 || dayOfWeek == 5) && hour >= 16 && hour <= 23) {
                hour = ((hour + 11) % 12 + 1);
                timeDiv.innerHTML = 'it\'s ' + today + ' ' + hour + ':' + minutes + suffix + ' - we\'re open!';
                timeDiv.className = 'open';
            }

            else {
                if (hour == 0 || hour > 12) {
                    hour = ((hour + 11) % 12 + 1); //i.e. show 1:15 instead of 13:15
                }
                timeDiv.innerHTML = 'It\'s ' + today + ' ' + hour + ':' + minutes + suffix + ' - we\'re closed!';
                timeDiv.className = 'closed';
            }
        };

        var currentDay = weekday[now.getDay()];
        var currentDayID = "#" + currentDay; //gets todays weekday and turns it into id
        $(currentDayID).toggleClass("op_today"); //hightlights today in the view hours modal popup

        setInterval(checkTime, 1000);
        checkTime();
    </script>

@endsection
