@extends('layouts.app')

@section('content')

    <div id="restaurant">
        <section class="container-fluid page-header no-gutters"
                 style="background-image: url({{asset('img/menu-header.png')}})">
            <div class="row">
                <div class="col-xs-12">
                    <h1>About</h1>
                </div>
            </div>
        </section>

        <section class="all-review">
            <div class="container no-gutters">
                <div class="row">
                    <div class="col-md-12">
                        <div class="view-wrapper">
                            <div>
                                <div class="map">
                                    <iframe
                                        src="https://maps.google.com/maps?q={{$restaurant->latitude}},{{$restaurant->longitude}}&hl=es;z=14&amp;output=embed"
                                        width="600" height="244" frameborder="0" style="border:0"
                                        allowfullscreen></iframe>
                                </div>
                                <div class="details-content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>{{__('Price Range')}}</h2>
                                            <p>
                                                @for($i=0;$i<=$restaurant->price_range ;$i++)
                                                    £
                                                @endfor
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="contact-icons text-left"
                                                 style="text-align: left !important;">
                                                <a href="tel:{{$restaurant->phone}}"><img
                                                        src="{{asset('img/Phone-b.png')}}"></a>
                                                <a target="_blank"
                                                   href="https://maps.google.com/?q={{$restaurant->query_address}}"
                                                   target="_blank"><img
                                                        src="{{asset('img/Map-b.png')}}"></a>
                                                <a href="mailto:{{$restaurant->email}}"><img
                                                        src="{{asset('img/Mail-b.png')}}"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Cuisine</h2>
                                            <p>
                                                @foreach($restaurant->cuisines as $cuisine)
                                                    {{$cuisine->name}},
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2>{{__('Hours')}}</h2>
                                            <p>
                                                @foreach($restaurant->opening_hours as $opening_hour)
                                                    {{$opening_hour->day}}: {{$opening_hour->opening}}
                                                    - {{$opening_hour->closing}}
                                                    <br>
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Payment Options</h2>
                                            <p>
                                                @foreach($payment_methods as $key=>$payment_method)
                                                    {{$payment_method->name}}@if($key+1!=count($payment_methods))
                                                        , @endif
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2>Parking</h2>
                                            @if($restaurant->parking)
                                                <p>Available</p>
                                            @else
                                                <p>None</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>Description</h2>
                                            <p>{{$restaurant->description}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h2>Areas Served</h2>
                                            <p>
                                                @foreach($restaurant->areas as $key=> $area)
                                                    {{$area->postcode}}@if($key+1!=count($restaurant->areas))
                                                        , @endif
                                                @endforeach
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Delivery Cost</h2>
                                            <p>
                                                £ {{number_format($restaurant->delivery_cost,2)}}
                                            </p>
                                        </div>
                                        @if($restaurant->free_delivery)
                                            <div class="col-sm-6">
                                                <h2>Free Delivery</h2>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2>Delivery Time</h2>
                                            <p>
                                                @if($restaurant->delivery_time)
                                                    {{$restaurant->delivery_time}}
                                                @endif
                                            </p>
                                        </div>
                                        <div class="col-sm-6">
                                            <h2>Minimum Total</h2>
                                            <p>
                                                @if($restaurant->minimum_total)
                                                    {{$restaurant->minimum_total}}
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </section>
    </div>


    <script type="text/javascript">

        var data = {

           restaurant:{!! json_encode($restaurant) !!},
            restaurant_id: '{{$restaurant_id}}',
            step: 1,
        };

        var restaurant = new Vue({
            el: '#restaurant',
            data: data,
            mounted: function () {


            },
            methods: {

            },
        });

        jQuery('#media-slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            centerMode: true,
            arrows: true,
        });

        jQuery('.sub-list').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            centerMode: false,
            arrows: true,
            variableWidth: true
        });

        window.addEventListener('load', function () {
            jQuery('input[type=radio]').change(function () {
                // console.log('New star rating: ' + this.value);
            });
        });

        function gridHeaderHeight() {
            var elements = document.querySelectorAll('.grid h1');

            var max_height = 0;

            elements.forEach(function (element) {
                if (element.clientHeight > max_height) {
                    max_height = element.clientHeight;
                }
            });

            elements.forEach(function (element) {
                element.style.height = max_height + 'px';
            });
        }

    </script>

    <script type="text/javascript">
        window.addEventListener('load', function () {

            $('a.share').click(function (e) {
                e.preventDefault();
                var $link = $(this);
                var href = $link.attr('href');
                var network = $link.attr('data-network');

                var networks = {
                    facebook: {width: 600, height: 300},
                    twitter: {width: 600, height: 254},
                    google: {width: 515, height: 490},
                    linkedin: {width: 600, height: 473}
                };

                var popup = function (network) {
                    var options = 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,';
                    window.open(href, '', options + 'height=' + networks[network].height + ',width=' + networks[network].width);
                };

                popup(network);
            });

        });
    </script>
@endsection
