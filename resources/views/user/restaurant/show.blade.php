@extends('layouts.app')

@section('content')

    <div id="restaurant">
        @include('includes.progress_loader')
        <section class="container-fluid page-header no-gutters" style="@if(setting('menu_main_banner')) background: url({{ asset('storage/'.setting('menu_main_banner')) }}) @else background: url({{ asset('img/menu-header.png') }}) @endif">
            <div class="row">
                <div class="col-xs-12">
                    <h1>Our Menu</h1>
                </div>
            </div>
        </section>

        <section class="all-review">
            <div class="container no-gutters">
                <div class="row">
                    <div class="col-md-4 pull-right">
                        <div class="row">
                            <div class="order-summary-box order-reservation">
                                    @if($restaurant->takeaway)
                                        <div class="round">
                                            <div class="delivery-option">
                                                <p> Take Away </p>
                                                <input type="checkbox" id="takeaway" @click.prevent="setMethod('takeaway')"
                                                       v-model="takeaway"/>
                                                <label for="takeaway"></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <transition name="fade">
                                            <div v-if="takeaway" key="takeaway" style="margin-bottom: 100px;">
                                                <div class="text-center" v-if="!cart.length">
                                                    <div class="cart-heading">
                                                        {{__('Your cart is empty')}}
                                                    </div>
                                                    <div class="cart-icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                    <div class="cart-description">
                                                        {{__('Your cart is empty. Get your cravings satisfied by adding your favourites into the cart.')}}
                                                    </div>
                                                </div>
                                                <div v-if="cart.length">
                                                    <table class="table table-responsive">
                                                        <tr v-for="(item,index) in cart"
                                                            :key="'takeaway_cart'+item.id+'__'+index">
                                                            <td><a href="#" @click.prevent="removeFromCart(item)"><i
                                                                        class="fa fa-minus"></i></a></td>
                                                            <td>@{{ item.name }}
                                                                <span v-if="item.show_variant"><br><sub>@{{ item.show_variant.name }}</sub></span>
                                                                <span v-if="item.show_addons">
                                                                    <span v-for="addon in item.show_addons">
                                                                        <br><sub>@{{ addon.name }}</sub>
                                                                    </span>
                                                                </span>
                                                            </td>
                                                            <td>@{{ item.quantity }}</td>
                                                            <td class="text-right" style="white-space: nowrap">
                                                                <span v-if="!item.show_variant">£ @{{
                                                                currency(item.price) }}</span>
                                                                <span v-if="item.show_addons">
                                                                    <span v-if="item.show_variant"><br><sub>£ @{{ currency(item.show_variant.pivot.price) }}</sub></span>
                                                                    <span v-for="addon in item.show_addons">
                                                                        <br><sub>£ @{{ currency(addon.pivot.price) }}</sub>
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-responsive"
                                                           style="border-top: 1px solid #BDBDBD;">
                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td class="text-right">£ @{{ currency(sub_total) }}</td>
                                                        </tr>
                                                        <tr v-if="vat_value">
                                                            <td>V.A.T.</td>
                                                            <td class="text-right">£ @{{ currency(vat_value) }}</td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td>Total</td>
                                                            <td class="text-right">£ @{{
                                                                currency(vat_value+total) }}
                                                            </td>
                                                        </tr>
                                                        <tr v-if="!vat_value">
                                                            <td colspan="2" class="text-right">(VAT already inclusive)</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div v-if="cart.length" class="">
                                                    <div class="form-group">
                                                        <label for="date">Takeaway Date</label>
                                                        <date-picker id="cart_date" v-model="cart_date"
                                                                     @keydown.prevent="preventKeyDown($event)"
                                                                     readonly="true"
                                                                     placeholder="Enter your delivery date here"></date-picker>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="time">Takeaway Time</label>

                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <time-picker class="form-control" id="time"
                                                                         v-model="cart_time" name="cart_time"
                                                                         placeholder="Enter your takeaway time here">

                                                            </time-picker>
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-time"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="requests">Special Requests</label>
                                                        <textarea class="form-control" id="requests" v-model="requests"
                                                                  maxlength="255" @keyup="countRemainingCharacters"
                                                                  placeholder="Enter your special requests here"></textarea>
                                                        <span class="help-block small">Max <span
                                                                id="character-count1">@{{ remainingCount1 }}</span> characters</span>
                                                    </div>

                                                    <a class="btn btn-lg col-xs-12" href="#"
                                                       @click.prevent="checkout('{{route('takeaway.create')}}')">Proceed to
                                                        Checkout</a>
                                                </div>
                                            </div>
                                        </transition>
                                    @endif

                                    @if($restaurant->delivery)
                                        <div class="round">
                                            <div class="delivery-option">
                                                <p> {{__("Delivery")}}</p>
                                                <input type="checkbox" id="delivery" @click.prevent="setMethod('delivery')"
                                                       v-model="delivery"/>
                                                <label for="delivery"></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <transition name="fade">
                                            <div v-if="delivery" key="delivery" style="margin-bottom: 100px;">
                                                <div class="text-center" v-if="!cart.length">
                                                    <div class="cart-heading">
                                                        {{__('Your cart is empty')}}
                                                    </div>
                                                    <div class="cart-icon">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                    <div class="cart-description">
                                                        {{__('Your cart is empty. Get your cravings satisfied by adding your favourites into the cart.')}}
                                                    </div>
                                                </div>
                                                <div v-if="cart.length">
                                                    <table class="table table-responsive">
                                                        <tr v-for="(item,index) in cart"
                                                            :key="'delivery_cart'+item.id+'__'+index">
                                                            <td><a href="#" @click.prevent="removeFromCart(item)"><i
                                                                        class="fa fa-minus"></i></a></td>
                                                            <td>@{{ item.name }}
                                                                <span v-if="item.show_variant"><br><sub>@{{ item.show_variant.name }}</sub></span>
                                                                <span v-if="item.show_addons">
                                                                    <span v-for="addon in item.show_addons">
                                                                        <br><sub>@{{ addon.name }}</sub>
                                                                    </span>
                                                                </span>
                                                            </td>
                                                            <td>@{{ item.quantity }}</td>
                                                            <td class="text-right" style="white-space: nowrap">
                                                                <span v-if="!item.show_variant">£ @{{
                                                                currency(item.price) }}</span>
                                                                <span v-if="item.show_variant"><br><sub>£ @{{ currency(item.show_variant.pivot.price) }}</sub></span>
                                                                <span v-if="item.show_addons">
                                                                    <span v-for="addon in item.show_addons">
                                                                        <br><sub>£ @{{ currency(addon.pivot.price) }}</sub>
                                                                    </span>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-responsive"
                                                           style="border-top: 1px solid #BDBDBD;">
                                                        <tr>
                                                            <td>Subtotal</td>
                                                            <td class="text-right">£ @{{ currency(sub_total) }}</td>
                                                        </tr>
                                                        <tr v-if="vat_value">
                                                            <td>V.A.T.</td>
                                                            <td class="text-right">£ @{{ currency(vat_value) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{__("Delivery")}}</td>
                                                            <td class="text-right">£ @{{ currency(restaurant.delivery_cost)
                                                                }}
                                                            </td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td>Total</td>
                                                            <td class="text-right">£ @{{
                                                                currency(total+vat_value+restaurant.delivery_cost) }}
                                                            </td>
                                                        </tr>
                                                        <tr v-if="!vat_value">
                                                            <td colspan="2" class="text-right">(VAT already inclusive)</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div v-if="cart.length" class="">
                                                    <div class="form-group">
                                                        <label for="date">Delivery Date</label>
                                                        <date-picker id="cart_date" v-model="cart_date"
                                                                     @keydown.prevent="preventKeyDown($event)"
                                                                     readonly="true"
                                                                     placeholder="Enter your delivery date here"
                                                                     @change.prevent="dateValidation($event)"></date-picker>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="time">Delivery Time</label>
                                                        <div class="input-group bootstrap-timepicker timepicker">
                                                            <time-picker class="form-control" id="time"
                                                                         v-model="cart_time" name="cart_time"
                                                                         placeholder="Enter your delivery time here"></time-picker>
                                                            <span class="input-group-addon"><i
                                                                    class="glyphicon glyphicon-time"></i></span>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="requests">Special Requests</label>
                                                        <textarea class="form-control" id="requests2" v-model="requests"
                                                                  maxlength="255"
                                                                  placeholder="Enter your special requests here"
                                                                  @keyup="countRemainingCharacters"></textarea>

                                                        <span class="help-block small">Max <span
                                                                id="character-count2">@{{ remainingCount2 }}</span> characters</span>

                                                    </div>


                                                    <a class="btn btn-lg col-xs-12" href="#"
                                                       @click.prevent="checkout('{{route('delivery.create')}}')">Proceed to
                                                        Checkout</a>
                                                </div>
                                                <hr>
                                            </div>
                                        </transition>
                                    @endif

                                    @if($restaurant->reserve)
                                        <div class="round">
                                            <div class="delivery-option">
                                                <p> Reservation </p>
                                                <input type="checkbox" id="reservation"
                                                       @click.prevent="setMethod('reservation')"
                                                       v-model="reservation"/>
                                                <label for="reservation"></label>
                                            </div>
                                        </div>
                                        <hr>
                                        <transition name="fade">
                                            <div v-if="reservation" key="reservation" style="margin-bottom: 100px;">
                                                <div v-if="step==1">
                                                    <label>How many People are You Booking for? <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" v-model="head_count" min="1" step="1.0"
                                                           :class="{'has-error':reservation_validation.head_count}">
                                                    <span style="display: block"
                                                          v-if="reservation_validation.head_count"
                                                          class="error-span">
                                                @{{ reservation_validation.head_count[0] }}
                                            </span>
                                                    <label>Select Date <span class="text-danger">*</span></label>
                                                    <date-picker :class="{'has-error':reservation_validation.date}"
                                                                 id="reservation_date" v-model="date"
                                                                 @keydown.prevent="preventKeyDown($event)" readonly="true"
                                                                 placeholder=""></date-picker>
                                                    <span style="display: block" v-if="reservation_validation.date"
                                                          class="error-span">
                                                @{{ reservation_validation.date[0] }}
                                            </span>
                                                    <label>Select Time <span class="text-danger">*</span></label>

                                                    <div class="input-group bootstrap-timepicker timepicker">
                                                        <time-picker v-model="time"
                                                                     :class="{'has-error':reservation_validation.time}"
                                                                     class="form-control"></time-picker>
                                                        <span class="input-group-addon"><i
                                                                class="glyphicon glyphicon-time"></i></span>
                                                        <span style="display: block" v-if="reservation_validation.time"
                                                              class="error-span">
                                                @{{ reservation_validation.time[0] }}
                                            </span>
                                                    </div>

                                                    <label v-if="guest">Phone</label>
                                                    <input type="text" v-model="phone" v-if="guest"
                                                           :class="{'has-error':reservation_validation.phone}">
                                                    <label v-if="guest">Email</label>
                                                    <input type="text" v-model="email" v-if="guest"
                                                           :class="{'has-error':reservation_validation.email}">

                                                    <button class="order-reservation-button"
                                                            @click.prevent="createBooking">
                                                        Proceed
                                                        to Booking
                                                    </button>
                                                </div>

                                                <div v-if="step==2">
                                                    <div class="row reservation-detail-box">
                                                        <div class="col-md-4 col-xs-4 text-center">
                                                            <img src="{{asset('img/Table.png')}}"><br>
                                                            <label>@{{ reservation_data.head_count }} People</label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 text-center">
                                                            <img src="{{asset('img/Calendar.png')}}"><br>
                                                            <label>@{{ reservation_data.date }}</label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 text-center">
                                                            <img src="{{asset('img/Clock.png')}}"><br>
                                                            <label>@{{ reservation_data.time }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row discount-wrapper"
                                                         v-if="reservation_restaurant.promo_range">
                                                        You will get a discount of
                                                        <span
                                                            v-if="reservation_restaurant.discount_type=='percentage'">@{{ reservation_restaurant.discount_value }}%</span>
                                                        <span
                                                            v-if="reservation_restaurant.discount_type!='percentage'">£ @{{ reservation_restaurant.discount_value }}</span>
                                                        from @{{ reservation_restaurant.name }}
                                                    </div>
                                                    <div class="row discount-wrapper"
                                                         v-if="reservation_settings.promo_range">
                                                        You will get a discount of
                                                        <span
                                                            v-if="reservation_settings.discount_type=='percentage'">@{{ reservation_settings.discount_value }}%</span>
                                                        <span
                                                            v-if="reservation_settings.discount_type!='percentage'">£ @{{ reservation_settings.discount_value }}</span>
                                                        from {{ $restaurant->name }} platform
                                                    </div>

                                                    <label>Have a Special Request?</label>
                                                    <textarea placeholder="Enter your request here..." maxlength="255"
                                                              v-model="reservation_requests" id="requests3"
                                                              @keyup="countRemainingCharacters"></textarea>

                                                    <span class="help-block small">Max <span
                                                            id="character-count3">@{{ remainingCount3 }}</span> characters</span>

                                                    <button class="order-reservation-button"
                                                            @click.prevent="confirmBooking">
                                                        Book
                                                    </button>

                                                    <div class="row allergy-row">
                                                        <p class="allergy-info-title"> Things to know before you go</p>
                                                        <p class="allergy-information">{{$restaurant->things_to_know}}</p>
                                                    </div>

                                                    <div class="row contact-restaurant-row">
                                                        <p>Contact the Restaurant</p>
                                                        <div class="contact-icons text-center">
                                                            <a href="tel:{{$restaurant->phone}}"><img
                                                                    src="{{asset('img/Phone-b.png')}}"></a>
                                                            <a target="_blank"
                                                               href="https://maps.google.com/?q={{$restaurant->query_address}}"><img
                                                                    src="{{asset('img/Map-b.png')}}"></a>
                                                            <a href="mailto:{{$restaurant->email}}"><img
                                                                    src="{{asset('img/Mail-b.png')}}"></a>
                                                        </div>
                                                    <!--<div class="contact-icons text-center">
                                                        <div class="col-md-4"><a href=""><img src="{{asset('img/Phone-b.png')}}"></a> </div>
                                                        <div class="col-md-4"><a href=""><img src="{{asset('img/Map-b.png')}}"></a> </div>
                                                        <div class="col-md-4"><a href=""><img src="{{asset('img/Mail-b.png')}}"></a> </div>
                                                    </div>-->
                                                        <p class="privacy">By booking you agree to the {{ $restaurant->name }} <span
                                                                class="privacy-high"> {{__('Privacy Policy')}}</span> and
                                                            acknowledge
                                                            our <span
                                                                class="privacy-high"> {{__('Terms & Conditions')}}</span>.
                                                        </p>
                                                    </div>
                                                </div>

                                                <div v-if="step==3">

                                                    <div class="row reservation-detail-box">
                                                        <div class="col-md-4 col-xs-4 text-center">
                                                            <img src="{{asset('img/Table.png')}}"><br>
                                                            <label>@{{ reservation_data.head_count }} People</label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 text-center">
                                                            <img src="{{asset('img/Calendar.png')}}"><br>
                                                            <label>@{{ reservation_data.date }}</label>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 text-center">
                                                            <img src="{{asset('img/Clock.png')}}"><br>
                                                            <label>@{{ reservation_data.time }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row confirmed-row">
                                                        <h3>Your booking has been Confirmed!</h3>
                                                        <p>Your Booking # is <span class="text-highlight"> @{{ reservation_data.id }} </span>
                                                        </p>
                                                    </div>
                                                    {{--                                                <div class="row my-booking-redirect">--}}
                                                    {{--                                                    <p>Visit <span class="text-highlight"> <a--}}
                                                    {{--                                                                :href="'{{route('user.reservations')}}?reservation_id='+reservation_data.id">My Bookings</a> </span>--}}
                                                    {{--                                                        to view--}}
                                                    {{--                                                        and manage your bookings.</p>--}}
                                                    {{--                                                </div>--}}

                                                    <div class="row allergy-row">
                                                        <p class="allergy-info-title"> Things to know before you go</p>
                                                        <p class="allergy-information">{{$restaurant->things_to_know}}</p>
                                                    </div>

                                                    <div class="row contact-restaurant-row">
                                                        <p>Contact the Restaurant</p>
                                                        <div class="contact-icons text-center">
                                                            <a href="tel:{{$restaurant->phone}}"><img
                                                                    src="{{asset('img/Phone-b.png')}}"></a>
                                                            <a target="_blank"
                                                               href="https://maps.google.com/?q={{$restaurant->query_address}}"><img
                                                                    src="{{asset('img/Map-b.png')}}"></a>
                                                            <a href="mailto:{{$restaurant->email}}"><img
                                                                    src="{{asset('img/Mail-b.png')}}"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </transition>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 pull-left subslider">
                        <div class="view-wrapper">

                            <div class="menu">
                                <ul class="sub-list">
                                    <li v-for="menu in menus"
                                        :class="{'active':menu.id==menu_id}">
                                        <a href="#"
                                           @click.prevent="setMenu(menu)">@{{
                                            menu.name }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="menu-items">
                                <div class="row menu-item-list">
                                    <div class="col-xs-12 menu-item col-md-4" v-for="menu_item in selected_menu_items">
                                        <div class="col-xs-12 image">
                                            <img v-if="menu_item.logo" :src="menu_item.logo" class="img-responsive">
                                            <img v-if="!menu_item.logo" src="{{asset('img/default.jpg')}}"
                                                 class="img-responsive">
                                            <button class="btn" @click="setFavourite(menu_item)">
                                                <i v-if="menu_item.favoured" class="fas fa-heart"></i>
                                                <i v-if="!menu_item.favoured" class="far fa-heart"></i>
                                            </button>
                                        </div>
                                        <h3 class="col-xs-12">
                                            @{{ menu_item.name }} <br v-if="!menu_item.variants.length">
                                        </h3>
                                        <div class="col-xs-12 description">
                                            @{{ menu_item.description }}
                                        </div>
                                        <div class="col-xs-12 details" v-if="menu_item.variants.length">
                                            <table class="table table-responsive table-borderless">
                                                <tr v-for="variant in menu_item.variants" class="variant">
                                                    <td>@{{ variant.name }}
                                                        -
                                                        ‎£

                                                        @{{ currency(variant.pivot.price) }}
                                                    </td>
                                                    <td>
                                                        <button class="btn" type="button"
                                                                @click.prevent="addVariant(menu_item,variant)">+
                                                        </button>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-xs-12 details" v-if="!menu_item.variants.length">
                                            <span>‎£ @{{ currency(menu_item.price) }}</span>
                                            <button class="btn pull-right" type="button"
                                                    @click.prevent="addToCart(menu_item,null)">+
                                            </button>
                                        </div>
                                    </div>
                                    {{--                                    new code--}}
                                    {{--                                    new code--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="addons-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Select Your Addons</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div>
                                    <table class="table table-responsive">
                                        <tr v-for="addon in addons">
                                            <td>
                                                <input type="checkbox" v-model="selected_addons" :value="addon.id">
                                            </td>
                                            <td>
                                                @{{ addon.name }}
                                            </td>
                                            <td>£ @{{
                                                currency(addon.pivot.price) }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-center">
                        {{--                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                        <button type="button" class="btn btn-primary" @click.prevent="addMenuItem(menu_item)">Add to
                            cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">

        var data = {
            menus:{!! json_encode($restaurant->menus) !!},
            selected_menu_items: [],
            style: 'list',
            reservation: false,
            delivery: false,
            takeaway: false,
            cart: {!! json_encode($cart) !!},
            total: 0,
            vat:{!! json_encode(getVat(),true) !!},
            sub_total: 0,
            requests: '{{$requests}}',
            cart_date: '{{$cart_date}}',
            cart_time: '{{$cart_time}}',
            restaurant:{!! json_encode($restaurant) !!},
            favoured: false,
            menu_id: 0,
            type: '{{$type}}',
            restaurant_id: '{{$restaurant_id}}',
            date: '{{\Carbon\Carbon::now()->toDateString()}}',
            time: '{{\Carbon\Carbon::now()->format('h:i A')}}',
            head_count: '',
            phone: '',
            email: '',
            reservation_validation: {},
            review_validation: {},
            step: 1,
            reservation_data: [],
            reservation_requests: '',
            rating: 5,
            review: '',
            sorted_reviews: [],
            sort: 'desc',
            variants: [],
            addons: [],
            menu_item: {},
            selected_addons: [],
            selected_variant: {},
            reservation_restaurant: {},
            reservation_settings: {},
            guest: false,
            remainingCount1: 255,
            remainingCount2: 255,
            remainingCount3: 255,
            loading: false
        };

        var restaurant = new Vue({
            el: '#restaurant',
            data: data,
            mounted: function () {

                if (this.restaurant.id != this.restaurant_id) {
                    this.cart = [];
                }

                if (this.type == 'delivery') {
                    this.setDeliveryItems(this.menus[0].menu_items);

                    this.menu_id = this.menus[0].id;

                    this.setMethod('delivery', false);
                } else if (this.type == 'takeaway') {
                    this.setTakeawayItems(this.menus[0].menu_items);

                    this.menu_id = this.menus[0].id;

                    this.setMethod('takeaway', false);
                } else if (this.type == 'reservation') {
                    this.setReservationItems(this.menus[0].menu_items);

                    this.menu_id = this.menus[0].id;

                    this.setMethod('reservation', false);
                } else {
                    this.setReservationItems(this.menus[0].menu_items);

                    this.menu_id = this.menus[0].id;

                    this.setMethod('reservation', false);
                }


                this.getTotals();

                if (this.restaurant.user) {
                    this.favoured = true;
                }

                this.sorted_reviews = this.restaurant.reviews;

                this.equalHeight();
                @if(auth()->check())
                    @if(auth()->user()->email== setting('guest_email_id'))
                    this.guest = true;
                @endif
                @endif
            },
            methods: {
                setMenu: function (menu) {
                    if (this.delivery) {
                        this.setDeliveryItems(menu.menu_items);
                    }
                    if (this.takeaway) {
                        this.setTakeawayItems(menu.menu_items);
                    }
                    if (this.reservation) {
                        this.setReservationItems(menu.menu_items);
                    }

                    if (menu.id == 0) {
                        this.menu_id = 0;
                    } else {
                        this.menu_id = menu.menu_items[0].menu_id;
                    }
                },
                setDeliveryItems: function (menu_items) {
                    this.selected_menu_items = menu_items.filter(function (menu_item) {
                        return menu_item.delivery;
                    });
                    this.equalHeight();
                },
                setTakeawayItems: function (menu_items) {
                    this.selected_menu_items = menu_items.filter(function (menu_item) {
                        return menu_item.takeaway;
                    });
                    this.equalHeight();
                },
                setReservationItems: function (menu_items) {
                    this.selected_menu_items = menu_items.filter(function (menu_item) {
                        return true;
                    });
                    this.equalHeight();
                },

                equalHeight: function () {
                    this.$nextTick(function () {
                        gridHeaderHeight();
                    });
                },

                setStyle: function (style) {
                    this.style = style;
                    if (style == 'grid') {
                        this.$nextTick(function () {
                            gridHeaderHeight();
                        })
                    }
                },
                setMethod: function (method, exception = false) {

                    if (this.cart.length && exception && method != 'reservation') {
                        var $this = this;

                        // $.confirm({
                        //     title: 'Confirm!',
                        //     content: 'This will clear your cart. Are you sure you want to do this?',
                        //     theme: 'error',
                        //     buttons: {
                        //         confirm: function () {
                        //             $this.cart = [];
                        //         },
                        //         cancel: function () {
                        //
                        //         },
                        //     }
                        // });


                    }

                    const menu = this.getCurrentMenu();

                    switch (method) {
                        case 'reservation':
                            this.reservation = true;
                            this.delivery = false;
                            this.takeaway = false;
                            this.setReservationItems(menu.menu_items);
                            break;
                        case 'delivery':
                            this.reservation = false;
                            this.delivery = true;
                            this.takeaway = false;
                            this.setDeliveryItems(menu.menu_items);
                            break;
                        case 'takeaway':
                            this.reservation = false;
                            this.delivery = false;
                            this.takeaway = true;
                            this.setTakeawayItems(menu.menu_items);
                            break;
                        default:
                            this.reservation = true;
                            this.delivery = false;
                            this.takeaway = false;
                            this.setTakeawayItems(menu.menu_items);
                            break;
                    }

                    this.sendAjax();
                },
                getCurrentMenu: function () {
                    const $this = this;
                    const menu = this.menus.filter(function (menu) {
                        return menu.id == $this.menu_id
                    });
                    return menu[0];
                },
                addToCart: function (menu_item, variant) {

                    this.selected_addons = [];

                    this.selected_variant = variant;

                    if (menu_item.addons.length) {

                        // this.variants = menu_item.variants;
                        this.addons = menu_item.addons;

                        // if (menu_item.variants.length) {
                        //     this.selected_variant = this.variants[0].id;
                        // }
                        this.menu_item = menu_item;

                        jQuery('#addons-modal').modal('show');

                        return false;
                    }

                    this.addMenuItem(menu_item)

                },

                addMenuItem: function (menu_item) {

                    var $this = this;

                    const selected_item = this.cart.filter(function (item) {
                        return item.id == menu_item.id;
                    });

                    if (selected_item.length) {
                        if (menu_item.variants.length) {
                            var $this = this;

                            menu_item.quantity = 1;

                            // menu_item.selected_variant = this.selected_variant;


                            var show_addons = [];

                            menu_item.addons.forEach(function (addon) {
                                $this.selected_addons.forEach(function (selected_addon) {
                                    if (addon.id == selected_addon) {
                                        show_addons.push(addon);
                                    }
                                });
                            });


                            var item = this.cart.push(Object.assign({}, menu_item));

                            if (this.selected_variant) {
                                this.cart[item - 1].show_variant = this.selected_variant;
                                this.cart[item - 1].selected_variant = this.selected_variant.id;
                            }

                            if (show_addons) {
                                this.cart[item - 1].selected_addons = this.selected_addons;
                                this.cart[item - 1].show_addons = show_addons;
                            }


                            this.selected_addons = [];

                            this.selected_variant = {};
                        } else {
                            selected_item[0].quantity++;
                            this.$forceUpdate();
                            this.selected_variant = {};
                            this.selected_addons = [];
                        }
                    } else {

                        var $this = this;

                        menu_item.quantity = 1;

                        // menu_item.selected_variant = this.selected_variant;


                        var show_addons = [];

                        menu_item.addons.forEach(function (addon) {
                            $this.selected_addons.forEach(function (selected_addon) {
                                if (addon.id == selected_addon) {
                                    show_addons.push(addon);
                                }
                            });
                        });


                        var item = this.cart.push(menu_item);

                        if (this.selected_variant) {
                            this.cart[item - 1].show_variant = this.selected_variant;
                            this.cart[item - 1].selected_variant = this.selected_variant.id;
                        }

                        if (show_addons) {
                            this.cart[item - 1].selected_addons = this.selected_addons;
                            this.cart[item - 1].show_addons = show_addons;
                        }


                        this.selected_addons = [];

                        this.selected_variant = {};
                    }


                    this.getTotals();
                    this.sendAjax();

                    jQuery('#addons-modal').modal('hide');

                },
                removeFromCart: function (menu_item) {
                    const selected_item = this.cart.filter(function (item) {
                        return item.id == menu_item.id
                    });

                    if (selected_item.length > 0) {
                        if (selected_item[0].quantity > 1) {
                            selected_item[0].quantity--;
                            this.$forceUpdate();
                        } else {
                            let $this = this;
                            this.cart.forEach(function (item, index) {
                                if (selected_item[0].id == item.id) {
                                    $this.cart.splice(index, 1);
                                }
                            });
                        }
                    }

                    this.getTotals();
                    this.sendAjax();
                },
                getTotals: function () {
                    this.total = 0;

                    this.sub_total = 0;

                    const $this = this;

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

                        $this.total += item.quantity * price;
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

                    this.vat_value = vat;
                },
                sendAjax: function () {
                    const cart = this.cart;

                    let restaurant_id = this.restaurant.id;

                    let cart_date = this.cart_date;
                    let cart_time = this.cart_time;

                    let type = 'takeaway';

                    if (this.delivery) {
                        type = 'delivery';
                    }

                    if (this.takeaway) {
                        type = 'takeaway';
                    }

                    if (this.reservation) {
                        type = 'reservation';
                    }


                    let requests = this.requests;

                    axios.post('{{route('cart.store')}}', {
                        _token: '{{csrf_token()}}',
                        cart: cart,
                        requests: requests,
                        type: type,
                        cart_date: cart_date,
                        cart_time: cart_time,
                        restaurant_id: restaurant_id,
                    })
                        .then(function (response) {
                            // console.log(response);
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
                checkout: function (url) {
                    this.loading = true;
                    this.sendAjax();
                    var cart_time = moment('{{\Carbon\Carbon::now()->toDateString()}} ' + this.cart_time);
                    var delivery_time = '{{$restaurant->delivery_minutes}}';
                    if (delivery_time == '') {
                        delivery_time = 0;
                    }
                    var now = moment('{{\Carbon\Carbon::now()->toDateTimeString()}}');
                    var future_time = now.add(delivery_time, 'minutes');

                    var cart_date = this.cart_date;

                    if (cart_date == '') {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please select a valid date',
                            theme: 'error'
                        });
                        // this.cart_time = now;
                        return false;
                    }

                    if (future_time.isAfter(cart_time)) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please select a time after ' + future_time.format('YYYY-MM-DD h:mm a'),
                            theme: 'error'
                        });
                        // this.cart_time = now;
                        return false;
                    }

                    if (this.delivery) {
                        var $this = this;
                        axios.post('{{route('user.restaurant.validate-order')}}', {
                            _token: '{{csrf_token()}}',
                            restaurant_id: '{{$restaurant->id}}',
                            postcode: '',
                            cart_time: $this.cart_time,
                            cart_date: $this.cart_date,
                        })
                            .then(function (response) {
                                if (response.data.message == 'success') {
                                    window.location.href = url;
                                } else {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Error occurred. Please try again',
                                        theme: 'error'
                                    });
                                    return false;
                                }
                                $this.loading = false;
                            })
                            .catch(function (error) {
                                $this.loading = false;
                                if (error.response.status == 400) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: error.response.data.message,
                                        theme: 'error'
                                    });
                                    return false;
                                }
                                if (error.response.status == 419) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Please login to continue',
                                        theme: 'error'
                                    });
                                    return false;
                                }

                                if (error.response.status == 402) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: error.response.data.message,
                                        theme: 'error'
                                    });
                                    window.location.href = '{{route('user.address',['delivery'=>true])}}'
                                    return false;
                                }
                                if (error.response.status == 401) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Please login to continue!',
                                        theme: 'error'
                                    });
                                    return false;
                                }
                            });

                    } else if (this.takeaway) {
                        var $this = this;
                        axios.post('{{route('user.restaurant.validate-takeaway-order')}}', {
                            _token: '{{csrf_token()}}',
                            restaurant_id: '{{$restaurant->id}}',
                            cart_time: $this.cart_time,
                            cart_date: $this.cart_date,
                        })
                            .then(function (response) {
                                if (response.data.message == 'success') {
                                    window.location.href = url;
                                } else {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Error occurred. Please try again',
                                        theme: 'error'
                                    });
                                    return false;
                                }
                                $this.loading = false;
                            })
                            .catch(function (error) {
                                $this.loading = false;
                                if (error.response.status == 400) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: error.response.data.message,
                                        theme: 'error'
                                    });
                                    return false;
                                }


                                if (error.response.status == 419) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Please login to continue',
                                        theme: 'error'
                                    });
                                    return false;
                                }
                                if (error.response.status == 401) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Please login to continute!',
                                        theme: 'error'
                                    });
                                    return false;
                                }
                            });

                    } else {
                        window.location.href = url;
                    }
                },
                {{--setFavourite: function (restaurant_id) {--}}
                    {{--    const $this = this;--}}
                    {{--    axios.post('{{route('user.favourite')}}', {--}}
                    {{--        _token: '{{csrf_token()}}',--}}
                    {{--        restaurant_id: restaurant_id--}}
                    {{--    })--}}
                    {{--        .then(function (response) {--}}
                    {{--            $this.favoured = response.data.status == 'added';--}}
                    {{--            $.alert({title: 'Success!', content: response.data.message, theme: 'success'});--}}
                    {{--        })--}}
                    {{--        .catch(function (error) {--}}
                    {{--            if (error.response.status == 401) {--}}
                    {{--                $.alert({--}}
                    {{--                    title: '{{__('Oh Sorry!')}}',--}}
                    {{--                    content: 'Please Login to Continue!',--}}
                    {{--                    theme: 'error'--}}
                    {{--                });--}}
                    {{--            }--}}
                    {{--        });--}}
                    {{--}, --}}
                setFavourite: function (menu_item) {
                    const $this = this;
                    axios.post('{{route('user.favourite-menu-item')}}', {
                        _token: '{{csrf_token()}}',
                        menu_item_id: menu_item.id
                    })
                        .then(function (response) {
                            menu_item.favoured = response.data.status == 'added';
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
                },
                createBooking: function () {

                    var time = moment('{{\Carbon\Carbon::now()->toDateString()}} ' + this.time);
                    var delivery_time = '{{$restaurant->delivery_minutes}}';

                    var now = moment('{{\Carbon\Carbon::now()->toDateTimeString()}}');
                    var future_time = now.subtract(1, 'minutes');

                    var cart_date = this.date;

                    if (cart_date == '') {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please select a valid date',
                            theme: 'error'
                        });
                        // this.cart_time = now;
                        return false;
                    }

                    if (future_time.isAfter(time)) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please select a time after ' + future_time.format('YYYY-MM-DD h:mm a'),
                            theme: 'error'
                        });
                        // this.cart_time = now;
                        return false;
                    }

                    const $this = this;
                    axios.post('{{route('reservation.store')}}', {
                        _token: '{{csrf_token()}}',
                        restaurant_id: $this.restaurant.id,
                        head_count: $this.head_count,
                        phone: $this.phone,
                        email: $this.email,
                        date: $this.date,
                        time: $this.time
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.reservation_data = response.data.data.reservation;
                                $this.reservation_restaurant = response.data.data.restaurant;
                                $this.reservation_settings = response.data.data.setting;
                                $this.step = 2;
                            } else {
                                $.alert({title: '{{__('Oh Sorry!')}}', content: 'Save Failed!', theme: 'error'});
                            }
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                $this.reservation_validation = error.response.data.errors;
                            }

                            if (error.response.status == 401) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please Login to Continue!',
                                    theme: 'error'
                                });
                            }
                            if (error.response.status == 400) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: error.response.data.message,
                                    theme: 'error'
                                });
                            }

                        });
                },
                confirmBooking: function () {
                    const $this = this;
                    axios.post('{{route('reservation.index')}}/' + $this.reservation_data.id, {
                        _token: '{{csrf_token()}}',
                        _method: 'put',
                        requests: $this.reservation_requests,
                        confirmed: true
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.step = 3;

                                setTimeout(function () {
                                    window.location.href = '{{route('reservation.thank.you')}}';
                                }, 1000);

                            } else {
                                $.alert({title: '{{__('Oh Sorry!')}}', content: 'Confirm Failed!', theme: 'error'});
                            }
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                $this.reservation_validation = error.response.data.errors;
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
                addVariant: function (menu_item, variant) {

                    // menu_item.selected_variant = variant.id;
                    //
                    // var show_variant = variant;
                    //
                    // if (show_variant) {
                    //     menu_item.show_variant = show_variant;
                    // }
                    //
                    this.addToCart(menu_item, variant);
                },
                countRemainingCharacters: function () {
                    this.remainingCount1 = 255 - this.requests.length;
                    this.remainingCount2 = 255 - this.requests.length;
                    this.remainingCount3 = 255 - this.reservation_requests.length;
                },
                preventKeyDown: function (event) {
                    event.preventDefault();
                }
            },
        });

        jQuery('#media-slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            centerMode: true,
            arrows: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                    }
                },
            ]
        });

        jQuery('.sub-list').slick({
            dots: false,
            infinite: false,
            speed: 300,
            slidesToShow: 4,
            centerMode: false,
            arrows: true,
            variableWidth: true,
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 4,
                    }
                },
            ]
        });

        window.addEventListener('load', function () {
            jQuery('input[type=radio]').change(function () {
                // console.log('New star rating: ' + this.value);
            });
        });

        function gridHeaderHeight() {
            var elements = document.querySelectorAll('.menu-item h3');

            var max_height = 0;

            elements.forEach(function (element) {
                if (element.clientHeight > max_height) {
                    max_height = element.clientHeight;
                }
            });

            elements.forEach(function (element) {
                element.style.height = max_height + 'px';
            });

            var description_elements = document.querySelectorAll('.menu-item .description');

            var description_max_height = 0;

            description_elements.forEach(function (description_element) {
                if (description_element.clientHeight > description_max_height) {
                    description_max_height = description_element.clientHeight;
                }
            });

            description_elements.forEach(function (description_element) {
                description_element.style.height = description_max_height + 'px';
            });
        }

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
    <style type="text/css">
        @media (max-width: 992px) {
            .subslider {
                float: none !important;
            }
        }
    </style>
@endsection
