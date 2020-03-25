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
                            <li class="active"><a href="myaccount-myDetails-address.php">Address </a></li>
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
                                            <label>House / Apt Number + Name</label>
                                            <input type="text" class="form-control" id="housename" placeholder="Enter House / Apt Number + Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Street</label>
                                            <input type="text" class="form-control" id="street" placeholder="Enter Street">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City / Town </label>
                                            <select class="form-control">
                                                <option value="0">Select City / Town</option>
                                                <option value="1">Colombo</option>
                                                <option value="2">Kandy</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>County</label>
                                            <select class="form-control">
                                                <option value="0">Select County</option>
                                                <option value="1">Sri Lanka</option>
                                                <option value="2">London</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Post Code</label>
                                            <input type="text" class="form-control" id="postcode" placeholder="Enter Post Code">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="submit" value="Save & Add Address" class="btn btn-save-changes">
                                    </div>
                                </div>
                                
                                <div class="row add-address">
                                    <div class="col-md-4 col-sm-4">
                                        <div class="">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme"><address>27 Grosvenor Grove <br>Finsbury Avenue <br>Feltham<br> London <br>TW13 4BO</address></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme"><address>27 Grosvenor Grove <br>Finsbury Avenue <br>Feltham<br> London <br>TW13 4BO</address></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme"><address>27 Grosvenor Grove <br>Finsbury Avenue <br>Feltham<br> London <br>TW13 4BO</address></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-4 col-sm-4">
                                        <div class="">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme"><address>27 Grosvenor Grove <br>Finsbury Avenue <br>Feltham<br> London <br>TW13 4BO</address></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme"><address>27 Grosvenor Grove <br>Finsbury Avenue <br>Feltham<br> London <br>TW13 4BO</address></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-md-4 col-sm-4">
                                        <div class="">
                                            <div class="form-group text-left" style="float:left;">
                                                <div class="terms-check">
                                                    <input name="rememberme" type="checkbox" id="rememberme"
                                                           value="forever"  />
                                                    <label for="rememberme"><address>27 Grosvenor Grove <br>Finsbury Avenue <br>Feltham<br> London <br>TW13 4BO</address></label>
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