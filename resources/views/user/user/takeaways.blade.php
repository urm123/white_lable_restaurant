@extends('layouts.app')

@section('content')

    <section class="confirm-address" id="takeaways">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="delivery-method">
                        <div class="col-sm-3">
                            @include('includes.user-header',['active'=>'orders'])
                        </div>
                        <div class="col-sm-9">
                            @include('includes.user-order-header',['active'=>'takeaway'])
                            <div class="row reservations-section">
                                <div class="col-md-7">
                                    <div v-for="takeaway in takeaways">
                                        <div class="row reservations-row">
                                            <div class="col-md-7">
                                                <h3>@{{ takeaway.restaurant.name }}</h3>
                                                <p>No. of Items: @{{ takeaway.takeaway_items.length }} </p>
                                                <p>Booking #: @{{ takeaway.id }}</p>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="contact-icons">
                                                    <a href="#" @click.prevent="openTicket(takeaway.ticket,takeaway)">
                                                        <img src="{{asset('img/Feedback.png')}}">
                                                    </a>
                                                    <a :href="'tel:'+takeaway.restaurant.phone"> <img
                                                            src="{{asset('img/Phone.png')}}"></a>
                                                    <a :href="'mailto:'+takeaway.restaurant.email"> <img
                                                            src="{{asset('img/Mail.png')}}"></a>
                                                </div>
                                                <div class="reservation-time">
                                                    <a href="#" @click.prevent="details(takeaway)">
                                                        <p>@{{ takeaway.time }} <img
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
                                    <div class="order-summary-box my-account-summary-box" v-if="takeaway.id">
                                        <div class="row">
                                            <h3>Order Summary </h3>

                                            <div class="row order-item-row"
                                                 v-for="takeaway_item in takeaway.takeaway_items"
                                                 v-if="takeaway_item.menu_item">
                                                <div class="col-md-8 col-xs-8 item-title"> @{{
                                                    takeaway_item.menu_item.name }} (x@{{
                                                    takeaway_item.quantity }})
                                                    <span v-if="takeaway_item.variant"><br><sub>@{{ takeaway_item.variant.name }}</sub></span>
                                                    <span v-if="takeaway_item.takeaway_item_addons">
                                                                <span
                                                                    v-for="addon in takeaway_item.takeaway_item_addons">
                                                                    <br><sub>@{{ addon.addon.name }}</sub>
                                                                </span>
                                                            </span>
                                                    <span
                                                        v-if="takeaway.menu_item_id&&takeaway.menu_item_id==takeaway_item.menu_item_id"><br><sub>@{{ takeaway.menu_item.promo_code }}</sub></span>

                                                </div>
                                                <div class="col-md-4 col-xs-4 item-price">£@{{
                                                    currency(takeaway_item.menu_item.price)
                                                    }}
                                                    <span v-if="takeaway_item.variant"><br><sub>£ @{{ currency(takeaway_item.variant.price) }}</sub></span>
                                                    <span v-if="takeaway_item.takeaway_item_addons">
                                                                <span
                                                                    v-for="addon in takeaway_item.takeaway_item_addons">
                                                                    <br><sub>£ @{{ currency(addon.addon.price) }}</sub>
                                                                </span>
                                                            </span>
                                                    <span
                                                        v-if="takeaway.menu_item_id&&takeaway.menu_item_id==takeaway_item.menu_item_id"><br><sub>@{{ currency(takeaway.reduction) }}</sub></span>
                                                </div>
                                            </div>

                                            <hr>
                                            <div class="row order-item-subtotal-row">
                                                <div class="col-md-8 col-xs-8 item-sub-total">Subtotal</div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(total) }}</div>
                                            </div>

                                            <div class="row order-item-subtotal-row" v-if="takeaway.vat">
                                                <div class="col-md-8 col-xs-8 item-sub-total"> V.A.T</div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{ currency(takeaway.vat)
                                                    }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row"
                                                 v-if="takeaway.promotion_id||takeaway.site_promotion_id">
                                                <div class="col-md-8 col-xs-8 item-sub-total">Promocode</div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{
                                                    currency(takeaway.reduction) }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row"
                                                 v-if="takeaway.restaurant_discount">
                                                <div class="col-md-8 col-xs-8 item-sub-total">@{{
                                                    takeaway.restaurant.name }} Discount
                                                </div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{
                                                    currency(takeaway.restaurant_discount)
                                                    }}
                                                </div>
                                            </div>

                                            <div class="row order-item-subtotal-row"
                                                 v-if="takeaway.site_discount">
                                                <div class="col-md-8 col-xs-8 item-sub-total">Discount
                                                </div>
                                                <div class="col-md-4 col-xs-4 item-price"> £@{{
                                                    currency(takeaway.site_discount) }}
                                                </div>
                                            </div>

                                            <div class="row order-item-total-row">
                                                <div class="col-md-6 col-xs-6 item-total">Total</div>
                                                <div class="col-md-6 col-xs-6 item-price item-total"> £@{{
                                                    currency(takeaway.total) }}
                                                </div>
                                            </div>
                                            <div class="row order-item-subtotal-row" v-if="!takeaway.vat">
                                                <div class="col-md-12 col-xs-12 item-price">(VAT already inclusive)</div>
                                            </div>
                                            <hr>
                                            <div class="row order-status-row">
                                                <div class="col-md-5 col-xs-5  order-status">Order Status</div>
                                                <div class="col-md-7 col-xs-7 order-status order-status-time"
                                                     style="text-align:right;">

                                    <span v-if="takeaway.restaurant_status=='declined'"
                                          class="text-danger">Declined</span>
                                                    <span v-if="takeaway.restaurant_status=='pending'"
                                                          class="text-warning">Pending</span>
                                                    <span v-if="takeaway.restaurant_status=='accepted'"
                                                          class="text-success">Accepted</span>
                                                </div>
                                            </div>
                                            <div class="">
                                                <div class="row progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         :style="'width:'+takeaway.progress+'%'">
                                                        70%
                                                    </div>
                                                </div>
                                                <p class="progress-label col-md-4 col-xs-4">Initiated</p>
                                                <p class="progress-label col-md-4 col-xs-4 text-center">Dispatched</p>
                                                <p class="progress-label col-md-4 col-xs-4 text-right">Collected</p>
                                            </div>
                                            <div class="row allergy-row">
                                                <p class="allergy-info-title"> Special Requets</p>
                                                <p class="allergy-information">@{{ takeaway.requests}}</p>
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
                                           style="margin-right: 10px;">@{{ takeaway.restaurant.name
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
                                <textarea class="" placeholder="Enter comment" rows="6" maxlength="255"
                                          v-model="user_message"></textarea>
                                <script type="text/javascript">
                                    let remainingCount = 255;
                                    document.getElementById('message').addEventListener('keyup', function (event) {
                                        remainingCount = 255 - event.target.value.length;
                                        document.getElementById('character-count').innerHTML = remainingCount;
                                    });
                                </script>
                                <span class="help-block small">Max <span
                                        id="character-count">255</span> characters</span>

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
            takeaways:{!! json_encode($takeaways) !!},
            takeaway: [],
            total: 0,
            ticket: {user: {}},
            user_message: '',
            vat:{!! json_encode(getVat(),true) !!},
            vat_value: 0,
        };

        const takeaways = new Vue({
            data: data,
            el: '#takeaways',
            mounted: function () {
                @if(request()->takeaway_id)
                    this.takeaway = this.takeaways.filter(function (takeaway) {
                    return takeaway.id == '{{request()->takeaway_id}}'
                })[0];
                this.getTotals();
                @endif
            },
            methods: {
                details: function (takeaway) {
                    this.takeaway = takeaway;
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

                    this.takeaway.takeaway_items.forEach(function (takeaway_item) {

                        if (takeaway_item.menu_item) {
                            var price = takeaway_item.menu_item.price;
                            if (takeaway_item.variant) {
                                price = takeaway_item.variant.price;
                            }

                            if (takeaway_item.takeaway_item_addons) {
                                takeaway_item.takeaway_item_addons.forEach(function (addon) {
                                    total += parseFloat(addon.addon.price);
                                });
                            }

                            total += takeaway_item.quantity * price;

                            var vat_percentage = 0;

                            switch (takeaway_item.menu_item.vat_category) {
                                case 'food':
                                    vat_percentage = $this.vat.food;
                                    break;
                                case 'alcohol':
                                    vat_percentage = $this.vat.alcohol;
                                    break;
                            }

                            vat += price * vat_percentage * takeaway_item.quantity;
                        }
                    });
                    this.vat_value = vat;
                    this.total = total;
                },
                openTicket: function (ticket, takeaway) {
                    if (ticket) {
                        this.ticket = ticket;
                    } else {
                        this.ticket = {user: {}};
                    }
                    this.takeaway = takeaway;
                    jQuery('#review-response-modal').modal('show');
                },
                saveMessage: function () {
                    let $this = this;
                    axios.post('{{route('ticket.user.message')}}', {
                        _token: '{{csrf_token()}}',
                        message: $this.user_message,
                        ticket_id: $this.ticket.id,
                        resolved: $this.ticket.resolved,
                        takeaway_id: $this.takeaway.id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                if (response.data.data.ticket_message) {
                                    $this.takeaway.ticket = response.data.data.ticket;
                                    $this.ticket = $this.takeaway.ticket;
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
                }
            }
        })
    </script>

@endsection
