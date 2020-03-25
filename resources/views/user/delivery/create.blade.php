@extends('layouts.app')

@section('content')
    <section class="confirm-address" id="delivery">
        <div class="container">
            <div class="row">
                <form class="delivery-form" id="delivery-form" action="{{route('delivery.store')}}" method="post"
                      @submit.prevent="confirmOrder($event)">
                    <input type="hidden" id="date" name="date" value="{{session('cart_date')}}">
                    <input type="hidden" id="time" name="time" value="{{session('cart_time')}}">
                    <input type="hidden" id="restaurant_id" name="restaurant_id" value="{{session('restaurant_id')}}">
                    <input type="hidden" id="requests" name="requests" value="{{session('requests')}}">
                    @csrf
                    <div class="col-md-12" id="validation-errors" style="display: none;">
                        <div class="alert alert-danger">

                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12 col-sm-6">
                        <div class="delivery-method">
                            <h2>Delivery Address </h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div :class="{'has-error':validations.address}">
                                        <label for="address">House / Apt Number + Name <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="Enter Address" value="{{old('address',$address->address)}}">

                                        <span class="help-block" v-if="validations.address">
                                                @{{ validations.address[0] }}
                                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="" :class="{'has-error':validations.street}">
                                        <label for="street">Street <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="street" name="street"
                                               placeholder="Enter Street" value="{{old('street',$address->street)}}">
                                        <span class="help-block" v-if="validations.street">
                                                                            @{{ validations.street[0] }}
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="" :class="{'has-error':validations.city}">
                                        <label for="city">City / Town <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="city" name="city"

                                               placeholder="Enter City" value="{{old('city',$address->city)}}">

                                        <span class="help-block" v-if="validations.city">
                                    @{{ validations.city[0] }}
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="" :class="{'has-error':validations.county}">
                                        <label for="county">County</label>
                                        <input type="text" class="form-control" id="county" name="county"
                                               value="{{old('county',$address->county)}}" placeholder="Enter Country">

                                        <span class="help-block" v-if="validations.county">
                                                @{{ validations.county[0] }}
                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" :class="{'has-error':validations.postcode}">
                                        <label for="postcode">Post Code <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="postcode"
                                               @keyup="validatePostcode($event)"
                                               placeholder="Enter Post Code" name="postcode" v-model="postcode"
                                               value="{{old('postcode',$address->postcode)}}">

                                        <span class="help-block" v-if="validations.postcode">
                                                @{{ validations.postcode[0] }}
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row" v-if="guest">
                                <div class="col-md-6">
                                    <div class="" :class="{'has-error':validations.email}">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               value="{{old('email')}}" placeholder="Enter Email">

                                        <span class="help-block" v-if="validations.email">
                                                @{{ validations.email[0] }}
                                            </span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="email" v-if="!guest" value="">
                            @if(\Illuminate\Support\Facades\Auth::user()->email!= setting('guest_email_id'))
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-success" type="button"
                                                    @click.prevent="selectAddress">
                                                Select saved address
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="instructions">Instructions for your Rider</label>
                                        <textarea class="form-control" id="instructions" name="instructions" rows="7"
                                                  maxlength="255" @keyup="countRemainingCharacters"
                                                  placeholder="Enter instructions for your rider"
                                                  v-model="instructions"></textarea>
                                        <span class="help-block small">Max <span
                                                id="character-count1">@{{ remainingCount }}</span> characters</span>
                                    </div>
                                </div>
                            </div>

                            {{--                            <h2>Payment Method </h2>--}}

                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{--                                        <h4 class="panel-title">--}}
                                        {{--                                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"--}}
                                        {{--                                               href="#collapseOne">--}}
                                        {{--                                        <img src="{{asset('img/credit-card-icon.png')}}"--}}
                                        {{--                                                                                             style="padding-right: 15px;">--}}
                                        {{--                                                Pay with Card or Cash--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </h4>--}}
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    {{--                                                    <div class="col-md-6">--}}
                                                    {{--                                                        <div class="radio">--}}
                                                    {{--                                                            <label>--}}
                                                    {{--                                                                <input type="radio" name="payment"--}}
                                                    {{--                                                                       id="optionsRadios1"--}}
                                                    {{--                                                                       v-model="payment" value="card"--}}
                                                    {{--                                                                       @change="checkPayment">--}}
                                                    {{--                                                                Pay with a Debit or Credit Card--}}
                                                    {{--                                                            </label>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
                                                    <div class="col-md-6">
                                                        <div class="radio">
                                                            {{--                                                            <label>--}}
                                                            {{--                                                                <input type="radio" name="payment"--}}
                                                            {{--                                                                       id="optionsRadios2"--}}
                                                            {{--                                                                       v-model="payment" value="cash"--}}
                                                            {{--                                                                       @change="checkPayment">--}}
                                                            {{--                                                                Pay with Cash on Delivery--}}
                                                            {{--                                                            </label>--}}
                                                        </div>
                                                    </div>
                                                    {{--                                                    <div class="col-md-6">--}}
                                                    {{--                                                        <div class="radio">--}}
                                                    {{--                                                            <label>--}}
                                                    {{--                                                                <input type="radio" name="payment"--}}
                                                    {{--                                                                       id="optionsRadios2"--}}
                                                    {{--                                                                       v-model="payment" value="ticket"--}}
                                                    {{--                                                                       @change="checkPayment">--}}
                                                    {{--                                                                Pay with Restaurant Ticket--}}
                                                    {{--                                                            </label>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
                                                    {{--                                                    <div class="col-md-6">--}}
                                                    {{--                                                        <div class="radio">--}}
                                                    {{--                                                            <label>--}}
                                                    {{--                                                                <input type="radio" name="payment"--}}
                                                    {{--                                                                       id="optionsRadios2"--}}
                                                    {{--                                                                       v-model="payment" value="paypal"--}}
                                                    {{--                                                                       @change="checkPayment">--}}
                                                    {{--                                                                Pay with Paypal--}}
                                                    {{--                                                            </label>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
                                                    <div v-if="payment=='card'" class="col-md-12">
                                                        <div id="card-element">
                                                            <!-- A Stripe Element will be inserted here. -->
                                                        </div>
                                                        <div id="card-errors" role="alert"></div>

                                                    </div>
                                                    <div v-if="payment=='cash'" class="col-md-12">
                                                        <div :class="{'has-error':validations.phone}">
                                                            <label for="phone">Phone Number <span
                                                                    class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="phone"
                                                                   name="phone"
                                                                   placeholder="Enter Phone"
                                                                   value="{{old('phone',\Illuminate\Support\Facades\Auth::user()->phone)}}">

                                                            <span class="help-block" v-if="validations.phone">
                                                @{{ validations.phone[0] }}
                                            </span>
                                                        </div>
                                                    </div>
                                                    {{--                                                    <div v-if="payment=='paypal'" class="col-md-12">--}}
                                                    {{--                                                        <div :class="{'has-error':validations.phone}">--}}
                                                    {{--                                                            <label for="phone">Phone Number </label>--}}
                                                    {{--                                                            <input type="text" class="form-control" id="phone"--}}
                                                    {{--                                                                   name="phone"--}}
                                                    {{--                                                                   placeholder="Enter Phone" value="{{old('phone')}}">--}}

                                                    {{--                                                            <span class="help-block" v-if="validations.phone">--}}
                                                    {{--                                                @{{ validations.phone[0] }}--}}
                                                    {{--                                            </span>--}}
                                                    {{--                                                        </div>--}}
                                                    {{--                                                    </div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{--                            <h2> Promo Code </h2>--}}

                            {{--                            <div class="row">--}}
                            {{--                                <div class="col-md-12">--}}
                            {{--                                    <div class="form-group" :class="{'has-error':promocode_error}">--}}
                            {{--                                        <label>Promo Code</label>--}}
                            {{--                                        <input type="text" class="form-control" id="cardnumber" name="promocode"--}}
                            {{--                                               placeholder="Enter Promo Code" v-model="promocode">--}}
                            {{--                                        <input type="hidden" v-model="promocode_validation" name="promotion">--}}
                            {{--                                        <span class="help-block" v-if="promocode_error">--}}
                            {{--                                            @{{ promocode_error }}--}}
                            {{--                                        </span>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="form-group">--}}
                            {{--                                        <button class="btn btn-confirm-order"--}}
                            {{--                                                style="width: auto !important;--}}
                            {{--                                                color: white;--}}
                            {{--margin-top: initial"--}}
                            {{--                                                type="button" @click.prevent="validatePromocode">Apply Promocode--}}
                            {{--                                        </button>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-md-offset-2 col-xs-12">
                        <div class="order-summary-box">
                            <div class="row">
                                <h3>Order Summary </h3>
                                <div class="row order-item-row" v-for="item in cart">
                                    <div class="col-md-6 col-xs-6 item-title"> @{{ item.name }} (x@{{ item.quantity
                                        }})
                                        <span
                                            v-if="item.show_variant"><br><sub>@{{ item.show_variant.name }}</sub></span>
                                        <span v-if="item.show_addons">
                                                                <span v-for="addon in item.show_addons">
                                                                    <br><sub>@{{ addon.name }}</sub>
                                                                </span>
                                                            </span>
                                        <span v-if="promotion&&promotion.method=='menu_item'&&item.id==promotion.id">
                                            <br>
                                            @{{ promotion.promo_code }}
                                        </span>
                                    </div>
                                    <div class="col-md-3 col-xs-3 item-quantity">
                                        <a href="#" @click.prevent="removeQuantity(item)">
                                            <div class="value-button">
                                                -
                                            </div>
                                        </a>
                                        <input type="number" id="number" v-model="item.quantity"/>
                                        <a href="#" @click.prevent="addQuantity(item)">
                                            <div class="value-button">
                                                +
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-xs-3 item-price"><span
                                            v-if="!item.show_variant">£ @{{ currency(item.price) }}</span>
                                        <span v-if="item.show_variant"><br><sub>£ @{{ currency(item.show_variant.pivot.price) }}</sub></span>
                                        <span v-if="item.show_addons">
                                                                <span v-for="addon in item.show_addons">
                                                                    <br><sub>£ @{{ currency(addon.pivot.price) }}</sub>
                                                                </span>
                                                            </span>
                                        <span v-if="promotion&&promotion.method=='menu_item'&&item.id==promotion.id">
                                            <br>
                                           - £@{{ currency(promotion.reduction) }}
                                        </span>

                                    </div>
                                </div>
                                <hr>
                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Subtotal</div>
                                    <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(sub_total) }}</div>
                                </div>

                                <div class="row order-item-subtotal-row" v-if="vat_value">
                                    <div class="col-md-8 col-xs-8 item-sub-total"> V.A.T</div>
                                    <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(vat_value) }}</div>
                                </div>

                                <div class="row order-item-subtotal-row">
                                    <div class="col-md-8 col-xs-8 item-sub-total">{{__("Delivery")}}</div>
                                    <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(delivery_cost) }}</div>
                                </div>

                                <div class="row order-item-subtotal-row"
                                     v-if="(promotion.method=='site' || promotion.method=='restaurant')">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Promocode</div>
                                    <div class="col-md-4 col-xs-4 item-price"> - £@{{ currency(promotion.reduction) }}
                                    </div>
                                </div>

                                <div class="row order-item-subtotal-row"
                                     v-if="restaurant_discount">
                                    <div class="col-md-8 col-xs-8 item-sub-total">@{{ restaurant.name }} Discount</div>
                                    <div class="col-md-4 col-xs-4 item-price"> - £@{{ currency(restaurant_discount) }}
                                    </div>
                                </div>

                                <div class="row order-item-subtotal-row"
                                     v-if="site_discount">
                                    <div class="col-md-8 col-xs-8 item-sub-total">Discount</div>
                                    <div class="col-md-4 col-xs-4 item-price"> - £@{{ currency(site_discount) }}
                                    </div>
                                </div>


                                <div class="row order-item-total-row">
                                    <div class="col-md-6 col-sm-4 col-xs-4 item-total">Total</div>
                                    <div class="col-md-6 col-sm-8 col-xs-8 item-price item-total"> £ @{{
                                        currency(total)
                                        }}
                                    </div>
                                </div>

                                <div class="row order-item-subtotal-row" v-if="!vat_value">
                                    <div class="col-md-12 col-xs-12 item-price">(VAT already inclusive)</div>
                                </div>
                                <hr>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Confirm Order"
                                       class="btn btn-signin btn-confirm-order btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="addressModal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h2>Select an address</h2>
                        <div class="row" v-for="address in addresses">
                            <div class="col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="padding: 15px" :class="{selected:address.default}">
                                        @{{ address.address }}<br>
                                        @{{ address.street }}<br>
                                        @{{ address.city }}<br>
                                        @{{ address.county }}<br>
                                        @{{ address.postcode }}<br>
                                        <button class="btn btn-sm btn-success" @click.prevent="setAddress(address.id)">
                                            Select address
                                        </button>
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
            cart: {!! json_encode($cart) !!},
            total: 0,
            sub_total: 0,
            // card_number: '',
            // stripe: Stripe('pk_live_Z0Jpx6m4PjU0a1awu7ad7yf300B4E4CbAD'),
            // elements: {},
            // card: {},
            validations: {},
            payment: 'cash',
            vat:{!! json_encode(getVat(),true) !!},
            vat_value: 0,
            delivery_cost:{{$delivery_cost}},
            promocode: '',
            promocode_validation: '',
            promocode_error: '',
            promotion: {},
            restaurant:{!! json_encode($restaurant) !!},
            setting:{!! json_encode($setting) !!},
            restaurant_discount: 0,
            site_discount: 0,
            addresses:{!! json_encode(\Illuminate\Support\Facades\Auth::user()->addresses) !!},
            guest: false,
            postcode: '{{$address->postcode}}',
            remainingCount: 255,
            instructions: ''
        };

        var style = {
            base: {
                color: '#C7003B',
                fontFamily: '"Nexa-Bold","Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#555555'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        var delivery = new Vue({
            el: '#delivery',
            data: data,
            mounted: function () {
                this.getTotals();
                // this.elements = this.stripe.elements();

                // this.card = this.elements.create('card', {style: style, hidePostalCode: true});

                // Add an instance of the card Element into the `card-element` <div>.

                // this.card.mount('#card-element');

                // Handle real-time validation errors from the card Element.
                // this.card.addEventListener('change', function (event) {
                //     var displayError = document.getElementById('card-errors');
                //     if (event.error) {
                //         displayError.textContent = event.error.message;
                //     } else {
                //         displayError.textContent = '';
                //     }
                // });

                @if(auth()->user()->email== setting('guest_email_id'))
                    this.guest = true;
                @endif

            },
            methods: {
                addQuantity: function (menu_item) {
                    const selected_item = this.cart.filter(function (item) {
                        return item.id == menu_item.id
                    });

                    if (selected_item.length) {
                        selected_item[0].quantity++;
                        this.$forceUpdate();
                    } else {
                        menu_item.quantity = 1;
                        this.cart.push(menu_item);
                    }

                    this.getTotals();
                    this.sendAjax();
                },
                removeQuantity: function (menu_item) {
                    const selected_item = this.cart.filter(function (item) {
                        return item.id == menu_item.id
                    });

                    if (selected_item.length) {
                        if (selected_item[0].quantity > 0) {
                            selected_item[0].quantity--;
                            this.$forceUpdate();
                        }
                    }

                    this.getTotals();
                    this.sendAjax();
                },
                getTotals: function () {
                    this.total = 0;

                    this.sub_total = 0;

                    const $this = this;

                    var discount = 0;

                    var site_discount = 0

                    var restaurant_discount = 0;

                    var vat = 0;

                    this.cart.forEach(function (item) {
                        var price = item.price;
                        if (item.show_variant) {
                            price = item.show_variant.pivot.price;
                        }

                        var total_item_price = parseFloat(price);

                        if (item.show_addons) {
                            item.show_addons.forEach(function (addon) {
                                $this.total += parseFloat(addon.pivot.price);
                                $this.sub_total += parseFloat(addon.pivot.price);
                                total_item_price += parseFloat(addon.pivot.price);
                            });
                        }

                        if ($this.promotion.method == 'menu_item') {
                            if ($this.promotion.id == item.id) {
                                discount = $this.getPromotionPrice(item.promo_type, item.promo_value, price);
                                $this.promotion.reduction = discount;
                                console.log(discount);
                            }
                        }

                        $this.sub_total += item.quantity * price;

                        var vat_percentage = 0;

                        switch (item.vat_category) {
                            case 'food':
                                vat_percentage = $this.vat.food;
                                break;
                            case 'alcohol':
                                vat_percentage = $this.vat.alcohol;
                                break;
                        }

                        vat += total_item_price * vat_percentage * item.quantity;
                    });

                    if ($this.promotion.method == 'site' || $this.promotion.method == 'restaurant') {
                        discount = $this.getPromotionPrice($this.promotion.type, $this.promotion.value, $this.sub_total);
                        $this.promotion.reduction = discount;
                    }

                    if ($this.restaurant.promocode && $this.restaurant.promo_range) {
                        restaurant_discount = $this.getPromotionPrice($this.restaurant.discount_type, $this.restaurant.discount_value, $this.sub_total);
                        $this.restaurant_discount = restaurant_discount;
                    }

                    if ($this.setting.promocode && $this.setting.promo_range) {
                        site_discount = $this.getPromotionPrice($this.setting.discount_type, $this.setting.discount_value, $this.sub_total);
                        $this.site_discount = site_discount;
                    }

                    $this.vat_value = vat;

                    $this.total = vat + $this.sub_total - discount + $this.delivery_cost - restaurant_discount - site_discount;
                },

                getPromotionPrice(type, value, price) {
                    if (type == 'percentage') {
                        return price * value * 0.01;
                    } else {
                        return value;
                    }
                },

                sendAjax: function () {
                    const cart = this.cart;
                    let requests = this.requests;
                    axios.post('{{route('cart.store')}}', {
                        _token: '{{csrf_token()}}',
                        cart: cart,
                        requests: requests
                    })
                        .then(function (response) {
                            console.log(response);
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                currency: function (price) {
                    const formatter = new Intl.NumberFormat('en-US', {
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });

                    return formatter.format(price)

                },
                setFormat: function (event) {
                    let value = event.target.value;
                    let string = value.split('-').join('');

                    if (string.length) {
                        string = string.match(new RegExp('.{1,4}', 'g')).join('-');
                    }
                    // this.card_number = string;
                },
                confirmOrder: function (event) {
                    let $this = this;
                    this.sendAjax();
                    if (this.payment == 'card') {
                        // this.stripe.createToken(this.card).then(function (result) {
                        //     if (result.error) {
                        //         //Inform the user if there was an error.
                        // var errorElement = document.getElementById('card-errors');
                        // errorElement.textContent = result.error.message;
                        // } else {
                        //     //Send the token to your server.
                        // $this.stripeTokenHandler(result.token, event.target);
                        // }
                        // });
                    } else if (this.payment == 'cash') {
                        var phone = '';
                        if (document.getElementById('phone')) {
                            phone = document.getElementById('phone').value
                        }

                        if (this.promocode && !this.promotion) {
                            jQuery('#validation-errors').slideDown().find('div').html('Please click apply promocode to reduce the amount from your cart.');
                            jQuery('html,body').animate({
                                scrollTop: 0
                            }, 200);
                            return false;
                        }
                        axios.post('{{route('delivery.validate')}}', {
                            _token: '{{csrf_token()}}',
                            address: document.getElementById('address').value,
                            street: document.getElementById('street').value,
                            city: document.getElementById('city').value,
                            county: document.getElementById('county').value,
                            postcode: document.getElementById('postcode').value,
                            restaurant_id: document.getElementById('restaurant_id').value,
                            phone: phone,
                            email: document.getElementById('email').value,
                            payment: $this.payment
                        }).then(function (response) {
                            // console.log(response);
                            if (response.data.message == 'success') {
                                event.target.submit();
                            }
                        }).catch(function (error) {
                            console.log(error);
                            if (error.response.status == 422) {
                                $this.validations = error.response.data.errors;
                            }
                            if (error.response.status == 400) {
                                jQuery('#validation-errors').slideDown().find('div').html(error.response.data.message);
                                jQuery('html,body').animate({
                                    scrollTop: 0
                                }, 200);
                            }
                        });
                    } else {
                        if (this.promocode && !this.promotion) {
                            jQuery('#validation-errors').slideDown().find('div').html('Please click apply promocode to reduce the amount from your cart.');
                            jQuery('html,body').animate({
                                scrollTop: 0
                            }, 200);
                            return false;
                        }
                        axios.post('{{route('delivery.validate')}}', {
                            _token: '{{csrf_token()}}',
                            address: document.getElementById('address').value,
                            street: document.getElementById('street').value,
                            city: document.getElementById('city').value,
                            county: document.getElementById('county').value,
                            postcode: document.getElementById('postcode').value,
                            restaurant_id: document.getElementById('restaurant_id').value,
                            email: document.getElementById('email').value,
                            payment: $this.payment
                        }).then(function (response) {
                            // console.log(response);
                            if (response.data.message == 'success') {
                                event.target.submit();
                            }
                        }).catch(function (error) {
                            console.log(error);
                            if (error.response.status == 422) {
                                $this.validations = error.response.data.errors;
                            }
                            if (error.response.status == 400) {
                                jQuery('#validation-errors').slideDown().find('div').html(error.response.data.message);
                                jQuery('html,body').animate({
                                    scrollTop: 0
                                }, 200);
                            }
                        });
                    }

                },
                stripeTokenHandler: function (token, form) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);

                    var $this = this;

                    var phone = '';
                    if (document.getElementById('phone')) {
                        phone = document.getElementById('phone').value
                    }

                    if (this.promocode && !this.promocode_validaton) {
                        jQuery('#validation-errors').slideDown().find('div').html('Please click apply promocode to reduce the amount from your cart.');
                        jQuery('html,body').animate({
                            scrollTop: 0
                        }, 200);
                        return false;
                    }

                    axios.post('{{route('delivery.validate')}}', {
                        _token: '{{csrf_token()}}',
                        address: document.getElementById('address').value,
                        street: document.getElementById('street').value,
                        city: document.getElementById('city').value,
                        county: document.getElementById('county').value,
                        postcode: document.getElementById('postcode').value,
                        restaurant_id: document.getElementById('restaurant_id').value,
                        phone: phone,
                        email: document.getElementById('email').value,
                        payment: $this.payment,
                    }).then(function (response) {
                        if (response.data.message == 'success') {
                            form.submit();
                        }
                    }).catch(function (error) {
                        if (error.response.status == 422) {
                            $this.validations = error.response.data.errors;
                        }
                        if (error.response.status == 400) {
                            jQuery('#validation-errors').slideDown().find('div').html(error.response.data.message);
                            jQuery('html,body').animate({
                                scrollTop: 0
                            }, 200);
                        }
                    })

                    // Submit the form
                    // form.submit();
                },

                checkPayment: function () {
                    if (this.payment == 'cash') {
                        // this.card.unmount();
                    } else {
                        var $this = this;
                        setTimeout(function () {
                            // $this.card.mount('#card-element');
                        }, 1000);
                    }
                },

                validatePromocode: function () {
                    if (!this.promocode) {
                        this.promocode_error = 'Please enter valid promocode';
                        return false;
                    }

                    if (Object.keys(this.promotion).length !== 0) {
                        this.promocode_error = 'Already added a promocode';
                        this.promocode = '';
                    }

                    var $this = this;

                    axios.post('{{route('promotion.validate')}}', {
                        _token: '{{csrf_token()}}',
                        promocode: $this.promocode,
                        restaurant_id: '{{session('restaurant_id')}}'
                    }).then(function (response) {
                        if (response.data.message == 'success') {
                            if (response.data.data.validation) {

                                if (response.data.data.promotion) {
                                    var promotion = response.data.data.promotion;

                                    $this.promotion = promotion;

                                    $this.promocode_validation = JSON.stringify(promotion);

                                    $this.getTotals();

                                    $this.promocode = '';
                                }

                            } else {
                                if (response.data.data.promotion.length) {
                                    jQuery('#validation-errors').slideDown().find('div').html(response.data.data.promotion);
                                } else {
                                    jQuery('#validation-errors').slideDown().find('div').html('Invalid Promocode!');
                                }
                                jQuery('html,body').animate({
                                    scrollTop: 0
                                }, 200);

                                $this.promocode = '';
                            }
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                },
                selectAddress: function () {
                    jQuery('#addressModal').modal('show');
                },
                setAddress: function (addressId) {
                    var selectedAddress = this.addresses.filter(function (address) {
                        return address.id == addressId;
                    });

                    if (selectedAddress.length) {
                        document.getElementById('address').value = selectedAddress[0].address;
                        document.getElementById('street').value = selectedAddress[0].street;
                        document.getElementById('city').value = selectedAddress[0].city;
                        document.getElementById('county').value = selectedAddress[0].county;
                        document.getElementById('postcode').value = selectedAddress[0].postcode;
                    }

                    jQuery('#addressModal').modal('hide');
                },
                validatePostcode: function (event) {
                    if (this.postcode.length === 2) {
                        this.postcode = this.postcode + ' ';
                    }
                },
                countRemainingCharacters: function () {
                    this.remainingCount = 255 - this.instructions.length;
                },
            },
            computed: {
                card_type: function () {

                    let card_number = this.card_number.split('-').join('');

                    let amex = /^3[47][0-9]{13}$/;
                    let master = /^(5[1-5][0-9]{14}|2(22[1-9][0-9]{12}|2[3-9][0-9]{13}|[3-6][0-9]{14}|7[0-1][0-9]{13}|720[0-9]{12}))$/;
                    let visa = /^4[0-9]{12}(?:[0-9]{3})?$/;

                    if (amex.test(card_number)) {
                        return 'amex';
                    }

                    if (visa.test(card_number)) {
                        return 'visa';
                    }

                    if (master.test(card_number)) {
                        return 'master';
                    }

                }
            }
        });
    </script>

    <style>
        .panel-body.selected {
            background: rgba(2, 143, 56, 0.34);
        }
    </style>
@endsection
