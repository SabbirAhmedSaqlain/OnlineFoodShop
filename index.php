<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_GET["action"])){
	switch($_GET["action"])
	{
		case "add":

			if(!empty($_POST["quantity"])) {


				$result = mysqli_query($con, "SELECT * FROM products WHERE code='" . $_GET["code"] . "'");

				while($row=mysqli_fetch_assoc($result)) {
					$productByCode[] = $row;
				}	

               $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

                if(!empty($_SESSION["cart_item"])){
                   if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"])))
                   {
                   	    foreach($_SESSION["cart_item"] as $k => $v){
                   	    	if($productByCode[0]["code"]==$k){

                                 if(empty($_SESSION["cart_item"][$k]["quantity"])){
                                
                                    $_SESSION["cart_item"][$k]["quantity"]=0;


                                 }

                                 $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];

                   	    	}
                   	    }
                   }
                   else
                   {
                   	    $_SESSION["cart_item"]=array_merge($_SESSION["cart_item"],$itemArray);
                   }

                }

                else
                {
                	$_SESSION["cart_item"]=$itemArray;
                }
            }

		      break;

		   case "remove":

		       if(!empty($_SESSION["cart_item"])){
		       	    foreach ($_SESSION["cart_item"] as $k => $v) {
		       	    	if($_GET["code"]==$k)
		       	    	    unset($_SESSION["cart_item"][$k]);

		       	    	if(empty($_SESSION["cart_item"]))
		       	    		unset($_SESSION["cart_item"]);

		       	    	
		       	    }
		       }
		       break;

		   case "empty":
		   unset($_SESSION["cart_item"]);
		   break;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Shopping</title>
	
	<link rel="icon" href="images/icon.ico" >
		<style type="text/css">
			
	    #photo{
	    	width : 1350px;
	    	
	    }		

		#data{
			
            top: 100px;
			left: 30px;
		}


        
		#shopping-cart table{width:100%;background-color:#F0F0F0;}
		#shopping-cart table td{background-color:#FFFFFF;}

		.txt-heading{   

			padding: 10px 10px;
		    border-radius: 2px;
		    color: #F0F0F0;
		    background: #996600;
			margin-bottom:10px;
		}

		a.btnRemoveAction{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}
		a.btnRemoveAction:visited{color:#D60202;border:0;padding:2px 10px;font-size:0.9em;}

		#btnEmpty {

			background-color: #ffffff;
		    border: #FFF 1px solid;
		    padding: 1px 10px;
		    color: #ff0000;
		    font-size: 0.8em;
		    float: right;
		    text-decoration: none;
		    border-radius: 4px;

		}

		.btnAddAction{

 			
		    border: 0;
		    padding: 3px 10px;
		    color: #FFF;
		    background: #996600;
		    margin-left: 2px;
		    border-radius: 2px;
		}

		#shopping-cart {
			margin-bottom:30px;
			position: absolute;
			width: 450px;
			top: 500px;
			left: 900px;
		}
		.cart-item {border-bottom: #79b946 1px dotted;padding: 10px;}

		#product-grid0_head {
 
			 
            
			width: 800px;
 
		}

		#product-grid0 {
           
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}



		#product-grid1_head {
 
			 
            
			width: 800px;
 
		}

		#product-grid1 {
 
			 
           
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}


		#product-grid2_head {
 
 
			width: 800px;
 
		}

		#product-grid2 {
 
 
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}


		#product-grid3_head {
 
 
			width: 800px;
 
		}

		#product-grid3 {
 
			 
 
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}


		#product-grid4_head {
 
 
			width: 800px;
 
		}

		#product-grid4 {
  
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}

       #product-grid5_head {
 
 
			width: 800px;
 
		}

		#product-grid5 {
  
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}


		#product-grid6_head {
 
 
			width: 800px;
 
		}

		#product-grid6 {
  
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}



		#product-grid7_head {
 
 
			width: 800px;
 
		}

		#product-grid7 {
  
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}



		#product-grid8_head {
 
 
			width: 800px;
 
		}

		#product-grid8 {
  
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}


		#product-grid9_head {
 
 
			width: 800px;
 
		}

		#product-grid9 {
  
			width: 800px;
			height: 500px;
			margin-bottom:140px;
			overflow-y: auto;
		}




		.product-item {	float:left;	background: #ffffff;margin:15px 10px;	padding:5px;border:#CCC 1px solid;border-radius:4px;}
		.product-item div{text-align:center;	margin:10px;}
		.product-price {    
			color: #996600;
		    font-weight: 600;
		}


		.product-image {height:100px;background-color:#FFF;}
		.clear-float{clear:both;}
		.demo-input-box{border-radius:2px;border:#CCC 1px solid;padding:2px 1px;}

		.login {
			 position: relative;
			color:  #cc0000;
			top: 40px;
			left: 1100px;
			width: 200px;
			font-size: 25px;
			padding: 5px 5px;
			border: solid;
			text-decoration: none;

		}
 
		
					.box{
				height: 30px;
				width: 200px;
			}


		
		#search{
			
			top: 100px;
			left: 200px;
			width: 800px;
		}

</style>

</head>
<body>
     <img id="photo" src="images/Capture1.jpg">
   
    <p ><b><a class="login" href="login.php"  >Shopkeepers Area</a></b></p>
   
    
    <div id="data">
    <div id="search">
    <?php
        if(isset($_POST["search"]))
        {
        	$aa=strlen($_POST["search"]);
        	if($aa>=2)
        	{
                 echo "<h3>Search : </h3>".$_POST["search"];

                 ?>
                 <p class="txt-heading" id="product-grid0_head">Search Items</p>
                 <div id="product-grid0">

                 <?php
                 $a="%".$_POST["search"]."%";
                 $result=mysqli_query($con,"SELECT * FROM `products` WHERE `name` LIKE '$a'");
                 while($row=mysqli_fetch_assoc($result)){
                 	?>
                    <div class="product-item">
                    <form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
                    	<div class="product-image">
                    	<img src="<?php echo $row["image"]; ?>" height="100px" width="100px"></div>
                        <div><strong><?php echo $row["name"]; ?></strong></div>
                        <div class="product-price">
                        <?php echo "$".$row["price"]; ?></div>
                        <div>
                        	<input type="text" name="quantity" value="1" size="2"/><input type="submit" value="Add to Cart" class="btnAddAction"/>
                        </div>
                    </form>
                
                </div>
                <?php
                 }
                 ?>
                 </div>
                 <?php
        	}
        }
        else
        	echo " ";
        ?>
        </div>

        <p class="txt-heading" id="product-grid1_head">Grainier<p>
        <div id="product-grid1">
        <?php
        $result=mysqli_query($con,"SELECT * FROM products ORDER BY id ASC");
        while($row=mysqli_fetch_assoc($result)){
        	if($row["type"]!='grainier'){
        		continue;
        	}
        	?>
        	<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/kg"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
			<?php
				//	}
			}
			?>

		</div>

        
        <p class="txt-heading" id="product-grid2_head">Frozen Items</p>
		<div id="product-grid2">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='frozen') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/kg"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
			<?php
				//	}
			}
			?>

		</div>




        <p class="txt-heading" id="product-grid3_head">Vegetables</p>
		<div id="product-grid3">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='vegetables') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/kg"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
			<?php
				//	}
			}
			?>

		</div>



		<p class="txt-heading" id="product-grid4_head">Fruits</p>
		<div id="product-grid4">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='fruits') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/kg"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
