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
                <li>
                    <input type="text" placeholder="Search" class="form-control restaurant-search">
                </li>
                <li style="">
                    <select class="form-control">
                        <option value="0">Date Range</option>
                    </select>
                </li>
                <li class="sort-by" id="sort-by">
                    <label>Sort by: </label>
                    <select class="form-control">
                        <option value="0">Latest First</option>
                    </select>
                </li>
            </ul>
        </div>

        <div class="panel-body">
            <div class="tab-content">
                <div class="tab-pane fade in active table-responsive" id="requests">
                    <table class="requests-table">
                        <tr>
                            <th>Request # </th>
                            <th>Date</th>
                            <th>Restaurant Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>15-10-2018</td>
                            <td>The Indian Bowl</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><a href="" data-toggle="modal" data-target="#requestModal"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>15-10-2018</td>
                            <td>The Indian Bowl</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><a href="" data-toggle="modal" data-target="#requestModal"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>15-10-2018</td>
                            <td>The Indian Bowl</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><a href="" data-toggle="modal" data-target="#requestModal"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>15-10-2018</td>
                            <td>The Indian Bowl</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><a href="" data-toggle="modal" data-target="#requestModal"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>15-10-2018</td>
                            <td>The Indian Bowl</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><a href="" data-toggle="modal" data-target="#requestModal"><img src="img/view.png"></a></td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade table-responsive" id="restaurant-management">
                    <table class="requests-table">
                        <tr>
                            <th>Restaurant ID </th>
                            <th>Restaurant Name</th>
                            <th>Country</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>Indian Bowl</td>
                            <td>France</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td class="status">Active</td>
                            <td><a href="restaurants_restaurant-mgt.php"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>Indian Bowl</td>
                            <td>France</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td class="status">Active</td>
                            <td><a href="restaurants_restaurant-mgt.php"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>Indian Bowl</td>
                            <td>France</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td class="status">Active</td>
                            <td><a href="restaurants_restaurant-mgt.php"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>Indian Bowl</td>
                            <td>France</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td class="status">Active</td>
                            <td><a href="restaurants_restaurant-mgt.php"><img src="img/view.png"></a></td>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>Indian Bowl</td>
                            <td>France</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td class="status">Active</td>
                            <td><a href="restaurants_restaurant-mgt.php"><img src="img/view.png"></a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Request Modal -->
<div class="modal fade" id="requestModal" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h2>Request #0000001</h2>
                <form class="requestmodal-form">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Date:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">15-10-2018 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Restaurant Name:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Indian Bowl </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Email: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">admin@indianbowl.com </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Phone Number: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">012 345 2534 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">First Name: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Jason</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Last Name:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Bourne </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Country:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">France </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">City:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label"> Paris </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">State/Province:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Paris </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Zip/Postal Code:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">098765 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Subscription Option:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Fixed</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="submit" value="Decline" class="btn btn-decline">
                        </div>
                        <div class="col-md-6">
                            <input type="submit" value="Accept" class="btn btn-accept">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>


<!-- Restaurant Modal -->
<div class="modal fade" id="restaurantModal" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h2> Restaurant ID #0000001 </h2>
                <form class="requestmodal-form">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Restaurant ID:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label"> 0000001 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Restaurant Name: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Indian Bowl</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Email: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">jason@abc.com </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Phone Number: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">012 345 2534 </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">First Name: </p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Jason</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Last Name:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Bourne </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Country:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">France </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">City:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label"> Paris </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">State/Province:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">Paris </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label">Zip/Postal Code:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label">098765 </p>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group text-left" style="float:left;">
                            <div class="terms-check">
                                <input name="rememberme" type="checkbox" id="rememberme"
                                       value="forever"  />
                                <label for="rememberme">Deactivate Restaurant</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value="Save Resturant Profile" class="btn btn-signin">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>