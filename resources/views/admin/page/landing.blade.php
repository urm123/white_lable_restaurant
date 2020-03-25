@extends('layouts.admin')


@section('content')
    <section class="banner-section">
        <!--    --><?php //include 'header.php';?>
        <div class="container">
            <div class="">
                <div class="banner-text">
                    <h1>Admin? Sign up here</h1>
                    <p>{{__('')}}</p>
                </div>
                @guest
                    <div class="row">
                        <div class="col-md-4"></div>
{{--                        <div class="col-md-3 col-xs-12">--}}
{{--                            <button class="button-signup-admin button-signup" data-toggle="modal"--}}
{{--                                    data-target="#signupModal">{{__('Join the Namaste India Family')}}--}}
{{--                            </button>--}}
{{--                        </div>--}}
                        <div class="col-md-4 col-xs-12">
                            <button class="button-signin-admin button-signup" data-toggle="modal"
                                    data-target="#signinModal">Sign In
                            </button>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                @endguest

                @auth
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <p>
                                You are logged in as user. Please logout to proceed.
                            </p>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button type="button" class="button-signup-admin button-signup" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">Logout
                            </button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
            @endauth
            <!-- <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-8">
                            <div class="search-text">
                                <input type="text" name="" placeholder="{{__('Enter Postcode, Location, Restaurant, or Cuisine')}} ">
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="search-text">
                            <p>{{__('Enter Postcode, Location, Restaurant, or Cuisine')}} <a href='javascript:showDropDelivery()'> <span class="delivery"> Delivery  <img src="img/down-arrow.png" class="down-arrow img-responsive"></span> </a></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <button class="button-find">{{__('Find Restaurants')}}</button>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <div id="dropdown-content-delivery" style="display: none;">
                            <ul>
                                <li>{{__("Takeaway")}}</li>
                                <li>{{__("Reservations")}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div> -->

            </div>
        </div>
    </section>
@endsection
