<div class="row">
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading single-project-nav stats-nav">
            <ul class="nav nav-tabs"> 
                <li>
                    <select class="form-control">
                        <option>Select Restaurant</option>
                    </select>
                </li>
                <li>
                    <select class="form-control">
                        <option>Time Range</option>
                    </select>
                </li>
                <li>
                    <select class="form-control">
                        <option>Date Range</option>
                    </select>
                </li>
                <li class="stats-search">
                    <img src="img/Search.png">
                </li>
                <li>
                    <button type="button" class="btn btn-print-report">Print Report</button>
                </li>
                <li class="sort-by" id="sort-by">
                    <label>Sort by: </label>
                    <select class="form-control">
                        <option value="0">A-Z</option>
                    </select>
                </li>
            </ul>
        </div>

        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading resturant-profile-nav">
                <ul class="nav nav-tabs"> 
                    <li>
                        <a href="#sales-figures" data-toggle="tab">Sales Figures </a>
                    </li>
                    <li>
                        <a href="#revenue" data-toggle="tab">Revenue</a>
                    </li>
                    <li>
                        <a href="#delivery-stats" data-toggle="tab">Delivery Stats </a>
                    </li>
                    <li>
                        <a href="#takeaway-stats" data-toggle="tab">Takeaway Stats</a>
                    </li>
                    <li>
                        <a href="#reservation-stats" data-toggle="tab">Reservation Stats</a>
                    </li>
                    <li>
                        <a href="#subscription-report" data-toggle="tab">Subscription Report</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <div class="tab-content">
                    <div class="tab-pane fade in active table-responsive" id="sales-figures">
                        <table class="requests-table sales-figures-table">
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>ID</th>
                                <th>Order Type</th>
                                <th>Order Amount </th>
                                <th>Order Payment Method</th>
                                <th>No. of Items</th>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>13:05:00</td>
                                <td>1234567</td>
                                <td>Delivery</td>
                                <td> € 8.25</td>
                                <td>Visa Debit</td>
                                <td>10 </td>
                            </tr>
                        </table>
                        <div class="row chart-row">
                            <div class="col-md-4">
                                <img src="img/Pie.png" class="img-responsive">
                            </div>
                            <div class="col-md-8">
                                <img src="img/Group.png" class="img-responsive">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="revenue">
                    </div>
                    <div class="tab-pane fade" id="delivery-stats">
                    </div>
                    <div class="tab-pane fade" id="takeaway-stats">
                    </div>
                    <div class="tab-pane fade" id="reservation-stats">
                    </div>
                    <div class="tab-pane fade table-responsive" id="subscription-report">
                        <table class="requests-table sales-figures-table">
                            <tr>
                                <th>Date</th>
                                <th>Restaurant Name</th>
                                <th>Subscription Method</th>
                                <th> Payment Method</th>
                                <th>Amount </th>
                                <th>Subscription Status</th>
                                <th>Restaurant Status</th>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="paid">Paid</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess1" name="someSwitchOption001" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess1" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="paid">Paid</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess2" name="someSwitchOption002" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess2" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="lapsed">Lapsed</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess3" name="someSwitchOption003" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess3" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="paid">Paid</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess4" name="someSwitchOption004" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess4" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="paid">Paid</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess5" name="someSwitchOption005" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess5" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="paid">Paid</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess6" name="someSwitchOption006" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess6" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>15-10-2018</td>
                                <td>India Bowl</td>
                                <td>Fixed</td>
                                <td>Visa Debit</td>
                                <td> 30,00 € </td>
                                <td class="paid">Paid</td>
                                <td>
                                    <div class="material-switch">
                                        <input id="someSwitchOptionSuccess7" name="someSwitchOption007" type="checkbox"/>
                                        <label for="someSwitchOptionSuccess7" class="label-success"></label>
                                    </div> 
                                </td>
                            </tr>
                        </table>
                        <div class="row chart-row">
                            <div class="col-md-4">
                                <img src="img/Pie.png" class="img-responsive">
                            </div>
                            <div class="col-md-8">
                                <img src="img/Group.png" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>