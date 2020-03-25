<?php require 'signed-in-header.php';?>

<section class="confirm-address">
    <div class="container">
        <div class="row">
            <form class="delivery-form">
                <div class="col-md-6 col-xs-12 col-sm-6">
                    <div class="delivery-method">
                        <h2>Delivery Address </h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>House / Apt Number + Name</label>
                                    <input type="text" class="form-control" id="housename" placeholder="Enter House / Apt Number + Name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Street</label>
                                    <input type="text" class="form-control" id="street" placeholder="Enter Street">
                                </div>
                            </div>

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
                        </div>

                        <div class="row">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Post Code</label>
                                    <input type="text" class="form-control" id="postcode" placeholder="Enter Post Code">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Instructions for your Rider</label>
                                    <textarea class="form-control" id="instructions" rows="7" cols="5" placeholder="Enter instaructions for your rider"></textarea>
                                </div>
                            </div>
                        </div>

                        <h2>Payment Method </h2>

                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                            <img src="img/credit-card-icon.png" style="padding-right: 15px;">  Pay with a Debit or Credit Card
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
                                            <div class="col-md-8">
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
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                            <img src="img/cash-icon.png" style="padding-right: 15px;">  Ticket Restaurant
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                            <img src="img/cash1-icon.png" style="padding-right: 15px;">  Pay with Cash on Delivery
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h2> Promo Code </h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Promo Code</label>
                                    <input type="text" class="form-control" id="cardnumber" placeholder="Enter Promo Code">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-md-offset-2 col-xs-12">
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
                                <div class="col-md-3  col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                                <div class="col-md-3  col-xs-3 item-price"> €6.95</div>
                            </div>

                            <div class="row order-item-row">
                                <div class="col-md-6 col-xs-6 item-title">Rogan Josh, Lamb  </div>
                                <div class="col-md-3  col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                                <div class="col-md-3  col-xs-3 item-price"> €6.95</div>
                            </div>

                            <div class="row order-item-row">
                                <div class="col-md-6 col-xs-6 item-title"> Aloo Chaat Salad </div>
                                <div class="col-md-3  col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                                <div class="col-md-3  col-xs-3 item-price"> €6.95</div>
                            </div>

                            <div class="row order-item-row">
                                <div class="col-md-6 col-xs-6 item-title">  King Prawns on Puri </div>
                                <div class="col-md-3  col-xs-3 item-quantity"><div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                    <input type="number" id="number" value="0" />
                                    <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div></div>
                                <div class="col-md-3  col-xs-3 item-price"> €6.95</div>
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
                            <div class="row allergy-row">
                                <p>Average Delivery Time : 20 mins </p>
                                <p class="allergy-info-title">Allergy Information</p>
                                <p class="allergy-information">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis, ante at pretium egestas, odio leo vehicula ante, sed porttitor turpis libero eu risus. Sed sit amet gravida nulla. Pellentesque turpis sapien, finibus id diam id, iaculis ullamcorper lectus. Aenean hendrerit odio eu sapien dapibus tincidunt.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Confirm Order" class="btn btn-signin btn-confirm-order">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php require 'footer.php';?>