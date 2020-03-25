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
                            <li  class="active"><a href="myaccount-myDetails-communicationPreference.php"> Communication Preferences</a></li>
                            <li><a href="myaccount-myDetails-payment.php"> Payment</a></li>
                        </ul>
                    </div>
                    <div class="row reservations-section">
                        <div class="col-md-10">
                            <form class="delivery-form">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="my-accounts-terms-check">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme">Receive emails about our offers</label>
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
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme">Receive emails about new restaurants in your area</label>
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
</section>
<?php require 'footer.php';?>