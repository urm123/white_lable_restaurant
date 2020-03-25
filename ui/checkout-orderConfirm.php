<?php require 'signed-in-header.php';?>

<section class="confirm-address">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="delivery-method">
                    <h2> Order Confirmation</h2>
                    <div class="row order-confirm-row text-center">
                        <div class="col-md-8 col-md-offset-4">
                            <img src="img/delivery-truck.png">
                            <p class="allergy-info-title">Your Order has been Confirmed </p>
                            <p class="allergy-information">Thank you for placing your order. You will receive an order confirmation messages shortly. For your reference, your order ID is 000123424 </p>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="View my Order" class="btn btn-signin btn-confirm-order">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-6 col-xs-12">
                <div class="order-summary-box">
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
                            <div class="col-md-5 col-xs-5 order-status">Order Status </div>
                            <div class="col-md-7 col-xs-7 order-status order-status-time" style="text-align:right;"> 00:32:56 remain  </div>
                        </div>
                        <div class="">
                            <div class="row progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70"
                                     aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                    70%
                                </div>
                            </div>
                            <p class="progress-label col-md-4 col-xs-4 ">Preparation</p><p class="progress-label col-md-4 col-xs-4 text-center">Dispatched</p><p class="progress-label col-md-4 col-xs-4 text-right">Delivered</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php';?>