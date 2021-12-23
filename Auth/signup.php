<!-- SIGN UP -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>
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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="name" id="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="phone" id="phone" placeholder="Phone"/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Email"/>
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in Terms of service</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>

                        <!-- PHP SIGN UP CODE -->

                        <?php

                        if(isset($_POST['signup']))
                        {
                          $name = $_POST['name'];
                          $phone = $_POST['phone'];
                          $emailid = $_POST['email'];
                          $pass = $_POST['pass'];
                          $repass = $_POST['re_pass'];

                        if(strcmp($pass,$repass)==0){

                        $conn = mysqli_connect("127.0.0.1:3000","root","","dapapp");

                        $insert = "INSERT INTO userdb (Name,Phone,Email,Password) 
                                   VALUES('$name','$phone','$emailid','$pass')";
                        $exe = mysqli_query($conn,$insert);

                        if($exe)
                        {
                          echo "Registration successful";
                        }
                        else
                        {
                          echo "Registration failed";
                        }
                        } 
                        else
                        {
                            echo"Passwords don't match!";
                        }
                    
                   
                        }

                
                        ?>
                    


                    </div>
                    <div class="signup-image">
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="index.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

        

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>