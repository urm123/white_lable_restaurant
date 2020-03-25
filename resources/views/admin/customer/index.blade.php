@extends('layouts.admin')

@section('content')

    <div id="customers">
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

                                    <a href="{{route('admin.ticket.index')}}"> <span
                                            class="p" style="margin-right: 0;"> Support Tickets</span></a>
                                    <a href="#"><span class="p1" style="margin-right: 0"> {{__('Customers')}}</span>
                                    </a>
                                    <date-picker id="from_date" @input="filter" v-model="from_date"></date-picker>
                                    <date-picker id="to_date" @input="filter" v-model="to_date"></date-picker>
                                    {{--                                    <div class="sort">{{__('Sort by:')}}<select>--}}
                                    {{--                                            <option>Sort by A-Z</option>--}}
                                    {{--                                        </select></div>--}}
                                </h4>
                            </div>
                        </div>
                        <div class="table-report table-report_res_review table-responsive">
                            <table class="requests-table">
                                <thead>
                                <tr>
                                    <th>Signed Up Date</th>
                                    <th>Name</th>
                                    <th>Number of deliveries</th>
                                    <th>Number of takeaways</th>
                                    <th>Number of reservation</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{\Carbon\Carbon::parse($user->created_at)->toDayDateTimeString()}}</td>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>{{$user->deliveries()->count()}}</td>
                                        <td>{{$user->takeaways()->count()}}</td>
                                        <td>{{$user->reservations()->count()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

<!-- Edit Item Modal -->
