@extends('layouts.app')

@section('content')
    <section class="container-fluid page-header no-gutters"
             style="@if(setting('menu_main_banner')) background: url({{ asset('storage/'.setting('menu_main_banner')) }}) @else background: url({{ asset('img/menu-header.png') }}) @endif">
        <div class="row">
            <div class="col-xs-12">
                <h1>Thank You</h1>
            </div>
        </div>
    </section>
    <section class="confirm-address" style="margin-top: 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="delivery-method">
                        <h2> Booking Confirmation</h2>
                        <div class="row order-confirm-row text-center">
                            <div class="col-md-8 col-md-offset-4">
                                <p class="allergy-info-title">Your Booking has been Confirmed </p>
                                <img src="{{asset('img/29-512.png')}}"
                                     style="margin-bottom: 15px; margin-top: 10px; max-width: 100px;">
                                <p class="allergy-information" style="word-break: break-word">Thank you for placing your
                                    booking. You will receive an
                                    booking confirmation email shortly. For your reference, your booking ID is
                                    {{$reservation->id}} </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                    <div class="order-summary-box">
                        <div class="row">
                            <h3>Booking Summary </h3>
                            <div class="row reservation-detail-box">
                                <div class="col-md-4 col-xs-4 text-center">
                                    <img src="{{asset('img/Table.png')}}"><br>
                                    <label>{{$reservation->head_count }} People</label>
                                </div>
                                <div class="col-md-4 col-xs-4 text-center">
                                    <img src="{{asset('img/Calendar.png')}}"><br>
                                    <label>{{$reservation->date }}</label>
                                </div>
                                <div class="col-md-4 col-xs-4 text-center">
                                    <img src="{{asset('img/Clock.png')}}"><br>
                                    <label>{{$reservation->time }}</label>
                                </div>
                            </div>

                            <div class="row confirmed-row">
                                <h3>Your booking has been
                                    @if($reservation->restaurant_status=='accepted')
                                        <span class="text-success">Confirmed</span>
                                    @elseif($reservation->restaurant_status=='declined')
                                        <span class="text-danger">Rejected</span>
                                    @else
                                        <span class="text-warning">Received</span>
                                    @endif
                                    !</h3>
                                <p>Your Booking # is {{$reservation->id }}</p>
                            </div>

                            <div class="row allergy-row">
                                <p class="allergy-info-title"> Things to know before you go</p>
                                <p class="allergy-information">{{$reservation->restaurant->things_to_know
                                    }}</p>
                            </div>

                            <div class="row allergy-row">
                                <p class="allergy-info-title"> Special Requests</p>
                                <p class="allergy-information">{{$reservation->requests }}</p>
                            </div>

                            <div class="row contact-restaurant-row">
                                <p>Contact the Restaurant</p>
                                <div class="contact-icons text-center">
                                    <a target="_blank"
                                       href="https://maps.google.com/?q={{$reservation->restaurant->query_address}}">
                                        <img src="{{asset('img/Map.png')}}"></a>
                                    <a href="tel:{{$reservation->restaurant->phone}}"> <img
                                            src="{{asset('img/Phone.png')}}"></a>
                                    <a href="mailto:{{$reservation->restaurant->email}}"> <img
                                            src="{{asset('img/Mail.png')}}"></a>
                                </div>
                            <!--<div class="contact-icons text-center">
                                    <div class="col-md-4"><a href=""><img src="{{asset('img/Phone-b.png')}}"></a> </div>
                                    <div class="col-md-4"><a href=""><img src="{{asset('img/Map-b.png')}}"></a> </div>
                                    <div class="col-md-4"><a href=""><img src="{{asset('img/Mail-b.png')}}"></a> </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function sendEmail() {
            axios.post('{{route('reservation.email')}}', {
                _token: '{{csrf_token()}}',
                email: document.getElementById('email'),
                reservation_id: '{{$reservation->id}}'
            }).then(function (response) {
                if (response.data.message = 'success') {
                    $.alert({title: 'Success!', content: 'Email sent!', theme: 'success'});
                } else {
                    $.alert({title: 'Error!', content: 'Email sending failed!', theme: 'error'});
                }
            }).catch(function (error) {
                console.log(error);
            })
        }
    </script>

@endsection
