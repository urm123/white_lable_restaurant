<?php require 'header.php';?>
<section class="main-section">
    <div class="container">
        <div class="row">
            <div class="main-title">
                <h2>Contact Us</h2>
            </div>
            <div class="main-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin lobortis, ante at pretium egestas, odio leo vehicula ante, sed porttitor turpis libero eu risus. Sed sit amet gravida nulla. Pellentesque turpis sapien, finibus id diam id, iaculis ullamcorper lectus. Aenean hendrerit odio eu sapien dapibus tincidunt.</p>
                <div class="row">
                    <form class="delivery-form contact-form">
                        <div class="col-md-12 col-xs-12">
                            <div class="delivery-method">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" id="firstname" placeholder="Enter your First name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" id="lastname" placeholder="Enter your Last name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone Number </label>
                                            <input type="tel" class="form-control" id="contactno" placeholder="Enter Phone number">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" id="instructions" rows="7" cols="5" placeholder="Enter your message"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="submit" value="Submit Message" class="btn btn-signin btn-confirm-order">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php';?>