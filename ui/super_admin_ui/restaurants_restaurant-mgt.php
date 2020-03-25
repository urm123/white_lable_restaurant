<?php require 'header.php';?>
<section class="master-dashboard-section">
    <div class="container-fluid">
        <div class="row">
            <div class="panel with-nav-tabs panel-default">
                <div class="col-md-2 admin-panel">
                    <h2>Goodmorning, Jason</h2>
                    <div class="master-sidebar">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs category-tab"> 
                                <li>
                                    <a href="#restaurants" data-toggle="tab">Restaurants</a>
                                </li>
                                <li>
                                    <a href="#stats-reports" data-toggle="tab">Stats & Reports</a>
                                </li>
                                <li>
                                    <a href="#platform-settings" data-toggle="tab">Platform Settings</a>
                                </li>
                                <li>
                                    <a href="#master-settings" data-toggle="tab">Master Settings</a>
                                </li>
                                <li>
                                    <a href="#notifications" data-toggle="tab">Notifications<div class="notification-count">10</div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurants">
                                <div class="row">
                                    <div class="panel with-nav-tabs panel-default">
                                        <div class="panel-heading single-project-nav">
                                            <ul class="nav nav-tabs"> 
                                                <li id="request-tab">
                                                    <a href="#requests" data-toggle="tab">Requests</a>
                                                </li>
                                                <li>
                                                    <a href="#restaurant-management" data-toggle="tab">Restaurant Management</a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="panel with-nav-tabs panel-default">
                                            <div class="panel-heading resturant-profile-nav">
                                                <ul class="nav nav-tabs"> 
                                                    <li>
                                                        <a href="#restaurant-profile" data-toggle="tab">Restaurant Profile</a>
                                                    </li>
                                                    <li>
                                                        <a href="#menu" data-toggle="tab">Menu</a>
                                                    </li>
                                                    <li>
                                                        <a href="#delivery-settings" data-toggle="tab">Delivery Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="#takeaway-settings" data-toggle="tab">Takeaway Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="#promotions" data-toggle="tab">Promotions</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="panel-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="restaurant-profile">
                                                        <div class="restaurant-profile-section">
                                                            <h2>The Indian Bowl</h2>
                                                            <div class="restaurant-profile-form">
                                                                <div class="row">
                                                                    <div class="col-md-9 col-xs-12">
                                                                        <form>
                                                                            <h3>Basic Information</h3>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Restaurant Name*</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Restaurant Name">
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Email address*</label>
                                                                                    <input type="email" class="form-control" placeholder="Enter Email Address">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Phone Number*</label>
                                                                                    <input type="tel" class="form-control" placeholder="Enter Phone Number">
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Website</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Website">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Restaurant Country*</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Country</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Restaurant Street Name*</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Street Name">
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Restaurant City*</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select City</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Restaurant Postcode*</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Zip/Postal Code">
                                                                                </div>
                                                                            </div>
                                                                            <h3>Restaurant Attributes</h3>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Price Range*</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Price Range</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Cuisine*</label>
                                                                                    <div class="form-control">
                                                                                        <p class="tag">
                                                                                            <span>
                                                                                                Indian <a href=""><img src="img/x.png"></a></span>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Number of Seats*</label>
                                                                                    <input type="text" class="form-control" placeholder="Enter Number of Seats">
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Is Parking Available* </label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Parking Available</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <label>Restaurant Description</label>
                                                                                    <textarea class="form-control" placeholder="Enter restaurant description" rows="5" cols="10"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <h3>Restaurant Hours</h3>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Monday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Monday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Tuesday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Tuesday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess1" name="someSwitchOption002" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Wednesday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Wednesday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess2" name="someSwitchOption003" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess2" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Thursday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Thursday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess3" name="someSwitchOption004" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess3" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Friday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Friday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess4" name="someSwitchOption005" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess4" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Saturday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Saturday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess5" name="someSwitchOption006" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess5" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Sunday - Morning</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6">
                                                                                    <label>Sunday - Night</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Time Frame</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="material-switch pull-right">
                                                                                    <input id="someSwitchOptionSuccess6" name="someSwitchOption007" type="checkbox"/>
                                                                                    <label for="someSwitchOptionSuccess6" class="label-success"></label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12">
                                                                                    <input type="submit" class="btn btn-approve" value="Approve & Save Changes">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="menu">
                                                        <div class="restaurant-menu-section">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h2>The Indian Bowl</h2> 
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <select class="form-control pull-right">
                                                                        <option>Vegetarian</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess7" name="someSwitchOption008" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess7" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">

                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess8" name="someSwitchOption009" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess8" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 01</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 02</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess9" name="someSwitchOption0010" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess9" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 01</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 02</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess10" name="someSwitchOption0011" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess10" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 01</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 02</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess11" name="someSwitchOption0012" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess11" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">

                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess12" name="someSwitchOption0013" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess12" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 01</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 02</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess13" name="someSwitchOption0014" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess13" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 01</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 02</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="menu-item">
                                                                        <div class="row">
                                                                            <div class="col-md-8">
                                                                                <div class="row menu-item-row">
                                                                                    <div class="col-md-7">
                                                                                        <p>Dish Title Goes Here</p>
                                                                                    </div>
                                                                                    <div class="col-md-2">
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <a href="" data-toggle="modal" data-target="#edititemModal">edit item</a>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row menu-item-description">
                                                                                    <div class="col-md-12">
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac ante dolor. Pellentesque sed ultrices purus,</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <img src="img/Rectangle.png" class="pull-right">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row menu-item-price">
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 01</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                            <div class="col-md-8 col-xs-8">
                                                                                <h4>Variation 02</h4>
                                                                            </div>
                                                                            <div class="col-md-4 col-xs-4">
                                                                                <p class="pull-right"> € 8.25</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="submit" class="btn btn-approve" value="Approve & Save Changes">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="delivery-settings">
                                                        <div class="delivery-settings-section">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <h2>The Indian Bowl</h2>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <div class="frame">
                                                                        <img src="img/Frame.png"><h4>New Changes by Restaurant Admin. Please Review </h4>                                                            </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="post-code-form">
                                                                        <form>
                                                                            <h3>Add Post Codes for Delivery</h3>
                                                                            <h4>Post Code</h4>
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <div class="row">
                                                                                        <div class="col-md-7 col-sm-7">
                                                                                            <input type="text" class="form-control" placeholder="Enter Post Code">
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5">
                                                                                            <input type="submit" class="btn btn-add-post" value="Add Post Code + ">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>                                                               </div></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="delivery-time-form table-responsive">
                                                                        <form>
                                                                            <table>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N10 Muswell Hill
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N11 Friern Barnet
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N12 North Finchley
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N2 East Finchley
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N20 Whetstone
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N3 Finchley Central
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N6 Highgate 
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        NW11 Golders Green 
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        NW4 Hendon 
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        NW7 Mill Hill
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Time ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Delivery Cost ">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Miniumum Cart Value">
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="checkbox" class="form-control">
                                                                                        <label>Free Delivery</label>
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="submit" class="btn btn-add-post" value="Save Changes">
                                                                                </div>
                                                                            </div>
                                                                        </form>                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="takeaway-settings">
                                                        <div class="delivery-settings-section">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h2>The Indian Bowl</h2>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="post-code-form">
                                                                        <form>
                                                                            <h3>Add Post Codes for Delivery</h3>
                                                                            <h4>Post Code</h4>
                                                                            <div class="row">
                                                                                <div class="col-md-8">
                                                                                    <div class="row">
                                                                                        <div class="col-md-7 col-sm-7">
                                                                                            <input type="text" class="form-control" placeholder="Enter Post Code">
                                                                                        </div>
                                                                                        <div class="col-md-5 col-sm-5">
                                                                                            <input type="submit" class="btn btn-add-post" value="Add Post Code + ">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>                                                               </div></div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="delivery-time-form table-responsive">
                                                                        <form>
                                                                            <table>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="rect"></div>
                                                                                    </td>
                                                                                    <td class="delivery-name">
                                                                                        N10 Muswell Hill
                                                                                    </td>
                                                                                    <td>
                                                                                        <input type="text" class="form-control" placeholder="Preparation Time">
                                                                                    </td>
                                                                                    <td>
                                                                                        <div class="material-switch pull-right">
                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="submit" class="btn btn-add-post" value="Save Changes">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="promotions">
                                                        <div class="promotions-section">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h2>The Indian Bowl</h2>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="discount-form">
                                                                        <form>
                                                                            <div class="row restaurant-wide-row">
                                                                                <div class="col-md-4">
                                                                                    <h3>Restaurant Wide Discount</h3>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="material-switch pull-right">
                                                                                        <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                        <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row discount-select-row">
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <label>Discount Type (Flat Rate / %)</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Discount Type</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <label>Discount Value</label>
                                                                                    <select class="form-control">
                                                                                        <option>Enter Enter Discount Value</option>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-4 col-sm-4">
                                                                                    <label>Discount Duration</label>
                                                                                    <select class="form-control">
                                                                                        <option>Select Duration</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="submit" class="btn btn-add-post" value="Save Changes">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                    <div class="discount-promo-form">
                                                                        <form>
                                                                            <div class="row restaurant-wide-row">
                                                                                <div class="col-md-4">
                                                                                    <h3>Discount Specific Menu Items</h3>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="material-switch pull-right">
                                                                                        <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                        <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-7">
                                                                                    <h4>Activating this option will activation promotional fields for individual menu items. Visit the <a href="">Menu</a>, and edit menu items were you would like to apply promotions to.</h4>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row restaurant-wide-row">
                                                                                <div class="col-md-4">
                                                                                    <h3>Promo Codes </h3>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="material-switch pull-right">
                                                                                        <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                        <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12 table-responsive">
                                                                                    <table>
                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>

                                                                                        <tr>
                                                                                            <td class="promo-heading">FREEDELIVERY2019</td>
                                                                                            <td>Percentage Discount</td>
                                                                                            <td>50% </td>
                                                                                            <td>Free shipping on all items in the cart </td>
                                                                                            <td> 0 / ∞</td>
                                                                                            <td>November 5, 2018</td>
                                                                                            <td>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-4">
                                                                                                        <a href="" data-toggle="modal" data-target="#editpromoModal"><img src="img/Edit.png"></a>
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <img src="img/Delete.png">
                                                                                                    </div>
                                                                                                    <div class="col-md-4">
                                                                                                        <div class="material-switch pull-right">
                                                                                                            <input id="someSwitchOptionSuccess14" name="someSwitchOption0015" type="checkbox"/>
                                                                                                            <label for="someSwitchOptionSuccess14" class="label-success"></label>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <input type="submit" class="btn btn-add-post" value="Add New Code +">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="stats-reports">

                            </div>
                            <div class="tab-pane fade" id="platform-settings">
                            </div>
                            <div class="tab-pane fade" id="master-settings">
                            </div>
                            <div class="tab-pane fade" id="notifications">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit item Modal -->
