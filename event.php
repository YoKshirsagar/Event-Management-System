<div class="col-auto mb-md-0 mb-4">
    <div class="card" style="width: auto; max-width: 100%;">
        <div class="card-header pb-0">
            <div class="row">
                <div class="col-lg-6 col-7">
                    <h6>Events</h6>
                    <p class="text-sm mb-0">
                        <?php
                            if($_SESSION['login_user_type'] == 1){
                                $sql = "SELECT count(*) as total_events FROM event_database";
                            } else {
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
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Events</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Members</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Organizer</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Client</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Revenue</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Completion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if($_SESSION['login_user_type'] == 1){
                                $qry = $conn->query("SELECT * FROM event_database");
                            } else {
                                $qry = $conn->query("SELECT * FROM event_database WHERE event_organizer_id=".$_SESSION['login_user_id']);
                            }
                            while ($row = $qry->fetch_assoc()):
                        ?>
                        <tr>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div>
                                        <img src="assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm me-3" alt="xd">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm"><?php echo $row['event_name']; ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="avatar-group mt-2">
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Tompson">
                                        <img src="assets/img/team-1.jpg" alt="team1">
                                    </a>
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Romina Hadid">
                                        <img src="assets/img/team-2.jpg" alt="team2">
                                    </a>
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Alexander Smith">
                                        <img src="assets/img/team-3.jpg" alt="team3">
                                    </a>
                                    <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Jessica Doe">
                                        <img src="assets/img/team-4.jpg" alt="team4">
                                    </a>
                                </div>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <?php
                                $qry1 = $conn->query("SELECT name FROM users_database WHERE user_id=" . $row['event_organizer_id']);
                                $row1 = $qry1->fetch_assoc();
                            ?>
                                <span class="text-xs font-weight-bold"><?php echo $row1['name']; ?></span>
                            </td>
                            <td class="align-middle text-center text-sm">
                            <?php
                                $qry2 = $conn->query("SELECT name FROM users_database WHERE user_id=" . $row['event_client_id']);
                                $row2 = $qry2->fetch_assoc();
                            ?>
                                <span class="text-xs font-weight-bold"><?php echo $row2['name']; ?></span>
                            </td>
                            <td class="align-middle text-center text-sm">
                                <span class="text-xs font-weight-bold"><?php echo $row['event_total_earning']; ?></span>
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
                                            aria-valuenow="<?php echo $row['complete_percent']; ?>" aria-valuemin="0"
                                            aria-valuemax="100">
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
