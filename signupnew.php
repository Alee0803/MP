<html>

<head>
    <title>Signup</title>
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
        .col-lg-8 {
            background-color: #0d0d0d;
            color: white;
        }

        input {
            width: 40%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #04AA6D;
            color: white;
        }



        /* The message box is shown when the user clicks on the password field */
        #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }

        #message p {
            padding: 10px 35px;
            font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }

        .col-lg-4 {
            background-color: #800000;
            color: white;
            height: 100%;
            padding-top: 1%;
            padding-bottom: 2.2%;
        }



        .col-lg-8 {
            padding-left: 5%;
        }
    </style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
	</script>

<script type="text/javascript">

function checkemail()
{
 var email=document.getElementById( "email" ).value;

 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'checkdata.php',
  data: {
   user_email:email,
  },
  success: function (response) {
   $( '#name_status' ).html(response);
   if(response=="OK")	
   {
    return true;	
   }
   else
   {
    return false;	
   }
  }
  });
 }
 else
 {
  $( '#name_status' ).html("");
  return false;
 }
}

</script>


</head>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-4">
                <form method="post">

                    <form>
                        <div class="heading">
                            <h2 style="font-family:Serif;">Signup FLORAL FINDS</h2>
                        </div><br>

                        <div class="form-group">
                            <label>Phone No: </label>
                            <input type="tel" pattern="[6789][0-9]{9}" class="form-control" name="phone" required placeholder="Phone Number">
                        </div>



                        <div class="form-group">
                            <label>Username</label>
                            <input type="Username" class="form-control" required placeholder="Username" name="uname">
                        </div>

                        <div class="form-group">
                            <label>Enter Email address</label>
                            <input type="email" class="form-control" name="email" id="email" onkeyup="checkemail();" required aria-describedby="emailHelp" placeholder="Enter email">
                            <span id="name_status"></span>

                        </div>
                        <div class="form-group">
                            <label>Enter address</label>
                            <input type="text" class="form-control" name="address"  required aria-describedby="emailHelp" placeholder="Enter email">
                            <span id="name_status"></span>

                        </div>


                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        </div>

                        <div class="form-group">
                            <label>Re Enter Password</label>
                            <input type="password" class="form-control" name="pwd2" required placeholder="Re Enter Password">
                        </div>


                        <div class="form-check">
                            <br>
                        </div>
                        <button type="submit" name="signup" style="background-color:#99d6ff;color:black;" class="btn btn-primary">Signup</button>
                        Alrady Having Account ? <a href="newlogin.php" style="color:blue;">Signin</a>
                    </form>
                </form>

            </div>
            <div class=col-lg-8>
               <?php
                include 'dbconnection.php';
                if (isset($_POST['signup'])) {
                    $phone = $_POST['phone'];
                    $username = $_POST['uname'];
                    $address=$_POST['address'];
                    $email = $_POST['email'];
                    $password = $_POST['psw'];
                    $password1 = $_POST['pwd2'];
                    $a = 2; 
                    $sql = "select * from user where email='$email'";
                    $result = $conn->query($sql);



                    if (mysqli_num_rows($result) == 1) { ?><br><?php
                                                                echo "Email Already Regestered"; ?>
                        <br><a href="newlogin.php">Click to Login</a><?php
                                                                } else {


                                                                    if ($password == $password1) {
                                                                        echo "Passwords match ";
                                                                        $pwd = md5($password);

                                                                       echo $sql = "insert into user(user_name,email,password,address,phone,type)values('$username','$email','$pwd','$address','$phone','$a')";
                                                                        $result = $conn->query($sql);
                                                                        if ($result) {
                                                                    ?><a href="newlogin.php">Go to Login</a><?php
                                                                                                        } else {
                                                                                                            echo "Record Not Inserted";
                                                                                                        }
                                                                                                    } else {
                                                                                                        echo "Password Missmatched";
                                                                                                    }
                                                                                                }
                                                                                            }

                                                                                                            ?>

            </div>
        </div>
    </div>
</body>

</html>