<div class="modal fade" id="edititemModal" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h2>Edit Item </h2>
                <form class="requestmodal-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Category</label>
                                <select class="form-control">
                                    <option value="0">Select Item Category</option>
                                    <option value="1">Item 1</option>
                                    <option value="2">Item 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Name*</label>
                                <input type="text" class="form-control" id="itemname" placeholder="Enter Item Name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Item Description*</label>
                                <textarea class="form-control" placeholder="Enter Item Description" rows="5" cols="7"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="img-upload-box">Click or Drag Item Image to Upload</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Additional Notes </label>
                                <textarea class="form-control" placeholder="Enter note " rows="5" cols="7"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr class="yellow-hr">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Variant 01  <img src="img/x-red.png"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Variant Name*</label>
                                <input type="text" class="form-control" id="varientname" placeholder="Enter Variant Name ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Variant Price*</label>
                                <input type="text" class="form-control" id="varientprice" placeholder=" Enter Price  ">
                            </div>
                        </div>
                    </div>

                    <hr class="yellow-hr">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Addon 01  <img src="img/x-red.png"></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Addon Name* </label>
                                <input type="text" class="form-control" id="addonname" placeholder="Enter Addon Name ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Addon Price*</label>
                                <input type="text" class="form-control" id="addonprice" placeholder=" Enter Price  ">
                            </div>
                        </div>
                    </div>

                    <hr class="yellow-hr">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Promo</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Promo Code </label>
                                <input type="text" class="form-control" id="promocode" placeholder="Enter Promo Code ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Discount Type (Flat Rate / %)</label>
                                <select class="form-control">
                                    <option value="0">Select Discount Type</option>
                                    <option value="1">Type 1</option>
                                    <option value="2">Type 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Promo Value </label>
                                <input type="text" class="form-control" id="promovalue" placeholder="Enter Promo Value ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Usage Limit </label>
                                <select class="form-control">
                                    <option value="0">Select Usage Limit</option>
                                    <option value="1">Limit 1</option>
                                    <option value="2">Limit 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Expiry Date  </label>
                                <select class="form-control">
                                    <option value="0">Select Expiry Date </option>
                                    <option value="1">Date 1</option>
                                    <option value="2">Date 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="" class="btn btn-add-varient"> Add Item Variant +</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <a href="" class="btn btn-add-varient">  Add Item Addon +</a>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Submit Change Request" class="btn btn-signin">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


