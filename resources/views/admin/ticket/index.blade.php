@extends('layouts.admin')

@section('content')
    <div id="tickets">
        <section>
            <div class="container">
                <div class="row res-admin">
                    <div class="col-md-2 col-sm-3 res-admin-side">
                        @include('includes.admin-side-bar',['active'=>'customer'])
                    </div>
                    <div class="col-md-10 col-sm-9" style="/*background-color: #E5E5E5*/">
                        <div class="filter-greybox">
                            <div class="select-box1">
                                <h4>
                                    <a href="{{route('admin.review.index')}}"> {{__('Reviews')}} </a>
                                    <a href="#">
                                        <span class="p1" style="margin-right: 0;"> Support Tickets </span>
                                    </a>
                                    <a href="{{route('admin.customer.index')}}"><span
                                            class="p1" style="margin-right: 0"> {{__('Customers')}} </span></a>
                                    {{--                                    <select>--}}
                                    {{--                                        <option>Ticket Status</option>--}}
                                    {{--                                    </select>--}}
                                    <date-picker id="from_date" @input="filter" v-model="from_date"></date-picker>
                                    <date-picker id="to_date" @input="filter" v-model="to_date"></date-picker>
                                    {{--                                    <div class="sort">{{__('Sort by:')}}--}}
                                    {{--                                        <select>--}}
                                    {{--                                            <option>Sort by A-Z</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                    </div>--}}
                                </h4>
                            </div>
                        </div>
                        <div class="table-report table-responsive">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Ticket #</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="ticket in filtered_tickets">
                                    <td>@{{ ticket.id }}</td>
                                    <td>@{{ ticket.date }}</td>
                                    <td>@{{ ticket.user.first_name }} @{{ ticket.user.last_name }}</td>
                                    <td>@{{ ticket.user.email }}</td>
                                    <td>@{{ ticket.message }}</td>
                                    <td>
                                        <a href="#" @click.prevent="openTicket(ticket)">
                                            <svg width="33" height="27"
                                                 viewBox="0 0 33 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0)">
                                                    <path
                                                        d="M0 18.4766C0 19.1365 0.553691 19.6864 1.21812 19.6864H6.14597V25.7902C6.14597 26.2301 6.42282 26.6701 6.8104 26.89C6.97651 27 7.19799 27 7.36409 27C7.64094 27 7.86242 26.945 8.08389 26.78L17.995 19.6314H31.7819C32.4463 19.6314 33 19.0815 33 18.4216V1.20978C33 0.549898 32.4463 0 31.7819 0H1.21812C0.553691 0 0 0.549898 0 1.20978V18.4766ZM2.43624 2.41955H30.5084V17.2118H17.6074C17.3305 17.2118 17.1091 17.2668 16.8876 17.4318L8.63758 23.4257V18.4766C8.63758 17.8167 8.08389 17.2668 7.41946 17.2668H2.49161L2.43624 2.41955Z"
                                                        fill="#828282"/>
                                                    <path
                                                        d="M8.41516 8.08301C5.75745 8.08301 5.75745 12.1523 8.41516 12.1523C11.0729 12.1523 11.0729 8.08301 8.41516 8.08301Z"
                                                        fill="#828282"/>
                                                    <path
                                                        d="M16.4991 12.1523C19.1569 12.1523 19.1569 8.08301 16.4991 8.08301C13.8414 8.08301 13.8414 12.1523 16.4991 12.1523Z"
                                                        fill="#828282"/>
                                                    <path
                                                        d="M24.5831 12.1523C27.2409 12.1523 27.2409 8.08301 24.5831 8.08301C21.9254 8.08301 21.9254 12.1523 24.5831 12.1523Z"
                                                        fill="#828282"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0">
                                                        <rect width="33" height="27" fill="white"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Edit Item Modal -->
        <div class="modal fade review-response-modal" id="review-response-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h4>Support Ticket #@{{ ticket.id }}</h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>Date:</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail">@{{ ticket.date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail">@{{ ticket.user.first_name }} @{{ ticket.user.last_name }} </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-xs-12">
                                <p>Comment</p>
                            </div>
                            <div class="col-md-8 col-xs-12">
                                <p class="detail">@{{ ticket.message }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <p>Messages</p>
                            </div>
                            <div class="col-md-12 col-xs-12">

                                <div class="detail" v-for="message in ticket.messages" style="margin-bottom: 10px;">
                                    <label class="label label-primary" v-if="message.user_id"
                                           style="margin-right: 10px;">@{{ ticket.user.first_name
                                        }}: </label>
                                    <label class="label label-info" v-if="message.restaurant_id"
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
                                <p>Response</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="" placeholder="Enter comment" rows="6"
                                          v-model="restaurant_message"></textarea>
                            </div>
                            <div class="col-md-12">
                                <p>
                                    <span class="ticket-checkbox">
                                        <input type="checkbox" v-model="ticket.resolved" name="">
                                    </span>
                                    Support Ticket Resolved
                                </p>
                            </div>
                        </div>
                        <input type="submit" name="" value="Submit" @click.prevent="saveMessage">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        const data = {
            tickets:{!! json_encode($tickets) !!},
            ticket: {user: {}},
            restaurant_message: '',
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{\Carbon\Carbon::now()->addMonth()->toDateString()}}',
            filtered_tickets: []
        };

        const tickets = new Vue({
            data: data,
            el: '#tickets',
            mounted: function () {
                this.filter();
            },
            methods: {
                openTicket: function (ticket) {
                    this.ticket = ticket;
                    jQuery('#review-response-modal').modal('show');
                },
                saveMessage: function () {
                    let $this = this;
                    axios.post('{{route('admin.ticket.restaurant.message')}}', {
                        _token: '{{csrf_token()}}',
                        message: $this.restaurant_message,
                        ticket_id: $this.ticket.id,
                        resolved: $this.ticket.resolved,
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                if (response.data.data.ticket_message) {
                                    $this.ticket.messages.push(response.data.data.ticket_message);
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
                filter: function () {
                    var from_time = this.from_date + ' {{\Carbon\Carbon::now()->format('H:i:s')}}';
                    var to_time = this.to_date + ' {{\Carbon\Carbon::now()->format('H:i:s')}}';


                    var filtered_tickets = this.tickets.filter(function (ticket) {
                        return from_time <= ticket.created_at && to_time >= ticket.created_at;
                    });

                    this.filtered_tickets = filtered_tickets;

                    $this.$nextTick(function () {
                        tableColumnWidths();
                    });
                }
            }
        });
    </script>

@endsection

<!-- Edit Item Modal -->
