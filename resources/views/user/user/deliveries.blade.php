@extends('layouts.app')

@section('content')

    <section class="confirm-address" id="deliveries">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="delivery-method">
                        <div class="col-sm-3">
                            @include('includes.user-header',['active'=>'orders'])
                        </div>
                        <div class="col-sm-9">
                            @include('includes.user-order-header',['active'=>'delivery'])
                            <div class="row reservations-section">
                                <div class="col-md-7">
                                    <div v-for="delivery in deliveries">
                                        <div class="row reservations-row">
                                            <div class="col-md-7">
                                                <h3>@{{ delivery.restaurant.name }}</h3>
                                                <p>No. of Items: @{{ delivery.delivery_items.length }} </p>
                                                <p>Booking #: @{{ delivery.id }}</p>
                                            </div>
                                            <div class="col-md-5" style="padding: 0 15px 0 0;">
                                                <div class="contact-icons">
                                                    <a href="#" @click.prevent="openTicket(delivery.ticket,delivery)">
                                                        <img src="{{asset('img/Feedback.png')}}">
                                                    </a>
                                                    <a :href="'tel:'+delivery.restaurant.phone"> <img
                                                            src="{{asset('img/Phone.png')}}"></a>
                                                    <a :href="'mailto:'+delivery.restaurant.email"> <img
                                                            src="{{asset('img/Mail.png')}}"></a>
                                                </div>
                                                <div class="reservation-time text-right">
                                                    <a href="#" @click.prevent="details(delivery)">
                                                        <p>@{{ delivery.time }} <img
                                                                src="{{asset('img/back-arrow.png')}}">
                                                        </p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="yellow-hr">
                                    </div>

                                    {{ $paginate->links() }}
                                </div>
                                <div class="col-md-5">
                                    <div class="order-summary-box my-account-summary-box" v-if="delivery.id">
                                        <div class="row">
                                            <h3>Order Summary </h3>

                                            <div class="row order-item-row"
                                                 v-for="delivery_item in delivery.delivery_items"
                                                 v-if="delivery_item.menu_item">
                                                <div class="col-md-8 col-xs-8 item-title"> @{{
                                                    delivery_item.menu_item.name }} (x@{{
                                                    delivery_item.quantity }})
                                                    <span v-if="delivery_item.variant"><br><sub>@{{ delivery_item.variant.variant.name }}</sub></span>
                                                    <span v-if="delivery_item.addon_menu_items">
                                                                <span
                                                                    v-for="addon in delivery_item.addon_menu_items">
                                                                    <br><sub>@{{ addon.addon.name }}</sub>
                                                                </span>
                                                            </span>
                                                    <span
                                                        v-if="delivery.menu_item_id&&delivery.menu_item_id==delivery_item.menu_item_id"><br><sub>@{{ delivery.menu_item.promo_code }}</sub></span>

                                                </div>
                                                <div class="col-md-4 col-xs-4 item-price">£@{{
                                                    currency(delivery_item.menu_item.price)
                                                    }}
                                                    <span v-if="delivery_item.variant"><br><sub>£ @{{ currency(delivery_item.variant.price) }}</sub></span>
                                                    <span v-if="delivery_item.addon_menu_items">
                                                                <span
                                                                    v-for="addon in delivery_item.addon_menu_items">
                                                                    <br><sub>£ @{{ currency(addon.price) }}</sub>
                                                                </span>
                                                            </span>
                                                    <span
                                                        v-if="delivery.menu_item_id&&delivery.menu_item_id==delivery_item.menu_item_id"><br><sub>@{{ currency(delivery.reduction) }}</sub></span>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row order-item-subtotal-row">
                                                <div class="col-md-8 col-xs-8 item-sub-total">Subtotal</div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(total) }}</div>
                                            </div>

                                            <div class="row order-item-subtotal-row" v-if="delivery.vat">
                                                <div class="col-md-8 col-xs-8 item-sub-total"> V.A.T</div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(delivery.vat)
                                                    }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row">
                                                <div class="col-md-8 col-xs-8 item-sub-total">{{__("Delivery")}}</div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{
                                                    currency(delivery.delivery_charge) }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row"
                                                 v-if="delivery.promotion_id||delivery.site_promotion_id">
                                                <div class="col-md-8 col-xs-8 item-sub-total">Promocode</div>
                                                <div class="col-md-4 col-xs-4 item-price"> - £@{{
                                                    currency(delivery.reduction) }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row"
                                                 v-if="delivery.restaurant_discount">
                                                <div class="col-md-8 col-xs-8 item-sub-total">@{{
                                                    delivery.restaurant.name }} Discount
                                                </div>
                                                <div class="col-md-4 col-xs-4 item-price"> - £@{{
                                                    currency(delivery.restaurant_discount)
                                                    }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row"
                                                 v-if="delivery.site_discount">
                                                <div class="col-md-8 col-xs-8 item-sub-total">India Discount
                                                </div>
                                                <div class="col-md-4 col-xs-4 item-price"> - £@{{
                                                    currency(delivery.site_discount) }}
                                                </div>
                                            </div>

                                            <div class="row order-item-total-row">
                                                <div class="col-md-6 col-xs-6 item-total">Total</div>
                                                <div class="col-md-6 col-xs-6 item-price item-total"> £@{{
                                                    currency(delivery.total) }}
                                                </div>
                                            </div>
                                            <div class="row order-item-subtotal-row" v-if="!delivery.vat">
                                                <div class="col-md-12 col-xs-12 item-price">(VAT already inclusive)</div>
                                            </div>
                                            <hr>
                                            <div class="row order-status-row">
                                                <div class="col-md-5 col-xs-5  order-status">Order Status</div>
                                                <div class="col-md-7 col-xs-7 order-status order-status-time"
                                                     style="text-align:right;">

                                    <span v-if="delivery.restaurant_status=='declined'"
                                          class="text-danger">Declined</span>
                                                    <span v-if="delivery.restaurant_status=='pending'"
                                                          class="text-warning">Pending</span>
                                                    <span v-if="delivery.restaurant_status=='accepted'"
                                                          class="text-success">Accepted</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="row progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         :style="'width:'+delivery.progress+'%'">
                                                        70%
                                                    </div>
                                                </div>
                                                <p class="progress-label col-md-4 col-xs-4">Initiated</p>
                                                <p class="progress-label col-md-4 col-xs-4 text-center">Dispatched</p>
                                                <p class="progress-label col-md-4 col-xs-4 text-right">Delivered</p>
                                            </div>
                                            <div class="row allergy-row">
                                                <p class="allergy-info-title"> Instructions For Rider</p>
                                                <p class="allergy-information">@{{ delivery.instructions }}</p>
                                            </div>
                                            <div class="row allergy-row">
                                                <p class="allergy-info-title"> Special Requets</p>
                                                <p class="allergy-information">@{{ delivery.requests}}</p>
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
        <div class="modal fade review-response-modal" id="review-response-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Support Ticket #@{{ ticket.id }}</h4>
                        <hr>
                        <div class="row" v-if="ticket.date">
                            <div class="col-md-4 col-xs-4">
                                <p>Date:</p>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <p class="detail">@{{ ticket.date }}</p>
                            </div>
                        </div>

                        <div class="row" v-if="ticket.message">
                            <div class="col-md-4 col-xs-4">
                                <p>Comment</p>
                            </div>
                            <div class="col-md-8 col-xs-8">
                                <p class="detail">@{{ ticket.message }}</p>
                            </div>
                        </div>

                        <div class="row" v-if="ticket.messages">
                            <div class="col-md-12 col-xs-4">
                                <p>Messages</p>
                            </div>
                            <div class="col-md-12 col-xs-8">

                                <div class="detail" v-for="message in ticket.messages" style="margin-bottom: 10px;">
                                    <label class="label label-primary" v-if="message.restaurant_id"
                                           style="margin-right: 10px;">@{{ delivery.restaurant.name
                                        }}: </label>
                                    <label class="label label-info" v-if="message.user_id"
                                           style="margin-right: 10px;">You: </label>
                                    @{{ message.message }}
                                    <small style="font-size: 9px" class="badge badge-success">(@{{ message.date

                                        }})
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p>Your query: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="" placeholder="Enter comment" rows="6" id="message"
                                          v-model="user_message" maxlength="255" @keyup="countCharacters"></textarea>
                                <span class="help-block small">Max <span
                                        id="character-count">@{{characterCount}}</span> characters</span>

                            </div>
                        </div>
                        <input type="submit" name="" style="margin-top: 20px;color: white;background: #db6d14;"
                               value="Submit" @click.prevent="saveMessage"
                               v-if="!ticket.resolved">

                        <span v-if="ticket.resolved">Resolved</span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script type="text/javascript">
        const data = {
            deliveries:{!! json_encode($deliveries) !!},
            delivery: [],
            total: 0,
            ticket: {user: {}},
            user_message: '',
            vat:{!! json_encode(getVat(),true) !!},
            vat_value: 0,
            characterCount: 255,
        };

        const deliveries = new Vue({
            data: data,
            el: '#deliveries',
            mounted: function () {
                @if(request()->delivery_id)
                    this.delivery = this.deliveries.filter(function (delivery) {
                    return delivery.id == '{{request()->delivery_id}}'
                })[0];
                this.getTotals();
                @endif
            },
            methods: {
                details: function (delivery) {
                    this.delivery = delivery;
                    this.getTotals();
                },
                currency: function (price) {
                    const formatter = new Intl.NumberFormat('en-US', {
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });

                    return formatter.format(price)

                },
                getTotals: function () {
                    let total = 0;

                    var vat = 0;

                    var $this = this;


                    this.delivery.delivery_items.forEach(function (delivery_item) {

                        if (delivery_item.menu_item) {
                            var price = delivery_item.menu_item.price;
                            if (delivery_item.variant) {
                                price = delivery_item.variant.price;
                            }

                            if (delivery_item.addon_menu_items) {
                                delivery_item.addon_menu_items.forEach(function (addon) {
                                    total += parseFloat(addon.price);
                                });
                            }

                            total += delivery_item.quantity * price;

                            var vat_percentage = 0;

                            switch (delivery_item.menu_item.vat_category) {
                                case 'food':
                                    vat_percentage = $this.vat.food;
                                    break;
                                case 'alcohol':
                                    vat_percentage = $this.vat.alcohol;
                                    break;
                            }

                            vat += price * vat_percentage * delivery_item.quantity;


                        }


                    });

                    this.vat_value = vat;
                    this.total = total;
                },
                openTicket: function (ticket, delivery) {
                    if (ticket) {
                        this.ticket = ticket;
                    } else {
                        this.ticket = {user: {}};
                    }
                    this.delivery = delivery;
                    jQuery('#review-response-modal').modal('show');
                },
                saveMessage: function () {

                    if (this.ticket.resolved) {
                        $.alert({title: 'Error!', content: 'This ticket is already resolved!', theme: 'error'});
                    }

                    let $this = this;
                    axios.post('{{route('ticket.user.message')}}', {
                        _token: '{{csrf_token()}}',
                        message: $this.user_message,
                        ticket_id: $this.ticket.id,
                        resolved: $this.ticket.resolved,
                        delivery_id: $this.delivery.id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                if (response.data.data.ticket_message) {
                                    $this.delivery.ticket = response.data.data.ticket;
                                    $this.ticket = $this.delivery.ticket;
                                    // $this.ticket.messages.push(response.data.data.ticket_message);
                                }
                                $this.restaurant_message = '';
                                jQuery('#review-response-modal').modal('hide');
                                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                countCharacters: function () {
                    this.characterCount = 255 - this.user_message.length;
                }
            }
        })
    </script>

@endsection
