@extends('layouts.app')

@section('content')

    <section class="confirm-address" id="reservation">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="delivery-method">
                        <div class="col-sm-3">
                            @include('includes.user-header',['active'=>'orders'])
                        </div>
                        <div class="col-sm-9">
                            @include('includes.user-order-header',['active'=>'reservation'])
                            <div class="row reservations-section">
                                <div class="col-md-7">
                                    <div v-for="reservation in reservations">
                                        <div class="row reservations-row">
                                            <div class="col-md-6">
                                                <h3>@{{reservation.restaurant.name}}</h3>
                                                <p>No. of People: @{{reservation.head_count}} </p>
                                                <p>Booking #: @{{ reservation.id }}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="contact-icons">
                                                    <a target="_blank"
                                                       :href="'https://maps.google.com/?q='+reservation.restaurant.query_address">
                                                        <img src="{{asset('img/Map.png')}}"></a>
                                                    <a :href="'tel:'+reservation.restaurant.phone"> <img
                                                            src="{{asset('img/Phone.png')}}"></a>
                                                    <a :href="'mailto:'+reservation.restaurant.email"> <img
                                                            src="{{asset('img/Mail.png')}}"></a>
                                                </div>
                                                <div class="reservation-time">
                                                    <a href="#" @click.prevent="details(reservation)">
                                                        <p>@{{ reservation.date }} @{{reservation.time}} <img
                                                                src="{{asset('img/back-arrow.png')}}">
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="yellow-hr">
                                    </div>

                                    {{ $reservations->links() }}
                                </div>
                                <div class="col-md-5">
                                    <div class="order-summary-box my-account-summary-box" v-if="reservation.id">
                                        <div class="row">
                                            <h3> Reservation Summary </h3>
                                            <div class="row reservation-detail-box">
                                                <div class="col-md-4 col-xs-4 text-center">
                                                    <img src="{{asset('img/Table.png')}}"><br>
                                                    <label>@{{ reservation.head_count }} People</label>
                                                </div>
                                                <div class="col-md-4 col-xs-4 text-center">
                                                    <img src="{{asset('img/Calendar.png')}}"><br>
                                                    <label>@{{ reservation.date }}</label>
                                                </div>
                                                <div class="col-md-4 col-xs-4 text-center">
                                                    <img src="{{asset('img/Clock.png')}}"><br>
                                                    <label>@{{ reservation.time }}</label>
                                                </div>
                                            </div>

                                            <div class="row confirmed-row">
                                                <h3>Your booking has been
                                                    <span v-if="reservation.restaurant_status=='accepted'"
                                                          class="text-success">Confirmed!</span>
                                                    <span v-if="reservation.restaurant_status=='declined'"
                                                          class="text-danger">Rejected!</span>
                                                    <span v-if="reservation.restaurant_status=='pending'"
                                                          class="text-warning">Received!</span>
                                                </h3>
                                                <p>Your Booking # is @{{ reservation.id }}</p>
                                            </div>

                                            <div class="row allergy-row">
                                                <p class="allergy-info-title"> Things to know before you go</p>
                                                <p class="allergy-information">@{{ reservation.restaurant.things_to_know
                                                    }}</p>
                                            </div>

                                            <div class="row allergy-row">
                                                <p class="allergy-info-title"> Special Requests</p>
                                                <p class="allergy-information">@{{ reservation.requests }}</p>
                                            </div>


                                            <div class="row contact-restaurant-row">
                                                <p>Contact the Restaurant</p>
                                                <div class="contact-icons text-center">
                                                    <a target="_blank"
                                                       :href="'https://maps.google.com/?q='+reservation.restaurant.query_address">
                                                        <img src="{{asset('img/Map.png')}}"></a>
                                                    <a :href="'tel:'+reservation.restaurant.phone"> <img
                                                            src="{{asset('img/Phone.png')}}"></a>
                                                    <a :href="'mailto:'+reservation.restaurant.email"> <img
                                                            src="{{asset('img/Mail.png')}}"></a>
                                                </div>
                                            </div>
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

    <script type="text/javascript">

        const data = {
            reservations:{!! json_encode($reservations->toArray()['data']) !!},
            reservation: {restaurant: {}}
        };

        const reservation = new Vue({
            data: data,
            el: '#reservation',
            mounted: function () {
                @if(request()->reservation_id)
                    this.reservation = this.reservations.filter(function (reservation) {
                    return reservation.id == '{{request()->reservation_id}}'
                })[0];
                @endif
            },
            methods: {
                details: function (reservation) {
                    this.reservation = reservation;
                }
            }
        });

    </script>

@endsection
