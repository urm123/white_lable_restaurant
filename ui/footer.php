<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3"><img src="img/footer-image.png" class="footer-image"></div>
            <div class="col-md-2">
                <h1>EatoEat</h1>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="careers.php">Careers</a></li>
                    <li><a href="press.php">Press</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h1>Join</h1>
                <ul>
                    <li><a href="contact-us.php">Contact Us</a></li>
                    <li><a href="" data-toggle="modal" data-target="#signupModal">Sign Up</a></li>
                    <li><a href="resturant-list.php">List your Restaurant</a></li>
                    <li><a href="why-eatoeat.php">Why EatOEat</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h1>More</h1>
                <ul>
                    <li><a href="">EatOEat for iOS</a></li>
                    <li><a href="">EatOEat for Android</a></li>
                    <li><a href="cancellations-and-refunds.php">Cancellations & Refunds</a></li>
                    <li><a href="terms-and-conditions.php">Terms & Conditions</a></li>
                    <li><a href="privacy-policy.php">Privacy Policy</a></li>
                </ul>

            </div>
            <div class="col-md-3 social">
                <h1>Join Us on</h1>
                <ul>
                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <ul>
                    <li><img src="img/Visa.png"></li>
                    <li><img src="img/MasterCard"></li>
                    <li><img src="img/Paypal"></li>
                    <li><img src="img/TicketRestuarant.png"></li>
                </ul>
            </div>
        </div>
    </div>
</footer>


 <!-- Sign up Modal -->
        <div class="modal fade" id="signupModal" role="dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Welcome to EatOEat</h2>
                        <form class="signin-form">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>First Name*</label>
                                        <input type="text" class="form-control" id="firstname" placeholder="Enter First Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Last Name*</label>
                                        <input type="text" class="form-control" id="lastname" placeholder="Enter Last Name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter Email*</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter Password*</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Confirm Password*</label>
                                        <input type="password" class="form-control" id="cpassword" placeholder="Re-enter Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Primary Dining Location*</label>
                                        <select class="form-control">
                                            <option value="0">Select Location</option>
                                            <option value="1">Colombo</option>
                                            <option value="2">Kandy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="form-group text-left" style="float:left;">
                                    <div class="terms-check">
                                        <input name="rememberme" type="checkbox" id="rememberme"
                                               value="forever"  />
                                        <label for="rememberme">Remember Me</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Create Account" class="btn btn-signin">
                                </div>
                            </div>
                            <hr class="yellow-hr">
                            <h4>Sign Up with</h4>
                            
                            <div class="row social-signup">
                                <div class="col-md-6 col-xs-6 text-center">
                                    <img src="img/facebook-f.png">
                                    <label>Facebook</label>
                                </div>
                                <div class="col-md-6 col-xs-6 text-center">
                                    <img src="img/google.png">
                                    <label>Google</label>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    function showDropDelivery(){
        var element = document.getElementById('dropdown-content-delivery');
        if (element.style.display == 'none') {
            element.style.display = 'block';} else{element.style.display = 'none';}
    }
</script>


<script>
    $(document).ready(function() {
        $('img[src$=".svg"]').each(function() {
            var $img = jQuery(this);
            var imgURL = $img.attr('src');
            var attributes = $img.prop("attributes");

            $.get(imgURL, function(data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Remove any invalid XML tags
                $svg = $svg.removeAttr('xmlns:a');

                // Loop through IMG attributes and apply on SVG
                $.each(attributes, function() {
                    $svg.attr(this.name, this.value);
                });

                // Replace IMG with SVG
                $img.replaceWith($svg);
            }, 'xml');
        });
    });
</script>

<script>
    function increaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById('number').value = value;
    }

    function decreaseValue() {
        var value = parseInt(document.getElementById('number').value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById('number').value = value;
    }
</script>

</body>
</html>