@extends('layouts.master-admin')

@section('content')
    <div id="requests">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav" style="padding: 10px 30px;">
                    <ul class="nav nav-tabs">
                        <li>
                            <date-picker class="form-control" id="from_date" v-model="from_date" @input="filter"
                                         placeholder="From Date"></date-picker>
                        </li>
                        <li>
                            <date-picker class="form-control" id="to_date" v-model="to_date" @input="filter"
                                         placeholder="To Date"></date-picker>
                        </li>
                    </ul>
                    {{--                    <ul class="nav nav-tabs navbar-right">--}}
                    {{--                        <li class="sort-by" id="sort-by">--}}
                    {{--                            <label>{{__('Sort by:')}} </label>--}}
                    {{--                            <select class="form-control">--}}
                    {{--                                <option value="0">Latest First</option>--}}
                    {{--                            </select>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}
                </div>
                <div class="panel-body">
                    <div class="tab-content table-responsive">
                        <table class="requests-table">
                            <thead>
                            <tr>
                                <th>Time</th>
                                <th>Restaurant Name</th>
                                <th>Requested By</th>
                                <th>Notification Detail</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="request in requests">
                                <td>@{{ request.date }}</td>
                                <td>@{{ request.name }}</td>
                                <td>@{{ request.username }}</td>
                                <td>
                                    <span v-if="request.clone_type=='restaurant'">Restaurant</span>
                                    <span v-if="request.clone_type=='restaurant_discount'">Restaurant Promotion</span>
                                    <span v-if="request.clone_type=='delivery'">Delivery Locations</span>
                                    <span v-if="request.clone_type=='takeaway'">Takeaway Locations</span>
                                    <span v-if="request.clone_type=='promotion'">Promotions</span>
                                    <span v-if="request.clone_type=='menu'">Menus</span>
                                    <span v-if="request.clone_type=='menu_item'">Menu Items</span>
                                    changes have been requested. Please Review now!
                                </td>
                                <td>
                                    <a v-if="request.clone_type=='restaurant'"
                                       :href="'{{route('master-admin.request.index')}}/restaurant/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                    <a v-if="request.clone_type=='restaurant_discount'"
                                       :href="'{{route('master-admin.request.index')}}/promotion/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                    <a v-if="request.clone_type=='delivery'"
                                       :href="'{{route('master-admin.request.index')}}/delivery/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                    <a v-if="request.clone_type=='takeaway'"
                                       :href="'{{route('master-admin.request.index')}}/takeaway/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                    <a v-if="request.clone_type=='promotion'"
                                       :href="'{{route('master-admin.request.index')}}/promotion/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                    <a v-if="request.clone_type=='menu'"
                                       :href="'{{route('master-admin.request.index')}}/menu/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                    <a v-if="request.clone_type=='menu_item'"
                                       :href="'{{route('master-admin.request.index')}}/menu-item/'+request.id">
                                        <img src="{{asset('master-admin/img/view.png')}}">
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const data = {
            requests: [],
            from_date: '{{Carbon\Carbon::now()->subMonth()->toDateString()}}',
            to_date: '{{Carbon\Carbon::now()->toDateString()}}',
        };

        const requests = new Vue({
            el: '#requests',
            data: data,
            mounted: function () {
                this.getData();
            },
            methods: {
                getData: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.request.get')}}', {
                        _token: '{{csrf_token()}}',
                        to_date: $this.to_date,
                        from_date: $this.from_date,
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
                filter: function () {
                    this.getData();
                }
            }
        });
    </script>
@endsection
