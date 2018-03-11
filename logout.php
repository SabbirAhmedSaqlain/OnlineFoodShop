<?php

	session_start();
	include('dbcontroller.php');
	include "functions.php";
 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
	<link rel="icon" href="images/icon.ico" >
	 
	<style type="text/css">
			body{
				background-image: url(images/body.jpg);
				 
			}


				#data{
				position: absolute;
				top: 100px;
				left: 400px;
	        	width: 400px;
	        	height: 400px;
	   			border: 5px solid #214989;;
	   		    padding: 20px;
	    		margin: 20px;
	    		text-align: center;

			}

			        	.msg {
        		position: absolute;
        		top: 150px;
        		left: 430px;
        		color: blue;
        		font-size: 19px;
        	}
        	#home{
			position: absolute;
			text-align: center;
			color: rgb(17, 57, 122);
			top: 60px;
			left: 100px;
			width: 160px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}

</style>
</head>
<body>

<a href="index.php"><h1 id="home">Home</h1></a>
<div id="data"></div>

<?php
if(!isset($_SESSION['uid'])){
	echo '<p class="msg">You need to be logged in to see this page!</p>';
}else
{
	mysqli_query($con,"UPDATE `users` SET `online`='".date('U')."' WHERE id='".$_SESSION['uid']."'");
	session_destroy();
	echo '<p class="msg">You have successfully logged out!</p>';

}
?>


<a href="login.php">Back to login page</a>


</body>
</html>