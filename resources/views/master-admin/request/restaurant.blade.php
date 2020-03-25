@extends('layouts.master-admin')

@section('content')
    <div id="restaurant">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#">Restaurant</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurant-profile">
                                <div class="restaurant-profile-section">
                                    <h2>{{$restaurant->name}}</h2>
                                    <div class="restaurant-profile-form">
                                        <div class="row">
                                            <div class="col-md-9 col-xs-12">
                                                <form action="{{route('master-admin.request.restaurant.update')}}"
                                                      method="post">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                           value="{{$restaurant->restaurant_id}}">
                                                    <h3>Basic Information</h3>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant Name*</label>
                                                            <input type="text"
                                                                   class="form-control" name="name"
                                                                   value="{{$restaurant->name}}"
                                                                   placeholder="Enter Restaurant Name">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Email address*</label>
                                                            <input type="email"
                                                                   class="form-control" name="address"
                                                                   value="{{$restaurant->address}}"
                                                                   placeholder="Enter Email Address">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Phone Number*</label>
                                                            <input type="tel"
                                                                   class="form-control" name="phone"
                                                                   value="{{$restaurant->phone}}"
                                                                   placeholder="Enter Phone Number">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Website</label>
                                                            <input type="text"
                                                                   class="form-control" name="website"
                                                                   value="{{$restaurant->website}}"
                                                                   placeholder="Enter Website">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant
                                                                Country*</label>
                                                            <input class="form-control" name="country"
                                                                   value="{{$restaurant->country}}">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant Street
                                                                Name*</label>
                                                            <input type="text"
                                                                   class="form-control" name="street"
                                                                   value="{{$restaurant->street}}"
                                                                   placeholder="Enter Street Name">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant City*</label>
                                                            <input class="form-control" name="city"
                                                                   value="{{$restaurant->city}}">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant
                                                                Postcode*</label>
                                                            <input type="text"
                                                                   class="form-control" name="postcode"
                                                                   value="{{$restaurant->postcode}}"
                                                                   placeholder="Enter Zip/Postal Code">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p>Restaurant Image*</p>
                                                            <img class="img-responsive"
                                                                 src="{{getStorageUrl().$restaurant->logo}}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <table class="table table-responsive">
                                                                <thead>
                                                                <tr>
                                                                    <th>Slider Images</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @if($restaurant->restaurant()->withTrashed()->first()->media)
                                                                    @foreach($restaurant->restaurant()->withTrashed()->first()->media as $slider)
                                                                        <tr>
                                                                            <td>
                                                                                @if($slider->path)
                                                                                    <img
                                                                                        src="{{getStorageUrl().$slider->path}}"
                                                                                        alt=""
                                                                                        style="max-width: 100px;">
                                                                                @else
                                                                                    <span>No Image</span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                @endif
                                                                </tbody>
                                                            </table>
                                                            @if(!$restaurant->restaurant()->withTrashed()->first()->media)
                                                                No Images
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <h3>Restaurant Attributes</h3>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>{{__('Price Range')}}*</label>
                                                            <select class="form-control" name="price_range">
                                                                <option
                                                                    @if($restaurant->price_range=='0') selected="selected"
                                                                    @endif  value="0">
                                                                    £
                                                                </option>
                                                                <option
                                                                    @if($restaurant->price_range=='1') selected="selected"
                                                                    @endif value="1">
                                                                    ££
                                                                </option>
                                                                <option
                                                                    @if($restaurant->price_range=='2') selected="selected"
                                                                    @endif value="2">
                                                                    ££$
                                                                </option>
                                                                <option
                                                                    @if($restaurant->price_range=='3') selected="selected"
                                                                    @endif value="3">
                                                                    ££££
                                                                </option>
                                                                <option
                                                                    @if($restaurant->price_range=='4') selected="selected"
                                                                    @endif value="4">
                                                                    ££££$
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Cuisine*</label>
                                                            <select class="form-control selectpicker" name="cuisines[]">
                                                                @foreach($cuisines as $cuisine)
                                                                    <option
                                                                        @foreach($restaurant->cuisines as $restaurant_cuisine)
                                                                        @if($restaurant_cuisine->id==$cuisine->id)
                                                                        selected="selected"
                                                                        @endif
                                                                        @endforeach
                                                                        value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Number of Seats*</label>
                                                            <input type="number"
                                                                   class="form-control" name="seats"
                                                                   value="{{$restaurant->seats}}"
                                                                   placeholder="Enter Number of Seats">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Is Parking
                                                                Available* </label>
                                                            <select class="form-control" name="parking">
                                                                <option @if($restaurant->parking) selected="selected"
                                                                        @endif value="true">
                                                                    Available
                                                                </option>
                                                                <option @if(!$restaurant->parking) selected="selected"
                                                                        @endif value="false">
                                                                    Not Available
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Is Delivery Available</label>
                                                            <select class="form-control" name="delivery">
                                                                <option @if($restaurant->delivery) selected="selected"
                                                                        @endif value="true">
                                                                    Available
                                                                </option>
                                                                <option @if(!$restaurant->delivery) selected="selected"
                                                                        @endif value="false">
                                                                    Not Available
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Is Takeaway
                                                                Available</label>
                                                            <select class="form-control" name="takeaway">
                                                                <option @if($restaurant->takeaway) selected="selected"
                                                                        @endif value="true">
                                                                    Available
                                                                </option>
                                                                <option @if(!$restaurant->takeaway) selected="selected"
                                                                        @endif value="false">
                                                                    Not Available
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Is Reservation
                                                                Available</label>
                                                            <select class="form-control" name="reserve">
                                                                <option @if($restaurant->reserve) selected="selected"
                                                                        @endif value="true">
                                                                    Available
                                                                </option>
                                                                <option @if(!$restaurant->reserve) selected="selected"
                                                                        @endif value="false">
                                                                    Not Available
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant Offline From:</label>
                                                            <input type="datetime-local" class="form-control"
                                                                   value="{{$restaurant->online_from_time}}"
                                                                   name="online_from_time">
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Restaurant Offline To:</label>
                                                            <input type="datetime-local" class="form-control"
                                                                   value="{{$restaurant->online_to_time}}"
                                                                   name="online_to_time">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <label>Restaurant
                                                                Description</label>
                                                            <textarea class="form-control" name="description"
                                                                      placeholder="Enter restaurant description"
                                                                      rows="5"
                                                                      cols="10">{{$restaurant->description}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <label>Things to know before you go</label>
                                                            <textarea class="form-control" name="things_to_know"
                                                                      placeholder="Enter things to know before a customer visits you"
                                                                      rows="5"
                                                                      cols="10">{{$restaurant->things_to_know}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="restaurant-hours-row">
                                                        <h3>Restaurant Hours</h3>
                                                        @foreach($restaurant->openingHours as $key=>$opening_hour)
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label>Day</label>
                                                                    <select name="days[{{$key}}][day]"
                                                                            class="form-control">
                                                                        <option value="">Select Day</option>
                                                                        @foreach($weekdays as $weekday_key=>$weekday)
                                                                            <option
                                                                                @if($opening_hour->day==$weekday_key)
                                                                                selected="selected"
                                                                                @endif
                                                                                value="{{$weekday_key}}">{{$weekday}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Opening Time</label>
                                                                    <select name="days[{{$key}}][opening_time]"
                                                                            class="form-control">
                                                                        <option value="">Select Opening Time</option>
                                                                        @foreach($times as $time)
                                                                            <option
                                                                                @if($opening_hour->opening_time==$time)
                                                                                selected="selected"
                                                                                @endif
                                                                                value="{{$time}}">{{$time}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <label>Closing Time</label>
                                                                    <select name="days[{{$key}}][closing_time]"
                                                                            class="form-control">
                                                                        <option value="">Select Closing Time</option>
                                                                        @foreach($times as $time)
                                                                            <option
                                                                                @if($opening_hour->closing_time==$time)
                                                                                selected="selected"
                                                                                @endif
                                                                                value="{{$time}}">{{$time}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="submit"
                                                                   class="btn btn-approve"
                                                                   value="Approve & Save Changes">
                                                            <a href="#" class="btn  btn-decline" style="padding: 18px;"
                                                               onclick="decline({{$restaurant->restaurant_id}})">Decline</a>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>

    <script type="text/javascript">
        function decline(restaurant_id) {

            $.confirm({
                title: 'Confirm!',
                content: 'Are you sure you want to decline this request?',
                theme: 'error',
                buttons: {
                    confirm: function () {

                        axios.delete('{{route('master-admin.restaurant.index')}}/' + restaurant_id, {
                            _token: '{{csrf_token()}}',
                            id: restaurant_id
                        })
                            .then(function (response) {
                                if (response.data.message == 'success') {
                                    $.alert({
                                        title: 'Success!',
                                        content: 'Declined Successfully!',
                                        theme: 'success'
                                    });
                                    window.location.href = '{{route('master-admin.request.index')}}';
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
    </script>
@endsection
