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
        <div class="card-box">
            <a href="../index.php" class="back-home-link"><i class="fa fa-home m-r-5"></i> Back Home</a>
            <h4 class="text-center m-t-0 m-b-20">Admin Login</h4>
            <form action="" method="post">
                <input type="text" class="form-control" placeholder="Enter your email" required name="email">
                <input type="password" class="form-control" placeholder="Enter your password" required name="password">
                <button type="submit" name="login">Log In</button>
                <a href="forgot-password.php" class="text-muted" style="display: block; text-align: center; margin-top: 20px;">
                    <i class="fa fa-lock m-r-5"></i> Forgot your password?
                </a>
            </form>
        </div>
    </div>
    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
