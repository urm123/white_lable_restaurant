@extends('layouts.app')

@section('content')
    <section class="confirm-address">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="delivery-method">
                        <h2> Order Confirmation</h2>
                        <div class="row order-confirm-row text-center">
                            <div class="col-md-8 col-md-offset-4">
                                <p class="allergy-info-title">Your Order has been Confirmed </p>
                                <img src="{{asset('img/29-512.png')}}"
                                     style="margin-bottom: 15px; margin-top: 10px; max-width: 100px;">
                                <p class="allergy-information" style="word-break: break-word;">Thank you for placing
                                    your
                                    order. You will receive an
                                    order confirmation email shortly. For your reference, your order ID is
                                    {{$delivery->id}} </p>
                                @if(\Illuminate\Support\Facades\Auth::user()->email!= setting('guest_email_id'))
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="submit" value="View my Order"
                                                   onclick="window.location.href='{{route('user.deliveries',['delivery_id'=>$delivery->id])}}'"
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

                            @foreach($delivery->deliveryItems as $delivery_item)
                                @if($delivery_item->menuItem)
                                    <div class="row order-item-row">
                                        <div class="col-md-8 col-xs-8 item-title">
                                            {{$delivery_item->menuItem->name}}
                                            (x{{$delivery_item->quantity}})
                                            @if($delivery_item->addonMenuItems)
                                                @foreach($delivery_item->addonMenuItems as $addon_menu_item)
                                                    <br>
                                                    <sub>{{$addon_menu_item->addon->name}}</sub>
                                                @endforeach
                                            @endif
                                            @if($delivery->menuItem&&$delivery->menuItem->id==$delivery_item->menu_item_id)
                                                <br>
                                                <sub>{{$delivery->menuItem->promo_code}}</sub>
                                            @endif
                                        </div>
                                        <div class="col-md-4 col-xs-4 item-price">
                                            @if($delivery_item->menuItemVariants)
                                                £{{number_format($delivery_item->menuItemVariants->price,2,'.',',')}}
                                            @else
                                                £{{number_format($delivery_item->menuItem->price,2,'.',',')}}
                                            @endif

                                            @if($delivery_item->addonMenuItems)
                                                @foreach($delivery_item->addonMenuItems as $addon_menu_item)
                                                    <br>
                                                    <sub>
                                                        £{{number_format($addon_menu_item->price,2,'.',',')}}
                                                    </sub>
                                                @endforeach
                                            @endif


                                            @if($delivery->menuItem&&$delivery->menuItem->id==$delivery_item->menu_item_id)
                                                <br>
                                                - <sub>{{$delivery->reduction}}</sub>
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

                            @if($delivery->vat > 0)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total"> V.A.T</div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        £{{number_format($delivery->vat,2,'.',',')}}</div>
                                </div>
                            @endif

                            <div class="row order-item-subtotal-row">
                                <div class="col-md-8 col-xs-8 item-sub-total">{{__("Delivery")}}</div>
                                <div class="col-md-4 col-xs-4 item-price">
                                    £{{number_format($delivery->delivery_charge,2,'.',',')}}</div>
                            </div>

                            @if($delivery->sitePromotion||$delivery->promotion)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Promocode</div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        - £{{number_format($delivery->reduction,2,'.',',')}}</div>
                                </div>
                            @endif

                            @if($delivery->restaurant_discount)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">{{$delivery->restaurant->name}}
                                        Discount
                                    </div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        - £{{number_format($delivery->restaurnt_discount,2,'.',',')}}</div>
                                </div>
                            @endif

                            @if($delivery->site_discount)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Discount</div>
                                    <div class="col-md-4 col-xs-4 item-price">
                                        - £{{number_format($delivery->site_discount,2,'.',',')}}</div>
                                </div>
                            @endif

                            <div class="row order-item-total-row">
                                <div class="col-md-6 col-sm-6 col-xs-4 item-total">Total</div>
                                <div class="col-md-6 col-sm-6 col-xs-8 item-price item-total">
                                    £{{number_format($delivery->total,2,'.',',')}}</div>
                            </div>

                            @if(empty($delivery->vat) || $delivery->vat = 0)
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-12 col-xs-12 item-price">(VAT already inclusive)</div>
                                </div>
                            @endif
                            <hr>
                            <div class="row order-status-row">
                                <div class="col-md-5 col-xs-5 order-status">Order Status</div>
                                <div class="col-md-7 col-xs-7 order-status order-status-time" style="text-align:right;">
                                    @if($delivery->restaurant_status=='declined')
                                        <span class="text-danger">Declined</span>
                                    @endif
                                    @if($delivery->restaurant_status=='pending')
                                        <span class="text-warning">Pending</span>
                                    @endif

                                    @if($delivery->restaurant_status=='accepted')
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
                                <p class="progress-label col-md-4 col-xs-4 text-right">Delivered</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        function sendEmail() {
            axios.post('{{route('delivery.email')}}', {
                _token: '{{csrf_token()}}',
                email: document.getElementById('email'),
                delivery_id: '{{$delivery->id}}'
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
