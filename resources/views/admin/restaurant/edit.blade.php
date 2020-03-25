@extends('layouts.admin')

@section('content')
    <section id="restaurant">
        <div class="container">
            <div class="row res-admin">
                <div class="col-md-2 col-sm-3 res-admin-side">
                    @include('includes.admin-side-bar',['active'=>'settings'])
                </div>
                <div class="col-md-10 profile-ph col-sm-9" style="/*background-color: #E5E5E5*/">
                    <div class="filter-greybox">
                        <div class="profile-head">
                            <h4>
                                @include('includes.admin-settings-header',['active'=>'restaurant'])
                            </h4>
                        </div>
                    </div>
                    <div class="profile_class">
                        <form action="{{route('admin.restaurant.update',$restaurant)}}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <h4>Basic Information</h4>
                            <div class="row profile_class-section">
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Restaurant Name*</p>
                                            <input type="text" class="form-control" placeholder="Enter Restaurant Name" name="name"
                                                   value="{{old('name',$restaurant->name)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Email address*</p>
                                            <input type="email" class="form-control" placeholder="Enter Email Address" name="email"
                                                   value="{{old('email',$restaurant->email)}}" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Phone Number*</p>
                                            <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone"
                                                   value="{{old('phone',$restaurant->phone)}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Restaurant Country*</p>
                                            <input type="text" class="form-control" placeholder="Enter Restaurant Country" name="country"
                                                   value="{{old('country',$restaurant->country)}}" disabled>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Restaurant Street Name*</p>
                                            <input type="text" class="form-control" placeholder="Enter Restaurant Street Name" name="street"
                                                   value="{{old('street',$restaurant->street)}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p>Restaurant City*</p>
                                            <input type="text" class="form-control" placeholder="Enter Restaurant City" name="city"
                                                   value="{{old('city',$restaurant->city)}}">
                                        </div>
                                        <div class="col-md-6">
                                            <p>Restaurant Postcode*</p>
                                            <input type="text" class="form-control" placeholder="Enter Restaurant Postcode" name="postcode"
                                                   value="{{old('postcode',$restaurant->postcode)}}">
                                        </div>
                                    </div>
                                    @if(setting('rnt_logo'))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Restaurant Logo*</p>
                                                <img src="{{ asset('storage/'.$restaurant->logo) }}" alt=""
                                                     style="max-width: 100px;" id="logo-image">
                                                <input type="file" placeholder="Enter Restaurant Image" name="image"
                                                       value="{{old('image',$restaurant->image)}}" id="logo-file">
                                                <p class="help-block">Max filesize: 1MB</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if(setting('rnt_slider'))
                                        <div class="row">
                                            <div class="col-xs-12">
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
                                    @endif
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <h4>Restaurant Attributes</h4>
                            <div class="row profile_class-section">
                                <div class="col-md-9">
                                    <div class="row">
                                        @if(setting('rnt_price_range'))
                                            <div class="col-md-6">
                                                <p>{{__('Price Range')}}*</p>
                                                <select class="form-control" name="price_range">
                                                    <option value="">Select a price range</option>
                                                    <option @if($restaurant->price_range==0) selected="selected"
                                                            @endif value="0">£
                                                    </option>
                                                    <option @if($restaurant->price_range==1) selected="selected"
                                                            @endif value="1">££
                                                    </option>
                                                    <option @if($restaurant->price_range==2) selected="selected"
                                                            @endif value="2">£££
                                                    </option>
                                                    <option @if($restaurant->price_range==3) selected="selected"
                                                            @endif value="3">££££
                                                    </option>
                                                    <option @if($restaurant->price_range==4) selected="selected"
                                                            @endif value="4">£££££
                                                    </option>
                                                </select>
                                            </div>
                                        @endif
                                        @if(setting('rnt_cuisine'))
                                            <div class="col-md-6 cuisine">
                                                <p>Cuisine*</p>
                                                <select name="cuisines[]" class="select2 form-control" id="cuisines" multiple>
                                                    <option value="">Select a cuisine</option>
                                                    @foreach($cuisines as $cuisine)
                                                        <option
                                                            @foreach($restaurant->cuisines as $restaurant_cuisine)
                                                            @if($cuisine->id==$restaurant_cuisine->id)
                                                            selected="selected"
                                                            @endif
                                                            @endforeach
                                                            value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endif
                                        @if(setting('rnt_no_of_seats'))
                                            <div class="col-md-6">
                                                <p>Number of Seats*</p>
                                                <input type="number" min="1" class="form-control" placeholder="Enter Number of Seats" name="seats"
                                                       value="{{old('seats',$restaurant->seats)}}">
                                            </div>
                                        @endif
                                        @if(setting('rnt_parking'))
                                            <div class="col-md-6">
                                                <p>Is Parking Available*</p>
                                                <select class="form-control" name="parking">
                                                    <option>Select if Parking is Available</option>
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
                                        @endif
                                        @if(setting('rnt_delivery'))
                                            <div class="col-md-6">
                                                <p>Is Delivery available?</p>
                                                <select class="form-control" name="delivery">
                                                    <option>Select if Delivery is Available</option>
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
                                        @endif
                                        @if(setting('rnt_takeaway'))
                                            <div class="col-md-6">
                                                <p>Is Takeaway Available*</p>
                                                <select class="form-control" name="takeaway">
                                                    <option>Select if Takeaway is Available</option>
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
                                        @endif
                                        @if(setting('rnt_reservation'))
                                            <div class="col-md-6">
                                                <p>Is Reservation Available*</p>
                                                <select class="form-control" name="reserve">
                                                    <option>Select if Reservation is Available</option>
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
                                        @endif
                                    </div>
                                    @if(setting('rnt_offline_time'))
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p>Restaurant Offline From:</p>
                                                <input type="datetime-local" name="online_from_time"
                                                       value="{{$restaurant->online_from_time}}">
                                            </div>
                                            <div class="col-md-6">
                                                <p>Restaurant Offline To:</p>
                                                <input type="datetime-local" name="online_to_time"
                                                       value="{{$restaurant->online_to_time}}">
                                            </div>
                                        </div>
                                    @endif
                                    @if(setting('rnt_about_description'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Restaurant Description*</p>
                                                <textarea rows="6" placeholder="Enter restaurant description"
                                                          name="description" class="form-control m-editor">{{old('description',$restaurant->description)}}</textarea>
                                            </div>
                                        </div>
                                    @endif
                                    @if(setting('rnt_thinks_to_know'))
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>Things to know before you go*</p>
                                                <textarea rows="6"
                                                          placeholder="Enter things to know before a customer visit you"
                                                          name="things_to_know">{{old('description',$restaurant->things_to_know)}}</textarea>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if(setting('rnt_open_hours'))
                                <h4>Restaurant Hours</h4>
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
                            @endif
                            <button class="profile_admin_btn">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $('#tags-input').tagsinput({
            confirmKeys: [13, 188]
        });

        $('#tags-input input').on('keydown', function (e) {
            e.preventDefault();
            if (e.keyCode == 13) {
                e.keyCode = 188;
                e.preventDefault();
            } else {
                $(this).keypress();
            }
        });

        $(document).ready(function () {
            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        const data = {
            sliders: {!! json_encode($restaurant->media) !!},
            opening_hours: {!! json_encode($restaurant->openingHours) !!},
        };

        const restaurant = new Vue({
            data: data,
            el: '#restaurant',
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

                    axios.post('{{route('admin.restaurant.slider.remove')}}', {
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
