@extends('layouts.master-admin')

@section('content')

    <div id="delivery-locations">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#">Delivery Locations</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurant-profile">
                                <div class="delivery-settings-section">
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
                                                    <h3>Add Post Codes for Delivery</h3>
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
                                        <div class="col-md-12">
                                            <div class="delivery-time-form">
                                                <div>
                                                    <table class="table table-responsive">
                                                        <tr v-for="(delivery_location,index) in delivery_locations">
                                                            <td>
                                                                <a href="#" @click.prevent="remove(index)">
                                                                    <div class="rect"></div>
                                                                </a>
                                                            </td>
                                                            <td class="delivery-name">
                                                                <p>@{{ delivery_location.postcode }}</p>
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="Delivery Time "
                                                                       v-model="delivery_location.delivery_time">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="Delivery Cost "
                                                                       v-model="delivery_location.delivery_cost">
                                                            </td>
                                                            <td>
                                                                <input type="text"
                                                                       class="form-control"
                                                                       placeholder="Miniumum Cart Value"
                                                                       v-model="delivery_location.minimum_total">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox"
                                                                       class="form-control"
                                                                       v-model="delivery_location.free_delivery">
                                                                <label>Free Delivery</label>
                                                            </td>
                                                            <td>
                                                                <div class="material-switch pull-right">
                                                                    <input :id="'delete_'+delivery_location.id"
                                                                           name=""
                                                                           type="checkbox"
                                                                           v-model="delivery_location.deleted"/>
                                                                    <label :id="'delete_'+delivery_location.id"
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
    </div>

    <script type="text/javascript">
        const data = {
            delivery_locations:{!! $delivery_locations !!},
            postcode: '',
        };
        const delivery_locations = new Vue({
            data: data,
            el: '#delivery-locations',
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
                    this.delivery_locations.push({
                        postcode: this.postcode,
                        delivery_time: '',
                        delivery_cost: '',
                        minimum_total: '',
                        free_delivery: false,
                        deleted: true,
                    });
                    this.postcode = '';
                },
                remove: function (index) {
                    this.delivery_locations.splice(index, 1);
                },
                update: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.request.delivery.update')}}', {
                        _token: '{{csrf_token()}}',
                        delivery_locations: $this.delivery_locations,
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