<?php
				//	}
			}
			?>
			</div>



    <p class="txt-heading" id="product-grid5_head">Spices</p>
		<div id="product-grid5">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='spices') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/100gm"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
                <?php
				//	}
			}
			?>
			</div>




<p class="txt-heading" id="product-grid6_head">Beverages</p>
		<div id="product-grid6">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='beverages') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
				<?php
				//	}
			}
			?>
			</div>






		 <p class="txt-heading" id="product-grid7_head">Oil</p>
		<div id="product-grid7">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='oil') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/100gm"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
                <?php
				//	}
			}
			?>
			</div>





			 <p class="txt-heading" id="product-grid8_head">Ghee</p>
		<div id="product-grid8">

			
			<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='ghee') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/100gm"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
                <?php
				//	}
			}
			?>
			</div>

 <p class="txt-heading" id="product-grid9_head">Salt and Sugar</p>
		<div id="product-grid9">

			


<?php
			$result =mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");
			while($row=mysqli_fetch_assoc($result)) { 

				if ($row["type"]!='salt and sugar') {
					continue;
				}


			?>
				<div class="product-item">
					<form method="post" action="index.php?action=add&code=<?php echo $row["code"]; ?>">
					<div class="product-image">
					<img src="<?php echo $row["image"]; ?>" height="100px" width="100px" ></div>
					<div><strong><?php echo $row["name"]; ?></strong></div>
					<div class="product-price">
						<?php echo "tk".$row["price"]."/100gm"; ?></div>
					<div>
						<input type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btnAddAction" />
					</div>
					</form>
				</div>
                <?php
				//	}
			}
			?>
			</div>




    </div>

    <div id="shopping-cart">
        <div>
           


                  <form action="index.php" method="post">
    	          <h3>Search Items : </h3>
    	          <input type="text" class="box" name="search" ><br><br>
    	         <input type="submit" onclick="myFunction" class="btnAddAction"><br><br>

                 </form>
    </div>
    

    <div class="txt-heading">Shopping Cart<a id="btnEmpty" href="pay.php?action=empty">BUY</a></div>
    <?php
    if(isset($_SESSION["cart_item"])){
    	$item_total=0;
    	?>
    	<table cellspacing="10" cellspacing="1">
    	<tbody>
    		<tr>
    			<th style="text-align:left;"><strong>Name</strong></th>
		<th style="text-align:left;"><strong>Code</strong></th>
		<th style="text-align:right;"><strong>Quantity</strong></th>
		<th style="text-align:right;"><strong>Price</strong></th>
		<th style="text-align:center;"><strong>Action</strong></th>
    		</tr>
    		<?php
                 foreach($_SESSION["cart_item"] as $item){
                 	?>
                 	<tr>
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
						<td style="text-align:left;border-bottom:#F0F0F0 1px solid;"><?php echo $item["code"]; ?></td>
						<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
						<td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo "$".$item["price"]; ?></td>
						<td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction">Remove Item</a></td>
						</tr>
						<?php
						$item_total += ($item["price"]*$item["quantity"]);
						$_SESSION['pay']=$item_total;
                 }
                 ?>
                 <tr>
                 <td colspan="5" align="right"><STRONG>Total : </STRONG><?php echo "$".$item_total;?></td>
                 </tr>
    	</tbody>
    	</table>
    <?php


        }

?>
</div>

</body>
</html>




