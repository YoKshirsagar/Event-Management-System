<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2"
    id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand px-4 py-3 m-0" href="" target="_blank">
            <img src="assets/img/favicon.png" class="navbar-brand-img" width="26" height="26" alt="main_logo">
            <?php if($_SESSION['login_user_type'] == 1): ?>
            <span class="ms-1 text-sm text-dark">ADMIN</span>
            <?php endif;?>
            <?php if($_SESSION['login_user_type'] == 2): ?>
            <span class="ms-1 text-sm text-dark">ORGANIZER</span>
            <?php endif;?>
            <?php if($_SESSION['login_user_type'] == 3): ?>
            <span class="ms-1 text-sm text-dark">CLIENT</span>
            <?php endif;?>
            <?php if($_SESSION['login_user_type'] == 4): ?>
            <span class="ms-1 text-sm text-dark">ATTENDEE</span>
            <?php endif;?>
        </a>
    </div>

    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active bg-gradient-dark text-white" href="./index.php?page=home">
                    <i class="material-symbols-rounded opacity-5">dashboard</i>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <?php if($_SESSION['login_user_type'] == 1): ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=list_user">
                    <i class="material-symbols-rounded opacity-5">list</i>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=event">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Events</span>
                </a>
            </li>
            <?php endif;?>
            <?php if($_SESSION['login_user_type'] == 2): ?>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=list_user">
                    <i class="material-symbols-rounded opacity-5">list</i>
                    <span class="nav-link-text ms-1">Clients</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=event">
                    <i class="material-symbols-rounded opacity-5">table_view</i>
                    <span class="nav-link-text ms-1">Events</span>
                </a>
            </li>
            <?php endif;?>

            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=new_user">
                    <i class="material-symbols-rounded opacity-5">view_in_ar</i>
                    <span class="nav-link-text ms-1">Add User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=new_event">
                    <i class="material-symbols-rounded opacity-5">format_textdirection_r_to_l</i>
                    <span class="nav-link-text ms-1">Add Event</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=Q-A">
                    <i class="material-symbols-rounded opacity-5">receipt_long</i>
                    <span class="nav-link-text ms-1">CHAT / Q&A</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=send_notifications">
                    <i class="material-symbols-rounded opacity-5">notifications</i>
                    <span class="nav-link-text ms-1">Send Notifications</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./index.php?page=profile">
                    <i class="material-symbols-rounded opacity-5">person</i>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark" href="./logout.php">
                    <i class="material-symbols-rounded opacity-5">login</i>
                    <span class="nav-link-text ms-1">Log Out</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link text-dark" href="../pages/sign-up.html">
                    <i class="material-symbols-rounded opacity-5">assignment</i>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> -->
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn btn-outline-dark mt-4 w-100" href="./index.php?page=developers" type="button">Developers</a>

            <a class="btn bg-gradient-dark w-100" href="./index.php?page=razorpay" type="button">Razorpay</a>
        </div>
    </div>
</aside>

