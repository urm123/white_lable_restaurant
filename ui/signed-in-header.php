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
                        <li><button type="button" class="btn button-signup">Hi, Jane</button></li>
                    </ul>

                </div>
            </div>
        </div>
