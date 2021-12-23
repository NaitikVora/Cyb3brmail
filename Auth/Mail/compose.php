<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Compose</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="favicon-16x16.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="contact1">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="images/img-01.png" alt="IMG">
			</div>

			<form class="contact1-form validate-form" method="POST">
				<span class="contact1-form-title">
					Compose Mail
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@cyb3rmail.com">
					<input class="input1" type="text" name="email1" placeholder="Sender">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@cyb3rmail.com">
					<input class="input1" type="text" name="email2" placeholder="Receiver">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Subject is required">
					<input class="input1" type="text" name="subject" placeholder="Subject">
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					<textarea class="input1" name="message" placeholder="Message"></textarea>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<input type="submit" class="contact1-form-btn" name="submit" value="Send Mail">
						<!--<span>
							Send Email
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>-->
				</div>
				<br>
				<div class="container-contact1-form-btn">
					<input type="submit" class="contact1-form-btn" name="chkmail" value="Check Mail"></div>
				<?php

					if(isset($_POST['chkmail']))
					{
						echo "<script>window.open('inbox.php','_self')</script>";
					}

					if(isset($_POST['submit']))
					{
						$semail=$_POST['email1'];
						$remail=$_POST['email2'];
						$sub=$_POST['subject'];
						$msg=$_POST['message'];

						date_default_timezone_set("Asia/Calcutta");
						$day=date("d/m/Y");
						$tim=date("h:i:sa");
						$timstmp=$day." ".$tim;
					

						$conn = mysqli_connect("localhost","root","","emailsys");
						$select1 = "SELECT * FROM userdb WHERE emailid = '$remail'";
                        $select2 = mysqli_query($conn,$select1);
                        $count = mysqli_num_rows($select2);
                        if($count!=0)
                        {
                            $insert = "INSERT INTO emaildata(sender,receiver,sub,msg,timest)
                            		   VALUES('$semail','$remail','$sub','$msg','$timstmp')";
	                        $exe = mysqli_query($conn,$insert);

	                        if($exe)
	                        {
	                          echo "Sent Successfully";
	                        }
	                        else
	                        {
	                          echo "Error Occurred";
	                        }
	                    } 
	                    else
	                    {     
	            	            echo "<h1>User not found";
	                    }
					}
				?>
			</form>
		</div>
	</div>




<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
