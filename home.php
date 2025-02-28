<?php  include "db_connect.php"; ?>
<div class="container-fluid py-2">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4" onclick="location.href='./index.php?page=event'">
            <div class="card">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <?php
                            if($_SESSION['login_user_type'] == 1){
                                $sql = "SELECT count(*) as total_events FROM event_database";
                            }else {
                                $sql = "SELECT count(*) as total_events FROM event_database WHERE event_organizer_id=".$_SESSION['login_user_id'];
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $totalEvents = $row['total_events'];
                        ?>
                            <p class="text-sm mb-0 text-capitalize">Total Events</p>
                            <h4 class="mb-0"><?php echo $totalEvents; ?></h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">weekend</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+55% </span>than last week</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" onclick="location.href='./index.php?page=list_user'">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <?php
                        $sql = "SELECT count(*) as total_users FROM users_database";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $totalUsers = $row['total_users'];
                    ?>
                        <div>
                            <p class="text-sm mb-0 text-capitalize">Total Users</p>
                            <h4 class="mb-0">
                                <?php 
                            if($totalUsers==0){
                                echo "0"; 
                            }else{
                                echo $totalUsers; 
                            }
                            ?>
                            </h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">person</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+3% </span>than last month</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" onclick="location.href='./index.php?page=event'">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <?php
                            if($_SESSION['login_user_type'] == 1){
                                $sql = "SELECT sum(event_total_earning) as total_earning FROM event_database";
                            }else {
                                $sql = "SELECT sum(event_total_earning) as total_earning FROM event_database WHERE event_organizer_id=".$_SESSION['login_user_id'];
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $totalEarning = $row['total_earning'];
                        ?>
                            <p class="text-sm mb-0 text-capitalize">Total revenue</p>
                            <h4 class="mb-0">₹ <?php 
                            if($totalEarning==0){
                                echo "0"; 
                            }else{
                                echo $totalEarning; 
                            }
                            
                            ?></h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">leaderboard</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm"><span class="text-danger font-weight-bolder">-2% </span>than yesterday</p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card" onclick="location.href='./index.php?page=event'">
                <div class="card-header p-2 ps-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <?php
                            if($_SESSION['login_user_type'] == 1){
                                $sql = "SELECT sum(event_ticket_sell_count) as total_sell FROM event_database";
                            }else {
                                $sql = "SELECT sum(event_ticket_sell_count) as total_sell FROM event_database WHERE event_organizer_id=".$_SESSION['login_user_id'];
                            }
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            $totalSell = $row['total_sell'];
                        ?>
                            <p class="text-sm mb-0 text-capitalize">Ticket Sales</p>
                            <h4 class="mb-0">
                                <?php 
                            if($totalSell==0){
                                echo "0"; 
                            }else{
                                echo $totalSell; 
                            }
                            ?>
                            </h4>
                        </div>
                        <div
                            class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                            <i class="material-symbols-rounded opacity-10">weekend</i>
                        </div>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-2 ps-3">
                    <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+5% </span>than yesterday</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 mt-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Events</h6>
                            <p class="text-sm mb-0">
                                <?php
                                if($_SESSION['login_user_type'] == 1){
                                    $sql = "SELECT count(*) as total_events FROM event_database";
                                }else {
                                    $sql = "SELECT count(*) as total_events FROM event_database WHERE event_organizer_id=".$_SESSION['login_user_id'];
                                }
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $totalEvents = $row['total_events'];
                            ?>
                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1"><?php echo $totalEvents; ?> done</span> till now
                            </p>
                        </div>
                    </div>
                </div>
                <?php if($totalEvents > 0): ?>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Events</th>
                                    <th
                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Members</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Revenue</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            if($_SESSION['login_user_type'] == 1){
                                $qry = $conn->query("SELECT * FROM event_database");
                            }else {
                                $qry = $conn->query("SELECT * FROM event_database WHERE event_organizer_id=".$_SESSION['login_user_id']);
                            }
                                while ($row = $qry->fetch_assoc()):
                            ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="assets/img/small-logos/logo-slack.svg"
                                                    class="avatar avatar-sm me-3" alt="xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $row['event_name']; ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Ryan Tompson">
                                                <img src="assets/img/team-1.jpg" alt="team1">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Romina Hadid">
                                                <img src="assets/img/team-2.jpg" alt="team2">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Alexander Smith">
                                                <img src="assets/img/team-3.jpg" alt="team3">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                                <img src="assets/img/team-4.jpg" alt="team4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span
                                            class="text-xs font-weight-bold"><?php echo $row['event_total_earning']; ?></span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">
                                                        <?php echo $row['complete_percent']; ?>%
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info" role="progressbar"
                                                    style="width: <?php echo $row['complete_percent']; ?>%;"
                                                    aria-valuenow="<?php echo $row['complete_percent']; ?>"
                                                    aria-valuemin="0" aria-valuemax="100">
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($totalEvents == 0): ?>
                <div class="card-body p-3">
                    <div class="text-center">
                        <h6 class="text-muted">No events found</h6>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Orders overview</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">24%</span> this month
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-symbols-rounded text-success text-gradient">notifications</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-symbols-rounded text-danger text-gradient">code</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-symbols-rounded text-info text-gradient">shopping_cart</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-symbols-rounded text-warning text-gradient">credit_card</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-symbols-rounded text-primary text-gradient">key</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block">
                            <span class="timeline-step">
                                <i class="material-symbols-rounded text-dark text-gradient">payments</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>