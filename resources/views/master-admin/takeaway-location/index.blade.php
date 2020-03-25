@extends('layouts.master-admin')

@section('content')

    <div id="takeaway-locations">
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
                        @include('includes.master-admin-restaurant-header' , ['active'=>'menu'])
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active"
                                 id="restaurant-profile">
                                <div class="restaurant-profile-section">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h2>{{$restaurant->name}}</h2>
                                        </div>
                                        {{--<div class="col-md-9">--}}
                                        {{--<div class="frame">--}}
                                        {{--<img src="img/Frame.png"><h4>New Changes by--}}
                                        {{--Restaurant Admin. Please Review </h4>--}}
                                        {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="post-code-form">
                                                <form>
                                                    <h3>Add Post Codes for Takeaway</h3>
                                                    <h4>Post Code</h4>
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="row">
                                                                <div class="col-md-7 col-sm-7">
                                                                    <input type="text"
                                                                           class="form-control"
                                                                           placeholder="Enter Post Code"
                                                                           v-model="postcode">
                                                                </div>
                                                                <div class="col-md-5 col-sm-5">
                                                                    <input type="submit"
                                                                           class="btn btn-add-post"
                                                                           value="Add Post Code + "
                                                                           @click.prevent="add">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 table-responsive">
                                            <div class="delivery-time-form">
                                                <form>
                                                    <table>
                                                        <tr v-for="(takeaway_location,index) in takeaway_locations">
                                                            <td>
                                                                <a href="#" @click.prevent="remove(index)">
                                                                    <div class="rect"></div>
                                                                </a>
                                                            </td>
                                                            <td class="delivery-name">
                                                                @{{ takeaway_location.postcode }}
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="Preparation Time"
                                                                       v-model="takeaway_location.preparation_time">
                                                            </td>
                                                            <td>
                                                                <div class="material-switch pull-right"
                                                                     style="margin-right: 0">
                                                                    <input :id="'delete_'+index"
                                                                           name="someSwitchOption0015"
                                                                           type="checkbox"
                                                                           v-model="takeaway_location.deleted">
                                                                    <label :for="'delete_'+index"
                                                                           class="label-success"></label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit"
                                                                   class="btn btn-add-post"
                                                                   value="Save Changes" @click.prevent="update">
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
        const data = {
            takeaway_locations:{!! $takeaway_locations !!},
            postcode: '',
        };
        const takeaway_locations = new Vue({
            data: data,
            el: '#takeaway-locations',
            methods: {
                add: function () {
                    if (this.postcode == '') {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please Enter a Valid Postcode!',
                            theme: 'error'
                        });
                        return false;
                    }
                    this.takeaway_locations.push({
                        postcode: this.postcode,
                        preparation_time: 0,
                        deleted: true,
                    });
                    this.postcode = '';
                },
                remove: function (index) {
                    this.takeaway_locations.splice(index, 1);
                },
                update: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.takeaway-location.store')}}', {
                        _token: '{{csrf_token()}}',
                        takeaway_locations: $this.takeaway_locations,
                        restaurant_id: '{{$restaurant->id}}'
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
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
