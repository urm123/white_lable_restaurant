@extends('layouts.master-admin')

@section('content')
    <div id="menus">
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
                            <div class="tab-pane fade in active" id="restaurant-profile">
                                <div class="restaurant-menu-section">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <h2>{{$restaurant->name}}</h2>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <select class="form-control pull-right" @change="getMenu"
                                                    v-model="selected_menu_id">
                                                <option v-for="(menu,index) in menus" :value="menu.id">@{{ menu.name }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6" v-for="menu_item in menu.menu_items">
                                            <div class="menu-item">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="row menu-item-row">
                                                            <div class="col-md-7 col-sm-7">
                                                                <p>@{{ menu_item.name }}</p>
                                                            </div>
                                                            <div class="col-md-2 col-sm-2">
                                                                <div class="material-switch pull-right">
                                                                    <input type="checkbox" v-model="menu_item.deleted"
                                                                           @change.prevent="deleteMenuItem(menu_item)"
                                                                           :id="'switch_'+menu_item.id"/>
                                                                    <label class="label-success"
                                                                           :for="'switch_'+menu_item.id"></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 col-sm-3">
                                                                <a href="#" @click.prevent="editMenuItem(menu_item)">edit
                                                                    item</a>
                                                            </div>
                                                        </div>
                                                        <div class="row menu-item-description">
                                                            <div class="col-md-12">
                                                                <p>@{{ menu_item.description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <img :src="menu_item.logo" alt=""
                                                             class="pull-right img-responsive"
                                                             style="object-fit: cover;width: 100%;">
                                                    </div>
                                                </div>
                                                <div class="row menu-item-price">
                                                    <div class="col-md-8 col-xs-8">

                                                    </div>
                                                    <div class="col-md-4 col-xs-4">
                                                        <p class="pull-right">‎£ @{{ menu_item.price }}</p>
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


        <!-- Edit item Modal -->
        <div class="modal fade" id="edit-item-modal" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h2>Edit Item </h2>
                        <div class="requestmodal-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.menu_id}">
                                        <label>Item Category</label>
                                        <select class="form-control" v-model="menu_item.menu_id">
                                            <option v-for="menu in menus" :value="menu.id">@{{ menu.name }}</option>
                                        </select>
                                        <span class="help-block" v-if="menu_item_update_validation.menu_id">
                                @{{ menu_item_update_validation.menu_id[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.name}">
                                        <label>Item Name*</label>
                                        <input type="text" class="form-control" id="itemname"
                                               placeholder="Enter Item Name" v-model="menu_item.name">
                                        <span class="help-block" v-if="menu_item_update_validation.name">
                                @{{ menu_item_update_validation.name[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.description}">
                                        <label>Item Description*</label>
                                        <textarea class="form-control" placeholder="Enter Item Description" rows="5"
                                                  v-model="menu_item.description"
                                                  cols="7"></textarea>
                                        <span class="help-block" v-if="menu_item_update_validation.description">
                                @{{ menu_item_update_validation.description[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.logo}">
                                        <div class="img-upload-box">
                                            <input type="file" id="edit-image">
                                            <p class="help-block">Max filesize: 1MB</p>
                                            Click or Drag Item Image to Upload
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img src="" id="edit-image-preview" class="img-responsive" style="display: none;">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.notes}">
                                        <label>Additional Notes </label>
                                        <textarea class="form-control" placeholder="Enter note " rows="5"
                                                  cols="7" v-model="menu_item.notes"></textarea>
                                        <span class="help-block" v-if="menu_item_update_validation.notes">
                                @{{ menu_item_update_validation.notes[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>
                            <div v-for="(variant,v_index) in menu_item.variants">
                                <hr class="yellow-hr">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':menu_item_update_validation.variant}">
                                            <label>Variant @{{ v_index+1}} <img src="img/x-red.png"></label>
                                            <span class="help-block" v-if="menu_item_update_validation.variant">
                                @{{ menu_item_update_validation.variant[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':menu_item_update_validation.variant}">
                                            <label>Variant Name*</label>
                                            <input type="text" class="form-control" id="varientname"
                                                   placeholder="Enter Variant Name " v-model="variant.name">
                                            <span class="help-block" v-if="menu_item_update_validation.variant">
                                @{{ menu_item_update_validation.variant[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':menu_item_update_validation.variant}">
                                            <label>Variant Price*</label>
                                            <input type="text" class="form-control" id="varientprice"
                                                   placeholder=" Enter Price  " v-model="variant.price">
                                            <span class="help-block" v-if="menu_item_update_validation.variant">
                                @{{ menu_item_update_validation.variant[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div v-for="(addon,a_index) in menu_item.addons">
                                <hr class="yellow-hr">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':menu_item_update_validation.addon}">
                                            <label>Addon @{{ a_index+1 }} <img src="img/x-red.png"></label>
                                            <span class="help-block" v-if="menu_item_update_validation.addon">
                                @{{ menu_item_update_validation.addon[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':menu_item_update_validation.addon}">
                                            <label>Addon Name* </label>
                                            <input type="text" class="form-control" id="addonname"
                                                   placeholder="Enter Addon Name " v-model="addon.name">
                                            <span class="help-block" v-if="menu_item_update_validation.addon">
                                @{{ menu_item_update_validation.addon[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"
                                             :class="{'has-error':menu_item_update_validation.addon}">
                                            <label>Addon Price*</label>
                                            <input type="text" class="form-control" id="addonprice"
                                                   placeholder=" Enter Price  " v-model="addon.price">
                                            <span class="help-block" v-if="menu_item_update_validation.addon">
                                @{{ menu_item_update_validation.addon[0] }}
                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="yellow-hr">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.promo_code}">
                                        <label>Promo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.promo_code}">
                                        <label>Promo Code </label>
                                        <input type="text" class="form-control" id="promocode"
                                               placeholder="Enter Promo Code " v-model="menu_item.promo_code">
                                        <span class="help-block" v-if="menu_item_update_validation.promo_code">
                                @{{ menu_item_update_validation.promo_code[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.promo_type}">
                                        <label>Discount Type (Flat Rate / %)</label>
                                        <select class="form-control" v-model="menu_item.promo_type">
                                            <option value="flat_rate">Flat Rate</option>
                                            <option value="percentage">Percentage</option>
                                        </select>
                                        <span class="help-block" v-if="menu_item_update_validation.promo_type">
                                @{{ menu_item_update_validation.promo_type[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.promo_value}">
                                        <label>Promo Value </label>
                                        <input type="text" class="form-control" id="promovalue"
                                               placeholder="Enter Promo Value " v-model="menu_item.promo_value">
                                        <span class="help-block" v-if="menu_item_update_validation.promo_value">
                                @{{ menu_item_update_validation.promo_value[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.promo_usage}">
                                        <label>Usage Limit </label>
                                        <input class="form-control" v-model="menu_item.promo_usage">
                                        <span class="help-block" v-if="menu_item_update_validation.promo_usage">
                                @{{ menu_item_update_validation.promo_usage[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group"
                                         :class="{'has-error':menu_item_update_validation.promo_date}">
                                        <label>Expiry Date </label>
                                        <date-picker id="promo_date" placeholder="Enter Expiry Date"
                                                     v-model="menu_item.promo_date" class="form-control"></date-picker>
                                        <span class="help-block" v-if="menu_item_update_validation.promo_date">
                                @{{ menu_item_update_validation.promo_date[0] }}
                            </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-add-varient" @click.prevent="addVariantUpdate"> Add Item
                                        Variant +</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a href="#" @click.prevent="addAddonUpdate" class="btn btn-add-varient"> Add Item
                                        Addon +</a>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Submit" class="btn btn-signin"
                                           @click.prevent="updateMenuItem">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        var data = {
            menus:{!! json_encode($menus) !!},
            menu: {},
            selected_menu_id: 0,
            menu_name: '',
            menu_validation: [],
            menu_item_validation: [],
            menu_item_update_validation: [],
            addons: [],
            variants: [],
            menu_id: '',
            name: '',
            description: '',
            price: '',
            notes: '',
            menu_item: {},
            sort: 'asc'
        };

        var menus = new Vue({
            data: data,
            el: '#menus',
            mounted: function () {
                this.selected_menu_id = this.menus[0].id;
                this.getMenu();
                this.getMenus();
            },
            methods: {
                getMenus: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.menus.get')}}?restaurant={{$restaurant->id}}', {
                        _token: '{{csrf_token()}}',
                    })
                        .then(function (response) {
                            $this.menus = response.data.data.menus;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                getMenu: function () {
                    let $this = this;
                    axios.post('{{route('master-admin.menu.get')}}?restaurant={{$restaurant->id}}', {
                        _token: '{{csrf_token()}}',
                        menu_id: $this.selected_menu_id
                    })
                        .then(function (response) {
                            $this.menu = response.data.data.menu;
                            $this.sortMenu();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                createMenu: function () {
                    let $this = this;
                    axios.post('{{route('admin.menu.store')}}', {
                        _token: '{{csrf_token()}}',
                        name: $this.menu_name,
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#add-new-category').modal('hide');
                                $this.getMenus();
                                $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                            }
                        })
                        .catch(function (error) {
                            if (error.response.status == 422) {
                                $this.menu_validation = error.response.data.errors;
                            }

                            if (error.response.status == 401) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please Login to Continue!',
                                    theme: 'error'
                                });
                            }
                        });
                },
                addVariant: function () {
                    this.variants.push({name: '', price: 0});
                },
                addAddon: function () {
                    this.addons.push({name: '', price: 0});
                },
                addVariantUpdate: function () {
                    this.menu_item.variants.push({name: '', price: 0});
                },
                addAddonUpdate: function () {
                    this.menu_item.addons.push({name: '', price: 0});
                },
                createMenuItem: function () {
                    let $this = this;


                    let post_data = {
                        _token: '{{csrf_token()}}',
                        addons: $this.addons,
                        variants: $this.variants,
                        menu_id: $this.menu_id,
                        name: $this.name,
                        description: $this.description,
                        price: $this.price,
                        notes: $this.notes,
                    };

                    if (document.getElementById('create-image').files.length) {
                        let file = document.getElementById('create-image').files[0];

                        this.getFile(file).then(function (data) {

                            post_data.logo = data;

                            axios.post('{{route('admin.menu-item.store')}}', post_data)
                                .then(function (response) {
                                    if (response.data.message == 'success') {
                                        jQuery('#add-new-item-modal').modal('hide');
                                        $this.getMenu();
                                        $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                                        $this.menu_item = {};
                                    }
                                })
                                .catch(function (error) {
                                    if (error.response.status == 422) {
                                        $this.menu_item_validation = error.response.data.errors;
                                    }

                                    if (error.response.status == 401) {
                                        $.alert({
                                            title: '{{__('Oh Sorry!')}}',
                                            content: 'Please Login to Continue!',
                                            theme: 'error'
                                        });
                                    }
                                });
                        });

                    } else {
                        axios.post('{{route('admin.menu-item.store')}}', post_data)
                            .then(function (response) {
                                if (response.data.message == 'success') {
                                    jQuery('#add-new-item-modal').modal('hide');
                                    $this.getMenu();
                                    $.alert({title: 'Success!', content: 'Saved Successfully!', theme: 'success'});
                                    $this.menu_item = {};
                                }
                            })
                            .catch(function (error) {
                                if (error.response.status == 422) {
                                    $this.menu_item_validation = error.response.data.errors;
                                }

                                if (error.response.status == 401) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Please Login to Continue!',
                                        theme: 'error'
                                    });
                                }
                            });
                    }


                },
                editMenuItem: function (menu_item) {
                    this.menu_item = menu_item;
                    jQuery('#edit-item-modal').modal('show');
                },
                updateMenuItem: function () {
                    let $this = this;

                    let put_data = {
                        _token: '{{csrf_token()}}',
                        addons: $this.menu_item.addons,
                        variants: $this.menu_item.variants,
                        menu_id: $this.menu_item.menu_id,
                        name: $this.menu_item.name,
                        description: $this.menu_item.description,
                        price: $this.menu_item.price,
                        notes: $this.menu_item.notes,
                        deleted: $this.menu_item.deleted,
                        promo_code: $this.menu_item.promo_code,
                        promo_type: $this.menu_item.promo_type,
                        promo_value: $this.menu_item.promo_value,
                        promo_usage: $this.menu_item.promo_usage,
                        promo_date: $this.menu_item.promo_date,
                        restaurant: '{{$restaurant}}'
                    };
                    if (document.getElementById('edit-image').files.length) {
                        let file = document.getElementById('edit-image').files[0];


                        this.getFile(file).then(function (data) {
                            put_data.logo = data;
                            axios.put('{{route('master-admin.menu-item.index')}}/' + $this.menu_item.id, put_data)
                                .then(function (response) {
                                    if (response.data.message == 'success') {
                                        jQuery('#edit-item-modal').modal('hide');
                                        $this.getMenu();
                                        $.alert({
                                            title: 'Success!',
                                            content: 'Updated Successfully!',
                                            theme: 'success'
                                        });
                                        $this.menu_item = {};
                                    }
                                })
                                .catch(function (error) {
                                    if (error.response.status == 422) {
                                        $this.menu_item_validation = error.response.data.errors;
                                    }

                                    if (error.response.status == 401) {
                                        $.alert({
                                            title: '{{__('Oh Sorry!')}}',
                                            content: 'Please Login to Continue!',
                                            theme: 'error'
                                        });
                                    }
                                });
                        });
                    } else {
                        axios.put('{{route('master-admin.menu-item.index')}}/' + $this.menu_item.id, put_data)
                            .then(function (response) {
                                if (response.data.message == 'success') {
                                    jQuery('#edit-item-modal').modal('hide');
                                    $this.getMenu();
                                    $.alert({title: 'Success!', content: 'Updated Successfully!', theme: 'success'});
                                    $this.menu_item = {};
                                }
                            })
                            .catch(function (error) {
                                if (error.response.status == 422) {
                                    $this.menu_item_validation = error.response.data.errors;
                                }

                                if (error.response.status == 401) {
                                    $.alert({
                                        title: '{{__('Oh Sorry!')}}',
                                        content: 'Please Login to Continue!',
                                        theme: 'error'
                                    });
                                }
                            });
                    }
                },
                deleteMenuItem: function (menu_item) {
                    menu_item.deleted = !menu_item.deleted;
                    this.menu_item = menu_item;
                    this.updateMenuItem();
                },
                getFile: function (file) {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.readAsDataURL(file);
                        reader.onload = () => resolve(reader.result);
                        reader.onerror = error => reject(error);
                    });
                },
                sortMenu: function () {
                    this.menu.menu_items = _.orderBy(this.menu.menu_items, ['name'], [this.sort]);
                }
            }
        });

        window.addEventListener('load', function () {
            jQuery('.col-md-4 img').each(function (cuisine) {
                jQuery(this).height(jQuery(this).width());
            });
        });

        document.querySelector('#edit-image').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#edit-image-preview').setAttribute('src', e.target.result);
                    document.querySelector('#edit-image-preview').style.display = 'block';
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
@endsection
