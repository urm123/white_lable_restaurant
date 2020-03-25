@extends('layouts.master-admin')

@section('content')
    <div id="requests">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav">
                    <ul class="nav nav-tabs">
                        <li id="request-tab">
                            <a href="{{route('master-admin.restaurant.request')}}">Requests</a>
                        </li>
                        <li>
                            <a href="{{route('master-admin.restaurant.index')}}">Restaurant Management</a>
                        </li>
                        <!--<li>
                            <input type="text" placeholder="Search" class="form-control restaurant-search"
                                   v-model="search">
                        </li>-->
                        <li style="">
                            <date-picker id="from_date" v-model="from_date" placehoder="Select From Date"
                                         class="form-control"></date-picker>
                        </li>
                        <li style="">
                            <date-picker id="to_date" v-model="to_date" placehoder="Select To Date"
                                         class="form-control"></date-picker>
                        </li>
                        {{--                        <li class="sort-by" id="sort-by">--}}
                        {{--                            <label>{{__('Sort by:')}} </label>--}}
                        {{--                            <select class="form-control">--}}
                        {{--                                <option value="0">Latest First</option>--}}
                        {{--                            </select>--}}
                        {{--                        </li>--}}
                    </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active table-responsive" id="requests">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Request #</th>
                                    <th>Date</th>
                                    <th>Restaurant Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="request in requests">
                                    <td>@{{ request.id }}</td>
                                    <td>@{{ request.updated_at }}</td>
                                    <td>@{{ request.name }}</td>
                                    <td>@{{ request.email }}</td>
                                    <td>@{{ request.phone }}</td>
                                    <td><a href="#" @click.prevent="loadRequest(request)"><img
                                                src="{{asset('master-admin/img/view.png')}}"></a>
                                    </td>
                                </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Request Modal -->
        <div class="modal fade" id="requestModal" role="dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <h2>Request #@{{ request.id }}</h2>
                    <form class="requestmodal-form">
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Date:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.updated_at }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Restaurant Name:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Email: </p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Phone Number: </p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.phone }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">First Name: </p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.user.first_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Last Name:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.user.last_name }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Country:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.country }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">City:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label"> @{{ request.city }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">State/Province:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.province }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Zip/Postal Code:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.postcode }} </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <p class="left-label">Subscription Option:</p>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <p class="right-label">@{{ request.subscription }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <input type="submit" @click.prevent="declineStatus" value="Decline"
                                       class="btn btn-decline">
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <input type="submit" @click.prevent="acceptStatus" value="Accept"
                                       class="btn btn-accept">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>

    <script type="text/javascript">
        const data = {
            search: '',
            from_date: '{{\Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{\Carbon\Carbon::now()->addMonth()->toDateString()}}',
            requests: [],
            request: {
                user: {}
            },
        };

        const requests = new Vue({
            data: data,
            el: '#requests',
            mounted: function () {
                this.getData();
            },
            methods: {
                getData: function () {
                    let $this = this;

                    axios.post('{{route('master-admin.restaurant.request.get')}}', {
                        _token: '{{csrf_token()}}',
                        from_date: $this.from_date,
                        to_date: $this.to_date,
                        search: $this.search,
                    })
                        .then(function (response) {
                            $this.requests = response.data.data.requests;
                            $this.$nextTick(function () {
                                tableColumnWidths();
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                loadRequest: function (request) {
                    this.request = request;
                    jQuery('#requestModal').modal('show');
                },
                acceptStatus: function () {
                    let $this = this;

                    axios.put('{{route('master-admin.restaurant.index')}}/' + this.request.restaurant_id, {
                        _token: '{{csrf_token()}}',
                        id: $this.request.id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#requestModal').modal('hide');
                                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                                $this.getData();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                },
                declineStatus: function () {
                    let $this = this;

                    axios.delete('{{route('master-admin.restaurant.index')}}/' + this.request.restaurant_id, {
                        _token: '{{csrf_token()}}',
                        id: $this.request.restaurant_id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#requestModal').modal('hide');
                                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                                $this.getData();
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                }
            }
        });
    </script>
@endsection
