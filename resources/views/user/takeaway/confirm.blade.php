@extends('layouts.app')

@section('content')
    <section class="confirm-address">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="takeaway-method">
                        <h2> Order Confirmation</h2>
                        <div class="row order-confirm-row text-center">
                            <div class="col-md-8 col-md-offset-4">
                                <p class="allergy-info-title">Your Order has been Confirmed </p>
                                <img src="{{asset('img/29-512.png')}}"
                                     style="margin-bottom: 15px; margin-top: 10px; max-width: 100px;">
                                <p class="allergy-information" style="word-break: break-word">Thank you for placing your
                                    order. You will receive an
                                    order confirmation email shortly. For your reference, your order ID is
                                    {{$takeaway->id}} </p>
                                @if(\Illuminate\Support\Facades\Auth::user()->email!= setting('guest_email_id'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="View my Order"
                                                   onclick="window.location.href='{{route('user.takeaways',['takeaway_id'=>$takeaway->id])}}'"
                                                   class="btn btn-signin btn-confirm-order">
                                        </div>
                                    </div>
                                @else
                                    {{--                                    <div class="row">--}}
                                    {{--                                        <div class="col-xs-12">--}}
                                    {{--                                            <div class="form-group">--}}
                                    {{--                                                <label for="email">Send orderID via email:</label>--}}
                                    {{--                                                <input type="text" id="email" class="form-control"--}}
                                    {{--                                                       placeholder="Email Address">--}}
                                    {{--                                                <button class="btn btn-success" onclick="sendEmail()">Send Email--}}
                                    {{--                                                </button>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                    <div class="order-summary-box">
                        <div class="row">
                            <h3>Order Summary </h3>
                            @foreach($takeaway->takeawayItems as $takeaway_item)
                                @if($takeaway_item->menuItem)
                                    <div class="row order-item-row">
                                        <div class="col-md-8 col-xs-8 item-title">
                                            {{$takeaway_item->menuItem->name}}
                                            (x{{$takeaway_item->quantity}})
                                            @if($takeaway_item->takeawayItemAddons)
                                                @foreach($takeaway_item->takeawayItemAddons as $takeaway_item_addon)
                                                    <br>
                                                    <sub>{{$takeaway_item_addon->addon->name}}</sub>
                                                @endforeach
                                            @endif
                                            @if($takeaway->menuItem&&$takeaway->menuItem->id==$takeaway_item->menu_item_id)
                                                <br>
                                                <sub>{{$takeaway->menuItem->promo_code}}</sub>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-xs-4 item-price">
                                            @if($takeaway_item->variant)
                                                £{{number_format($takeaway_item->variant->price,2,'.',',')}}
                                            @else
                                                £{{number_format($takeaway_item->menuItem->price,2,'.',',')}}
                                            @endif

                                            @if($takeaway_item->takeawayItemAddons)
                                                @foreach($takeaway_item->takeawayItemAddons as $takeaway_item_addon)
                                                    <br>
                                                    <sub>
                                                        £{{number_format($takeaway_item_addon->addon->price,2,'.',',')}}
                                                    </sub>
                                                @endforeach
                                            @endif


                                            @if($takeaway->menuItem&&$takeaway->menuItem->id==$takeaway_item->menu_item_id)
                                                <br>
                                                - <sub>{{$takeaway->reduction}}</sub>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <hr>
                            <div class="row order-item-subtotal-row">
                                <div class="col-md-8 col-xs-8 item-sub-total">Subtotal</div>
                                <div class="col-md-4 col-xs-4 item-price"> £{{number_format($subtotal,2,'.',',')}}</div>
                            </div>

                            <div class="row order-item-subtotal-row" v-if="vat_value">
                                <div class="col-md-8 col-xs-8 item-sub-total"> V.A.T</div>
                                <div class="col-md-4 col-xs-4 item-price">
                                    £{{number_format($takeaway->vat,2,'.',',')}}</div>
                            </div>
                            @if($takeaway->sitePromotion||$takeaway->promotion)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Promocode</div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        - £{{number_format($takeaway->reduction,2,'.',',')}}</div>
                                </div>
                            @endif


                            @if($takeaway->restaurant_discount)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">{{$takeaway->restaurant->name}}
                                        Discount
                                    </div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        - £{{number_format($takeaway->restaurnt_discount,2,'.',',')}}</div>
                                </div>
                            @endif

                            @if($takeaway->site_discount)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Discount</div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        - £{{number_format($takeaway->site_discount,2,'.',',')}}</div>
                                </div>
                            @endif

                            <div class="row order-item-total-row">
                                <div class="col-md-6 col-sm-6 col-xs-4 item-total">Total</div>
                                <div class="col-md-6 col-sm-6 col-xs-8 item-price item-total">
                                    £{{number_format($takeaway->total,2,'.',',')}}</div>
                            </div>
                            <div class="row order-item-subtotal-row" v-if="!vat_value">
                                <div class="col-md-12 col-xs-12 item-price">(VAT already inclusive)</div>
                            </div>
                            <hr>
                            <div class="row order-status-row">
                                <div class="col-md-5 col-xs-5 order-status">Order Status</div>
                                <div class="col-md-7 col-xs-7 order-status order-status-time" style="text-align:right;">
                                    @if($takeaway->restaurant_status=='declined')
                                        <span class="text-danger">Declined</span>
                                    @endif
                                    @if($takeaway->restaurant_status=='pending')
                                        <span class="text-warning">Pending</span>
                                    @endif

                                    @if($takeaway->restaurant_status=='accepted')
                                        <span class="text-danger">Accepted</span>
                                    @endif

                                </div>
                            </div>
                            <div class="">
                                <div class="row progress">
                                    <div class="progress-bar" role="progressbar"
                                         aria-valuemin="0" aria-valuemax="100" style="width:{{$progress}}%">
                                        70%
                                    </div>
                                </div>
                                <p class="progress-label col-md-4 col-xs-4 ">Initiated</p>
                                <p class="progress-label col-md-4 col-xs-4 text-center">Dispatched</p>
                                <p class="progress-label col-md-4 col-xs-4 text-right">Collected</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function sendEmail() {
            axios.post('{{route('takeaway.email')}}', {
                _token: '{{csrf_token()}}',
                email: document.getElementById('email'),
                takeaway_id: '{{$takeaway->id}}'
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
