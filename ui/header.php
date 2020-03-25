        <?php /*Just to make sure its */ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{$platform_name}}</title>

        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
        <link rel="stylesheet" type="text/css" href="css/responsive.css" >
        <link rel="stylesheet" type="text/css" href="css/responsive-s.css" >
        <link rel="stylesheet" type="text/css" href="css/style.css" >
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css" >
        <link rel="stylesheet" type="text/css" href="css/font-family.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="shortcut icon" type="image/jpg" href="img/Favicon.jpg">
    </head>
    <body>

    <div class="navbar navbar-inverse navbar-fixed-top first-navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>-->
                </div>

                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav pull-right">
                        <li><a href="#">For Restaurants</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">En <img src="img/arrow-down.svg" class="svg"></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">French</a></li>
                                <li><a href="#">Tamil</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    <div class="navbar navbar-inverse navbar-fixed-top second-navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <div class="navbar-header"><a class="navbar-brand" href="index.php"><img src="img/logo.png"></a></div>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav">
                    </ul>

                    <ul class="nav navbar-nav navbar-center">
                        <li>
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="submit"><img src="img/search.png"></button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Enter Postcode, Location, Restaurant, or Cuisine" name="srch-term" id="srch-term">
                                </div>
                            </form>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                       <li class=""><button class="button-signup" data-toggle="modal" data-target="#signupModal">Sign Up</button></li>
                            <li><a data-toggle="modal" data-target="#signinModal">Sign In</a></li>
                    </ul>

                </div>
            </div>
        </div>

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


    <!-- Sign in Modal -->
        <div class="modal fade" id="signinModal" role="dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Sign In</h2>
                        <form class="signin-form">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Enter Password*</label>
                                        <label class="forgot-password"><a href=""  data-toggle="modal" data-target="#forgotPasswordModal">Forgot Password!</a></label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Sign In" class="btn btn-signin">
                                </div>
                            </div>
                            <hr class="yellow-hr">
                            <h4>Sign in with</h4>

                            <div class="row social-signup">
                                <div class="col-md-6 col-xs-6 text-center">
                                    <a href=""> <img src="img/facebook-f.png">
                                        <label>Facebook</label></a>
                                </div>
                                <div class="col-md-6 col-xs-6 text-center">
                                    <a href=""> <img src="img/google.png">
                                        <label>Google</label></a>
                                </div>
                            </div>

                            <div class="no-account">
                                <h4>Don’t have an account? <a href=""  data-toggle="modal" data-target="#signupModal"> Join Us</a></h4>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    <!-- Reset Password Modal -->
        <div class="modal fade" id="forgotPasswordModal" role="dialog">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <h2>Reset Password</h2>
                        <form class="signin-form">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" value="Reset Password" class="btn btn-signin">
                                </div>
                            </div>
                            <hr class="yellow-hr">
                            <h4>Sign in with</h4>

                            <div class="row social-signup">
                                <div class="col-md-6 col-xs-6 text-center">
                                    <a href=""> <img src="img/facebook-f.png">
                                        <label>Facebook</label></a>
                                </div>
                                <div class="col-md-6 col-xs-6 text-center">
                                    <a href=""> <img src="img/google.png">
                                        <label>Google</label></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

