@extends('layouts.admin')

@section('content')
    <div id="deliveries">
        <section>
            <div class="container">
                <div class="row res-admin">
                    <div class="col-md-2 col-sm-3 res-admin-side">
                        @include('includes.admin-side-bar',['active'=>'delivery'])
                    </div>
                    <div class="col-md-10 col-sm-9" style="background-color: #E5E5E5">
                        <div class="filter-greybox">
                            <div class="select-box">
                                <date-picker id="date_from" placeholder="Date From:" @input="filter"
                                             v-model="date_from"></date-picker>

                                <date-picker id="date_to" placeholder="Date To:" @input="filter"
                                             v-model="date_to"></date-picker>

                                <div class="sort">{{__('Sort by:')}}
                                    <select @change.prevent="sort($event)" v-model="sort_value">
                                        <option value="pending">Pending First</option>
                                        <option value="accepted">Accepted First</option>
                                        <option value="declined">Declined First</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div style="display: none">
                            <table class="table table-responsive summery-table">
                                <tr>
                                    <td>@{{ deliveries.length }} Orders Received</td>
                                    <td>Total of £ @{{ currency(total) }} orders</td>
                                    <td>@{{ accepted }} Accepted</td>
                                    <td>@{{ pending }} Pending</td>
                                    <td>@{{ declined }} Declined</td>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail-box" v-for="delivery in deliveries">
                            <a href="#" id="myBtn" @click.prevent="loadDelivery(delivery.id)">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4 col-xs-12">
                                        <div class="order-name">
                                            <h4>@{{delivery.user.first_name}} @{{delivery.user.last_name}}
                                                {{--<span class="star-admin"> <svg width="27" height="26"--}}
                                                {{--viewBox="0 0 27 26" fill="none"--}}
                                                {{--xmlns="http://www.w3.org/2000/svg"><path--}}
                                                {{--d="M26.0241 9.92805L17.4034 8.01472L13.012 0L8.62073 8.0218L0 9.92805L5.9023 16.7948L4.97142 26L13.012 22.2229L21.0527 26L20.1218 16.7948L26.0241 9.92805Z"--}}
                                                {{--fill="#F2C94C"/></svg> </span>--}}
                                            </h4>
                                            <p>
                                                @{{ delivery.address }}, @{{ delivery.street}}, @{{ delivery.city}}, @{{
                                                delivery.county}} @{{ delivery.postcode}} <br>Order #: @{{ delivery.id
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="order-price paid">
                                            <h3>@{{ delivery.total }} £</h3>
                                            <p>
                                                <span v-if="delivery.payment.type=='cash'">Cash on Delivery</span>
                                                <span v-if="delivery.payment.type=='ticket'">Restaurant Ticket</span>
                                                <span v-if="delivery.payment.type=='card'">Paid - Card</span>
                                                <span v-if="delivery.payment.type=='paypal'">Paid - Paypal</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <div class="order-status">
                                            <p style="text-transform: capitalize">@{{ delivery.delivery_status }}</p>
                                            <p>@{{ delivery.display_time }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="border-right:  4px solid #F2F2F2;">
                                        <div class="order-date"><p>@{{ delivery.date }}</p></div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="or-ad-status confirm">
                                            <h3>
                                                <span class="text-warning"
                                                      v-if="delivery.restaurant_status =='pending'">
                                                    @{{ delivery.restaurant_status }}
                                                </span>
                                                <span class="text-success"
                                                      v-if="delivery.restaurant_status =='accepted'">
                                                    @{{ delivery.restaurant_status }}
                                                </span>
                                                <span class="text-danger"
                                                      v-if="delivery.restaurant_status =='declined'">
                                                    @{{ delivery.restaurant_status }}
                                                </span>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="pagination">
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <li>
                                        <a href="#" aria-label="Previous"
                                           @click.prevent="jumpToPage(pagination.first_page)">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li v-for="page in pagination.last_page"
                                        :class="getCurrentPage(page)"><a href="#" @click.prevent="jumpToPage(page)">@{{
                                            page }}</a>
                                    </li>
                                    <li>
                                        <a href="#" aria-label="Next" @click.prevent="jumpToPage(pagination.last_page)">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade view-order-modal" id="confirm-order" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h3>Manage Delivery #: @{{ delivery.id }}
                            <span class="printer">
                                <a href="#" onclick="PrintElem('print-element')" style="padding-top: 36px;

vertical-align: middle;">
                                <img src="{{asset('admin/img/printer.svg')}}">
                            </a>
                            </span>
                            <button class="update-order-modal-btn" @click.prevent="updateStatus(delivery)">Update
                                Order
                            </button>
                        </h3>
                        <hr>
                        <div class="row" id="print-element">
                            <div class="col-md-7">
                                <div class="row" style="margin-bottom: 30px;">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Name</h4>
                                        <p>@{{ delivery.user.first_name }} @{{ delivery.user.last_name }} </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Delivery Date & Time</h4>
                                        <p>@{{ delivery.date }} @{{ delivery.display_time }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12" v-if="delivery.user.phone">
                                        <h4>Contact Number</h4>
                                        <p>@{{ delivery.user.phone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12"
                                         v-if="!delivery.user.phone&&delivery.phone">
                                        <h4>Contact Number</h4>
                                        <p>@{{ delivery.phone }}</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12" v-if="delivery.email">
                                        <h4>Email</h4>
                                        <p>@{{ delivery.email }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Delivery Address</h4>
                                        <p>
                                            @{{ delivery.address }}, @{{ delivery.street}}, @{{ delivery.city}}, @{{
                                            delivery.county}} @{{ delivery.postcode}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Rider Instructions</h4>
                                        <p>@{{ delivery.instructions }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Special Requests</h4>
                                        <p>@{{ delivery.requests }}</p>
                                    </div>

                                </div>

                                <hr>
                                <div class="order-status-modal" v-if="delivery.restaurant_status!='declined'"
                                     id="order-buttons">
                                    <div class="row order-status-modal-first"
                                         v-if="delivery.restaurant_status=='pending'">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Accept Order</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button id="btn1" class="order-accept-btn"
                                                    @click.prevent="acceptOrder(delivery)">Accept
                                            </button>
                                            <button id="btn2" class="order-cancel-btn"
                                                    @click.prevent="declineOrder(delivery)">Decline
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Preparing Order</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="container-checkbox">
                                                <input type="checkbox"
                                                       :checked="delivery.delivery_status=='initiated'"
                                                       @change.prevent="setDeliveryStatus(delivery,'initiated')">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Order Dispatched</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="container-checkbox">
                                                <input type="checkbox"
                                                       :checked="delivery.delivery_status=='dispatched'"
                                                       @change.prevent="setDeliveryStatus(delivery,'dispatched')">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Order Delivered</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="container-checkbox">
                                                <input type="checkbox"
                                                       :checked="delivery.delivery_status=='delivered'"
                                                       @change.prevent="setDeliveryStatus(delivery,'delivered')">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-status-modal" v-if="delivery.restaurant_status=='declined'">
                                    <label class="label-danger col-form-label-lg text-lg-center">
                                        This order has been declined/cancelled
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5" style="border-left:  1px solid #BDBDBD;">
                                <div class="row order-item-modal" v-for="item in delivery.items" v-if="item.menu_item">
                                    <div class="col-md-7 col-xs-12">
                                        <h4>@{{ item.menu_item.name }} (x@{{ item.quantity }})
                                            <span
                                                v-if="item.variant"><br><sub>@{{ item.variant.variant.name }}</sub></span>
                                            <span v-if="item.delivery_item_addons">
                                                                <span v-for="addon in item.delivery_item_addons">
                                                                    <br><sub>@{{ addon.addon.name }}</sub>
                                                                </span>
                                                            </span>
                                            <span
                                                v-if="delivery.menu_item_id&&delivery.menu_item_id==item.menu_item_id"><br><sub>@{{ delivery.menu_item.promo_code }}</sub></span>
                                        </h4>
                                    </div>
                                    <div class="col-md-5 col-xs-12"><p><span v-if="!item.variant">£@{{ currency(item.menu_item.price*item.quantity)}}</span>
                                            <span
                                                v-if="item.variant"><br><sub>£ @{{ currency(item.variant.price) }}</sub></span>
                                            <span v-if="item.delivery_item_addons">
                                                                <span v-for="addon in item.delivery_item_addons">
                                                                    <br><sub>£ @{{ currency(addon.price) }}</sub>
                                                                </span>
                                                            </span>
                                            <span
                                                v-if="delivery.menu_item_id&&delivery.menu_item_id==item.menu_item_id"><br><sub>@{{ currency(delivery.reduction) }}</sub></span>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row sub-total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Subtotal</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ delivery.subtotal }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>V. A. T.</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ currency(delivery.vat) }}</p>
                                    </div>
                                </div>

                                <div class="row sub-total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>{{__("Delivery")}}</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ delivery.delivery_charge }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal"
                                     v-if="delivery.promotion_id||delivery.site_promotion_id">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Promocode</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ currency(delivery.reduction) }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal"
                                     v-if="delivery.restaurant_discount">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>@{{ delivery.restaurant.name }} Discount</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ currency(delivery.restaurant_discount) }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal"
                                     v-if="delivery.site_disocunt">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Discount</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ delivery.site_discount }}</p>
                                    </div>
                                </div>

                                <div class="row total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5 style="text-align: right;">£@{{ delivery.total }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 payment-status">
                                        <h3>Order Payment Status</h3>
                                    </div>
                                </div>
                                <div class="row"
                                     v-if="delivery.payment&&delivery.payment.type=='card'">
                                    <div class="col-md-12">
                                        <p class="padding">XXXX XXXX XXXX @{{
                                            delivery.payment.payment.payment_method_details.card.last4 }}</p>
                                        <p class="padding">@{{
                                            delivery.payment.payment.payment_method_details.card.brand }} -
                                            Exp: @{{
                                            delivery.payment.payment.payment_method_details.card.exp_month}}/@{{
                                            delivery.payment.payment.payment_method_details.card.exp_year}} </p>
                                    </div>
                                </div>
                                <div class="row"
                                     v-if="delivery.payment&&delivery.payment.type=='card'">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p class="padding">Card Payment</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p class="pull-right">Paid</p>
                                    </div>
                                </div>
                                <div class="row" v-if="delivery.payment&&delivery.payment.type=='cash'">
                                    <div class="col-md-12">
                                        <p class="padding">Cash on Delivery</p>
                                        <p class="padding">Phone: @{{ delivery.phone }}</p>
                                    </div>
                                </div>
                                <div class="row" v-if="delivery.payment&&delivery.payment.type=='ticket'">
                                    <div class="col-md-12">
                                        <p class="padding">Restaurant Ticket</p>
                                    </div>
                                </div>
                                <div class="row" v-if="delivery.payment&&delivery.payment.type=='paypal'">
                                    <div class="col-md-12">
                                        <p class="padding">Paypal</p>
                                        <p class="padding">Payment ID: @{{ delivery.payment.payment }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        var data = {
            date_from: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            date_to: '{{\Carbon\Carbon::now()->addMonth()->toDateString()}}',
            deliveries: [],
            delivery: {user: {}, menu_items: [], items: []},
            sort_value: 'pending',
            vat:{!! json_encode(getVat(),true) !!},
            vat_value: 0,
            total: 0,
            accepted: 0,
            pending: 0,
            declined: 0,
            id:{!! json_encode($id) !!},
            pagination: {}
        };

        var deliveries = new Vue({
            el: '#deliveries',
            data: data,
            mounted: function () {
                this.getData();
                var $this = this;
                if (this.id) {
                    this.loadDelivery(this.id);
                }
            },
            methods: {
                getData: function (page = '') {
                    var page_url = '';
                    if (page) {
                        page_url = '?page=' + page;
                    }
                    this.total = 0;
                    this.accepted = 0;
                    this.declined = 0;
                    this.pending = 0;
                    const $this = this;
                    axios.post('{{route('admin.delivery.get')}}' + page_url, {
                        _token: '{{csrf_token()}}',
                        date_from: $this.date_from,
                        date_to: $this.date_to,
                        sort: $this.sort_value
                    })
                        .then(function (response) {
                            $this.deliveries = response.data.data.deliveries.data;
                            $this.pagination = {
                                current_page: response.data.data.deliveries.current_page,
                                from: response.data.data.deliveries.from,
                                last_page: response.data.data.deliveries.last_page,
                                path: response.data.data.deliveries.path,
                                per_page: response.data.data.deliveries.per_page,
                                to: response.data.data.deliveries.to,
                                total: response.data.data.deliveries.total,
                            };
                            // $this.sortAll($this.sort_value);
                            $this.deliveries.forEach(function (delivery) {
                                $this.total += parseFloat(delivery.total);
                                if (delivery.restaurant_status == 'pending') {
                                    $this.pending++;
                                }
                                if (delivery.restaurant_status == 'accepted') {
                                    $this.accepted++;
                                }
                                if (delivery.restaurant_status == 'declined') {
                                    $this.declined++;
                                }
                            })
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                jumpToPage: function (page) {
                    this.getData(page);
                },
                filter: function () {
                    this.getData();
                },
                loadDelivery: function (delivery_id) {
                    var page_url = '?page=' + this.pagination.current_page;
                    const $this = this;
                    axios.post('{{route('admin.delivery.get')}}' + page_url, {
                        _token: '{{csrf_token()}}',
                        date_from: $this.date_from,
                        date_to: $this.date_to,
                        sort: $this.sort_value
                    })
                        .then(function (response) {
                            $this.deliveries = response.data.data.deliveries.data;
                            let selected_delivery = $this.deliveries.filter(function (delivery) {
                                return delivery.id == delivery_id;
                            });

                            $this.delivery = selected_delivery[0];

                            jQuery('#new-order').modal('hide');

                            var vat = 0;

                            $this.delivery.items.forEach(function (item) {
                                var vat_percentage = 0;

                                switch (item.menu_item.vat_category) {
                                    case 'food':
                                        vat_percentage = $this.vat.food;
                                        break;
                                    case 'alcohol':
                                        vat_percentage = $this.vat.alcohol;
                                        break;
                                }

                                vat += item.menu_item.price * vat_percentage * item.quantity;
                            });

                            $this.vat_value = vat;

                            jQuery('#confirm-order').modal('show');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                acceptOrder: function (delivery) {
                    delivery.restaurant_status = 'accepted';
                    // let update = this.updateDelivery(delivery);
                },
                declineOrder: function (delivery) {
                    delivery.restaurant_status = 'declined';
                    // let update = this.updateDelivery(delivery);

                },
                setDeliveryStatus: function (delivery, status) {
                    delivery.delivery_status = status;
                },
                updateStatus: function (delivery) {
                    this.updateDelivery(delivery);
                    jQuery('#confirm-order').modal('hide');
                },
                updateDelivery: function (delivery) {
                    const $this = this;
                    axios.put('{{route('admin.delivery.index')}}/' + delivery.id, {
                        _token: '{{csrf_token()}}',
                        delivery: delivery,
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $this.getData();
                                return true;
                            } else {
                                return false;
                            }
                        })
                        .catch(function (error) {
                            return false;
                        });
                },
                sortAll: function (value) {
                    var sorted_deliveries = [];

                    var unsorted_deliveries = [];

                    var temp_deliveries = [];

                    this.deliveries.forEach(function (delivery) {
                        if (value == delivery.restaurant_status) {
                            sorted_deliveries.push(delivery);
                        } else {
                            unsorted_deliveries.push(delivery);
                        }
                    });

                    sorted_deliveries.forEach(function (sorted_delivery) {
                        temp_deliveries.push(sorted_delivery);
                    });

                    unsorted_deliveries.forEach(function (unsorted_delivery) {
                        temp_deliveries.push(unsorted_delivery);
                    });

                    this.deliveries = temp_deliveries;
                },
                sort: function (event) {
                    this.getData();
                },
                currency: function (price) {
                    const formatter = new Intl.NumberFormat('en-US', {
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });

                    return formatter.format(price)

                },
                getCurrentPage: function (page) {
                    if (page == this.pagination.current_page) {
                        return 'active';
                    } else {
                        return '';
                    }
                }

            }
        });


    </script>

    <script type="text/javascript">
        function PrintElem(elem) {
            var mywindow = window.open('', 'PRINT', 'height=600,width=800');

            var element = document.getElementById(elem);


            mywindow.document.write('<html><head><title>' + document.title + '</title>');
            mywindow.document.write("<link href='{{asset('admin/css/bootstrap.min.css')}}' rel='stylesheet' type='text/css' />"); // your css file comes here.
            mywindow.document.write("<link href='{{asset('admin/css/style.css')}}' rel='stylesheet' type='text/css' />"); // your css file comes here.
            mywindow.document.write("<link href='{{asset('admin/css/font-family.css')}}' rel='stylesheet' type='text/css' />"); // your css file comes here.
            mywindow.document.write('</head><body id="print-element">');
            mywindow.document.write('<h1>' + document.title + '</h1>');
            mywindow.document.write(element.innerHTML);

            var delete_element = mywindow.document.getElementById('order-buttons');

            mywindow.document.querySelector('hr').remove();

            delete_element.parentNode.removeChild(delete_element);

            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            setTimeout(function () {
                mywindow.print();
            }, 50);

            setTimeout(function () {
                mywindow.close();
            }, 1050);

            return true;
        }
    </script>

@endsection
