<div class="row">
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading single-project-nav">
            <ul class="nav nav-tabs"> 
                <li id="request-tab">
                    <a href="#admin-users" data-toggle="tab">Admin Users</a>
                </li>
                <li>
                    <a href="#master-profile" data-toggle="tab">Master Profile </a>
                </li>
            </ul>
            <ul class="nav nav-tabs navbar-right"> 
                <li>
                    <input type="text" placeholder="Search" class="form-control restaurant-search">
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
                <div class="tab-pane fade in active table-responsive" id="admin-users">
                    <table class="requests-table">
                        <tr>
                            <th>Admin ID</th>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <td>000001</td>
                            <td>Jones</td>
                            <td>Dawson</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><div class="material-switch">
                                <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                </div> </td>
                            <td><a href="" data-toggle="modal" data-target="#adminModal"><img src="img/view.png"></a></td>
                        </tr>

                        <tr>
                            <td>000001</td>
                            <td>Jones</td>
                            <td>Dawson</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><div class="material-switch">
                                <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                </div> </td>
                            <td><a href="" data-toggle="modal" data-target="#adminModal"><img src="img/view.png"></a></td>
                        </tr>

                        <tr>
                            <td>000001</td>
                            <td>Jones</td>
                            <td>Dawson</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><div class="material-switch">
                                <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                </div> </td>
                            <td><a href="" data-toggle="modal" data-target="#adminModal"><img src="img/view.png"></a></td>
                        </tr>

                        <tr>
                            <td>000001</td>
                            <td>Jones</td>
                            <td>Dawson</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><div class="material-switch">
                                <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                </div> </td>
                            <td><a href="" data-toggle="modal" data-target="#adminModal"><img src="img/view.png"></a></td>
                        </tr>

                        <tr>
                            <td>000001</td>
                            <td>Jones</td>
                            <td>Dawson</td>
                            <td>admin@indianbowl.com </td>
                            <td>012 234 3456</td>
                            <td><div class="material-switch">
                                <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                </div> </td>
                            <td><a href="" data-toggle="modal" data-target="#adminModal"><img src="img/view.png"></a></td>
                        </tr>
                    </table>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-add-post" value="Add New User +">
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="master-profile">
                    <div class="restaurant-profile-form">
                        <div class="row">
                            <div class="col-md-9 col-xs-12">
                                <form>
                                   <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label>First Name*</label>
                                            <input type="text" class="form-control" placeholder="Enter First Name ">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Last Name*</label>
                                            <input type="text" class="form-control" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label>Email address*</label>
                                            <input type="email" class="form-control" placeholder="Enter Email Address">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Phone Number*</label>
                                            <input type="tel" class="form-control" placeholder="Enter Phone Number">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label>Password*</label>
                                            <input type="password" class="form-control" placeholder="Enter Password">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Repeat Password*</label>
                                            <input type="password" class="form-control" placeholder="Re enter password">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label>Country*</label>
                                            <select class="form-control">
                                                <option>Select Country</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>City* </label>
                                            <input type="text" class="form-control" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <label>State/Province*</label>
                                            <select class="form-control">
                                                <option>Select State/Province</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <label>Zip/Postal Code* </label>
                                            <input type="text" class="form-control" placeholder="Enter Zip/Postal Code">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12">
                                            <input type="submit" class="btn btn-approve" value="Save Changes">
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


<!-- Admin Modal -->
<div class="modal fade" id="adminModal" role="dialog">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h2>Admin ID #0000001 </h2>
                <form class="requestmodal-form">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="left-label"> Admin ID:</p>
                        </div>
                        <div class="col-md-6">
                            <p class="right-label"> 0000001 </p>
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
                                <label for="rememberme">Deactivate Admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" value=" Save Changes" class="btn btn-signin">
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>