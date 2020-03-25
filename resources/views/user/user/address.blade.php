@extends('layouts.app')

@section('content')
    <section class="confirm-address" id="address">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="delivery-method">
                        <div class="col-sm-3">
                            @include('includes.user-header',['active'=>'details'])
                        </div>
                        <div class="col-sm-9">
                            @include('includes.user-details-header',['active'=>'address'])
                            <div class="row reservations-section">
                                <div class="col-md-12">
                                    <form class="delivery-form" method="post" action="{{route('address.store')}}">
                                        @csrf
                                        @if(count($addresses)==0)
                                            <input type="hidden" name="default" value="true">
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('address')) has-error @endif">
                                                    <label for="address">House / Apt Number + Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                           value="{{old('address')}}"
                                                           placeholder="Enter House / Apt Number + Name">
                                                    @if($errors->has('address'))
                                                        <span class="help-block">
                                                    {{$errors->first('address')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('street')) has-error @endif">
                                                    <label for="street">Street <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="street" name="street"
                                                           value="{{old('street')}}"
                                                           placeholder="Enter Street">
                                                    @if($errors->has('street'))
                                                        <span class="help-block">
                                                    {{$errors->first('street')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('city')) has-error @endif">
                                                    <label for="city">City / Town <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="city" name="city"
                                                           value="{{old('city')}}">
                                                    @if($errors->has('city'))
                                                        <span class="help-block">
                                                    {{$errors->first('city')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('county')) has-error @endif">
                                                    <label for="county">County</label>
                                                    <input type="text" class="form-control" id="county" name="county"
                                                           value="{{old('county')}}">
                                                    @if($errors->has('county'))
                                                        <span class="help-block">
                                                    {{$errors->first('county')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('postcode')) has-error @endif">
                                                    <label for="postcode">Post Code <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="postcode"
                                                           value="{{old('postcode')}}"
                                                           name="postcode" @keyup="validatePostcode($event)"
                                                           v-model="postcode"
                                                           placeholder="Enter Post Code">
                                                    @if($errors->has('postcode'))
                                                        <span class="help-block">
                                                    {{$errors->first('postcode')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="submit" value="Save & Add Address"
                                                       class="btn btn-save-changes">
                                            </div>
                                        </div>

                                        <div class="row add-address">

                                            <div class="col-md-4 col-sm-4" v-for="address in addresses">
                                                <div class="">
                                                    <div class="form-group text-left"
                                                         style="float:left;">
                                                        <div class="terms-check">
                                                            <input name="rememberme" type="checkbox"
                                                                   v-model="address.default"
                                                                   @change.prevent="updateAddress(address)"
                                                                   value="forever"/>
                                                            <label for="rememberme">
                                                                <address>
                                                                    @{{ address.address }}
                                                                    <br>
                                                                    @{{ address.street }}
                                                                    <br>
                                                                    @{{ address.county }}
                                                                    <br>
                                                                    @{{ address.city }}
                                                                    <br>
                                                                    @{{ address.postcode }}
                                                                </address>
                                                                <a class="btn btn-success" href="#"
                                                                   @click.prevent="editAddress(address)">Edit</a>
                                                                <a class="btn btn-danger" href="#"
                                                                   @click.prevent="removeAddress(address.id)">Delete</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
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


        <!-- Modal -->
        <div class="modal fade" id="edit-address" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Address</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" :class="{'has-error':validations.address}">
                                    <label for="edit_address">House / Apt Number + Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_address" name="edit_address"
                                           placeholder="Enter House / Apt Number + Name" v-model="address.address">

                                    <span class="help-block" v-if="validations.address">
                                                    @{{validations.address[0]}}
                                                </span>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" :class="{'has-error':validations.street}">
                                    <label for="edit_street">Street <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_street" name="street"
                                           placeholder="Enter Street" v-model="address.street">

                                    <span class="help-block" v-if="validations.street">
                                                    @{{validations.street[0]}}
                                                </span>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" :class="{'has-error':validations.city}">
                                    <label for="edit_city">City / Town <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_city" name="city"
                                           v-model="address.city">

                                    <span class="help-block" v-if="validations.city">
                                                    @{{validations.city[0]}}
                                                </span>

                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group" :class="{'has-error':validations.county}">
                                    <label for="edit_county">County <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_county" name="county"
                                           v-model="address.county">

                                    <span class="help-block" v-if="validations.county">
                                                    @{{validations.county[0]}}
                                                </span>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group" :class="{'has-error':validations.postcode}">
                                    <label for="edit_postcode">Post Code <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="edit_postcode" name="postcode"
                                           placeholder="Enter Post Code" v-model="address.postcode"
                                           @keyup="validateEditPostcode($event)">

                                    <span class="help-block" v-if="validations.postcode">
                                                    @{{validations.postcode[0]}}
                                                </span>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" @click.prevent="updateAddressPost()">Update
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <script type="text/javascript">
        const data = {
            addresses:{!! json_encode($addresses) !!},
            address: {},
            validations: {},
            postcode: ''
        };

        const address = new Vue({
            data: data,
            el: '#address',
            methods: {
                updateAddress: function (address) {
                    this.addresses.forEach(function (item) {
                        if (address.id != item.id) {
                            item.default = false;
                        }
                    });

                    const $this = this;

                    axios.post('{{route('address.index')}}/' + address.id, {
                        _token: '{{csrf_token()}}',
                        _method: 'put',
                        default: address.default
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                removeAddress: function (address_id) {

                    $.confirm({
                        title: 'Confirm!',
                        content: 'Are you sure you want to delete the address?',
                        theme: 'error',
                        buttons: {
                            confirm: function () {
                                const $this = this;

                                axios.delete('{{route('address.index')}}/' + address_id, {
                                    _token: '{{csrf_token()}}',
                                    id: address_id
                                })
                                    .then(function (response) {
                                        if (response.data.message == 'success') {
                                            $.alert({
                                                title: 'Success!',
                                                content: 'Deleted Successfully!',
                                                theme: 'success'
                                            });
                                            window.location.reload();
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


                },
                editAddress: function (address) {
                    this.address = address;
                    jQuery('#edit-address').modal('show');
                },
                updateAddressPost: function () {
                    var $this = this;
                    axios.post('{{route('address.update.all')}}', {
                        _token: '{{csrf_token()}}',
                        address: $this.address,
                    }).then(function (response) {
                        if (response.data.message == 'success') {
                            $.alert({
                                title: 'Success!',
                                content: 'Updated Successfully!',
                                theme: 'success'
                            });
                            jQuery('#edit-address').modal('hide');
                            var selected_address = $this.addresses.filter(function (address) {
                                return address.id == $this.address.id;
                            });
                            selected_address[0] = $this.address;
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                },
                validatePostcode: function (event) {
                    if (this.postcode.length === 2) {
                        this.postcode = this.postcode + ' ';
                    }
                },
                validateEditPostcode: function (event) {
                    if (this.address.postcode.length === 2) {
                        this.address.postcode = this.address.postcode + ' ';
                    }
                }
            }
        });
    </script>

    @if(session('success'))
        <script type="text/javascript">
            window.addEventListener('load', function () {
                $('html, body').animate({
                    scrollTop: $(".btn-save-changes").offset().top
                }, 2000);
            });
        </script>
    @endif

@endsection
