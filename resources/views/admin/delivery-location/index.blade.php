@extends('layouts.admin')

@section('content')

    <section id="delivery-locations">
        <div class="container">
            <div class="row res-admin">
                <div class="col-md-2 col-sm-3 res-admin-side">
                    @include('includes.admin-side-bar',['active'=>'settings'])
                </div>
                <div class="col-md-10 col-sm-9" style="/*background-color: #E5E5E5*/">
                    <div class="filter-greybox">
                        <div class="profile-head">
                            <h4>
                                @include('includes.admin-settings-header',['active'=>'delivery'])
                            </h4>
                        </div>
                    </div>
                    <div class="delivery_admin">
                        <h4>Add Post Codes for Delivery</h4>
                        <p>Post Code</p>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row delivery_admin-section1">
                                    <div class="col-md-8 col-sm-7">
                                        <input type="text" placeholder="Enter Post Code" name="" v-model="postcode">
                                    </div>
                                    <div class="col-md-4 col-sm-5">
                                        <button class="profile_admin_btn" @click.prevent="add">Add Post Code +</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row delivery_admin-section" v-for="(delivery_location,index) in delivery_locations">
                            <div class="col-md-1 col-sm-1 col-xs-12">
                                <a href="#" @click.prevent="remove(index)">
                                    <div class="rect"></div>
                                </a>
                            </div>
                            <div class="col-md-2 col-sm-1 col-xs-12">
                                <p>@{{ delivery_location.postcode }}</p>
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" placeholder="Delivery Time" name=""
                                       v-model="delivery_location.delivery_time">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" placeholder="Delivery Cost" name=""
                                       v-model="delivery_location.delivery_cost">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" placeholder="Miniumum Cart Value" name=""
                                       v-model="delivery_location.minimum_total">
                            </div>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <p>
                                    <input type="checkbox" name="" v-model="delivery_location.free_delivery">
                                    Free
                                    Delivery
                                </p>
                            </div>
                            <div class="col-md-1 col-sm-2 col-xs-12">
                                <label class="switch">
                                    <input type="checkbox" v-model="delivery_location.deleted">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>

                        <button class="profile_admin_btn admin_submit" @click.prevent="update">Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    axios.post('{{route('admin.delivery-location.store')}}', {
                        _token: '{{csrf_token()}}',
                        delivery_locations: $this.delivery_locations
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $.alert({title: 'Success!', content: '@if(config('app.product_type')=='single') Saved Successfully! @else Sent for Approval! @endif', theme: 'success'});
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
