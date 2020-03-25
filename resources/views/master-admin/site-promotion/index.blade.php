@extends('layouts.master-admin')

@section('content')
    <div id="promotions">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading single-project-nav">
                    @include('includes.master-admin-platform-header',['active'=>'promotion'])
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="cuisines">
                            <div class="promotions-section">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="discount-form">
                                            <form>
                                                <div class="row setting-wide-row">
                                                    <div class="col-md-4 col-xs-8">
                                                        <h3>Site Wide Discount</h3>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <div class="material-switch pull-right">
                                                            <input id="site_promotion"
                                                                   name="someSwitchOption0015" type="checkbox"
                                                                   v-model="setting.discount"/>
                                                            <label for="site_promotion"
                                                                   class="label-success"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row discount-select-row">
                                                    <div class="col-sm-3">
                                                        <label>Discount Type (Flat Rate / %)</label>
                                                        <select v-model="setting.discount_type"
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
                                                               v-model="setting.discount_value">
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Start Date</label>
                                                        <date-picker class="form-control" id="expiry_date"
                                                                     v-model="setting.start_date"
                                                                     placeholder="Expiry Date"></date-picker>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <label>Expiry Date</label>
                                                        <date-picker class="form-control" id="expiry_date"
                                                                     v-model="setting.expiry_date"
                                                                     placeholder="Expiry Date"></date-picker>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn btn-add-post"
                                                               @click.prevent="saveSetting" value="Save Changes">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="discount-promo-form">
                                            <div>
                                                <div class="row setting-wide-row">
                                                    <div class="col-md-4 col-xs-8">
                                                        <h3>Promo Codes </h3>
                                                    </div>
                                                    <div class="col-md-2 col-xs-4">
                                                        <div class="material-switch pull-right">
                                                            <input id="site_promocode"
                                                                   name="someSwitchOption0017" type="checkbox"
                                                                   v-model="setting.promocode"/>
                                                            <label for="site_promocode"
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
                                                                    <span
                                                                        v-if="promotion.type=='flat_rate'">Flat Rate</span>
                                                                    <span
                                                                        v-if="promotion.type=='percentage'">Percentage</span>
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
                                                                        <div class="col-md-4 col-sm-4">
                                                                            <a href="#"
                                                                               @click.prevent="edit(promotion,index)"><img
                                                                                    src="{{asset('master-admin/img/Edit.png')}}"></a>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-4">
                                                                            <a href="#"
                                                                               @click.prevent="remove(index)">
                                                                                <img
                                                                                    src="{{asset('master-admin/img/Delete.png')}}">
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-4 col-sm-4">
                                                                            <div class="material-switch pull-right">
                                                                                <input :id="'promotion_active_'+index"
                                                                                       name="someSwitchOption0015"
                                                                                       v-model="promotion.deleted"
                                                                                       type="checkbox"/>
                                                                                <label :for="'promotion_active_'+index"
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
                                                        <button class="profile_admin_btn admin_submit btn btn-add-post"
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
        <div class="modal fade" id="add-new-promocode" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
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
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
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
            setting:{!! $setting !!},
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
            edit_expiry_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            edit_start_date: '{{\Carbon\Carbon::now()->toDateString()}}',
            edit_limit: '',
            edit_index: '',
        };
        const promotions = new Vue({
            data: data,
            el: '#promotions',
            methods: {
                saveSetting: function () {
                    let $this = this;
                    axios.put('{{route('master-admin.setting.update',$setting)}}', {
                        _token: '{{csrf_token()}}',
                        discount_type: $this.setting.discount_type,
                        discount_value: $this.setting.discount_value,
                        start_date: $this.setting.start_date,
                        expiry_date: $this.setting.expiry_date,
                        discount: $this.setting.discount,
                        setting_id: '{{$setting->id}}',
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
                        !this.start_date ||
                        !this.expiry_date
                        ||
                        !this.limit
                    ) {
                        return false;
                    }

                    this.promotions.push({
                        promocode: this.promocode,
                        type: this.type,
                        value: this.value,
                        start_date: this.start_date,
                        expiry_date: this.expiry_date,
                        limit: this.limit,
                        deleted: true
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
                    this.edit_expiry_date = promotion.expiry_date;
                    this.edit_start_date = promotion.start_date;
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
                    if (!this.edit_expiry_date) {
                        this.promocode_validation.expiry_date.push('Please enter Expiry Date');
                    }
                    if (!this.edit_start_date) {
                        this.promocode_validation.start_date.push('Please enter Start Date');
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
                        !this.edit_start_date ||
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
                    axios.post('{{route('master-admin.site-promotion.store')}}', {
                        _token: '{{csrf_token()}}',
                        promotions: $this.promotions,
                        promocode: $this.setting.promocode,
                        setting_id: '{{$setting->id}}',
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
