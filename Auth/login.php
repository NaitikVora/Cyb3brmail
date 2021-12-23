<!-- LOGIN -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="favicon-16x16.png"/>
<!--===============================================================================================-->
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="main">
<!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="your_name" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="your_pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submitbtn" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <!-- PHP LOGIN CODE -->
                    
                    <?php
                    if(isset($_POST['submitbtn']))
                    {
                        $uname = $_POST['email'];
                        $upass = $_POST['pass'];    
                        $conn = mysqli_connect("127.0.0.1:3000","root","","dapapp");
                        $select1 = "SELECT * FROM userdb WHERE Email = '$uname'";
                        $select2 = mysqli_query($conn,$select1);
                        $count = mysqli_num_rows($select2);
                        if($count!=0)
                        {
                            $chk1 = "SELECT Name FROM userdb WHERE Email = '$uname' AND Password = '$upass'";
                            $chk2 = mysqli_query($conn,$chk1);
                            $chk3 = mysqli_num_rows($chk2); 
                            if($chk3 == 1)
                            {
                                echo "Welcome ".$uname."<br>";
                                session_start();  
                                $_SESSION["Name"]=$uname; 
                                echo $_SESSION["Name"];
                                $_SESSION['submitbtn'] = $uname;
                                //TO DO - ADD AUTH FOLDER TO D://ClinicWebApp
                                // Change to appointment page echo "<script>window.open('Mail/inbox.php','_self')</script>";
                            } 
                            else
                            {
                                
                                echo "<h1>Incorrect credentials";
                            }
                        }
                        else
                        {
                            echo "<h1>User not found";
                        }

                    }
                    ?>
                    </div>
                </div>
            </div>
        </section>
</div>
<!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>