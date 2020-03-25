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
                            @include('includes.user-details-header',['active'=>'password'])
                            <div class="row reservations-section">
                                <div class="col-md-10">
                                    <form class="delivery-form" method="post" action="{{route('user.password.post')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group @if($errors->has('current_password')) has-error @endif">
                                                    <label for="current_password">Current Password</label>
                                                    <input type="password" class="form-control"
                                                           id="current_password"
                                                           name="current_password"
                                                           placeholder="Enter Current Password">
                                                    @if($errors->has('current_password'))
                                                        <span class="help-block">
                                                        {{$errors->first('current_password')}}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('password')) has-error @endif">
                                                    <label for="password">New Password</label>
                                                    <input type="password" class="form-control" id="password"
                                                           name="password"
                                                           placeholder="Enter New Password">
                                                    @if($errors->has('password'))
                                                        <span class="help-block">
                                                        {{$errors->first('password')}}
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpassword">Confirm New Password</label>
                                                    <input type="password" class="form-control" id="cpassword"
                                                           name="password_confirmation"
                                                           placeholder="Re-enter New Password">
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
