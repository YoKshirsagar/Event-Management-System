<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/favicon.png" type="image/png">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    body {
        background-image: url('assets/background/background.png');
        /* Replace with your image path */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        /* Semi-transparent black */
        backdrop-filter: blur(10px);
        /* Blur effect */
        -webkit-backdrop-filter: blur(10px);
        /* Safari support */
    }

    .login-box {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 400px;
    }

    .login-card-body {
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    .login-logo {
        font-family: 'Poppins', sans-serif; /* Modern font */
    }

    .logo-link {
        font-size: 2.5rem;
        font-weight: bold;
        position: relative;
        text-transform: uppercase;
        display: inline-block;
        color: #fff;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.7),
                     0 0 20px rgba(255, 215, 0, 0.8),
                     0 0 30px rgba(255, 165, 0, 0.9);
        transition: transform 0.3s ease-in-out;
    }

    .logo-link:hover {
        transform: scale(1.1);
        text-shadow: 0 0 15px rgba(255, 255, 255, 1),
                     0 0 25px rgba(255, 215, 0, 1),
                     0 0 35px rgba(255, 165, 0, 1),
                     0 0 50px rgba(255, 69, 0, 1);
    }

    /* Additional hover effect for the logo text */
    .logo-link:hover .logo-text {
        animation: glow 1.5s infinite alternate;
    }

    @keyframes glow {
        from {
            color: #FFD700; /* Gold */
        }
        to {
            color: #FF4500; /* Orange-Red */
        }
    }
    </style>

</head>
    <?php
        session_start();
        include('db_connect.php');
        ob_start();
        if(!isset($_SESSION['system'])){

            $system = $conn->query("SELECT * FROM system_settings")->fetch_array();
            foreach($system as $k => $v){
            $_SESSION['system'][$k] = $v;
            }
        }
        ob_end_flush();
    ?>
    <?php
        if(isset($_SESSION['login_user_id']))
            header("location:index.php?page=home");
    ?>
<body>
    <div class="overlay"></div>
    <div class="login-box">
    <div class="login-logo text-center mb-4">
    <a href="#" class="text-white text-decoration-none logo-link">
        <span class="logo-text"><?php echo $_SESSION['system']['project_name'] ?></span>
    </a>
</div>
        <div class="card">
            <div class="card-body login-card-body">
                <form action="" id="login-form">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="email" id="email" class="form-control" name="email" required placeholder="Email">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="password" id="password" class="form-control" name="password" required placeholder="Password">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-8">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember">
                                <label for="remember" class="form-check-label">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" id="signin" class="btn btn-primary btn-block w-100">Sign In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="ajax.js"></script>

   
</body>

</html>