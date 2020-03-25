@extends('layouts.master-admin')

@section('content')
    <div id="orders">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav stats-nav">
                    <ul class="nav nav-tabs">
                        <li>
                            <select class="form-control" name="type" id="type" v-model="type">
                                <option value="">All</option>
                                <option value="delivery">Delivery</option>
                                <option value="takeaway">Takeaway</option>
                                <option value="reservation">Reservation</option>
                            </select>
                        </li>
                        <li>
                            <select class="form-control" name="restaurant" id="restaurant" v-model="restaurant">
                                <option value="0">All</option>
                                @foreach($restaurants as $restaurant)
                                    <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
                                @endforeach
                            </select>
                        </li>
                        <li style="">
                            <date-picker id="from_date" v-model="from_date" placehoder="Select From Date"
                                         class="form-control"></date-picker>
                        </li>
                        <li style="">
                            <date-picker id="to_date" v-model="to_date" placehoder="Select To Date"
                                         class="form-control"></date-picker>
                        </li>
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active table-responsive">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Order Type</th>
                                    <th>Restaurant</th>
                                    <th>Customer</th>
                                    <th>Order Status</th>
                                    <th>Restaurant Status</th>
                                    <th>Delivery Charge</th>
                                    <th>Vat</th>
                                    <th>Total</th>
                                    <th>{{__('Details')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="order in orders">
                                    <td>
                                        <span v-if="order.type=='delivery'">Delivery</span>
                                        <span v-if="order.type=='takeaway'">Takeaway</span>
                                        <span v-if="order.type=='reservation'">Reservation</span>
                                    </td>
                                    <td>@{{ order.restaurant.name }}</td>
                                    <td>@{{ order.user.first_name }} @{{ order.user.last_name }}</td>
                                    <td>
                                        <label class="label label-default" v-if="order.type=='reservation'">N/A</label>
                                        <label class="label label-info"
                                               v-if="order.type=='delivery'&&order.delivery_status=='initiated'">Initiated</label>
                                        <label class="label label-warning"
                                               v-if="order.type=='delivery'&&order.delivery_status=='dispatched'">Dispatched</label>
                                        <label class="label label-success"
                                               v-if="order.type=='delivery'&&order.delivery_status=='delivered'">Delivered</label>
                                        <label class="label label-info"
                                               v-if="order.type=='takeaway'&&order.takeaway_status=='initiated'">Initiated</label>
                                        <label class="label label-warning"
                                               v-if="order.type=='takeaway'&&order.takeaway_status=='dispatched'">Dispatched</label>
                                        <label class="label label-success"
                                               v-if="order.type=='takeaway'&&order.takeaway_status=='collected'">Collected</label>
                                    </td>
                                    <td>
                                        <label class="label label-danger" v-if="order.restaurant_status=='declined'">Declined</label>
                                        <label class="label label-warning" v-if="order.restaurant_status=='pending'">Pending</label>
                                        <label class="label label-success" v-if="order.restaurant_status=='accepted'">Accepted</label>
                                    </td>
                                    <td>
                                        <span
                                            v-if="order.type=='delivery'">‎£ @{{ currency(order.delivery_charge) }}</span>
                                        <span v-if="order.type!='delivery'">N/A</span>
                                    </td>
                                    <td>
                                        <span
                                            v-if="order.type!='reservation'">‎£ @{{ currency(order.vat) }}</span>
                                        <span v-if="order.type=='reservation'">N/A</span>
                                    </td>

                                    <td>
                                        <span
                                            v-if="order.type!='reservation'">‎£ @{{ currency(order.total) }}</span>
                                        <span v-if="order.type=='reservation'">N/A</span>
                                    </td>
                                    <td>
                                        <button @click.prevent="moreDetails(order.id,order.type)"
                                                class="btn btn-success"><i class="fa fa-book"></i></button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="order-details" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Order Details</h4>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-xs-12 order-details">
                                <div class="row details-block" v-if="order.type!='reservation'">
                                    <div class="col-xs-12 header">
                                        Menu Items:
                                    </div>
                                    <div class="col-xs-12 content">
                                        <table class="table table-responsive">
                                            <tr v-for="item in order.items">
                                                <td>@{{ item.menuItem.name }}</td>
                                                <td>‎(£ @{{ currency(item.menuItem.price) }})</td>
                                                <td>X @{{ item.quantity }}</td>
                                                <td class="text-right"><i class="fa fa-arrow-right"></i></td>
                                                <td class="text-right">‎£ @{{
                                                    currency(item.menuItem.price*item.quantity) }}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row details-block" v-if="order.type!='reservation'">
                                    <div class="col-xs-12 header">
                                        Payment Method:
                                    </div>
                                    <div class="col-xs-12 content" v-if="order.payment">
                                        <span v-if="order.payment.type=='cash'">Cash on Delivery</span>
                                        <span v-if="order.payment.type=='ticket'">Restaurant Ticket</span>
                                        <span v-if="order.payment.type=='card'">Card Payment</span>
                                        <span v-if="order.payment.type=='Paypal'">Paypal Payment</span>
                                        <br>
                                        <span
                                            v-if="order.payment.type=='card'">
                                            <span>
                                                <p class="padding">XXXX XXXX XXXX @{{
                                                    order.payment.payment.payment_method_details.card.last4 }}</p>
                                                <p class="padding">@{{ order.payment.payment.payment_method_details.card.brand }} -
                                                    Exp: @{{ order.payment.payment.payment_method_details.card.exp_month}}/@{{
                                                    order.payment.payment.payment_method_details.card.exp_year}} </p>
                                            </span>
                                        </span>
                                        <span
                                            v-if="order.payment.type=='paypal'">
                                            <span>
                                                <p class="padding">Payment ID: @{{
                                                    order.payment.payment }}</p>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script type="text/javascript">
        var data = {
            orders: [],
            order: {},
            type: '',
            restaurant: 0,
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{\Carbon\Carbon::now()->addDay()->toDateString()}}',
        };

        var orders = new Vue({
            data: data,
            el: '#orders',
            mounted: function () {
                this.getOrders();
            },
            methods: {
                getOrders: function () {
                    var $this = this;
                    axios.post('{{route('master-admin.order.get')}}', {
                        _token: '{{csrf_token()}}',
                        from_date: $this.from_date,
                        to_date: $this.to_date,
                        type: $this.type,
                        restaurant: $this.restaurant,
                    }).then(function (response) {
                        $this.orders = response.data.orders;
                        $this.$nextTick(function () {
                            tableColumnWidths();
                        });
                    }).catch(function (error) {
                        console.log(error);
                    })
                },
                currency: function (price) {
                    const formatter = new Intl.NumberFormat('en-US', {
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });

                    return formatter.format(price);
                },
                moreDetails: function (id, type) {
                    var selected_order = this.orders.filter(function (order) {
                        return order.type == type && order.id == id;
                    })[0];

                    this.order = selected_order;

                    jQuery('#order-details').modal('show');
                }
            },
            watch: {
                type: function () {
                    this.getOrders();
                },
                from_date: function () {
                    this.getOrders();
                },
                to_date: function () {
                    this.getOrders();
                },
                restaurant: function () {
                    this.getOrders();
                }
            }
        })
    </script>
@endsection
