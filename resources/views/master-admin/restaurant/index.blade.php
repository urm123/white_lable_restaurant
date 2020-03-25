@extends('layouts.master-admin')

@section('content')
    <div id="restaurants_list">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav">
                    <ul class="nav nav-tabs">
                        <li id="restaurant-tab">
                            <a href="{{route('master-admin.restaurant.request')}}">Requests</a>
                        </li>
                        <li>
                            <a href="{{route('master-admin.restaurant.index')}}">Restaurant Management</a>
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
                                    <th>Restaurant ID</th>
                                    <th>Restaurant Name</th>
                                    <th>Country</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Status</th>
                                    <th>Set Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="restaurant in restaurants">
                                    <td>@{{ restaurant.id }}</td>
                                    <td>@{{ restaurant.name }}</td>
                                    <td>@{{ restaurant.country }}</td>
                                    <td>@{{ restaurant.email }}</td>
                                    <td>@{{ restaurant.phone }}</td>
                                    <td>
                                        <label class="label label-success" v-if="restaurant.active">Active</label>
                                        <label class="label label-danger" v-if="!restaurant.active">Removed</label>
                                    </td>
                                    <td>
                                        <a href="#" v-if="restaurant.active" class="btn btn-danger"
                                           @click.prevent="deleteRestaurant(restaurant.id)"><i class="fa fa-times"></i></a>

                                        <a href="#" v-if="!restaurant.active" class="btn btn-success"
                                           @click.prevent="deleteRestaurant(restaurant.id)"><i class="fa fa-check"></i></a>
                                    </td>
                                    <td>
                                        <a v-if="restaurant.active"
                                           :href="'{{route('master-admin.restaurant.index')}}/'+restaurant.id+'/edit'"><img
                                                src="{{asset('master-admin/img/view.png')}}"></a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
            restaurants: [],
        };

        const restaurants = new Vue({
            data: data,
            el: '#restaurants_list',
            mounted: function () {
                this.getData();
            },
            methods: {
                getData: function () {
                    let $this = this;

                    axios.post('{{route('master-admin.restaurant.get')}}', {
                        _token: '{{csrf_token()}}',
                        from_date: $this.from_date,
                        to_date: $this.to_date,
                        search: $this.search,
                    })
                        .then(function (response) {
                            $this.restaurants = response.data.data.restaurants;
                            $this.$nextTick(function () {
                                tableColumnWidths();
                            });
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                deleteRestaurant: function (restaurant_id) {
                    let $this = this;

                    var selected_restaurants = this.restaurants.filter(function (restaurant) {
                        return restaurant.id == restaurant_id;
                    });

                    var message = 'reactivate';

                    if (selected_restaurants[0].active) {
                        message = 'deactivate';
                    }

                    $.confirm({
                        title: 'Confirm!',
                        content: 'Are you sure you want to ' + message + ' this restaurant?',
                        theme: 'error',
                        buttons: {
                            confirm: function () {
                                axios.post('{{route('master-admin.restaurant.deactive')}}', {
                                    _token: '{{csrf_token()}}',
                                    restaurant_id: restaurant_id
                                })
                                    .then(function (response) {
                                        if (response.data.message == 'success') {
                                            $.alert({
                                                title: 'Success!',
                                                content: response.data.result,
                                                theme: 'success'
                                            });
                                            $this.getData();
                                        }
                                    })
                                    .catch(function (error) {
                                        console.log(error);
                                    });
                            },
                            cancel: function () {

                            },
                        }
                    });
                }
            }
        });
    </script>
@endsection
