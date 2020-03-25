@extends('layouts.master-admin')

@section('content')
    <div id="menus">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel with-nav-tabs panel-default">
                    <div class="panel-heading resturant-profile-nav">
                        <ul class="nav nav-tabs">
                            <li>
                                <a href="#">{{__('Menu')}}</a>
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
                                            <form action="{{route('master-admin.menu-clone.approve')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="restaurant_id" value="{{$restaurant->id}}">
                                                <table class="table table-responsive requests-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Active</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($menus as $menu)
                                                        <tr>
                                                            <td>
                                                                <input name="names[{{$menu->id}}]" class="form-control"
                                                                       type="text" value="{{$menu->name}}">
                                                            </td>
                                                            <td>
                                                                <input name="actives[{{$menu->id}}]" type="checkbox"
                                                                       value="true"
                                                                       @if(!$menu->trashed())checked="checked" @endif>
                                                                <input type="hidden" name="menus[{{$menu->id}}]"
                                                                       value="{{$menu->menu_id}}">
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <td colspan="2" class="text-right">
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
