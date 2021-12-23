<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Inbox</title>
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
					Inbox
				</span>
			

			<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@cyb3rmail.com">
					<input class="input1" type="text" name="chkmailtxt" placeholder="Email">

					<br>

					<div class="container-contact1-form-btn">
					<input type="submit" class="contact1-form-btn" name="chkmail" value="Check Mail">  </div>
					<?php
						$remail="";	
						if(isset($_POST['chkmail']))
						{
							$remail=$_POST['chkmailtxt'];	
						}
						
					?>

			<br><br>
				<div class="wrap-input1 validate-input" data-validate = "Message is required">
					
						<?php
							
							$conn = mysqli_connect("localhost","root","","emailsys");
							$sql = "SELECT sender, sub, msg, timest FROM emaildata WHERE receiver='$remail'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0)
							{
								$counter=1;
							    // output data of each row
								while($row = $result->fetch_assoc()) 
								{
							        echo "<br><br>$counter.)"." "."Time: " . $row["timest"].
							             "<br>From: " . $row["sender"].
							          	 "<br>Sub: ". $row["sub"]. 
							          	 "<br>msg: ". $row["msg"];
							          	 $counter++;
							    }
							} 
							else 
							{
							    echo "0 messages";
							}
							$conn->close();
						
						?>
						
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<input type="submit" class="contact1-form-btn" name="compose" value="Compose">  </div>
					<?php
						if(isset($_POST['compose'])){
						echo "<script>window.open('compose.php','_self')</script>";}
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
