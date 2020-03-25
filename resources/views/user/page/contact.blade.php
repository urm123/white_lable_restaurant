@extends('layouts.app')

@section('content')
    <section class="container-fluid page-header no-gutters" style="@if(setting('contact_main_banner')) background: url({{ asset('storage/'.setting('contact_main_banner')) }}) @else background: url({{ asset('img/menu-header.png') }}) @endif">
        <div class="row">
            <div class="col-xs-12">
                <h1>Contact Us</h1>
            </div>
        </div>
    </section>
    <section class="main-section" style="margin-top: 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-content">
                        <div class="row">
                            <form class="delivery-form contact-form" method="post"
                                  action="{{route('user.contact.post')}}">
                                @csrf
                                <div class="col-md-12 col-xs-12">
                                    <div class="delivery-method">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div
                                                    class="form-group @if($errors->has('first_name')) has-error @endif">
                                                    <label for="first_name">First Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                           placeholder="Enter your First name" name="first_name">
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
                                                    <input type="text" class="form-control" id="last_name"
                                                           placeholder="Enter your Last name" name="last_name">
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
                                                    <input type="email" class="form-control" id="email"
                                                           placeholder="Enter Email" name="email">
                                                    @if($errors->has('email'))
                                                        <span class="help-block">
                                                    {{$errors->first('email')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group @if($errors->has('phone')) has-error @endif">
                                                    <label for="phone">Phone Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="tel" class="form-control" id="phone"
                                                           placeholder="Enter Phone number" name="phone">
                                                    @if($errors->has('phone'))
                                                        <span class="help-block">
                                                    {{$errors->first('phone')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group @if($errors->has('message')) has-error @endif">
                                                    <label for="message">Message <span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control" id="message" rows="7" cols="5"
                                                              name="message" maxlength="255"
                                                              placeholder="Enter your message"></textarea>
                                                    <script type="text/javascript">
                                                        let remainingCount = 255;
                                                        document.getElementById('message').addEventListener('keyup', function (event) {
                                                            remainingCount = 255 - event.target.value.length;
                                                            document.getElementById('character-count').innerHTML = remainingCount;
                                                        });
                                                    </script>
                                                    <span class="help-block small">Max <span
                                                            id="character-count">255</span> characters</span>
                                                    @if($errors->has('message'))
                                                        <span class="help-block">
                                                    {{$errors->first('message')}}
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Submit Message"
                                                       class="btn btn-signin btn-confirm-order">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row" style="margin-top: 70px">
                            <div class="col-xs-12">
                                <h2>Find us here:</h2>
                                <div class="col-xs-12" style="padding:30px 0 0">
                                    <p>
                                        {{$restaurant->name}}<br/>
                                        {{$restaurant->county}}<br/>
                                        {{$restaurant->postcode}} <br/>
                                        {{$restaurant->city}}, {{$restaurant->country}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 50px;">
                            <div class="col-xs-12">
                                <div class="map-responsive">
                                    {!! setting('google_map_code') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
@endsection
