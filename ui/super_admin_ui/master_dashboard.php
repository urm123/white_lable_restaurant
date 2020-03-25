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
                                    <a href="#notifications" data-toggle="tab">Notifications <div class="notification-count">10</div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="panel-body">
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="restaurants">
                                <?php require 'restaurants_requests.php';?>
                            </div>
                            <div class="tab-pane fade" id="stats-reports">
                                <?php require 'stats_and_reports.php';?>
                            </div>
                            <div class="tab-pane fade" id="platform-settings">
                                <?php require 'platform_settings.php';?>
                            </div>
                            <div class="tab-pane fade" id="master-settings">
                                <?php require 'master_settings.php';?>
                            </div>
                            <div class="tab-pane fade" id="notifications">
                                <?php require 'notifications.php';?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require 'footer.php';?>