<!-- Edit Promo Modal -->
<div class="modal fade" id="editpromoModal" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h2>Edit Promo Code</h2>
                <form class="requestmodal-form">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Promo Code </label>
                                <input type="text" class="form-control" id="promocode" placeholder="Enter Promo Code ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Discount Type (Flat Rate / %)</label>
                                <select class="form-control">
                                    <option value="0">Select Discount Type</option>
                                    <option value="1">Type 1</option>
                                    <option value="2">Type 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Promo Value </label>
                                <input type="text" class="form-control" id="promovalue" placeholder="Enter Promo Value ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Promo Description</label>
                                <textarea class="form-control" placeholder="Enter Description" rows="5" cols="7"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Usage Limit </label>
                                <select class="form-control">
                                    <option value="0">Select Usage Limit</option>
                                    <option value="1">Limit 1</option>
                                    <option value="2">Limit 2</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Expiry Date  </label>
                                <select class="form-control">
                                    <option value="0">Select Expiry Date </option>
                                    <option value="1">Date 1</option>
                                    <option value="2">Date 2</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label> Automatically Apply Promo to Cart after cart exceeds </label>
                                <input type="text" class="form-control" id="amount" placeholder="Enter Amount ">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Add Promo Code" class="btn btn-signin">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<?php require 'footer.php';?>