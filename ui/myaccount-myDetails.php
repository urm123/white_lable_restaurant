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
                            <li class="active"><a href="myaccount-myDetails.php"> Profile </a></li>
                            <li><a href="myaccount-myDetails-password.php">Password </a></li>
                            <li><a href="myaccount-myDetails-address.php">Address </a></li>
                            <li><a href="myaccount-myDetails-diningPreference.php">  Dining Preference</a></li>
                            <li><a href="myaccount-myDetails-communicationPreference.php"> Communication Preferences</a></li>
                            <li><a href="myaccount-myDetails-payment.php"> Payment</a></li>
                        </ul>
                    </div>
                    <div class="row reservations-section">
                        <div class="col-md-10">
                            <form class="delivery-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email address">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" class="form-control" id="contactno" placeholder="Enter Contact Number">
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