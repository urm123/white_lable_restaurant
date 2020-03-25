@extends('layouts.master-admin')

@section('content')
    <div class="row">
        <div class="panel with-nav-tabs panel-default">
            @include('includes.master-admin-settings-header')
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active table-responsive" id="admin-users">
                        <div class="restaurant-profile-form">
                            <div class="row">
                                <div class="col-md-9 col-xs-12">
                                    <form method="post" action="{{route('master-admin.admin-user.profile.post')}}">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 form-group @if($errors->has('first_name')) has-error @endif">
                                                <label>First Name*</label>
                                                <input type="text" class="form-control" placeholder="Enter First Name "
                                                       name="first_name"
                                                       value="{{$user->first_name}}">
                                                @if($errors->has('first_name'))
                                                    <span class="help-block">
                                                        {{$errors->first('first_name')}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-6 form-group @if($errors->has('last_name')) has-error @endif">
                                                <label>Last Name*</label>
                                                <input type="text" class="form-control" placeholder="Enter Last Name"
                                                       name="last_name"
                                                       value="{{$user->last_name}}">
                                                @if($errors->has('last_name'))
                                                    <span class="help-block">
                                                        {{$errors->first('last_name')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 form-group @if($errors->has('email')) has-error @endif">
                                                <label>Email address*</label>
                                                <input type="email" class="form-control"
                                                       placeholder="Enter Email Address" value="{{$user->email}}"
                                                       name="email">
                                                @if($errors->has('email'))
                                                    <span class="help-block">
                                                        {{$errors->first('email')}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-6 form-group @if($errors->has('phone')) has-error @endif">
                                                <label>Phone Number*</label>
                                                <input type="tel" class="form-control" placeholder="Enter Phone Number"
                                                       name="phone"
                                                       value="{{$user->phone}}">
                                                @if($errors->has('phone'))
                                                    <span class="help-block">
                                                        {{$errors->first('phone')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 form-group @if($errors->has('password')) has-error @endif">
                                                <label>Password*</label>
                                                <input type="password" class="form-control" name="password"
                                                       placeholder="Enter Password">
                                                @if($errors->has('password'))
                                                    <span class="help-block">
                                                        {{$errors->first('password')}}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label>Repeat Password*</label>
                                                <input type="password" class="form-control"
                                                       placeholder="Re enter password" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <label>Country*</label>
                                                <input type="text" class="form-control" name="country"
                                                       value="{{$user->country}}">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label>City* </label>
                                                <input type="text" class="form-control" placeholder="Enter City"
                                                       name="city" value="{{$user->city}}">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <label>State/Province*</label>
                                                <input class="form-control" name="province" value="{{$user->province}}">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <label>Zip/Postal Code* </label>
                                                <input type="text" class="form-control" name="postcode"
                                                       value="{{$user->postcode}}"
                                                       placeholder="Enter Zip/Postal Code">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <input type="submit" class="btn btn-approve" value="Save Changes">
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
    </div>
@endsection
