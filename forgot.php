<?php
session_start();
include('dbcontroller.php');
include('config.php');
include"functions.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login with Users Online Tutorial</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
      if(isset($_POST['submit'])){
    
		$email = protect($_POST['email']);

		if(!$email){

			echo "<center>You need to fill in your <b>E-mail</b> address!</center>";
		}
		else{
			$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
			if(!preg_match($checkemail, $email)){

				echo "<center><b>E-mail</b> is not valid, must be name@server.tld!</center>";

			}
		else
		{
			$res=mysqli_query($con,"SELECT * FROM `users` WHERE `email` = '".$email."'");
			$num=mysqli_num_rows($res);
			if($num==0)
			{
				echo "<center>The email you supplied does not exist in our database!</center>";
			}
			else
			{
				$row=mysqli_fetch_assoc($res);
				mail($email, 'Forgotten Password', "Here is your password : ".$row['password']."\n\nPlease try not to lose it again!" , 'From: sanjana.anty@gamil.com' );
			}
		}
	}
}

?>

				<form action="forgot.php" method="post">
		<div id="data">
		<p>Enter email address to restore password</p>

 
			<h3>Email </h3>
			<input class="box" type="text" name="email"  /><br><br>

			<input id="submit"  type="submit" name="submit" value="Send" />
			 <br><br>
			<a class="shadow" href="login.php">Login</a>|
			<a class="shadow" href="register.php">Register</a>
			
		</div>

		</form>

</body>
</html>