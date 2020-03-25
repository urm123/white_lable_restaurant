@extends('layouts.app')

@section('content')

    <section class="confirm-address">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="delivery-method">
                        <div class="col-sm-3">
                            @include('includes.user-header',['active'=>'details'])
                        </div>
                        <div class="col-sm-9">
                            @include('includes.user-details-header',['active'=>'profile'])
                            <div class="row reservations-section">
                                <div class="col-md-12">
                                    <form class="delivery-form" method="post" action="{{route('user.profile.post')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group @if($errors->has('first_name')) has-error @endif">
                                                    <label for="first_name">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="first_name"
                                                           value="{{$user->first_name}}"
                                                           id="first_name"
                                                           placeholder="Enter First Name">
                                                    @if($errors->has('first_name'))
                                                        <span class="help-block">
                                                        {{$errors->first('first_name')}}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('last_name')) has-error @endif">
                                                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="last_name"
                                                           value="{{$user->last_name}}"
                                                           id="last_name"
                                                           placeholder="Enter Last Name">
                                                    @if($errors->has('last_name'))
                                                        <span class="help-block">
                                                        {{$errors->first('last_name')}}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('email')) has-error @endif">
                                                    <label for="email">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" name="email"
                                                           value="{{$user->email}}"
                                                           id="email"
                                                           placeholder="Enter Email address">
                                                    @if($errors->has('email'))
                                                        <span class="help-block">
                                                        {{$errors->first('email')}}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('phone')) has-error @endif">
                                                    <label for="phone">Contact Number <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="phone"
                                                           value="{{$user->phone}}"
                                                           id="phone"
                                                           placeholder="Enter Contact Number">
                                                    @if($errors->has('phone'))
                                                        <span class="help-block">
                                                        {{$errors->first('phone')}}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="submit" value="Save Changes" class="btn btn-save-changes">
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
    </section>

@endsection
