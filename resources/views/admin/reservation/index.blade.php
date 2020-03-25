@extends('layouts.admin')

@section('content')
    <div id="reservations">
        <section>
            <div class="container">
                <div class="row res-admin">
                    <div class="col-md-2 col-sm-3 res-admin-side">
                        @include('includes.admin-side-bar',['active'=>'reservation'])
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
                        <div style="display: none;">
                            <table class="table table-responsive summery-table">
                                <tr>
                                    <td>@{{ reservations.length }} Bookings Received</td>
                                    <td>@{{ accepted }} Accepted</td>
                                    <td>@{{ pending }} Pending</td>
                                    <td>@{{ declined }} Declined</td>
                                </tr>
                            </table>
                        </div>
                        <div class="order-detail-box" v-for="reservation in reservations">
                            <a href="#" id="myBtn" @click.prevent="loadReservation(reservation.id)">
                                <div class="row">
                                    <div class="col-md-5 col-sm-4 col-xs-12">
                                        <div class="order-name">
                                            <h4>@{{reservation.user.first_name}} @{{reservation.user.last_name}}
                                                {{--<span class="star-admin"> <svg width="27" height="26"--}}
                                                {{--viewBox="0 0 27 26" fill="none"--}}
                                                {{--xmlns="http://www.w3.org/2000/svg"><path--}}
                                                {{--d="M26.0241 9.92805L17.4034 8.01472L13.012 0L8.62073 8.0218L0 9.92805L5.9023 16.7948L4.97142 26L13.012 22.2229L21.0527 26L20.1218 16.7948L26.0241 9.92805Z"--}}
                                                {{--fill="#F2C94C"/></svg> </span>--}}
                                            </h4>
                                            <p>
                                                Reservation #: @{{
                                                reservation.id
                                                }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-1 col-sm-2 col-xs-12">
                                        <div class="order-status">
                                            <p>@{{ reservation.display_time }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-sm-2 col-xs-12" style="border-right:  4px solid #F2F2F2;">
                                        <div class="order-date"><p>@{{ reservation.date }}</p></div>
                                    </div>

                                    <div class="col-md-2 col-sm-2 col-xs-12">
                                        <div class="or-ad-status confirm">
                                            <h3>
                                                <span class="text-warning"
                                                      v-if="reservation.restaurant_status =='pending'">
                                                    @{{ reservation.restaurant_status }}
                                                </span>
                                                <span class="text-success"
                                                      v-if="reservation.restaurant_status =='accepted'">
                                                    @{{ reservation.restaurant_status }}
                                                </span>
                                                <span class="text-danger"
                                                      v-if="reservation.restaurant_status =='declined'">
                                                    @{{ reservation.restaurant_status }}
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
                        <h3>Manage Reservation #: @{{ reservation.id }} <span class="printer">
                                  <a href="#" onclick="PrintElem('print-element')" style="padding-top: 36px;

vertical-align: middle;">
                                <img src="{{asset('admin/img/printer.svg')}}">
                            </a>
                            </span>
                            {{--                            <button class="update-order-modal-btn" @click.prevent="updateStatus(reservation)">Update--}}
                            {{--                                Order--}}
                            {{--                            </button>--}}
                        </h3>
                        <hr>
                        <div class="row" id="print-element">
                            <div class="col-md-12">
                                <div class="row" style="margin-bottom: 30px;">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Name</h4>
                                        <p>@{{ reservation.user.first_name }} @{{ reservation.user.last_name }} </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Reservation Date & Time</h4>
                                        <p>@{{ reservation.date }} @{{ reservation.display_time }}</p>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 30px;">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Number of People</h4>
                                        <p>@{{ reservation.head_count }} </p>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Special Requests</h4>
                                        <p>@{{ reservation.requests }}</p>
                                    </div>
                                </div>
                                <div class="row" v-if="reservation.user.phone">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <h4>Contact Number</h4>
                                        <p>@{{ reservation.user.phone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12"
                                         v-if="!reservation.user.phone&&reservation.phone">
                                        <h4>Contact Number</h4>
                                        <p>@{{ reservation.phone }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12" v-if="reservation.email">
                                        <h4>Email</h4>
                                        <p>@{{ reservation.email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="order-status-modal" v-if="reservation.restaurant_status!='declined'"
                                     id="order-buttons">
                                    <div class="row order-status-modal-first"
                                         v-if="reservation.restaurant_status=='pending'">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <h3>Accept Booking</h3>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button id="btn1" class="order-accept-btn"
                                                    @click.prevent="acceptOrder(reservation)">Accept
                                            </button>
                                            <button id="btn2" class="order-cancel-btn"
                                                    @click.prevent="declineOrder(reservation)">Decline
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-status-modal" v-if="reservation.restaurant_status=='declined'">
                                    <label class="label-danger col-form-label-lg text-lg-center">
                                        This order has been declined/cancelled
                                    </label>
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
            reservations: [],
            reservation: {user: {}, menu_items: []},
            sort_value: 'pending',
            accepted: 0,
            pending: 0,
            declined: 0,
            id:{!! json_encode($id) !!},
            pagination: {}
        };

        var reservations = new Vue({
            el: '#reservations',
            data: data,
            mounted: function () {
                this.getData();
                var $this = this;
                if (this.id) {
                    this.loadReservation(this.id);
                }
            },
            methods: {
                getData: function (page = '') {
                    var page_url = '';
                    if (page) {
                        page_url = '?page=' + page;
                    }
                    this.accepted = 0;
                    this.declined = 0;
                    this.pending = 0;
                    const $this = this;
                    axios.post('{{route('admin.reservation.get')}}' + page_url, {
                        _token: '{{csrf_token()}}',
                        date_from: $this.date_from,
                        date_to: $this.date_to,
                        sort: $this.sort_value
                    })
                        .then(function (response) {
                            $this.reservations = response.data.data.reservations.data;
                            $this.pagination = {
                                current_page: response.data.data.reservations.current_page,
                                from: response.data.data.reservations.from,
                                last_page: response.data.data.reservations.last_page,
                                path: response.data.data.reservations.path,
                                per_page: response.data.data.reservations.per_page,
                                to: response.data.data.reservations.to,
                                total: response.data.data.reservations.total,
                            };
                            // $this.sortAll($this.sort_value);
                            $this.reservations.forEach(function (reservation) {
                                if (reservation.restaurant_status == 'pending') {
                                    $this.pending++;
                                }
                                if (reservation.restaurant_status == 'accepted') {
                                    $this.accepted++;
                                }
                                if (reservation.restaurant_status == 'declined') {
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
                loadReservation: function (reservation_id) {
                    var page_url = '?page=' + this.pagination.current_page;
                    const $this = this;
                    axios.post('{{route('admin.reservation.get')}}' + page_url, {
                        _token: '{{csrf_token()}}',
                        date_from: $this.date_from,
                        date_to: $this.date_to,
                        sort: $this.sort_value
                    })
                        .then(function (response) {
                            $this.reservations = response.data.data.reservations.data;
                            let selected_reservation = $this.reservations.filter(function (reservation) {
                                return reservation.id == reservation_id;
                            });

                            $this.reservation = selected_reservation[0];

                            jQuery('#new-order').modal('hide');

                            jQuery('#confirm-order').modal('show');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                acceptOrder: function (reservation) {
                    reservation.restaurant_status = 'accepted';
                    let update = this.updateReservation(reservation);
                    jQuery('#confirm-order').modal('hide');
                },
                declineOrder: function (reservation) {
                    reservation.restaurant_status = 'declined';
                    let update = this.updateReservation(reservation);
                    jQuery('#confirm-order').modal('hide');
                },
                setReservationStatus: function (reservation, status) {
                    reservation.reservation_status = status;
                },
                updateStatus: function (reservation) {
                    this.updateReservation(reservation);
                    jQuery('#confirm-order').modal('hide');
                },
                updateReservation: function (reservation) {
                    const $this = this;
                    axios.put('{{route('admin.reservation.index')}}/' + reservation.id, {
                        _token: '{{csrf_token()}}',
                        reservation: reservation,
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
                    var sorted_reservations = [];

                    var unsorted_reservations = [];

                    var temp_reservations = [];

                    this.reservations.forEach(function (reservation) {
                        if (value == reservation.restaurant_status) {
                            sorted_reservations.push(reservation);
                        } else {
                            unsorted_reservations.push(reservation);
                        }
                    });

                    sorted_reservations.forEach(function (sorted_reservation) {
                        temp_reservations.push(sorted_reservation);
                    });

                    unsorted_reservations.forEach(function (unsorted_reservation) {
                        temp_reservations.push(unsorted_reservation);
                    });

                    this.reservations = temp_reservations;
                },
                sort: function (event) {
                    this.getData();
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
