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
                            @include('includes.user-details-header',['active'=>'communication'])
                            <div class="row reservations-section">
                                <div class="col-md-12">
                                    <form class="delivery-form" method="post"
                                          action="{{route('user.communication.post')}}">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-accounts-terms-check">
                                                    <div class="form-group text-left" style="float:left;">
                                                        <div class="terms-check">
                                                            <input name="offer_emails" type="checkbox" id="offer_emails"
                                                                   value="true"
                                                                   @if($user->offer_emails) checked="checked" @endif/>
                                                            <label for="offer_emails">
                                                                Receive emails about our
                                                                offers
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-accounts-terms-check">
                                                    <div class="form-group text-left" style="float:left;">
                                                        <div class="terms-check">
                                                            <input name="restaurant_emails" type="checkbox"
                                                                   id="restaurant_emails"
                                                                   value="true"
                                                                   @if($user->restaurant_emails) checked="checked" @endif/>
                                                            <label for="restaurant_emails">
                                                                Receive emails about new
                                                                restaurants in
                                                                your area
                                                            </label>
                                                        </div>
                                                    </div>
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
