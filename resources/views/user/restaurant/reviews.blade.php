@extends('layouts.app')

@section('content')

    <div id="restaurant">
        <section class="container-fluid page-header no-gutters" style="@if(setting('reviews_main_banner')) background: url({{ asset('storage/'.setting('reviews_main_banner')) }}) @else background: url({{ asset('img/menu-header.png') }}) @endif">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Reviews</h1>
                </div>
            </div>
        </section>

        <section class="all-review">
            <div class="container no-gutters">
                <div class="row">
                    <div class="col-md-12">
                        <div class="view-wrapper">
                            <div class="row">
                                <div class="col-md-4 pull-right">
                                    <div class="over-all-review restaurant-rating">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>{{__('Overall')}}</p>
                                                <h1>@{{ restaurant.rating }}</h1>
                                                <span class="client-rating">
                                                    <star-rating :rating="restaurant.rating"></star-rating>
                                                </span>
                                            </div>
                                            <hr class="col-md-12">
                                            <div class="col-md-12 res-rating">
                                                <div class="col-xs-12 restaurant-rating-block"
                                                     v-for="(percentage,index) in restaurant.percentages">
                                                    <div class="col-xs-2">
                                                        @{{ index }}
                                                    </div>
                                                    <div class="col-xs-10">
                                                        <div class="progress-bar" role="progressbar" aria-valuenow="60"
                                                             aria-valuemin="0" aria-valuemax="100"
                                                             :style="'width: '+percentage+'%;'">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @auth
                                        @if($rating_access)
                                            <div class="review-head">
                                                <h1>Rate and Post Review</h1>
                                            </div>

                                            <div class="review-form">

                                                <div class="form-group">
                                                    <div class="rating">
                                                        <label>
                                                            <input type="radio" name="rating" value="1"
                                                                   v-model="rating"/>
                                                            <i class="fa fa-star icon"></i>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="2"
                                                                   v-model="rating"/>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="3"
                                                                   v-model="rating"/>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="4"
                                                                   v-model="rating"/>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="5"
                                                                   v-model="rating"/>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                            <i class="fa fa-star icon"></i>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" id="review" v-model="review"
                                                              placeholder="Share your review here"
                                                              maxlength="255"></textarea>
                                                    <script type="text/javascript">
                                                        let remainingCount = 255;
                                                        document.getElementById('review').addEventListener('keyup', function (event) {
                                                            remainingCount = 255 - event.target.value.length;
                                                            document.getElementById('character-count').innerHTML = remainingCount;
                                                        });
                                                    </script>
                                                    <span class="help-block small">Max <span
                                                            id="character-count">255</span> characters</span>

                                                </div>
                                                <button type="button" @click.prevent="createReview"
                                                        class="btn btn-default">Post Review
                                                </button>
                                            </div>
                                        @endif
                                    @endauth
                                </div>
                                <div class="col-md-8 pull-left">
                                    <div class="review-head">
                                        <h1>{{__('Reviews')}} (@{{ restaurant.reviews.length }})
                                            <a href="#" @click.prevent="sortReviews">
                                                <span>
                                                    <i class="fas fa-sort-amount-up-alt"></i>
                                                </span>
                                            </a>
                                        </h1>
                                    </div>
                                    <div class="review-box" v-for="review in sorted_reviews">
                                        <div class="row">
                                            <div class="col-md-2 col-xs-12">
                                                <img src="{{asset('img/review-client.png')}}">
                                            </div>
                                            <div class="col-md-7 col-xs-12">
                                                <h2>@{{ review.user.first_name }} @{{ review.user.last_name }} </h2>
                                                <h3>@{{ review.date }}</h3>
                                                <p>
                                                    @{{ review.review }}
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-12">
                                                <span class="client-rating">
                                                    <i v-for="i in parseInt(review.rating)" class="fa fa-star"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row" v-if="review.response">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-9">
                                                <h2>Response from {{$restaurant->name}}</h2>
                                                <h3>@{{ review.updated_date }}</h3>
                                                <p>
                                                    @{{ review.response }}
                                                </p>
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
    </div>


    <script type="text/javascript">

        var data = {
            restaurant:{!! json_encode($restaurant) !!},
            restaurant_id: '{{$restaurant_id}}',
            review_validation: {},
            step: 1,
            rating: 5,
            review: '',
            sorted_reviews: [],
            sort: 'desc',
        };

        var restaurant = new Vue({
            el: '#restaurant',
            data: data,
            mounted: function () {
                this.sorted_reviews = this.restaurant.reviews;
            },
            methods: {

                createReview: function () {
                    let review = this.review;
                    let rating = this.rating;
                    const restaurant = this.restaurant;

                    axios.post('{{route('review.store')}}', {
                        _token: '{{csrf_token()}}',
                        review: review,
                        rating: rating,
                        restaurant_id: restaurant.id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                restaurant.reviews = response.data.data.reviews;
                                restaurant.percentages = response.data.data.percentages;
                                restaurant.rating = response.data.data.rating;
                                $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                $this.review_validation = error.response.data.errors;
                            }

                            if (error.response.status == 401) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please Login to Continue!',
                                    theme: 'error'
                                });
                            }
                        });
                },
                sortReviews: function () {
                    if (this.sort == 'desc') {
                        this.sort = 'asc';
                    } else {
                        this.sort = 'desc';
                    }
                    this.sorted_reviews = _.orderBy(this.restaurant.reviews, ['created_at'], [this.sort]);
                },
                dateValidation: function (event) {
                    var value = new Date(event.target.value);
                    var today = new Date('{{\Carbon\Carbon::now()->toFormattedDateString()}}');

                    if (value.getTime() < today.getTime()) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please select a valid future date!',
                            theme: 'error'
                        });
                    }
                },
                validations: function () {


                },

            },
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

@endsection
