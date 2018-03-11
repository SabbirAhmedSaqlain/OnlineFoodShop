<?php
session_start();
include('dbcontroller.php');
include('config.php');
include "functions.php";
?>
<html>

<head>

        <title>Online Shopping</title>
       
        <link rel="icon" href="images/icon.ico" >
        <style type="text/css">
        body{
                background-image: url(images/pic.jpg);
                 
            }

            #data{
                position: absolute;
                background-color: #F5F5FF;
                top: 100px;
                left: 400px;
                width: 350px;
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

            #login{

background-color:  rgb(41, 113, 229);
                border: none;
                color: white;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
                height: 35px;
                width: 100px;
            }

            #login:hover{
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
                top: 50px;
                left: 430px;
                color: blue;
                font-size: 19px;
            }
            #home{
            position: absolute;
            text-align: center;
            color: rgb(17, 57, 122);
            background-color: #F5F5FF;
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
        <a href="index.php"><h1  id="home">Home</h1></a>
        <form action="register.php" method="post">
        <div id="data">

            <h3>Username </h3>
            <input class="box" type="text" name="username" />
            <h3>Password </h3>
            <input class="box" type="password" name="password" /> 
            <h3>Confirm Password </h3>
            <input class="box" type="password" name="passconf" /> 
            <h3>Email </h3>
            <input class="box" type="text" name="email"  /><br><br>

            <input id="register" type="submit" name="submit" value="Register" /><br><br>
            <a class="shadow" href="login.php">Login</a>
            
        </div>

        </form>

<?php

if(isset($_POST['submit'])){
	$username=protect($_POST['username']);
	$password=protect($_POST['password']);
	$passconf=protect($_POST['passconf']);
	$email=protect($_POST['email']);

	if(!$username || !$password || !$passconf || !$email){

		echo "<center>You need to fill in all the fields</center>";
	}
	else
	{
		 
		 if(strlen($username)>32 || strlen($username)<3)
		{
			echo "<center>Your username nust be 3 to 32 characters long!!</center>";
		}
		else
		{
            $res=mysqli_query($con,"SELECT * FROM `users` WHERE `username`='".$username."'");

            $num=mysqli_num_rows($res);
             if($num==1)
             {
             	echo "<center>The username you entered is already taken!!</center>";
             }
             else
             {
             	if(strlen($password)<5 || strlen($password) >32){
                               echo "<center>Your password must be between 5 and 32 characters long!</center>";
                 }
                 else
                 {
                 	if($password!=$passconf){
                 		echo "<center> The password you supplied does not match the confirmation password!</center>";
                 	}
                 	else
                 	{
                 		$checkmail = "/^[a-z0-9]+(_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";


                 		if(!preg_match($checkmail,$email)){
                 			echo "<center>The E-mail is not valid, must be a name@server.tld!</center>";
                 		}
                 		else
                 		{
                 			$res= mysqli_query($con,"SELECT * FROM `users` WHERE `email`= '".$email."'");
                 			$num=mysqli_num_rows($res);

                 			if($num==1){
                 				echo "<center>The email you supplied is already taken...</center>";
                 			}
                 			else{
                 				$registerTime=date('U');
                 				$code =md5($username).$registerTime;


                 				$res2=mysqli_query($con,"INSERT INTO `users` (`username`,`email`,`rtime`,`password`)
                 				VALUES('".$username."','".$email."','".$registerTime."','".md5($password)."')");
                 				
                               echo "<center>You have successfully registered!</center>";
                 			}
                 		}
                 	}
                 }
             }
		}
	}
}


?>


</div>
</body>
</html>