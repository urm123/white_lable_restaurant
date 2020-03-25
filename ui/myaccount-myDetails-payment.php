<?php require 'signed-in-header.php';?>

<section class="confirm-address">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <div class="delivery-method">
                    <h2> Hi, Jane Doe</h2>
                    <div class="row main-breadcrumb">
                        <ul>
                            <li><a href="myaccount-myOrdersReservations.php">My Orders & Reservations </a></li>
                            <li><a href="myaccount-myFavourites.php">My Favorites </a></li>
                            <li  class="active"><a href="myaccount-myDetails.php">My Details  </a></li>
                        </ul>
                    </div>
                    <hr class="breadcrumb-hr">
                    <div class="row sub-breadcrumb">
                        <ul>
                            <li><a href="myaccount-myDetails.php"> Profile </a></li>
                            <li><a href="myaccount-myDetails-password.php">Password </a></li>
                            <li><a href="myaccount-myDetails-address.php">Address </a></li>
                            <li><a href="myaccount-myDetails-diningPreference.php">  Dining Preference</a></li>
                            <li><a href="myaccount-myDetails-communicationPreference.php"> Communication Preferences</a></li>
                            <li class="active"><a href="myaccount-myDetails-payment.php"> Payment</a></li>
                        </ul>
                    </div>
                    <div class="row reservations-section">
                        <div class="col-md-10">
                            <form class="delivery-form">
                                <div class="row">
                                    <div class="col-md-8 myaccount-payment">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                            <img src="img/credit-card-icon.png" style="padding-right: 15px;">   Add New Debit or Credit Card 
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <div class="row panel-row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Card Number</label>
                                                                    <label class="visa-card-label"><img src="img/visa-card.png"></label>
                                                                    <input type="text" class="form-control" id="cardnumber" placeholder="Enter Card Number">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Expiry Date </label>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="expirymonth" placeholder="MM">
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input type="text" class="form-control" id="expiryyear" placeholder="YYYY">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Security Number</label>
                                                                    <div class="row">
                                                                        <div class="col-md-8">
                                                                            <input type="text" class="form-control" id="securityno" placeholder="CVV">
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <img src="img/cvv-icon.png"><br>
                                                                            <p class="cvv-text"> Last 3 digits of the number on the back </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Cardholder Name </label>
                                                                    <input type="text" class="form-control" id="holdername" placeholder="Enter Card holder Name here">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="">
                                                            <div class="form-group text-left" style="float:left;">
                                                                <div class="terms-check">
                                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                                           value="forever"  />
                                                                    <label for="rememberme">Remember this Card</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Add Payment Method" class="btn btn-save-changes">
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
                                                            <input name="rememberme" type="checkbox" id="rememberme"
                                                                   value="forever"  />
                                                            <label for="rememberme"><img src="img/visa-card.png">0011 0111 1110 10010 </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <div class="">
                                                    <div class="form-group text-left" style="float:left;">
                                                        <div class="terms-check">
                                                            <input name="rememberme" type="checkbox" id="rememberme"
                                                                   value="forever"  />
                                                            <label for="rememberme"><img src="img/visa-card.png">0011 0111 1110 10010 </label>
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
</section>
<?php require 'footer.php';?>