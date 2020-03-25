<?php require 'signed-in-header.php';?>

<section class="confirm-address">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="delivery-method">
                    <h2> Hi, Jane Doe</h2>
                    <div class="row main-breadcrumb">
                        <ul>
                            <li class="active"><a href="myaccount-myOrdersReservations.php">My Orders & Reservations </a></li>
                            <li><a href="myaccount-myFavourites.php">My Favorites </a></li>
                            <li><a href="myaccount-myDetails.php">My Details  </a></li>
                        </ul>
                    </div>
                    <hr class="breadcrumb-hr">
                    <div class="row sub-breadcrumb">
                        <ul>
                            <li><a href="myaccount-myOrdersReservations.php"> Reservations </a></li>
                            <li class="active"><a href="myaccount-myOrderDeliveries.php">Deliveries </a></li>
                            <li><a href="">Takeaways  </a></li>
                        </ul>
                    </div>
                    <div class="row reservations-section">
                        <div class="col-md-10">
                            <div class="row reservations-row">
                                <div class="col-md-7">
                                    <h3>The Indian Bowl</h3>
                                    <p>No. of People: 3 </p>
                                    <p>Booking #: IB00001</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="contact-icons">
                                        <a href=""> <img src="img/Feedback.png"></a> 
                                        <a href=""> <img src="img/Phone.png"></a> 
                                        <a href="">  <img src="img/Mail.png"></a> 
                                    </div>
                                    <div class="reservation-time">
                                        <p>03:30PM Today <img src="img/back-arrow.png"></p>
                                    </div>
                                </div>
                            </div>

                            <hr class="yellow-hr">

                            <div class="row reservations-row">
                                <div class="col-md-7">
                                    <h3>The Indian Bowl</h3>
                                    <p>No. of People: 3 </p>
                                    <p>Booking #: IB00001</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="contact-icons">
                                        <a href=""> <img src="img/Feedback.png"></a> 
                                        <a href=""> <img src="img/Phone.png"></a> 
                                        <a href="">  <img src="img/Mail.png"></a>  
                                    </div>
                                    <div class="reservation-time">
                                        <p>03:30PM Today <img src="img/back-arrow.png"></p>
                                    </div>
                                </div>
                            </div>

                            <hr class="yellow-hr">

                            <div class="row reservations-row">
                                <div class="col-md-7">
                                    <h3>The Indian Bowl</h3>
                                    <p>No. of People: 3 </p>
                                    <p>Booking #: IB00001</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="contact-icons">
                                        <a href=""> <img src="img/Feedback.png"></a> 
                                        <a href=""> <img src="img/Phone.png"></a> 
                                        <a href="">  <img src="img/Mail.png"></a> 
                                    </div>
                                    <div class="reservation-time">
                                        <p>03:30PM Today<img src="img/back-arrow.png"></p>
                                    </div>
                                </div>
                            </div>

                            <hr class="yellow-hr">

                            <div class="row reservations-row">
                                <div class="col-md-7">
                                    <h3>The Indian Bowl</h3>
                                    <p>No. of People: 3 </p>
                                    <p>Booking #: IB00001</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="contact-icons">
                                        <a href=""> <img src="img/Feedback.png"></a> 
                                        <a href=""> <img src="img/Phone.png"></a> 
                                        <a href="">  <img src="img/Mail.png"></a> 
                                    </div>
                                    <div class="reservation-time">
                                        <p>03:30PM Today <img src="img/back-arrow.png"></p>
                                    </div>
                                </div>
                            </div>

                            <hr class="yellow-hr">

                            <div class="row reservations-row">
                                <div class="col-md-7">
                                    <h3>The Indian Bowl</h3>
                                    <p>No. of People: 3 </p>
                                    <p>Booking #: IB00001</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="contact-icons">
                                        <a href=""> <img src="img/Feedback.png"></a> 
                                        <a href=""> <img src="img/Phone.png"></a> 
                                        <a href="">  <img src="img/Mail.png"></a> 
                                    </div>
                                    <div class="reservation-time">
                                        <p>03:30PM Today <img src="img/back-arrow.png"></p>
                                    </div>
                                </div>
                            </div>

                            <hr class="yellow-hr">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                <div class="order-summary-box my-account-summary-box">
                    <div class="row">
                        <h3>Order Summary </h3>
                        <div class="row order-item-row">
                            <div class="col-md-6 col-xs-6 item-title"> Biriyani, Chicken (x2) w/ Salad </div>
                            <div class="col-md-3 col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                            <div class="col-md-3 col-xs-3 item-price">€15.90</div>
                        </div>
                        <div class="row order-item-row">
                            <div class="col-md-6 col-xs-6 item-title"> Tikka Masala, Chicken </div>
                            <div class="col-md-3 col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                            <div class="col-md-3 col-xs-3 item-price"> €6.95</div>
                        </div>

                        <div class="row order-item-row">
                            <div class="col-md-6 col-xs-6 item-title">Rogan Josh, Lamb  </div>
                            <div class="col-md-3 col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                            <div class="col-md-3 col-xs-3 item-price"> €6.95</div>
                        </div>

                        <div class="row order-item-row">
                            <div class="col-md-6 col-xs-6 item-title"> Aloo Chaat Salad </div>
                            <div class="col-md-3 col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                            <div class="col-md-3 col-xs-3 item-price"> €6.95</div>
                        </div>

                        <div class="row order-item-row">
                            <div class="col-md-6 col-xs-6 item-title">  King Prawns on Puri </div>
                            <div class="col-md-3 col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                <input type="number" id="number" value="0" />
                                <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                            <div class="col-md-3 col-xs-3 item-price"> €6.95</div>
                        </div>
                        <hr>
                        <div class="row order-item-subtotal-row">
                            <div class="col-md-8 col-xs-8 item-sub-total">Subtotal</div>
                            <div class="col-md-4 col-xs-4 item-price"> €45.25</div>
                        </div>

                        <div class="row order-item-subtotal-row">
                            <div class="col-md-8 col-xs-8 item-sub-total"> V.A.T</div>
                            <div class="col-md-4 col-xs-4 item-price"> €00.00</div>
                        </div>

                        <div class="row order-item-subtotal-row">
                            <div class="col-md-8 col-xs-8 item-sub-total">Delivery</div>
                            <div class="col-md-4 col-xs-4 item-price"> €00.00</div>
                        </div>

                        <div class="row order-item-total-row">
                            <div class="col-md-8 col-xs-8 item-total">Total</div>
                            <div class="col-md-4 col-xs-4 item-price item-total"> €45.25</div>
                        </div>
                        <hr>
                        <div class="row order-status-row">
                            <div class="col-md-5 col-xs-5  order-status">Order Status </div>
                            <div class="col-md-7 col-xs-7 order-status order-status-time" style="text-align:right;"> 00:32:56 remain  </div>
                        </div>
                        <div class="">
                            <div class="row progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                     aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    70%
                                </div>
                            </div>
                            <p class="progress-label col-md-4 col-xs-4">Preparation</p><p class="progress-label col-md-4 col-xs-4 text-center">Dispatched</p><p class="progress-label col-md-4 col-xs-4 text-right">Delivered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php';?>