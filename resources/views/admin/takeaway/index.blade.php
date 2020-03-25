@extends('layouts.admin')

@section('content')
    <div id="takeaways">
        <section>
            <div class="container">
                <div class="row res-admin">
                    <div class="col-md-2 col-sm-3 res-admin-side">
                        @include('includes.admin-side-bar',['active'=>'takeaway'])
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
                                    <td>@{{ takeaways.length }} Orders Received</td>
                                    <td>Total of £ @{{ currency(total) }} orders</td>
                                    <td>@{{ accepted }} Accepted</td>
                                    <td>@{{ pending }} Pending</td>
                                    <td>@{{ declined }} Declined</td>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail-box" v-for="takeaway in takeaways">
                            <a href="#" id="myBtn" @click.prevent="loadTakeaway(takeaway.id)">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4 col-xs-12">
                                        <div class="order-name">
                                            <h4>@{{takeaway.user.first_name}} @{{takeaway.user.last_name}}
                                                {{--<span class="star-admin"> <svg width="27" height="26"--}}
                                                {{--viewBox="0 0 27 26" fill="none"--}}
                                                {{--xmlns="http://www.w3.org/2000/svg"><path--}}
                                                {{--d="M26.0241 9.92805L17.4034 8.01472L13.012 0L8.62073 8.0218L0 9.92805L5.9023 16.7948L4.97142 26L13.012 22.2229L21.0527 26L20.1218 16.7948L26.0241 9.92805Z"--}}
                                                {{--fill="#F2C94C"/></svg> </span>--}}
                                            </h4>
                                            <p>
                                                Order #: @{{ takeaway.id
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="order-price paid">
                                            <h3>@{{ takeaway.total }} £</h3>
                                            <p>
                                                <span v-if="takeaway.payment.type=='cash'">Cash</span>
                                                <span v-if="takeaway.payment.type=='ticket'">Restaurant Ticket</span>
                                                <span v-if="takeaway.payment.type=='card'">Paid - Card</span>
                                                <span v-if="takeaway.payment.type=='paypal'">Paid - Paypal</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <div class="order-status">
                                            <p style="text-transform: capitalize">@{{ takeaway.takeaway_status }}</p>
                                            <p>@{{ takeaway.display_time }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="border-right:  4px solid #F2F2F2;">
                                        <div class="order-date"><p>@{{ takeaway.date }}</p></div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="or-ad-status confirm">
                                            <h3>
                                                <span class="text-warning"
                                                      v-if="takeaway.restaurant_status =='pending'">
                                                    @{{ takeaway.restaurant_status }}
                                                </span>
                                                <span class="text-success"
                                                      v-if="takeaway.restaurant_status =='accepted'">
                                                    @{{ takeaway.restaurant_status }}
                                                </span>
                                                <span class="text-danger"
                                                      v-if="takeaway.restaurant_status =='declined'">
                                                    @{{ takeaway.restaurant_status }}
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
                        <h3>Manage Takeaway #: @{{ takeaway.id }}
                            <span class="printer">
                                <a href="#" onclick="PrintElem('print-element')" style="padding-top: 36px;

vertical-align: middle;">
                                <img src="{{asset('admin/img/printer.svg')}}">
                            </a>
                            </span>
                            <button class="update-order-modal-btn" @click.prevent="updateStatus(takeaway)">Update
                                Order
                            </button>
                        </h3>
                        <hr>
                        <div class="row" id="print-element">
                            <div class="col-md-7">
                                <div class="row" style="margin-bottom: 30px;">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Name</h4>
                                        <p>@{{ takeaway.user.first_name }} @{{ takeaway.user.last_name }} </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Takeaway Date & Time</h4>
                                        <p>@{{ takeaway.date }} @{{ takeaway.display_time }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12" v-if="takeaway.user.phone">
                                        <h4>Contact Number</h4>
                                        <p>@{{ takeaway.user.phone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12"
                                         v-if="!takeaway.user.phone&&takeaway.phone">
                                        <h4>Contact Number</h4>
                                        <p>@{{ takeaway.phone }}</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12" v-if="takeaway.email">
                                        <h4>Email</h4>
                                        <p>@{{ takeaway.email }}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Rider Instructions</h4>
                                        <p>@{{ takeaway.requests}}</p>
                                    </div>
                                </div>

                                <hr>
                                <div class="order-status-modal" v-if="takeaway.restaurant_status!='declined'"
                                     id="order-buttons">
                                    <div class="row order-status-modal-first"
                                         v-if="takeaway.restaurant_status=='pending'">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Accept Order</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button id="btn1" class="order-accept-btn"
                                                    @click.prevent="acceptOrder(takeaway)">Accept
                                            </button>
                                            <button id="btn2" class="order-cancel-btn"
                                                    @click.prevent="declineOrder(takeaway)">Decline
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
                                                       :checked="takeaway.takeaway_status=='initiated'"
                                                       @change.prevent="setTakeawayStatus(takeaway,'initiated')">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Order Ready</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="container-checkbox">
                                                <input type="checkbox"
                                                       :checked="takeaway.takeaway_status=='dispatched'"
                                                       @change.prevent="setTakeawayStatus(takeaway,'dispatched')">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Order Picked Up</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="container-checkbox">
                                                <input type="checkbox"
                                                       :checked="takeaway.takeaway_status=='collected'"
                                                       @change.prevent="setTakeawayStatus(takeaway,'collected')">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-status-modal" v-if="takeaway.restaurant_status=='declined'">
                                    <label class="label-danger col-form-label-lg text-lg-center">
                                        This order has been declined/cancelled
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-5" style="border-left:  1px solid #BDBDBD;">
                                <div class="row order-item-modal" v-for="item in takeaway.items">
                                    <div class="col-md-7 col-xs-12">
                                        <h4>@{{ item.menu_item.name }} (x@{{ item.quantity }})
                                            <span
                                                v-if="item.variant"><br><sub>@{{ item.variant.variant.name }}</sub></span>
                                            <span v-if="item.takeaway_item_addons">
                                                                <span v-for="addon in item.takeaway_item_addons">
                                                                    <br><sub>@{{ addon.addon.name }}</sub>
                                                                </span>
                                                            </span>
                                            <span
                                                v-if="takeaway.menu_item_id&&takeaway.menu_item_id==item.menu_item_id"><br><sub>@{{ takeaway.menu_item.promo_code }}</sub></span>
                                        </h4>
                                    </div>
                                    <div class="col-md-5 col-xs-12"><p><span v-if="!item.variant">£@{{ currency(item.menu_item.price*item.quantity)
                                                }}</span>
                                            <span
                                                v-if="item.variant"><br><sub>£ @{{ currency(item.variant.price) }}</sub></span>
                                            <span v-if="item.takeaway_item_addons">
                                                                <span v-for="addon in item.takeaway_item_addons">
                                                                    <br><sub>£ @{{ currency(addon.price) }}</sub>
                                                                </span>
                                                            </span>
                                            <span
                                                v-if="takeaway.menu_item_id&&takeaway.menu_item_id==item.menu_item_id"><br><sub>@{{ currency(takeaway.reduction) }}</sub></span>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row sub-total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Subtotal</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ takeaway.subtotal }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>V. A. T.</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ currency(takeaway.vat) }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal"
                                     v-if="takeaway.promotion_id||takeaway.site_promotion_id">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Promocode</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ takeaway.reduction }}</p>
                                    </div>
                                </div>

                                <div class="row sub-total-modal"
                                     v-if="takeaway.restaurant_discount">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>@{{ takeaway.restaurant.name }} Discount</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ takeaway.restaurant_discount }}</p>
                                    </div>
                                </div>
                                <div class="row sub-total-modal"
                                     v-if="takeaway.site_disocunt">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Discount</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p>£@{{ takeaway.site_discount }}</p>
                                    </div>
                                </div>

                                <div class="row total-modal">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h5 style="text-align: right;">£@{{ takeaway.total }}</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 payment-status">
                                        <h3>Order Payment Status</h3>
                                    </div>
                                </div>
                                <div class="row"
                                     v-if="takeaway.payment&&takeaway.payment.type=='card'">
                                    <div class="col-md-12">
                                        <p class="padding">XXXX XXXX XXXX @{{
                                            takeaway.payment.payment.payment_method_details.card.last4 }}</p>
                                        <p class="padding">@{{
                                            takeaway.payment.payment.payment_method_details.card.brand }} -
                                            Exp: @{{
                                            takeaway.payment.payment.payment_method_details.card.exp_month}}/@{{
                                            takeaway.payment.payment.payment_method_details.card.exp_year}} </p>
                                    </div>
                                </div>
                                <div class="row"
                                     v-if="takeaway.payment&&takeaway.payment.type=='card'">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p class="padding">Card Payment</p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <p class="pull-right">Paid</p>
                                    </div>
                                </div>
                                <div class="row" v-if="takeaway.payment&&takeaway.payment.type=='cash'">
                                    <div class="col-md-12">
                                        <p class="padding">Cash</p>
                                        <p class="padding">Phone: @{{ takeaway.phone }}</p>
                                    </div>
                                </div>
                                <div class="row" v-if="takeaway.payment&&takeaway.payment.type=='ticket'">
                                    <div class="col-md-12">
                                        <p class="padding">Restaurant Ticket</p>
                                    </div>
                                </div>
                                <div class="row" v-if="takeaway.payment&&takeaway.payment.type=='paypal'">
                                    <div class="col-md-12">
                                        <p class="padding">Paypal</p>
                                        <p class="padding">Payment ID: @{{ takeaway.payment.payment }}</p>
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
            takeaways: [],
            takeaway: {user: {}, menu_items: []},
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

        var takeaways = new Vue({
            el: '#takeaways',
            data: data,
            mounted: function () {
                this.getData();
                var $this = this;
                if (this.id) {
                    this.loadTakeaway(this.id);
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
                    axios.post('{{route('admin.takeaway.get')}}' + page_url, {
                        _token: '{{csrf_token()}}',
                        date_from: $this.date_from,
                        date_to: $this.date_to,
                        sort: $this.sort_value
                    })
                        .then(function (response) {
                            $this.takeaways = response.data.data.takeaways.data;
                            $this.pagination = {
                                current_page: response.data.data.takeaways.current_page,
                                from: response.data.data.takeaways.from,
                                last_page: response.data.data.takeaways.last_page,
                                path: response.data.data.takeaways.path,
                                per_page: response.data.data.takeaways.per_page,
                                to: response.data.data.takeaways.to,
                                total: response.data.data.takeaways.total,
                            };
                            // $this.sortAll($this.sort_value);
                            $this.takeaways.forEach(function (takeaway) {
                                $this.total += parseFloat(takeaway.total);
                                if (takeaway.restaurant_status == 'pending') {
                                    $this.pending++;
                                }
                                if (takeaway.restaurant_status == 'accepted') {
                                    $this.accepted++;
                                }
                                if (takeaway.restaurant_status == 'declined') {
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
                loadTakeaway: function (takeaway_id) {
                    var page_url = '?page=' + this.pagination.current_page;
                    const $this = this;
                    axios.post('{{route('admin.takeaway.get')}}' + page_url, {
                        _token: '{{csrf_token()}}',
                        date_from: $this.date_from,
                        date_to: $this.date_to,
                        sort: $this.sort_value
                    })
                        .then(function (response) {
                            $this.takeaways = response.data.data.takeaways.data;
                            let selected_takeaway = $this.takeaways.filter(function (takeaway) {
                                return takeaway.id == takeaway_id;
                            });

                            $this.takeaway = selected_takeaway[0];

                            jQuery('#new-order').modal('hide');

                            var vat = 0;

                            $this.takeaway.items.forEach(function (item) {
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
                acceptOrder: function (takeaway) {
                    takeaway.restaurant_status = 'accepted';
                    // let update = this.updateTakeaway(takeaway);
                },
                declineOrder: function (takeaway) {
                    takeaway.restaurant_status = 'declined';
                    // let update = this.updateTakeaway(takeaway);

                },
                setTakeawayStatus: function (takeaway, status) {
                    takeaway.takeaway_status = status;
                },
                updateStatus: function (takeaway) {
                    this.updateTakeaway(takeaway);
                    jQuery('#confirm-order').modal('hide');
                },
                updateTakeaway: function (takeaway) {
                    const $this = this;
                    axios.put('{{route('admin.takeaway.index')}}/' + takeaway.id, {
                        _token: '{{csrf_token()}}',
                        takeaway: takeaway,
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
                    var sorted_takeaways = [];

                    var unsorted_takeaways = [];

                    var temp_takeaways = [];

                    this.takeaways.forEach(function (takeaway) {
                        if (value == takeaway.restaurant_status) {
                            sorted_takeaways.push(takeaway);
                        } else {
                            unsorted_takeaways.push(takeaway);
                        }
                    });

                    sorted_takeaways.forEach(function (sorted_takeaway) {
                        temp_takeaways.push(sorted_takeaway);
                    });

                    unsorted_takeaways.forEach(function (unsorted_takeaway) {
                        temp_takeaways.push(unsorted_takeaway);
                    });

                    this.takeaways = temp_takeaways;
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
