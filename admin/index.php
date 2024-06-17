<?php
session_start();
error_reporting(0);
foreach (glob("../helper/*.php") as $file) {
    include $file;
}
if (isset($_POST['login'])) {
    $query = Query::execute(
        "SELECT * FROM tbladmin WHERE email=? AND password=?",
        [
            $_POST['email'],
            $_POST['password']
        ]
    );
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    if ($query->rowCount() > 0) {
        foreach ($results as $result) {
            $_SESSION['sscmsaid'] = $result->schoolID;
        }
        $_SESSION['login'] = $_POST['email'];
        echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
    } else {
        Notification::echoToScreen("Invalid Details");
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>CIMS | Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">
    <style>
        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("../assets/bg.jpg"); /* The image used */
            background-color: #cccccc; /* Used if the image is unavailable */
            height: 500px; /* You must set a specified height */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Do not repeat the image */
            background-size: cover; /* Resize the background image to cover the entire container */
            /* background: linear-gradient(135deg, #6E8AFA, #746D75); */
        }
        div.wrapper-page > .card-box {
            width: 100%;
            max-width: 800px!important; /* Adjusted width */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 50px; /* Increased padding */
            margin: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative; /* Added for positioning of back home link */
        }
        .back-home-link {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #007bff; /* Bootstrap primary blue for consistency */
            text-decoration: none; /* No underline */
            font-size: 16px;
        }
        input[type="text"], input[type="password"] {
            border: none;
            border-bottom: 2px solid #ddd;
            border-radius: 0;
            padding: 20px 0; /* Increased padding */
            margin-bottom: 30px; /* Increased margin */
            outline: none;
            transition: all 0.3s ease;
            width: 100%; /* Full width */
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-bottom-color: #0056b3;
        }
        button {
            background-color: #0056b3;
            color: white;
            border: none;
            padding: 12px; /* Increased padding */
            border-radius: 5px;
            width: 100%;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background-color: #013C73;
        }
    </style>
</head>
<body>
    <div class="wrapper-page">
        <div class="account-bg">
            <div class="card-box mb-0">
                <strong style="padding-top: 30px;"><a href="../index.php" class="text-muted"><i class="fa fa-home m-r-5"></i> <- Back Home</a> </strong>
                <div class="text-center m-t-20">
                    <h6>Classroom Mananagement System </h6>
                    <h6>Admin Login</h6>
                </div>
                <div class="m-t-10 p-20">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h6 class="text-muted text-uppercase m-b-0 m-t-0">Sign In</h6>
                        </div>
                    </div>
                    <form class="m-t-20" action="" method="post">
                        <div class="form-group row">
                            <div class="col-12">
                                <input type="text" class="form-control" placeholder="enter your username" required="true" name="username">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input type="password" class="form-control" placeholder="enter your password" name="password" required="true">
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-10">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                            </div>
                        </div>

                        <div class="form-group row m-t-30 mb-0">
                            <div class="col-12">
                                <a href="forgot-password.php" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
