@extends('layouts.admin')
@section('content')
    <section>
        <div class="container">
            <div class="row res-admin">
                <div class="col-md-2 col-sm-3 res-admin-side">
                    @include('includes.admin-side-bar',['active'=>'settings'])
                </div>
                <div class="col-md-10 profile-ph col-sm-9" style="/*background-color: #E5E5E5*/">
                    <div class="filter-greybox">
                        <div class="profile-head">
                            <h4>
                                @include('includes.admin-settings-header',['active'=>'restaurant'])
                            </h4>
                        </div>
                    </div>
                    <div class="profile_class">
                        <form action="{{ url('admin/global-settings/store') }}" method="post">
                            @csrf
                            <div id="menu1" class="tab-pane active">
                                @if(count(config('setting_fields.restaurant', [])) )
                                    @foreach(config('setting_fields.restaurant', []) as $section => $fields)
                                        <div class="row">
                                            <div class="setting-header-title">{{ $fields['title'] }}</div>
                                        </div>
                                        @foreach($fields['elements'] as $field)
                                            @includeIf('fields.' . $field['type'] )
                                        @endforeach
                                        <hr>
                                    @endforeach
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <button type="submit" class="profile_admin_btn">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


