<?php include('dbconnection.php');
session_start();

if (isset($_SESSION['username'])) {
    header("location:index.php");
    die();
}
?>

<html>

<head>
    <title>Login</title>
    <link href="css\bootstrap-grid.css  " rel="stylesheet">
    <link href="css\bootstrap-grid.min.css" rel="stylesheet">
    <link href="css\bootstrap.css" rel="stylesheet">
    <link href="css\bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="js\bootstrap.bundle.js"></script>
    <script src="js\bootstrap.js"></script>
    <script src="js\bootstrap.min.js"></script>
    <script src="js\bootstrap.bundle.min.js"></script>
    <style>
        .col-lg-4 {
            background-color: #008ae6;
            color: white;
            height: 100%;
            padding-top: 14%;
            padding-bottom: 15.5%;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class=col-lg-8>

                <?php

                error_reporting(0);
                include 'dbconnection.php';
                $email = $_POST['email'];
                $pwd = $_POST['password'];
                $pass = md5($pwd);
                if (isset($_POST['login'])) {

                    $sql = "select * from user where email='$email' and password='$pass'";
                    $result = $conn->query($sql);
                    if (mysqli_num_rows($result) == 1) {
                        $row = $result->fetch_assoc();
                        
                        if ($row['type'] == 1) {

                            $_SESSION['admin'] = $email;
                            header("location: admin.php");
                        }
                        if ($row['type'] == 2) {

                            $_SESSION['user_name'] = $email;
                            header("location: welcome.php");
                        }
                    }else {
                        echo "Wrong username./password combination";
                    }
                }


                ?>

            </div>
            <div class="col-lg-4">
                <form method="post">

                    <form>
                        <div class="heading">
                            <h2 style="font-family:Serif;">Login FLORAL FINDS</h2>
                        </div><br>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" required aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text">We'll never share your email or password with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Password">
                        </div>
                        <div class="form-check">
                            <br>
                        </div>
                        <button type="submit" name="login" style="background-color:#99d6ff;color:black;" class="btn btn-primary">Login</button>
                        Not Having Account ? <a href="signupnew.php" style="color:black;">Signup</a>
                    </form>
                </form>

            </div>
        </div>
    </div>
</body>

</html>