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
                            @include('includes.user-details-header',['active'=>'payment'])
                            <div class="row reservations-section">
                                <div class="col-md-10">
                                    <form class="delivery-form">
                                        <div class="row">
                                            <div class="col-md-12 myaccount-payment">
                                                <div class="panel-group" id="accordion">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="accordion-toggle" data-toggle="collapse"
                                                                   data-parent="#accordion" href="#collapseOne">
                                                                    <img src="{{asset('img/credit-card-icon.png')}}"
                                                                         style="padding-right: 15px;"> Add New Debit or
                                                                    Credit Card
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseOne" class="panel-collapse collapse in">
                                                            <div class="panel-body">
                                                                <div class="row panel-row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Card Number</label>
                                                                            <label class="visa-card-label"><img
                                                                                    src="{{asset('img/visa-card.png')}}"></label>
                                                                            <input type="text" class="form-control"
                                                                                   id="cardnumber"
                                                                                   placeholder="Enter Card Number">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Expiry Date </label>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="expirymonth"
                                                                                           placeholder="MM">
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="expiryyear"
                                                                                           placeholder="YYYY">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Security Number</label>
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <input type="text"
                                                                                           class="form-control"
                                                                                           id="securityno"
                                                                                           placeholder="CVV">
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <img
                                                                                        src="{{asset('img/cvv-icon.png')}}"><br>
                                                                                    <p class="cvv-text"> Last 3 digits
                                                                                        of
                                                                                        the number on the back </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label>Cardholder Name </label>
                                                                            <input type="text" class="form-control"
                                                                                   id="holdername"
                                                                                   placeholder="Enter Card holder Name here">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="">
                                                                    <div class="form-group text-left"
                                                                         style="float:left;">
                                                                        <div class="terms-check">
                                                                            <input name="rememberme" type="checkbox"
                                                                                   id="rememberme"
                                                                                   value="forever"/>
                                                                            <label for="rememberme">Remember this
                                                                                Card</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" value="Add Payment Method"
                                                               class="btn btn-save-changes">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row add-payment-method">
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="">
                                                            <div class="form-group text-left" style="float:left;">
                                                                <div class="terms-check">
                                                                    <input name="rememberme" type="checkbox"
                                                                           id="rememberme"
                                                                           value="forever"/>
                                                                    <label for="rememberme"><img
                                                                            src="{{asset('img/visa-card.png')}}">XXXX
                                                                        XXXX XXXX 10010 </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6">
                                                        <div class="">
                                                            <div class="form-group text-left" style="float:left;">
                                                                <div class="terms-check">
                                                                    <input name="rememberme" type="checkbox"
                                                                           id="rememberme"
                                                                           value="forever"/>
                                                                    <label for="rememberme">
                                                                        <img src="{{asset('img/visa-card.png')}}">XXXX
                                                                        XXXX XXXX 10010
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
