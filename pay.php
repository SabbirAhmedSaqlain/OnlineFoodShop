<?php
	session_start();
	ob_start();
	include ('dbcontroller.php');

	include "functions.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
	<link rel="icon" href="images/icon.ico" >
		<style type="text/css">
		body{
				background-image: url(images/pic.jpg);
				 
			}
			

			#data{
				background-color: 	  #FFFFFF;
				position: absolute;
				top: 50px;
				left: 320px;
	        	width: 600px;
	   			border: 5px solid ;
				border-color:#214989;
	   		    padding: 20px;
	    		margin: 20px;
	    		text-align: center;

			}
			.box{
				height: 30px;
				width: 200px;
			}
			#data a{
				font-size: 20px;
			}

			.login{
 
				background-color:  #0000CC;
;
				border: none;
				color: white;
				text-align: center;
				text-decoration: none;
			    display: inline-block;
			    font-size: 16px;
			    margin: 4px 2px;
			    cursor: pointer;
			    height: 35px;
			    width: 160px;
			}

			.login:hover{
            	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19), 0 6px 20px 0 rgba(0,0,0,0.19);
        	}

        	.shadow {
	        	color: blue;
	            text-decoration: none;
       		 }

        	.shadow:hover{
            	color: white;
    			text-shadow: 1px 1px 2px black, 0 0 25px blue, 0 0 5px darkblue;
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
			background-color:	  #FFFFFF;
			text-align: center;
			color: #000099;
			top: 60px;
			left: 100px;
			width: 160px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;

		}

		#pay {
			color: #000099;
			font-size: 20px;
		}




		</style>

</head>
<body>

<a href="index.php"><h1  id="home">Home</h1></a>

		<div id="data">

<?php

if(!isset($_SESSION['pay'])){
	echo 'please select items';
}
else
{
	$paid=$_SESSION['pay'];
	echo '<p id="pay">Amount to be paid '.$paid.'tk</p>';

?>

<form action="pay.php" method="post">

            <p>Customer Name</p>
            <input class="box" type="text" name="name">

            <p>Phone Number </p>
			<input class="box" type="text" name="phone" /> 

			<p>Account Type</p>
			<input class="box" type="text" name="type" />

			<p>Account Number</p>
			<input class="box" type="text" name="account" />	<br><br><br>
					

			<input class="login" type="submit" name="submit" value="Confirm" /><br><br></form>


			<?php
			if(isset($_POST['submit'])){

				$name = protect($_POST['name']);
				$phone = protect($_POST['phone']);
				$account = protect($_POST['account']);
				$type = protect($_POST['type']);


                if(!$name || !$phone || !$account || !$type){
                	echo '<p class="msg">Please fill all blanks!</p>';
                }
                else
                {
                	$time="1234";
                	$res=mysqli_query($con,"INSERT INTO `customers` (`name`, `phone`, `account`, `type`, `code`) 
					VALUES('".$name."','". $phone."','".$account."','".$type."','".$time."')");

                }
		}



}			

?>
</div>

</body>
</html>