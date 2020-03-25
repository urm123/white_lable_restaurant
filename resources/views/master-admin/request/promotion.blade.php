@extends('layouts.master-admin')

@section('content')

    <div id="promotions">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#">Promotions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurant-profile">
                                <div class="promotions-section">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2>{{$restaurant->name}}</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="discount-form">
                                                <div>
                                                    <div class="row restaurant-wide-row">
                                                        <div class="col-md-4">
                                                            <h3>Restaurant Wide Discount</h3>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="material-switch pull-right">
                                                                <input id="site_promotion"
                                                                       name="someSwitchOption0015" type="checkbox"
                                                                       v-model="restaurant.discount"/>
                                                                <label for="site_promotion"
                                                                       class="label-success"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row discount-select-row">
                                                        <div class="col-sm-3">
                                                            <label>Discount Type (Flat Rate / %)</label>
                                                            <select v-model="restaurant.discount_type"
                                                                    class="form-control">
                                                                <option value="">Select Discount Type</option>
                                                                <option value="flat_rate">Flat Rate</option>
                                                                <option value="percentage">Percentage</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Discount Value</label>
                                                            <input type="number" placeholder="Enter Discount Value"
                                                                   name="" class="form-control"
                                                                   v-model="restaurant.discount_value">
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Start Date</label>
                                                            <date-picker class="form-control" id="start_date"
                                                                         v-model="restaurant.start_date"
                                                                         placeholder="Start Date"></date-picker>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label>Expiry Date</label>
                                                            <date-picker class="form-control" id="expiry_date"
                                                                         v-model="restaurant.expiry_date"
                                                                         placeholder="Expiry Date"></date-picker>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-add-post"
                                                                   value="Save Changes" @click.prevent="saveRestaurant">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="discount-promo-form">
                                                <div>
                                                    <div class="row restaurant-wide-row">
                                                        <div class="col-md-4">
                                                            <h3>Discount Specific Menu Items</h3>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="material-switch pull-right">
                                                                <input id="menu_item_promotion"
                                                                       name="someSwitchOption0015" type="checkbox"
                                                                       v-model="restaurant.menu_discount"/>
                                                                <label for="menu_item_promotion"
                                                                       class="label-success"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <h4>Activating this option will activation promotional
                                                                fields for
                                                                individual menu items. Visit the <a
                                                                    href="">{{__('Menu')}}</a>,
                                                                and edit
                                                                menu items were you would like to apply promotions to.
                                                            </h4>
                                                        </div>
                                                    </div>
                                                    <div class="row restaurant-wide-row">
                                                        <div class="col-md-4">
                                                            <h3>Promo Codes </h3>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="material-switch pull-right">
                                                                <input id="restaurant_promocode"
                                                                       name="someSwitchOption0015" type="checkbox"
                                                                       v-model="restaurant.promocode"/>
                                                                <label for="restaurant_promocode"
                                                                       class="label-success"></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 table-responsive">
                                                            <table>
                                                                <tr v-for="(promotion, index) in promotions">
                                                                    <td class="promo-heading">
                                                                        @{{ promotion.promocode }}
                                                                    </td>
                                                                    <td>
                                                                        <span v-if="promotion.type=='flat_rate'">Flat Rate</span>
                                                                        <span v-if="promotion.type=='percentage'">Percentage</span>
                                                                    </td>
                                                                    <td>
                                                                        @{{ promotion.value }}
                                                                    </td>
                                                                    <td>
                                                                        @{{ promotion.limit }}
                                                                    </td>
                                                                    <td>
                                                                        @{{ promotion.start_date }}
                                                                    </td>
                                                                    <td>
                                                                        @{{ promotion.expiry_date }}
                                                                    </td>
                                                                    <td>
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <a href="#"
                                                                                   @click.prevent="edit(promotion,index)">
                                                                                    <svg width="23" height="24"
                                                                                         viewBox="0 0 25 24" fill="none"
                                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M24.9993 3.99158C24.9993 2.93053 24.5782 1.92 23.7888 1.16211C22.9993 0.40421 21.9467 0 20.8414 0C19.7361 0 18.6835 0.40421 17.894 1.16211L2.26244 16.1432L0.025598 22.6358C-0.184928 23.4442 0.57823 24.1768 1.42034 23.9747L8.15718 21.8021L23.7624 6.82105C24.5782 6.06316 24.9993 5.07789 24.9993 3.99158ZM6.63086 17.6084C5.97297 16.9768 5.20981 16.5474 4.3677 16.2947L17.0519 4.11789L20.6835 7.60421L7.99928 19.8063C7.73613 18.9726 7.26244 18.24 6.63086 17.6084ZM3.5256 17.6589C5.05191 17.9621 6.26244 19.1242 6.60455 20.6147L2.60455 22.1305C2.23612 22.2316 1.89402 21.9032 1.99928 21.5495L3.5256 17.6589ZM21.8151 6.54316L18.1835 3.05684L19.0256 2.24842C20.0256 1.28842 21.6572 1.28842 22.6572 2.24842C23.6572 3.20842 23.6572 4.77474 22.6572 5.73474L21.8151 6.54316Z"
                                                                                            fill="#219653"/>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <a href="#"
                                                                                   @click.prevent="remove(index)">
                                                                                    <svg width="22" height="26"
                                                                                         viewBox="0 0 23 26" fill="none"
                                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                                        <path
                                                                                            d="M15.557 2.05795C16.127 2.05795 16.5629 1.61204 16.5629 1.02893C16.5964 0.480113 16.1605 0.0342028 15.6241 -9.80224e-05C15.5906 -9.80224e-05 15.5906 -9.80224e-05 15.557 -9.80224e-05H7.44333C6.90689 -0.0343988 6.47103 0.411511 6.4375 0.960324C6.4375 0.994625 6.4375 0.994625 6.4375 1.02893C6.4375 1.61204 6.87336 2.05795 7.44333 2.05795H15.557Z"
                                                                                            fill="#EB5757"/>
                                                                                        <path
                                                                                            d="M9.15231 19.9971C9.68876 19.9628 10.1246 19.5169 10.1581 18.9681V11.5934C10.1581 11.0103 9.72229 10.5644 9.15231 10.5644C8.61587 10.5301 8.18001 10.976 8.14648 11.5248C8.14648 11.5591 8.14648 11.5591 8.14648 11.5934V18.9681C8.14648 19.5512 8.58234 19.9971 9.15231 19.9971Z"
                                                                                            fill="#EB5757"/>
                                                                                        <path
                                                                                            d="M13.8476 19.9972C14.4176 19.9972 14.8535 19.5513 14.8535 18.9681V11.5935C14.887 11.0447 14.4511 10.5988 13.9147 10.5645C13.8812 10.5645 13.8812 10.5645 13.8476 10.5645C13.2777 10.5645 12.8418 11.0104 12.8418 11.5935V18.9681C12.8753 19.517 13.3112 19.9629 13.8476 19.9972Z"
                                                                                            fill="#EB5757"/>
                                                                                        <path
                                                                                            d="M21.9942 4.52725H1.00583C0.469388 4.49294 0.0335277 4.93886 0 5.48767C0 5.52197 0 5.52197 0 5.55627C0 6.13938 0.43586 6.58529 1.00583 6.58529H2.51458V22.9125C2.51458 24.6275 3.85569 25.9995 5.53207 25.9995H17.4679C19.1443 25.9995 20.4854 24.6275 20.4854 22.9125V6.58529H21.9942C22.5641 6.58529 23 6.13938 23 5.55627C23.0335 5.00746 22.5977 4.56155 22.0612 4.52725C22.0277 4.52725 22.0277 4.52725 21.9942 4.52725ZM18.4738 22.9125C18.5073 23.4613 18.0714 23.9072 17.535 23.9415C17.5015 23.9415 17.5015 23.9415 17.4679 23.9415H5.53207C4.99563 23.9758 4.55977 23.5299 4.52624 22.9811C4.52624 22.9468 4.52624 22.9468 4.52624 22.9125V6.58529H18.4738V22.9125Z"
                                                                                            fill="#EB5757"/>
                                                                                    </svg>
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="material-switch pull-right">
                                                                                    <input :id="'delete_'+index"
                                                                                           name="someSwitchOption0015"
                                                                                           v-model="promotion.deleted"
                                                                                           type="checkbox"/>
                                                                                    <label :for="'delete_'+index"
                                                                                           class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-add-post"
                                                                   value="Add New Code +" @click.prevent="add">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-top: 20px;">
                                                            <button
                                                                class="profile_admin_btn admin_submit btn btn-add-post"
                                                                style="width: 400px;"
                                                                @click.prevent="saveMaster">Submit
                                                            </button>
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
        <!-- Edit Promo Modal -->
        <div class="modal fade" id="add-new-promocode" role="dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Add Promo Code</h2>
                        <div class="requestmodal-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.promocode}">
                                        <label>Promo Code </label>
                                        <input type="text" class="form-control" id="promocode" v-model="promocode"
                                               placeholder="Enter Promo Code ">
                                        <span class="help-block" v-if="promocode_validation.promocode">
                                @{{ promocode_validation.promocode[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.type}">
                                        <label>Discount Type (Flat Rate / %)</label>
                                        <select class="form-control" v-model="type">
                                            <option value="">Select Discount Type</option>
                                            <option value="flat_rate">Flat Rate</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                        <span class="help-block" v-if="promocode_validation.type">
                                @{{ promocode_validation.type[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.value}">
                                        <label>Promo Value </label>
                                        <input type="text" class="form-control" id="promovalue"
                                               placeholder="Enter Promo Value " v-model="value">
                                        <span class="help-block" v-if="promocode_validation.value">
                                @{{ promocode_validation.value[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.start_date}">
                                        <label>Start Date*</label>
                                        <date-picker id="start_date" v-model="start_date" class="form-control"
                                                     placeholder="Start Date"></date-picker>
                                        <span class="help-block" v-if="promocode_validation.start_date">
                                @{{ promocode_validation.start_date[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.expiry_date}">
                                        <label>Expiry Date*</label>
                                        <date-picker id="expiry_date" v-model="expiry_date" class="form-control"
                                                     placeholder="Expiry Date"></date-picker>
                                        <span class="help-block" v-if="promocode_validation.expiry_date">
                                @{{ promocode_validation.expiry_date[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.limit}">
                                        <label>Usage Limit </label>
                                        <input type="number" placeholder="Enter Usage Limit" name="" v-model="limit"
                                               class="form-control">
                                        <span class="help-block" v-if="promocode_validation.limit">
                                @{{ promocode_validation.limit[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Add Promo Code" class="btn btn-signin"
                                           @click.prevent="addPromoCode">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade" id="edit-promocode" role="dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Edit Promo Code</h2>
                        <div class="requestmodal-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.promocode}">
                                        <label>Promo Code </label>
                                        <input type="text" class="form-control" id="promocode" v-model="edit_promocode"
                                               placeholder="Enter Promo Code ">
                                        <span class="help-block" v-if="promocode_validation.promocode">
                                @{{ promocode_validation.promocode[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.type}">
                                        <label>Discount Type (Flat Rate / %)</label>
                                        <select class="form-control" v-model="edit_type">
                                            <option value="">Select Discount Type</option>
                                            <option value="flat_rate">Flat Rate</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                        <span class="help-block" v-if="promocode_validation.type">
                                @{{ promocode_validation.type[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.value}">
                                        <label>Promo Value </label>
                                        <input type="text" class="form-control" id="promovalue"
                                               placeholder="Enter Promo Value " v-model="edit_value">
                                        <span class="help-block" v-if="promocode_validation.value">
                                @{{ promocode_validation.value[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.start_date}">
                                        <label>Start Date*</label>
                                        <date-picker id="start_date" v-model="edit_start_date" class="form-control"
                                                     placeholder="Start Date"></date-picker>
                                        <span class="help-block" v-if="promocode_validation.start_date">
                                @{{ promocode_validation.start_date[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.expiry_date}">
                                        <label>Expiry Date*</label>
                                        <date-picker id="expiry_date" v-model="edit_expiry_date" class="form-control"
                                                     placeholder="Expiry Date"></date-picker>
                                        <span class="help-block" v-if="promocode_validation.expiry_date">
                                @{{ promocode_validation.expiry_date[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':promocode_validation.limit}">
                                        <label>Usage Limit </label>
                                        <input type="number" placeholder="Enter Usage Limit" name=""
                                               v-model="edit_limit"
                                               class="form-control">
                                        <span class="help-block" v-if="promocode_validation.limit">
                                @{{ promocode_validation.limit[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Add Promo Code" class="btn btn-signin"
                                           @click.prevent="editPromoCode">
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
            promotions:{!! $promotions !!},
            restaurant:{!! $clone !!},
            promocode_validation: {
                promocode: [],
                type: [],
                value: [],
                start_date: [],
                expiry_date: [],
                limit: [],
            },
            promocode: '',
            type: '',
            value: '',
            start_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            expiry_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            limit: '',
            edit_promocode: '',
            edit_type: '',
            edit_value: '',
            edit_start_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            edit_expiry_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            edit_limit: '',
            edit_index: '',
        };
        const promotions = new Vue({
            data: data,
            el: '#promotions',
            methods: {
                saveRestaurant: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.request.restaurant.update')}}', {
                        _token: '{{csrf_token()}}',
                        discount_type: $this.restaurant.discount_type,
                        discount_value: $this.restaurant.discount_value,
                        expiry_date: $this.restaurant.expiry_date,
                        start_date: $this.restaurant.start_date,
                        discount: $this.restaurant.discount,
                        id: '{{$restaurant->id}}',
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                add: function () {
                    this.promocode_validation = {
                        promocode: [],
                        type: [],
                        value: [],
                        start_date: [],
                        expiry_date: [],
                        limit: [],
                    };
                    jQuery('#add-new-promocode').modal('show');
                },
                addPromoCode: function () {
                    this.promocode_validation = {
                        promocode: [],
                        type: [],
                        value: [],
                        start_date: [],
                        expiry_date: [],
                        limit: [],
                    };

                    if (!this.promocode) {
                        this.promocode_validation.promocode.push('Please enter Promo Code');
                    }
                    if (!this.type) {
                        this.promocode_validation.type.push('Please enter Promotion Type');
                    }
                    if (!this.value) {
                        this.promocode_validation.value.push('Please enter Promo Code Value');
                    }
                    if (!this.start_date) {
                        this.promocode_validation.start_date.push('Please enter Start Date');
                    }
                    if (!this.expiry_date) {
                        this.promocode_validation.expiry_date.push('Please enter Expiry Date');
                    }

                    if (!this.limit) {
                        this.promocode_validation.limit.push('Please enter Usage Limit');
                    }

                    if (
                        !this.promocode
                        ||
                        !this.type
                        ||
                        !this.value
                        ||
                        !this.start_date
                        ||
                        !this.expiry_date
                        ||
                        !this.limit
                    ) {
                        return false;
                    }

                    this.promotions.push({
                        id: 0,
                        promocode: this.promocode,
                        type: this.type,
                        value: this.value,
                        start_date: this.start_date,
                        expiry_date: this.expiry_date,
                        limit: this.limit,
                        deleted: false
                    });

                    jQuery('#add-new-promocode').modal('hide');
                },
                remove: function (index) {
                    this.promotions.splice(index, 1);
                },
                edit: function (promotion, index) {
                    this.promocode_validation = {
                        promocode: [],
                        type: [],
                        value: [],
                        start_date: [],
                        expiry_date: [],
                        limit: [],
                    };

                    this.edit_index = index;
                    this.edit_promocode = promotion.promocode;
                    this.edit_type = promotion.type;
                    this.edit_value = promotion.value;
                    this.edit_start_date = promotion.start_date;
                    this.edit_expiry_date = promotion.expiry_date;
                    this.edit_limit = promotion.limit;

                    jQuery('#edit-promocode').modal('show');
                },
                editPromoCode: function () {
                    this.promocode_validation = {
                        promocode: [],
                        type: [],
                        value: [],
                        start_date: [],
                        expiry_date: [],
                        limit: [],
                    };

                    if (!this.edit_promocode) {
                        this.promocode_validation.promocode.push('Please enter Promo Code');
                    }
                    if (!this.edit_type) {
                        this.promocode_validation.type.push('Please enter Promotion Type');
                    }
                    if (!this.edit_value) {
                        this.promocode_validation.value.push('Please enter Promo Code Value');
                    }
                    if (!this.edit_start_date) {
                        this.promocode_validation.start_date.push('Please enter Start Date');
                    }
                    if (!this.edit_expiry_date) {
                        this.promocode_validation.expiry_date.push('Please enter Expiry Date');
                    }
                    if (!this.edit_limit) {
                        this.promocode_validation.limit.push('Please enter Usage Limit');
                    }

                    if (
                        !this.edit_promocode
                        ||
                        !this.edit_type
                        ||
                        !this.edit_value
                        ||
                        !this.edit_start_date
                        ||
                        !this.edit_expiry_date
                        ||
                        !this.edit_limit
                    ) {
                        return false;
                    }

                    this.promotions[this.edit_index] = {
                        promocode: this.edit_promocode,
                        type: this.edit_type,
                        value: this.edit_value,
                        start_date: this.edit_start_date,
                        expiry_date: this.edit_expiry_date,
                        limit: this.edit_limit,
                        deleted: this.promotions[this.edit_index].deleted
                    };

                    jQuery('#edit-promocode').modal('hide');
                },
                saveMaster: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.request.promotion.update')}}', {
                        _token: '{{csrf_token()}}',
                        promotions: $this.promotions,
                        menu_discount: $this.restaurant.menu_discount,
                        promocode: $this.restaurant.promocode,
                        restaurant_id: '{{$restaurant->id}}',
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
            }
        });
    </script>
@endsection
