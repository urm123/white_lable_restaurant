<?php /*Just to make sure its */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$platform_name}}</title>

    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/responsive-s.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
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
                <li><a href="#">Go to EatOEat</a></li>
                <li><a href="#">FAQ</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">En <img src="img/arrow-down.svg"
                                                                                       class="svg"></a>
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
            <div class="navbar-header"><a class="navbar-brand" href="#"><img src="img/logo.png"> </a> <span
                        class="res-head"> For Restaurants</span></div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
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
                <h2>Get started with EatOEat</h2>
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
                                <label>Restaurant Name*</label>
                                <input type="text" class="form-control" id="restname"
                                       placeholder="Enter Restaurant Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Email Address*</label>
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
                                <input type="password" class="form-control" id="cpassword"
                                       placeholder="Re-enter Password">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Restaurant Country*</label>
                                <select class="form-control">
                                    <option value="0">Select Country</option>
                                    <option value="1">Sri Lanka</option>
                                    <option value="2">France</option>
                                    <option value="3">India</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Restaurant City*</label>
                                <input type="text" class="form-control" id="restname" placeholder="Enter City">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Restaurant State/Province*</label>
                                <select class="form-control">
                                    <option value="0">Select State/Province</option>
                                    <option value="1">Kandy</option>
                                    <option value="2">Colombo</option>
                                    <option value="3">Jaffna</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Restaurant Zip/Postal Code*</label>
                                <input type="text" class="form-control" id="restname"
                                       placeholder="Enter Zip/Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Restaurant Zip/Postal Code*</label>
                                <input type="text" class="form-control" id="restname"
                                       placeholder="Enter Zip/Postal Code">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Select Subscription Option*</label>
                            </div>
                            <div class="col-md-4 sub-radio">
                                Fixed <br> <span class="sub-bold">10</span><br>
                                <input type="radio" name="">
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Create Account" class="btn btn-signin">
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
                <h2>Restauranteur Sign In</h2>
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
                                <label class="forgot-password"><a href="" data-toggle="modal"
                                                                  data-target="#forgotPasswordModal">Forgot
                                        Password!</a></label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Sign In" class="btn btn-signin">
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Sign in Modal -->
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
                </form>
            </div>
        </div>

    </div>
</div>

