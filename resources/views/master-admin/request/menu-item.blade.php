@extends('layouts.master-admin')

@section('content')
    <div id="menus">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#">Menu Items</a>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active">
                                <div class="restaurant-menu-section">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <h2>{{$restaurant->name}}</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{route('master-admin.menu-item-clone.approve')}}"
                                                  method="post">
                                                @csrf
                                                <input type="hidden" name="restaurant_id"
                                                       value="{{$restaurant->id}}">
                                                <table class="table table-responsive requests-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Category</th>
                                                        <th>Menu Item</th>
                                                        <th>Image</th>
                                                        <th>Description</th>
                                                        <th>{{__('Price')}}</th>
                                                        <th>Addons</th>
                                                        <th>Variants</th>
                                                        <th>Active</th>
                                                        <th>Deleted</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($menu_items as $menu_item)
                                                        <input type="hidden"
                                                               name="menu_ids[{{$menu_item->menu_item_id}}]"
                                                               value="{{$menu_item->menu_id}}">
                                                        <tr>
                                                            <td>
                                                                {{$menu_item->menu->name}}
                                                            </td>
                                                            <td>
                                                                <input name="names[{{$menu_item->menu_item_id}}]"
                                                                       class="form-control"
                                                                       type="text" value="{{$menu_item->name}}">
                                                            </td>
                                                            <td>
                                                                <img src="{{getStorageUrl().$menu_item->logo}}"
                                                                     style="max-width: 100px;" class="img-responsive"
                                                                     alt="">
                                                            </td>
                                                            <td>
                                                                <input name="descriptions[{{$menu_item->menu_item_id}}]"
                                                                       class="form-control"
                                                                       type="text" value="{{$menu_item->description}}">
                                                            </td>
                                                            <td>
                                                                <input name="prices[{{$menu_item->menu_item_id}}]"
                                                                       class="form-control"
                                                                       type="text" value="{{$menu_item->price}}">
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    @foreach($menu_item->addonClones as $addon_clone)
                                                                        <li>{{$addon_clone->name}} -
                                                                            ({{$addon_clone->price}})
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <ul>
                                                                    @foreach($menu_item->variantClones as $variant_clone)
                                                                        <li>{{$variant_clone->name}} -
                                                                            ({{$variant_clone->price}})
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <input name="actives[{{$menu_item->menu_item_id}}]"
                                                                       type="checkbox"
                                                                       value="true"
                                                                       @if(!$menu_item->deleted_at) checked="checked" @endif>
                                                                <input type="hidden"
                                                                       name="menu_items[{{$menu_item->menu_item_id}}]"
                                                                       value="{{$menu_item->menu_item_id}}">
                                                            </td>
                                                            <td>
                                                                @if($menu_item->deleted)
                                                                    <label class="label label-danger">Deleted</label>
                                                                @else
                                                                    <label class="label label-success">Active</label>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="9" class="text-right">
                                                            <input type="submit" value="Approve" name="approve"
                                                                   class="btn btn-success">
                                                            <input type="submit" value="Reject" class="btn btn-danger"
                                                                   name="approve">
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                </table>
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
@endsection
