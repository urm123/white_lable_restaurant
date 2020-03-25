@extends('layouts.master-admin')

@section('content')
    <section id="madmin-restaurant">
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
                    </ul>
                </div>

                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        @include('includes.master-admin-restaurant-header' , ['active'=>'restaurant'])
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurant-profile">
                                <div class="restaurant-profile-section">
                                    <h2>{{$restaurant->name}}</h2>
                                    <div class="restaurant-profile-form">
                                        <div class="row">
                                            <div class="col-md-9 col-xs-12">
                                                <form action="{{route('master-admin.restaurant.update',$restaurant)}}"
                                                      method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
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
                                                            <label>Restaurant Logo*</label><br>
                                                            <img src="{{ asset('storage/'.$restaurant->logo) }}" alt=""
                                                                 style="max-width: 100px;" id="logo-image">
                                                            <input type="file" placeholder="Enter Restaurant Image" name="image"
                                                                   value="{{old('image',$restaurant->image)}}" id="logo-file">
                                                            <p class="help-block">Max filesize: 1MB</p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xs-12">
                                                            <label>Slider</label>
                                                            <table class="table table-responsive">
                                                                <thead>
                                                                <tr>
                                                                    <th>Image</th>
                                                                    <th>Update</th>
                                                                    <th>Remove</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr v-for="(slider,index) in sliders">
                                                                    <td>
                                                                        <img :src="slider.path" alt="" v-if="slider.path"
                                                                             style="max-width: 100px;">
                                                                        <span v-if="!slider.path">No Image</span>
                                                                    </td>
                                                                    <td><input type="file" :name="'sliders['+slider.id+']'"
                                                                               @change="setImage($event,index)">
                                                                        <p class="help-block">Max filesize: 1MB</p>
                                                                    </td>
                                                                    <td><a href="#" class="btn btn-danger"
                                                                           @click.prevent="remove(slider.id,index)">Remove</a></td>
                                                                </tr>
                                                                </tbody>
                                                                <tfoot>
                                                                <tr>
                                                                    <td colspan="3" class="text-right">
                                                                        <a href="#" class="btn btn-success" @click.prevent="add">Add
                                                                            Slider</a>
                                                                    </td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <h3>Restaurant Attributes</h3>
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>{{__('Price Range')}}*</label>
                                                            <select class="form-control" name="price_range">
                                                                <option @if($restaurant->price_range=='0') selected="selected"
                                                                        @endif  value="0">
                                                                    £
                                                                </option>
                                                                <option @if($restaurant->price_range=='1') selected="selected"
                                                                        @endif value="1">
                                                                    ££
                                                                </option>
                                                                <option @if($restaurant->price_range=='2') selected="selected"
                                                                        @endif value="2">
                                                                    £££
                                                                </option>
                                                                <option @if($restaurant->price_range=='3') selected="selected"
                                                                        @endif value="3">
                                                                    ££££
                                                                </option>
                                                                <option @if($restaurant->price_range=='4') selected="selected"
                                                                        @endif value="4">
                                                                    £££££
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <label>Cuisine*</label>
                                                            <select class="form-control select2" name="cuisines[]" multiple="multiple">>
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
                                                            <input min="1" type="number"
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
                                                            <label>Is Delivery Available </label>
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
                                                            <textarea class="form-control m-editor" name="description"
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
                                                        <div class="row profile_class-section">
                                                            <div class="col-xs-12">
                                                                <div class="row" v-for="(opening_hour, index) in opening_hours">
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <p>Day</p>
                                                                                <select :name="'days['+index+'][day]'" v-model="opening_hour.day">
                                                                                    <option value="">Select Day</option>
                                                                                    @foreach($weekdays as $weekday_key => $weekday)
                                                                                        <option value="{{$weekday_key}}">{{$weekday}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p>Opening Time</p>
                                                                                <select :name="'days['+index+'][opening_time]'"
                                                                                        v-model="opening_hour.opening_time">
                                                                                    <option value="">Select Opening Time</option>
                                                                                    @foreach($times as $time)
                                                                                        <option value="{{$time}}">{{$time}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <p>Closing Time</p>
                                                                                <select :name="'days['+index+'][closing_time]'"
                                                                                        v-model="opening_hour.closing_time">
                                                                                    <option value="">Select Closing Time</option>
                                                                                    @foreach($times as $time)
                                                                                        <option value="{{$time}}">{{$time}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <p>&nbsp;</p>
                                                                        <button type="button" @click="removeHour(index)" class="btn btn-danger"><i
                                                                                class="fa fa-trash"></i> Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-xs-12" style="padding: 10px 0 0;">
                                                                        <button class="btn btn-success" type="button" @click.prevent="addHour"><i
                                                                                class="fa fa-plus"></i> Add New
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12">
                                                            <input type="submit"
                                                                   class="btn btn-approve"
                                                                   value="Save Changes">
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
    </section>
    <script type="text/javascript">
        const data = {
            sliders: {!! json_encode($restaurant->media) !!},
            opening_hours: {!! json_encode($restaurant->openingHours) !!},
        };

        const restaurant = new Vue({
            data: data,
            el: '#madmin-restaurant',
            mounted: function () {

            },
            methods: {
                add: function () {
                    this.sliders.push({
                        path: '',
                        restaurant_id: '{{$restaurant->id}}',
                        id: ''
                    });
                },
                remove: function (slider_id, index) {

                    var confirm = window.confirm('Are your sure you want to delete the image?');

                    if (!confirm) {
                        return true;
                    }

                    const $this = this;

                    axios.post('{{route('master-admin.restaurant.slider.remove')}}', {
                        _token: '{{csrf_token()}}',
                        slider_id: slider_id
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $.alert({title: 'Success!', content: 'Slider Removed!', theme: 'success'});
                                $this.sliders.splice(index, 1);
                            }
                        });
                },
                addHour: function () {
                    this.opening_hours.push({
                        day: '',
                        opening_time: '',
                        closing_time: '',
                    });
                },
                removeHour: function (index) {
                    this.opening_hours.splice(index, 1);
                },
                setImage: function (event, index) {
                    var $this = this;
                    if (event.target.files && event.target.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function (e) {
                            $this.sliders[index].path = e.target.result;
                        };

                        reader.readAsDataURL(event.target.files[0]);
                    }
                }
            }
        });

        document.querySelector('#logo-file').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#logo-image').setAttribute('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
