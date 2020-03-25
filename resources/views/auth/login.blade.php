@extends('layouts.app')

@section('content')
    {{--<div id="height"></div>--}}

    {{--<script type="text/javascript">--}}
    {{--window.addEventListener('load', function () {--}}
    {{--let height = window.innerHeight - document.querySelector('footer').clientHeight - 115;--}}
    {{--document.getElementById('height').style.height = height + 'px';--}}
    {{--const modal = jQuery('#signinModal');--}}
    {{--modal.modal({backdrop: 'static', keyboard: false});--}}
    {{--modal.modal('show');--}}
    {{--jQuery('a[data-target="#signupModal"]').click(function (e) {--}}
    {{--e.preventDefault();--}}
    {{--window.location.href = '{{route('register')}}';--}}
    {{--})--}}
    {{--});--}}
    {{--</script>--}}
    <section class="banner-section">
        <div class="container">
            <div class="login-fx-box">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12" id="login-tabs">
                    <div class="col-xs-6">
                        <a href="#" id="sign-in" class="active">{{__('Sign In')}}</a>
                    </div>
                    <div class="col-xs-6">
                        <a href="#" id="sign-up">{{__('Sign Up')}}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-xs-12" id="sign-in-form">
                    <div class="banner-text">
                        <h1 style="padding: 40px 0 0 0;">{{__('Sign In')}} </h1>
                        <form class="signin-form" action="{{route('login')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label style="color: white;">Email*</label>
                                        <input type="email" class="form-control" id="email" value="{{old('email')}}"
                                               name="email"
                                               placeholder=" Enter Email Address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label style="color: white;">Enter Password*</label>
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Enter Password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <input type="submit" value="{{__('Submit')}}" class="btn btn-signin">
                                    <br>
                                    <br>
                                    @if(setting('login_as_guest'))
                                        <span class="no-account">
                                            <a href="{{route('user.guest')}}" style="color:rgb(80,255,98);font-size: 16px;vertical-align: middle;">Login as a guest</a>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6 col-md-offset-3 col-xs-12" style="display: none;" id="sign-up-form">
                    <div class="banner-text">
                        <h1 style="padding: 40px 40px 0 0;">{{__('Sign Up')}}</h1>
                        <form class="signin-form" action="{{route('register')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                                        <label style="color: white;">First Name*</label>
                                        <input type="text" class="form-control" id="first_name"
                                               value="{{old('first_name')}}"
                                               name="first_name"
                                               placeholder=" Enter First Name">
                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                        <label style="color: white;">Last Name*</label>
                                        <input type="text" class="form-control" id="last_name"
                                               value="{{old('last_name')}}"
                                               name="last_name"
                                               placeholder=" Enter Last Name">
                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('last_name') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label style="color: white;">Email*</label>
                                        <input type="email" class="form-control" id="email" value="{{old('email')}}"
                                               name="email"
                                               placeholder=" Enter Email Address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label style="color: white;">Enter Password*</label>
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Enter Password" name="password">
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div
                                        class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label style="color: white;">Confirm Password*</label>
                                        <input type="password" class="form-control" id="password_confirmation"
                                               placeholder="Enter Password" name="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">
                                        <label style="color: white;">Postcode*</label>
                                        <input type="text" class="form-control" id="dining_location"
                                               placeholder="Enter Dining Location" name="postcode">
                                        @if ($errors->has('postcode'))
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('postcode') }}</strong>
                                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-bottom: 40px">
                                    <input type="submit" value="{{__('Submit')}}" class="btn btn-signin">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script type="text/javascript">
        window.addEventListener('load', function () {

            jQuery('.button-signin').css('display', 'none');
            jQuery('.button-signup').css('display', 'none');

            jQuery('#sign-in').click(function (event) {
                event.preventDefault();
                jQuery('#sign-up').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('#sign-up-form').slideUp(200);
                jQuery('#sign-in-form').slideDown(200);
            });
            jQuery('#sign-up').click(function (event) {
                event.preventDefault();
                jQuery('#sign-in').removeClass('active');
                jQuery(this).addClass('active');
                jQuery('#sign-in-form').slideUp(200);
                jQuery('#sign-up-form').slideDown(200);
            });

        });
    </script>
@endsection
