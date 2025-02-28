<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
}

.min-height-300 {
    min-height: 300px;
}

.card {
    border-radius: 15px;
}

.avatar {
    border: 3px solid #fff;
}

.quick-links a {
    text-decoration: none;
    color: #495057;
}

.quick-links a:hover {
    color: #007bff;
}
</style>

<div class="container-fluid px-2 px-md-4">
    <div class="page-header min-height-300 border-radius-xl mt-4"
        style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
    </div>
    <div class="card card-body mx-2 mx-md-2 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="../assets/img/bruce-mars.jpg" alt="profile_image"
                        class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">

                <div class="h-100">
                    <div class="col-md-4 text-end">

                    </div>
                    <h5 class="mb-1">
                        <?php echo $_SESSION['login_name'] ?>
                        <a href="javascript:;">
                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Edit Profile"></i>
                        </a>
                    </h5>
                    <p class="mb-0 font-weight-normal text-sm">
                        <?php 
                          if($_SESSION['login_user_type'] == 1){
                              echo 'Admin';
                          }else if($_SESSION['login_user_type'] == 2){
                              echo 'Organizer';
                          }else if($_SESSION['login_user_type'] == 3){
                              echo 'Client';
                          }else if($_SESSION['login_user_type'] == 4){
                              echo 'Attendee';
                          }
                    ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Left Column -->
            <div class="row">
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <!-- <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Achievements</h6>
                        </div> -->
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <!-- <li class="list-group-item border-0 px-0">
                                    <strong>Award:</strong> Entrepreneur of the Year 2023
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <strong>Recognition:</strong> Forbes 30 Under 30
                                </li>
                                <li class="list-group-item border-0 px-0">
                                    <strong>Milestone:</strong> Company reached $10M in revenue
                                </li> -->
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full
                                        Name:</strong> &nbsp; <?php echo $_SESSION['login_name'] ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Mobile:</strong> &nbsp;
                                    <?php echo $_SESSION['login_phone_number'] ?></li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Email:</strong> &nbsp; <?php echo $_SESSION['login_email'] ?>
                                </li>
                                <li class="list-group-item border-0 ps-0 text-sm"><strong
                                        class="text-dark">Location:</strong> &nbsp;
                                    <?php echo $_SESSION['login_address'] ?></li>
                                <li class="list-group-item border-0 ps-0 pb-0">
                                    <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                    <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0"
                                        href="<?php echo !empty($_SESSION['login_facebook']) ? $_SESSION['login_facebook'] : '#'; ?>"
                                        target="_blank">
                                        <i class="fab fa-facebook fa-lg"></i>
                                    </a>

                                    <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0"
                                        href="<?php echo !empty($_SESSION['login_twitter']) ? $_SESSION['login_twitter'] : '#'; ?>"
                                        target="_blank">
                                        <i class="fab fa-twitter fa-lg"></i>
                                    </a>
                                    <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0"
                                        href="<?php echo !empty($_SESSION['login_instagram']) ? $_SESSION['login_instagram'] : '#'; ?>"
                                        target="_blank">
                                        <i class="fab fa-instagram fa-lg"></i>
                                    </a>
                                    <a class="btn btn-linkedin btn-simple mb-0 ps-1 pe-2 py-0"
                                        href="<?php echo !empty($_SESSION['login_linkedin']) ? $_SESSION['login_linkedin'] : '#'; ?>"
                                        target="_blank">
                                        <i class="fab fa-linkedin fa-lg"></i>
                                    </a>
                                    <a class="btn btn-github btn-simple mb-0 ps-1 pe-2 py-0"
                                        href="<?php echo !empty($_SESSION['login_github']) ? $_SESSION['login_github'] : '#'; ?>"
                                        target="_blank">
                                        <i class="fab fa-github fa-lg"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Middle Column -->
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-md-8 d-flex align-items-center">
                                    <h6 class="mb-0">Profile Information</h6>
                                </div>

                            </div>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?php echo !empty($_SESSION['login_profile_information']) ? $_SESSION['login_profile_information'] : 'No profile information available.'; ?>
                            </p>
                            <hr class="horizontal gray-light my-4">
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-12 col-xl-4">
                    <div class="card card-plain h-100">
                        <div class="card-header pb-0 p-3">
                            <h6 class="mb-0">Recent Activities</h6>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-sm">
                                <?php echo !empty($_SESSION['login_recent_activities']) ? $_SESSION['login_recent_activities'] : 'No recent activities.'; ?>
                            </p>

                            <hr class="horizontal gray-light my-4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>