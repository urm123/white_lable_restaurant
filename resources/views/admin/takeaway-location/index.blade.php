@extends('layouts.admin')

@section('content')

    <section id="takeaway-locations">
        <div class="container">
            <div class="row res-admin">
                <div class="col-md-2 col-sm-3 res-admin-side">
                    @include('includes.admin-side-bar',['active'=>'settings'])
                </div>
                <div class="col-md-10 col-sm-9" style="/*background-color: #E5E5E5*/">
                    <div class="filter-greybox">
                        <div class="profile-head">
                            <h4>
                                @include('includes.admin-settings-header',['active'=>'takeaway'])
                            </h4>
                        </div>
                    </div>
                    <div class="delivery_admin">
                        <h4>Add Post Codes for Takeaway</h4>
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
                        <div class="row delivery_admin-section" v-for="(takeaway_location,index) in takeaway_locations">
                            <div class="col-md-1 col-sm-1">
                                <a href="#" @click.prevent="remove(index)">
                                    <div class="rect"></div>
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-3">
                                <p>@{{ takeaway_location.postcode }}</p>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <input type="text" placeholder="Takeaway Time" name=""
                                       v-model="takeaway_location.preparation_time">
                            </div>
                            <div class="col-md-1 col-sm-2">
                                <label class="switch">
                                    <input type="checkbox" v-model="takeaway_location.deleted">
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
                    axios.post('{{route('admin.takeaway-location.store')}}', {
                        _token: '{{csrf_token()}}',
                        takeaway_locations: $this.takeaway_locations
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
