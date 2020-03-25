@extends('layouts.app')

@section('content')
    {{--    {{dd($offers)}}--}}
    <section class="resturant-list" id="restaurants">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h1>{{__('Filters')}}</h1>
                    <hr>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                       aria-expanded="true" aria-controls="collapseOne">
                                        {{__('Cuisines')}} <a class="collapsed" role="button" data-toggle="collapse"
                                                              data-parent="#accordion"
                                                              href="#collapseOne" aria-expanded="false"
                                                              aria-controls="collapseOne">
                                            <i class="fa pull-right"></i>
                                        </a>
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <div class="row list-content" v-for="cuisine in cuisines" v-if="cuisine.count>0">
                                        <div class="col-md-1 col-xs-3">
                                            <input type="checkbox" :id="'checkbox-list_'+cuisine.id"
                                                   v-model="cuisine.selected">
                                        </div>
                                        <div class="col-md-7 col-xs-6">
                                            <label :for="'checkbox-list_'+cuisine.id">@{{cuisine.name}}
                                            </label>
                                        </div>
                                        <div class="col-md-2 col-xs-3">
                                            <label :for="'checkbox-list_'+cuisine.id">(@{{cuisine.count}})
                                            </label>
                                        </div>
                                        <div class="col-md-2"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 view-more">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapseOne" aria-expanded="false"
                                               aria-controls="collapseOne">
                                                {{__('View Less -')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{__('Rating')}} <a class="collapsed" role="button" data-toggle="collapse"
                                                            data-parent="#accordion"
                                                            href="#collapseTwo" aria-expanded="false"
                                                            aria-controls="collapseTwo">
                                            <i class="fa pull-right"></i>
                                        </a></a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="col-xs-12" style="padding-top: 40px;">
                                        <div type="text" id="rating"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 view-more">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapseTwo" aria-expanded="false"
                                               aria-controls="collapseTwo">
                                                {{__('View Less -')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                                       href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{__('Price')}} <a class="collapsed" role="button" data-toggle="collapse"
                                                           data-parent="#accordion"
                                                           href="#collapseThree" aria-expanded="false"
                                                           aria-controls="collapseThree">
                                            <i class="fa pull-right"></i>
                                        </a></a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <div class="col-xs-12" style="padding-top: 40px;">
                                        <div type="text" id="price"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 view-more">
                                            <a class="collapsed" role="button" data-toggle="collapse"
                                               data-parent="#accordion"
                                               href="#collapseThree" aria-expanded="false"
                                               aria-controls="collapseThree">
                                                {{__('View Less -')}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="resturant-list-head">{{count($results)}} {{__('Restaurants found for')}} <span
                                    class="text-heighlight">{{$type}}</span>
                                to <span class="text-heighlight">{{$term}}</span></p>
                        </div>
                        <div class="col-md-4">

                            <span class="sort">{{__('Sort by:')}}</span>
                            <select name="sort" id="sort" class="delivery" v-model="sort">
                                <option value="relevance">{{__('Relevance')}}</option>
                                <option value="popular">{{__('Popular')}}</option>
                                <option value="price_asc">{{__('Price Ascending')}}</option>
                                <option value="price_desc">{{__('Price Descending')}}</option>
                                @auth
                                    <option value="distance_asc">Distance Ascending</option>
                                    <option value="distance_desc">Distance Descending</option>
                                @endauth
                            </select>
                        </div>
                    </div>
                    @if($offers)
                        <div class="sorted-list">
                            <div class="row">
                                @foreach($offers as $offer)
                                    <div class="col-sm-4">
                                        <a href="{{$offer->url}}">
                                            <div class="sorted-list1"
                                                 style="background-image: @if($offer->logo){{'url('.getStorageUrl().$offer->logo.')'}}@else{{'url('.asset('img/default.jpg').')'}}@endif;background-size: cover;
                                                     background-position: center center;">
                                                <div class="overlay">
                                                    <p class="head">
                                                        @if($offer->promo_type=='flat_rate')
                                                            £     {{$offer->promo_value}}
                                                        @else
                                                            {{$offer->promo_value}}%
                                                        @endif
                                                        off
                                                        @if($offer->name)
                                                            on<br> {{$offer->name}}
                                                        @endif
                                                        @if($offer->promocode)
                                                            - <strong>promocode: "{{$offer->promocode}}"</strong>
                                                        @endif
                                                        @if($offer->restaurant_name)
                                                            from {{$offer->restaurant_name}}
                                                        @endif
                                                    </p>
                                                    <p>Offer valid
                                                        till {{Carbon\Carbon::parse($offer->promo_date)->toFormattedDateString()}}
                                                        !</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="row resturant-list-detail" v-for="restaurant in filteredRestaurants">
                        <div class="col-md-4 col-sm-4">
                            <a :href="'{{route('restaurant.index')}}/'+restaurant.id">
                                <img v-if="restaurant.logo" :src="restaurant.logo" style="height: 142px; width: 100%;">
                                <img v-if="!restaurant.logo" src="{{asset('img/default.jpg')}}"
                                     style="height: 142px; width: 100%;">
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <h3>
                                <a :href="'{{route('restaurant.index')}}/'+restaurant.id">
                                    @{{restaurant.name}}
                                </a> <span class="pre-order" v-if="restaurant.pre_order_time">@{{ restaurant.pre_order_time }}</span>
                            </h3>
                            <p>
                                    <span class="client-rating">
                                       <star-rating :rating="restaurant.rating"></star-rating>
                                    </span>
                                <span class="separator">.</span> <span v-for="cuisine in restaurant.cuisines">@{{ cuisine.name }} <span
                                        class="separator">.</span>
{{--                                @{{ opening_hour.day }}--}}
                                    {{--                                <br>--}}

                                </span>
                                <span><i class="fa fa-euro" v-for="i in parseInt(restaurant.price_range)+1"></i></span>


                            </p>
                            <p> <span class="gray" v-for="opening_hour in restaurant.selected_opening_hours"> @{{opening_hour.opening}} - @{{opening_hour.closing}}<span
                                        class="separator">.</span></span>
                                <span
                                    v-if="restaurant.parking">Parking Available</span>
                            </p>
                            <p>
                                @{{ restaurant.city }}, @{{ restaurant.postcode }}
                            </p>
                            <p class="delivery-selection">
                                <span v-if="restaurant.takeaway"><span
                                        class="delivery-selection-list">{{__("Takeaway")}}</span></span>
                                <span v-if="restaurant.delivery"><span
                                        class="delivery-selection-list">{{__("Delivery")}}</span></span>
                                <span v-if="restaurant.reserve"><span
                                        class="delivery-selection-list">Reserve</span></span>
                            </p>
                        </div>
                        <div class="col-md-2 map-marker-text">
                            <p class="map-marker-text1"><img src="{{asset('img/map-marker.png')}}" class="map-marker">
                                @{{restaurant.distance}}</p>
                            {{--                            <p class="opening-details">--}}

                            {{--                            <div v-for="opening_hour in restaurant.selected_opening_hours">--}}
                            {{--                                --}}{{--                                @{{ opening_hour.day }}--}}
                            {{--                                --}}{{--                                <br>--}}
                            {{--                                <span class="gray">@{{opening_hour.opening}} - @{{opening_hour.closing}}</span>--}}
                            {{--                                <br>--}}
                            {{--                            </div>--}}

                            {{--                            </p>--}}
                        </div>
                    </div>
                    <div class="alert alert-danger" v-if="!filteredRestaurants.length">
                        No results found! Please try with
                        another location!
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">

        var data = {
            restaurants:{!! json_encode($results) !!},
            cuisines:{!! json_encode($cuisines) !!},
            selected_restaurants: [],
            price: 'all',
            rating_min: 0,
            rating_max: 5,
            sort: 'relevance',
        };


        var restaurants = new Vue({
            el: '#restaurants',
            data: data,
            mounted: function () {
                var $this = this;

                window.addEventListener('load', function () {
                    rating.on('change', function () {
                        $this.rating_min = this.get()[0];
                        $this.rating_max = this.get()[1];
                    });
                });

                window.addEventListener('load', function () {
                    price.on('change', function () {
                        $this.price = this.get();
                    });
                });
            },
            methods: {},
            computed: {
                filteredRestaurants: function () {
                    var selected_restaurants = [];
                    var selected_cuisines = this.cuisines.filter(function (cuisine) {
                        return typeof cuisine.selected != 'undefined' && cuisine.selected;
                    });

                    this.restaurants.forEach(function (restaurant) {
                        restaurant.cuisines.forEach(function (restaurant_cuisine) {
                            selected_cuisines.forEach(function (cuisine) {
                                if (cuisine.id == restaurant_cuisine.id) {
                                    var flag = selected_restaurants.filter(function (selected_restaurant) {
                                        return selected_restaurant.id == restaurant.id
                                    });
                                    if (!flag.length) {
                                        selected_restaurants.push(restaurant);
                                    }
                                }
                            });
                        })
                    });

                    var price = 0;

                    switch (this.price) {
                        case '£':
                            price = 0;
                            break;
                        case '££':
                            price = 1;
                            break;
                        case '£££':
                            price = 2;
                            break;
                        case '££££':
                            price = 3;
                            break;
                        case '£££££':
                            price = 4;
                            break;
                        default:
                            price = 5;
                            break;
                    }

                    selected_restaurants = selected_restaurants.filter(function (selected_restaurant) {
                        if (price == 5) {
                            return true;
                        } else {
                            return selected_restaurant.price_range == price;
                        }
                    });

                    var $this = this;

                    selected_restaurants = selected_restaurants.filter(function (selected_restaurant) {
                        return $this.rating_min <= selected_restaurant.rating && $this.rating_max >= selected_restaurant.rating;
                    });

                    switch (this.sort) {
                        case 'relevance':
                            selected_restaurants = _.orderBy(selected_restaurants, ['sort'], ['asc']);
                            break;
                        case 'popular':
                            selected_restaurants = _.orderBy(selected_restaurants, ['rating'], ['desc']);
                            break;
                        case 'price_asc':
                            selected_restaurants = _.orderBy(selected_restaurants, ['price_range'], ['asc']);
                            break;
                        case 'price_desc':
                            selected_restaurants = _.orderBy(selected_restaurants, ['price_range'], ['desc']);
                            break;
                        case 'distance_asc':
                            selected_restaurants = _.orderBy(selected_restaurants, ['distance'], ['asc']);
                            break;
                        case 'distance_desc':
                            selected_restaurants = _.orderBy(selected_restaurants, ['distance'], ['desc']);
                            break;

                        default:
                            break;
                    }

                    return selected_restaurants;
                }
            },
        });

        var rating = noUiSlider.create(document.getElementById('rating'), {
            start: [0, 5],
            connect: true,
            range: {
                'min': 0,
                '20%': 1,
                '40%': 2,
                '60%': 3,
                '80%': 4,
                'max': 5
            },
            snap: true,
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
                to: function (value) {
                    return parseInt(value);
                },
                from: function (value) {
                    return parseInt(value);
                }
            },
        });

        var price = noUiSlider.create(document.getElementById('price'), {
            start: [0],
            connect: false,
            range: {
                'min': 0,
                '20%': 1,
                '40%': 2,
                '60%': 3,
                '80%': 4,
                'max': 5,
            },
            snap: true,
            behaviour: 'tap-drag',
            tooltips: true,
            format: {
                to: function (value) {
                    var text = '';
                    switch (value) {
                        case 0:
                            text = 'All';
                            break;
                        case 1:
                            text = '£';
                            break;
                        case 2:
                            text = '££';
                            break;
                        case 3:
                            text = '£££';
                            break;
                        case 4:
                            text = '££££';
                            break;
                        case 5:
                            text = '£££££';
                            break;
                        default:
                            break;
                    }
                    return text;
                },
                from: function (value) {
                    var text = '';
                    switch (value) {
                        case 0:
                            text = 'All';
                            break;
                        case 1:
                            text = '£';
                            break;
                        case 2:
                            text = '££';
                            break;
                        case 3:
                            text = '£££';
                            break;
                        case 4:
                            text = '££££';
                            break;
                        case 5:
                            text = '£££££';
                            break;
                        default:
                            break;
                    }
                    return text;
                },
            },
        });


    </script>

    <script type="text/javascript">
        window.addEventListener('load', function () {

            jQuery('.sorted-list > .row').slick({
                dots: false,
                infinite: true,
                speed: 300,
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: true,
                arrows: true,
            });
        });
    </script>
@endsection
