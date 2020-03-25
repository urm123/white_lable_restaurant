@extends('layouts.admin')

@section('content')
    <div id="menus">

        <section>
            <div class="container">
                <div class="row res-admin">
                    <div class="col-md-2 col-sm-3 res-admin-side">
                        @include('includes.admin-side-bar',['active'=>'menu'])
                    </div>
                    <div class="col-md-10 col-sm-9" style="/*background-color: #E5E5E5*/">
                        <div class="filter-greybox">
                            <div class="select-box">
                                <select v-model="selected_menu_id" @change="getMenu">
                                    <option value="0">All</option>
                                    <option v-for="(menu,index) in menus" :value="menu.id">@{{ menu.name }}
                                    </option>
                                </select>
                                <button class="add-new" @click.prevent="editMenu">Edit Category</button>
                                <button class="add-new" data-toggle="modal" data-target="#add-new-item-modal">Add New
                                    Item +
                                </button>
                                <button class="add-new" data-toggle="modal" data-target="#add-new-category">Add New
                                    Category
                                    +
                                </button>
                                <div class="sort">{{__('Sort by:')}}
                                    <select v-model="sort" @change.prevent="sortMenu">
                                        <option value="asc">Sort by A-Z</option>
                                        <option value="desc">Sort by Z-A</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12" v-for="menu_item in menu.menu_items">
                                <div class="item-list">
                                    <div class="row ">
                                        <div class="col-md-9 col-sm-9 col-xs-12 menu-description">
                                            <div class="">
                                                <h3>@{{ menu_item.name }}
                                                    {{--                                                    <span class="on-off"> <label--}}
                                                    {{--                                                            class="switch1"><input--}}
                                                    {{--                                                                type="checkbox" v-model="menu_item.deleted"--}}
                                                    {{--                                                                @change.prevent="deleteMenuItem(menu_item)"><span--}}
                                                    {{--                                                                class="slider1 round"></span></label></span>--}}
                                                    &nbsp; <a
                                                        class="text-red" @click.prevent="editMenuItem(menu_item)">edit
                                                        item</a> &nbsp;
                                                    <button @click.prevent="forceDeleteMenuItem(menu_item.id)"
                                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                        Delete
                                                    </button>
                                                </h3>
                                                <p>@{{ menu_item.description }}</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">
                                            <div class="img-box">
                                                <img :src="menu_item.logo" class="img-responsive" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row item-cost">
                                        <div class="col-md-9 col-sm-9"></div>
                                        <div class="col-md-3 col-sm-3">
                                            <h5>‎£ @{{ currency(menu_item.price) }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous"
                                               @click.prevent="jumpToPage(pagination.first_page)">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li v-for="page in pagination.last_page"
                                            :class="getCurrentPage(page)"><a href="#" @click.prevent="jumpToPage(page)">@{{
                                                page }}</a>
                                        </li>
                                        <li>
                                            <a href="#" aria-label="Next" @click.prevent="jumpToPage(pagination.last_page)">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade add-new-item-modal" id="add-new-category" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4>Add New Category</h4>
                        <hr>
                        <p>Category Name*</p>
                        <div class="form-group" :class="{'has-error':menu_validation.name}">
                            <input type="text" placeholder="Enter Item Name" name="category" v-model="menu_name"
                                   class="form-control">
                            <span v-if="menu_validation.name"
                                  class="help-block">
                                            @{{ menu_validation.name[0] }}
                                        </span>
                        </div>
                        <input type="submit" name="" value="Create" @click.prevent="createMenu">
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade add-new-item-modal" id="edit-category" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4>Edit Category</h4>
                        <hr>
                        <p>Category Name*
                            <button class="btn btn-danger" @click.prevent="deleteMenu"><i class="fa fa-times"></i>
                                Delete Category
                            </button>
                        </p>
                        <div class="form-group" :class="{'has-error':menu_validation.name}">
                            <input type="text" placeholder="Enter Item Name" name="category" v-model="edit_menu_name"
                                   class="form-control">
                            <span v-if="menu_validation.name"
                                  class="help-block">
                                            @{{ menu_validation.name[0] }}
                                        </span>
                        </div>
                        <input type="submit" name="" value="Create" @click.prevent="updateMenu">
                    </div>
                </div>

            </div>
        </div>

        <div class="modal fade add-new-item-modal modal-lg" id="add-new-item-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4>Add New Item</h4>
                        <hr>
                        <div class="form-group" :class="{'has-error':menu_item_validation.cuisinename}">
                            <p>Cuisine</p>

                            <select v-model="cuisinename" :id="identifier" class="form-control" multiple>
                                <option v-for="cuisine in cuisines" :key="cuisine.id" :value="cuisine.id">
                                    @{{ cuisine.name }}
                                </option>
                            </select>
                            <span class="help-block" v-if="menu_item_validation.cuisinename">
                                @{{ menu_item_validation.cuisinename[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_validation.menu_id}">
                            <p>Item Category</p>
                            <select v-model="menu_id" class="form-control">
                                <option v-for="menu in menus" :value="menu.id">@{{ menu.name }}</option>
                            </select>
                            <span class="help-block" v-if="menu_item_validation.menu_id">
                                @{{ menu_item_validation.menu_id[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_validation.name}">
                            <p>Item Name*</p>
                            <input type="text" placeholder="Enter Item Name" name="" v-model="name">
                            <span class="help-block" v-if="menu_item_validation.name">
                                @{{ menu_item_validation.name[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_validation.description}">
                            <p>Item Description*</p>
                            <textarea placeholder="Enter Item Description" rows="6" v-model="description"
                                      maxlength="255"></textarea>
                            <span class="help-block" v-if="menu_item_validation.description">
                                @{{ menu_item_validation.description[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_validation.price}">
                            <p>Item Price*</p>
                            <input type="number" placeholder="Enter Price" name="" v-model="price" min="0" step="0.01">
                            <span class="help-block" v-if="menu_item_validation.price">
                                @{{ menu_item_validation.price[0] }}
                            </span>
                        </div>

                        <div class="form-group" :class="{'has-error':menu_item_validation.vat_category}">
                            <p>Vat Category*</p>
                            <select name="" class="form-control" v-model="vat_category">
                                <option value="food" selected="selected">Food</option>
                                <option value="alcohol">Alcohol</option>
                            </select>
                            <span class="help-block" v-if="menu_item_validation.vat_category">
                                @{{ menu_item_validation.vat_category[0] }}
                            </span>
                        </div>

                        <div class="img-upload-box">
                            Click or Drag Item Image to Upload
                            <input type="file" id="create-image">
                            <p class="help-block">Max filesize: 1MB</p>
                        </div>

                        <div class="form-group">
                            <img src="" alt="" class="img-responsive" id="create-preview" style="display: none;">
                        </div>

                        <hr>

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Index</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tr v-for="(variant,v_index) in variants">
                                <td>
                                    @{{ v_index+1 }}
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_validation.variant}">
                                        <input type="text" placeholder="Enter Variant Name" name=""
                                               v-model="variant.name" :list="'variant_new_'+v_index">
                                        <datalist :id="'variant_new_'+v_index">
                                            @foreach($variants as $varaint)
                                                <option value="{{$varaint->name}}">{{$varaint->name}}</option>
                                            @endforeach
                                        </datalist>
                                        <span class="help-block" v-if="menu_item_validation.variant">
                                @{{ menu_item_validation.variant[0] }}
                            </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_validation.variant}">
                                        <input type="number" placeholder="Enter Variant Price" name=""
                                               v-model="variant.pivot.price"
                                               min="0" step="0.01">
                                        <span class="help-block" v-if="menu_item_validation.variant">
                                @{{ menu_item_validation.variant[0] }}
                            </span>

                                    </div>
                                </td>
                                <td><a href="#" @click.prevent="removeVariant(v_index)"
                                       class="btn btn-danger btn-sm">Remove</a></td>
                            </tr>
                        </table>

                        <button class="add-item-varient-btn" @click.prevent="addVariant">Add Item Variant +</button>
                        <hr>

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Index</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tr v-for="(addon,a_index) in addons">
                                <td>
                                    @{{ a_index+1 }}
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_validation.addon}">
                                        <input type="text" placeholder="Enter Addon Name" name=""
                                               v-model="addon.name" :list="'addon_new_'+a_index">
                                        <datalist :id="'addon_new_'+a_index">
                                            @foreach($addons as $addon)
                                                <option value="{{$addon->name}}">{{$addon->name}}</option>
                                            @endforeach
                                        </datalist>
                                        <span class="help-block" v-if="menu_item_validation.addon">
                                @{{ menu_item_validation.addon[0] }}
                            </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_validation.addon}">
                                        <input type="number" placeholder="Enter Addon Price" name=""
                                               v-model="addon.pivot.price"
                                               min="0" step="0.01">
                                        <span class="help-block" v-if="menu_item_validation.addon">
                                @{{ menu_item_validation.addon[0] }}
                            </span>
                                    </div>
                                </td>
                                <td><a href="#" @click.prevent="removeAddon(a_index)"
                                       class="btn btn-sm btn-danger">Remove</a></td>
                            </tr>
                        </table>


                        <button class="add-item-varient-btn" @click.prevent="addAddon">Add Item Addon +</button>

                        {{--<p class="checkbox-modal"><input type="checkbox" name=""> Deactivate--}}
                        {{--Item</p>--}}

                        <input type="submit" name="" value="Submit" @click.prevent="createMenuItem">
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Item Modal -->

        <!-- Edit Item Modal -->
        <div class="modal fade add-new-item-modal" id="edit-item-modal" role="dialog">

            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <h4>Edit Item</h4>
                        <hr>
                        <div class="form-group" :class="{'has-error':menu_item_update_validation.cuisine_id}">
                            <p>Cuisine</p>
                            <select v-model="menu_item.cuisine_id" class="" multiple>
                                <option v-for="cuisine in cuisines" :value="cuisine.id">@{{ cuisine.name }}</option>
                            </select>
                            <span class="help-block" v-if="menu_item_update_validation.cuisine_id">
                                @{{ menu_item_update_validation.cuisine_id[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_update_validation.menu_id}">
                            <p>Item Category</p>
                            <select v-model="menu_item.menu_id">
                                <option v-for="menu in menus" :value="menu.id">@{{ menu.name }}</option>
                            </select>
                            <span class="help-block" v-if="menu_item_update_validation.menu_id">
                                @{{ menu_item_update_validation.menu_id[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_update_validation.name}">
                            <p>Item Name*</p>
                            <input type="text" placeholder="Enter Item Name" name="" v-model="menu_item.name">
                            <span class="help-block" v-if="menu_item_update_validation.name">
                                @{{ menu_item_update_validation.name[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_update_validation.description}">
                            <p>Item Description*</p>
                            <textarea placeholder="Enter Item Description" rows="6"
                                      v-model="menu_item.description" maxlength="255"></textarea>
                            <span class="help-block" v-if="menu_item_update_validation.description">
                                @{{ menu_item_update_validation.description[0] }}
                            </span>
                        </div>
                        <div class="form-group" :class="{'has-error':menu_item_update_validation.price}">
                            <p>Item Price*</p>
                            <input type="text" placeholder="Enter Price" name="" v-model="menu_item.price" min="0"
                                   step="0.01">
                            <span class="help-block" v-if="menu_item_update_validation.price">
                                @{{ menu_item_update_validation.price[0] }}
                            </span>
                        </div>

                        <div class="form-group" :class="{'has-error':menu_item_update_validation.vat_category}">
                            <p>Vat Category*</p>
                            <select name="" v-model="menu_item.vat_category">
                                <option value="food">Food</option>
                                <option value="alcohol">Alcohol</option>
                            </select>
                            <span class="help-block" v-if="menu_item_update_validation.vat_category">
                                @{{ menu_item_validation.vat_category[0] }}
                            </span>
                        </div>

                        <div class="img-upload-box">
                            Click or Drag Item Image to Upload
                            <input type="file" id="edit-image">
                            <p class="help-block">Max filesize: 1MB</p>
                        </div>

                        <div class="form-group">
                            <img src="" alt="" class="img-responsive" id="edit-preview" style="display: none">
                        </div>

                        <div class="form-group" :class="{'has-error':menu_item_update_validation.notes}">
                            <p>Additional Notes</p>
                            <textarea placeholder="Enter Note" rows="6" v-model="menu_item.notes"></textarea>
                            <span class="help-block" v-if="menu_item_update_validation.notes">
                                @{{ menu_item_update_validation.notes[0] }}
                            </span>
                        </div>


                        {{--                        new code--}}
                        {{--                        new code--}}
                        {{--                        new code--}}

                        <hr>

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Index</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tr v-for="(variant,v_index) in menu_item.variants">
                                <td>
                                    @{{ v_index+1 }}
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.variant}">
                                        <input type="text" placeholder="Enter Variant Name" name=""
                                               v-model="variant.name" :list="'variant_edit_'+v_index">
                                        <datalist :id="'variant_edit_'+v_index">
                                            @foreach($variants as $varaint)
                                                <option value="{{$varaint->name}}">{{$varaint->name}}</option>
                                            @endforeach
                                        </datalist>

                                        <span class="help-block" v-if="menu_item_update_validation.variant">
                                @{{ menu_item_update_validation.variant[0] }}
                            </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.variant}">
                                        <input type="text" placeholder="Enter Variant Price" name=""
                                               v-model="variant.pivot.price"
                                               min="0" step="0.01">
                                        <span class="help-block" v-if="menu_item_update_validation.variant">
                                @{{ menu_item_update_validation.variant[0] }}
                            </span>
                                    </div>
                                </td>
                                <td><a href="#" @click.prevent="removeEditVariant(menu_item.variants,v_index)"
                                       class="btn btn-danger btn-sm">Remove</a></td>
                            </tr>
                        </table>

                        <button class="add-item-varient-btn" @click.prevent="addVariantUpdate">Add Item Variant +
                        </button>
                        <hr>

                        <table class="table table-responsive">
                            <thead>
                            <tr>
                                <th>Index</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tr v-for="(addon,a_index) in menu_item.addons">
                                <td>
                                    @{{ a_index+1 }}
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.addon}">
                                        <input type="text" placeholder="Enter Addon Name" name=""
                                               v-model="addon.name" :list="'addon_edit_'+a_index">
                                        <datalist :id="'addon_edit_'+a_index">
                                            @foreach($addons as $addon)
                                                <option value="{{$addon->name}}">{{$addon->name}}</option>
                                            @endforeach
                                        </datalist>


                                        <span class="help-block" v-if="menu_item_update_validation.addon">
                                @{{ menu_item_update_validation.addon[0] }}
                            </span>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group" :class="{'has-error':menu_item_update_validation.addon}">
                                        <input type="text" placeholder="Enter Addon Price" name=""
                                               v-model="addon.pivot.price"
                                               min="0"
                                               step="0.01">
                                        <span class="help-block" v-if="menu_item_update_validation.addon">
                                @{{ menu_item_update_validation.addon[0] }}
                            </span>
                                    </div>
                                </td>
                                <td><a href="#" @click.prevent="removeEditAddon(menu_item.addons,a_index)"
                                       class="btn btn-sm btn-danger">Remove</a></td>
                            </tr>
                        </table>


                        <button class="add-item-varient-btn" @click.prevent="addAddonUpdate">Add Item Addon +</button>


                        {{--                        new code--}}
                        {{--                        new code--}}
                        {{--                        new code--}}

                        {{--                        <div class="form-group" :class="{'has-error':menu_item_update_validation.promo_code}">--}}
                        {{--                            <p>Promo</p>--}}
                        {{--                            <p>Promo Code</p>--}}
                        {{--                            <input type="text" placeholder="Enter Promocode" name="" v-model="menu_item.promo_code">--}}
                        {{--                            <span class="help-block" v-if="menu_item_update_validation.promo_code">--}}
                        {{--                                @{{ menu_item_update_validation.promo_code[0] }}--}}
                        {{--                            </span>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group" :class="{'has-error':menu_item_update_validation.promo_type}">--}}
                        {{--                            <p>Discount Type(Flat Rate/ %)</p>--}}
                        {{--                            <select type="text" name="" v-model="menu_item.promo_type">--}}
                        {{--                                <option value="flat_rate">Flat Rate</option>--}}
                        {{--                                <option value="percentage">Percentage</option>--}}
                        {{--                            </select>--}}
                        {{--                            <span class="help-block" v-if="menu_item_update_validation.promo_type">--}}
                        {{--                                @{{ menu_item_update_validation.promo_type[0] }}--}}
                        {{--                            </span>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="form-group" :class="{'has-error':menu_item_update_validation.promo_value}">--}}
                        {{--                            <p>Promo Value</p>--}}
                        {{--                            <input type="text" placeholder="Enter Promo Value" name="" v-model="menu_item.promo_value">--}}
                        {{--                            <span class="help-block" v-if="menu_item_update_validation.promo_value">--}}
                        {{--                                @{{ menu_item_update_validation.promo_value[0] }}--}}
                        {{--                            </span>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group" :class="{'has-error':menu_item_update_validation.promo_usage}">--}}
                        {{--                            <p>Usage Limit</p>--}}
                        {{--                            <input type="number" placeholder="Enter Usage Limit" name=""--}}
                        {{--                                   v-model="menu_item.promo_usage">--}}
                        {{--                            <span class="help-block" v-if="menu_item_update_validation.promo_usage">--}}
                        {{--                                @{{ menu_item_update_validation.promo_usage[0] }}--}}
                        {{--                            </span>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group" :class="{'has-error':menu_item_update_validation.promo_date}">--}}
                        {{--                            <p>Expiry Date</p>--}}
                        {{--                            <date-picker id="promo_date" placeholder="Enter Expiry Date"--}}
                        {{--                                         v-model="menu_item.promo_date"></date-picker>--}}
                        {{--                            <span class="help-block" v-if="menu_item_update_validation.promo_date">--}}
                        {{--                                @{{ menu_item_update_validation.promo_date[0] }}--}}
                        {{--                            </span>--}}
                        {{--                        </div>--}}
                        <hr>

                        <p class="checkbox-modal"><input type="checkbox" name="" v-model="menu_item.deleted"> Deactivate
                            Item</p>

                        <input type="submit" name="" value="Submit" @click.prevent="updateMenuItem">
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script type="text/javascript">
        var data = {
            menus:{!! json_encode($menus) !!},
            cuisines:{},
            menu: {},
            selected_menu_id: 0,
            menu_name: '',
            menu_validation: [],
            menu_item_validation: [],
            menu_item_update_validation: [],
            addons: [],
            variants: [],
            cuisinename: [],
            cuisine_id: '',
            menu_id: '',
            name: '',
            description: '',
            price: '',
            vat_category: '',
            notes: '',
            menu_item: {},
            sort: 'asc',
            edit_menu_name: '',
            edit_menu_id: '',
            pagination: {}
        };

        var menus = new Vue({
            data: data,
            el: '#menus',
            mounted: function () {
                this.selected_menu_id = 0;
                this.getCuisines();
                this.getMenu();
                this.getMenus();
            },
            methods: {
                getCuisines: function () {
                    let $this = this;
                    axios.post('{{route('admin.cuisines.get')}}', {
                        _token: '{{csrf_token()}}',
                    })
                        .then(function (response) {
                            $this.cuisines = response.data.data.cuisines;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                getMenus: function () {
                    let $this = this;
                    axios.post('{{route('admin.menus.get')}}', {
                        _token: '{{csrf_token()}}',
                    })
                        .then(function (response) {
                            $this.menus = response.data.data.menus;
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                getMenu: function (page = '') {
                    let $this = this;
                    var page_url = '';
                    if (page) {
                        page_url = '?page=' + page;
                    }
                    axios.post('{{route('admin.menu.get')}}'+ page_url, {
                        _token: '{{csrf_token()}}',
                        menu_id: $this.selected_menu_id
                    })
                        .then(function (response) {
                            $this.menu = response.data.data.menu;
                            $this.sortMenu();
                            $this.pagination = {
                                current_page: response.data.data.menu.menu_items_pagination.current_page,
                                from: response.data.data.menu.menu_items_pagination.from,
                                last_page: response.data.data.menu.menu_items_pagination.last_page,
                                path: response.data.data.menu.menu_items_pagination.path,
                                per_page: response.data.data.menu.menu_items_pagination.per_page,
                                to: response.data.data.menu.menu_items_pagination.to,
                                total: response.data.data.menu.menu_items_pagination.total,
                            };
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                jumpToPage: function (page) {
                    this.getMenu(page);
                },
                getCurrentPage: function (page) {
                    if (page == this.pagination.current_page) {
                        return 'active';
                    } else {
                        return '';
                    }
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
                                $this.menu_name = '';
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
                    this.variants.push({name: '', pivot: {price: 0}});
                },
                addAddon: function () {
                    this.addons.push({name: '', pivot: {price: 0}});
                },

                removeVariant: function (index) {
                    this.variants.splice(index, 1);
                },
                removeAddon: function (index) {
                    this.addons.splice(index, 1);
                },
                removeEditVariant: function (variants, index) {
                    variants.splice(index, 1);
                },
                removeEditAddon: function (addons, index) {
                    addons.splice(index, 1);
                },

                addVariantUpdate: function () {
                    this.menu_item.variants.push({id: '', name: '', pivot: {price: 0}});
                },
                addAddonUpdate: function () {
                    this.menu_item.addons.push({id: '', name: '', pivot: {price: 0}});
                },
                createMenuItem: function () {
                    let $this = this;

                    if (!$this.price) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please add valid menu item price!',
                            theme: 'error'
                        });

                        return false;
                    }

                    if ($this.variants) {

                        $this.variants.every(function (variant) {
                            if (!variant.pivot.price) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please add valid variant price!',
                                    theme: 'error'
                                });
                                return false;
                            }
                        });
                    }
                    if ($this.addons) {


                        $this.addons.every(function (addon) {
                            if (!addon.pivot.price) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please add valid addon price!',
                                    theme: 'error'
                                });

                                return false;
                            }
                        });

                    }


                    let post_data = {
                        _token: '{{csrf_token()}}',
                        addons: $this.addons,
                        cuisinename: $this.cuisinename,
                        variants: $this.variants,
                        menu_id: $this.menu_id,
                        menu_item_id: $this.id,
                        name: $this.name,
                        description: $this.description,
                        price: $this.price,
                        vat_category: $this.vat_category,
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
                    console.log(menu_item)
                    this.menu_item = menu_item;
                    jQuery('#edit-item-modal').modal('show');
                },
                updateMenuItem: function () {
                    let $this = this;

                    if (!this.menu_item.price) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please add valid menu item price!',
                            theme: 'error'
                        });

                        return false;
                    }

                    if ($this.menu_item.variants) {

                        $this.menu_item.variants.every(function (variant) {
                            if (!variant.pivot.price) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please add valid variant price!',
                                    theme: 'error'
                                });
                                return false;
                            }
                        });
                    }
                    if ($this.menu_item.addons) {


                        $this.menu_item.addons.every(function (addon) {
                            if (!addon.pivot.price) {
                                $.alert({
                                    title: '{{__('Oh Sorry!')}}',
                                    content: 'Please add valid addon price!',
                                    theme: 'error'
                                });

                                return false;
                            }
                        });

                    }

                    let put_data = {
                        _token: '{{csrf_token()}}',
                        addons: $this.menu_item.addons,
                        variants: $this.menu_item.variants,
                        cuisine_id: $this.menu_item.cuisine_id,
                        menu_id: $this.menu_item.menu_id,
                        menu_item_id: $this.id,
                        name: $this.menu_item.name,
                        description: $this.menu_item.description,
                        price: $this.menu_item.price,
                        vat_category: $this.menu_item.vat_category,
                        notes: $this.menu_item.notes,
                        deleted: $this.menu_item.deleted,
                        promo_code: $this.menu_item.promo_code,
                        promo_type: $this.menu_item.promo_type,
                        promo_value: $this.menu_item.promo_value,
                        promo_usage: $this.menu_item.promo_usage,
                        promo_date: $this.menu_item.promo_date,
                    };


                    if (document.getElementById('edit-image').files.length) {
                        let file = document.getElementById('edit-image').files[0];


                        this.getFile(file).then(function (data) {
                            put_data.logo = data;
                            axios.put('{{route('admin.menu-item.index')}}/' + $this.menu_item.id, put_data)
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
                        axios.put('{{route('admin.menu-item.index')}}/' + $this.menu_item.id, put_data)
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
                },
                editMenu: function () {
                    if (this.selected_menu_id == 0) {
                        $.alert({
                            title: '{{__('Oh Sorry!')}}',
                            content: 'Please Select a Menu to Continue!',
                            theme: 'error'
                        });
                        return false;
                    } else {
                        var selected_menu_id = this.selected_menu_id;
                        var selected_menu = this.menus.filter(function (menu) {
                            return selected_menu_id == menu.id
                        });
                        this.edit_menu_name = selected_menu[0].name;
                        this.edit_menu_id = selected_menu[0].id;
                        jQuery('#edit-category').modal('show');
                    }
                },
                updateMenu: function () {
                    let $this = this;
                    axios.put('{{route('admin.menu.index')}}/' + this.selected_menu_id, {
                        _token: '{{csrf_token()}}',
                        name: $this.edit_menu_name,
                    })
                        .then(function (response) {
                            if (response.data.message == 'success') {
                                jQuery('#edit-category').modal('hide');
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
                deleteMenu: function () {
                    let $this = this;
                    axios.post('{{route('admin.menu.delete')}}', {
                        _token: '{{csrf_token()}}',
                        name: $this.edit_menu_name
                    }).then(function (response) {
                        if (response.data.message == 'success') {
                            jQuery('#edit-category').modal('hide');
                            $this.getMenus();
                            $.alert({title: 'Success!', content: 'Deleted Successfully!', theme: 'success'});
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
                forceDeleteMenuItem: function (id) {
                    $.confirm({
                        title: 'Confirm!',
                        content: 'Are you sure you want to delete this menu?',
                        theme: 'error',
                        buttons: {
                            confirm: function () {
                                axios.post('{{route('admin.menu-item.force-delete')}}', {
                                    _token: '{{csrf_token()}}',
                                    menu_item_id: id
                                }).then(function (response) {
                                    if (response.data.message == 'success') {
                                        $.alert({
                                            title: 'Success!',
                                            content: 'Menu item deleted successfully!',
                                            theme: 'success'
                                        });
                                    }
                                }).catch(function (error) {
                                    console.log(error);
                                });
                            },
                            cancel: function () {

                            },
                        }
                    });


                },
                currency: function (price) {
                    const formatter = new Intl.NumberFormat('en-US', {
                        currency: 'USD',
                        minimumFractionDigits: 2,
                        maximumFractionDigits: 2,
                    });

                    return formatter.format(price)

                },
            }
        });

        document.querySelector('#create-image').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#create-preview').style.display = 'block';
                    document.querySelector('#create-preview').setAttribute('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
        document.querySelector('#edit-image').addEventListener('change', function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    document.querySelector('#edit-preview').style.display = 'block';
                    document.querySelector('#edit-preview').setAttribute('src', e.target.result);
                };

                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>

@endsection

<!-- Edit Item Modal -->
