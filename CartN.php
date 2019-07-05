<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','foodtypes');

    if (isset($_POST["add"])){
        if (isset($_SESSION["cart"])){
            $product_ids = array_column($_SESSION["cart"],"product_id");
            if (!in_array($_GET["id"],$product_ids)){
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'item_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                );
				
				
				require("functions.php");
				if($_SERVER["REQUEST_METHOD"] == "POST") {

	            $size=$_POST['quantity'];
				$type= $_POST['hidden_name'];
				//echo $type;
                $stmt="SELECT image,price FROM food WHERE name='$type'";
                 $result=viewData($stmt);
                 foreach($result[0] as $key=>$value){
					 
					 if(is_numeric($value)){
						 $price=$value;
						 $amt=$value*$size;
					 }
				 }
				 
				 $user_id=$_SESSION["id"];
				$sql="INSERT INTO orders(user_id,amount)VALUES($user_id,$amt)";
				if(mysqli_query($conn,$sql)){
					$last_id=mysqli_insert_id($conn);
					$sql2="INSERT INTO order-details (unit_amount,description,quantity) VALUES('$price','$type','$size')";
					$conn->query($sql2);
					mysqli_query($conn, $sql2);
					//insertData($sql2);
					$conn->close();
				}
				}
			
				
				
				
				 
              $_SESSION["cart"][$count] = $item_array;
                echo '<script>window.location="CartN.php"</script>';
            }else{
                echo '<script>alert("Product is already Added to Cart")</script>';
                echo '<script>window.location="CartN.php"</script>';
            }
        }else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"],
            );
            $_SESSION["cart"][0] = $item_array;
        }
    }

    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete"){
            foreach ($_SESSION["cart"] as $keys => $value){
                if ($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["cart"][$keys]);
                    echo '<script>alert("Product has been Removed...!")</script>';
                    echo '<script>window.location="CartN.php"</script>';
                }
            }
			
			// $sql="DELETE FROM orders WHERE username='$name'";
              //   Delete1($sql);
        }
    }
	/*if(filter_input(INPUT_GET, 'action') == 'delete'){//loop through all variables until it matches with GET id variable
		foreach($_SESSION['cart'] as $key=>$value){
			if($product['id']==filter_input(INPUT_GET, 'id')){
				
				//remove product from shopping cart when it matches with GET id
				unset($_SESSION['cart'][$key]);
			}
		}
		//reset session array so they match with $product_ids numeric array
     $_SESSION['cart'] = array_values($_SESSION['cart']);		
	}*/
?>

<!doctype html>
<html>
<head>
    
    <title>Shopping Cart</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="CartN.css"/>

    <style>
      
       
        table, th, tr{
            text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
#navigation{
	width: 100%;
    background-color: #C70039;
    overflow: auto;
}

#navigation a {
    float: left;
    padding:28px;
    color: white;
    text-decoration: none;
    font-size: 17px;
    width: 25%; /* Four links of equal widths */
    text-align: center;
}



#navigation a.active {
    background-color: #4CAF50;
}
    </style>
</head>
<body>
<?php

   $userName= $_SESSION["username"];
  // echo"<br>";
  // echo"<div style='text-align:center;font-size:30px;font-weight:bold;'>Hello $userName</div>";
   ?>
<div id="navigation">

      <a href="CartN.php"><b>Home</a><b>
	  <a href="orderHistory.php"><b>Order History</a><b>
	   <a href="#"><b> <?php echo"<div style='text-align:center;font-size:24px;font-weight:bold;color:black;'>$userName</div>"; ?></a><b>
      <a href="logout.php"><b>Logout</a><b>
</div>

    <div class="container" style="width: 65%">
        <h2>Shopping Cart</h2>
        <?php
            $query = "SELECT * FROM food ORDER BY id ASC ";
            $result = mysqli_query($conn,$query);
            if(mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {

                    ?>
                    <div class="col-md-3">

                        <form method="post" action="CartN.php?action=add&id=<?php echo $row["id"]; ?>">

                            <div class="products">
                                <img src="<?php echo $row["image"]; ?>" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["name"]; ?></h5>
                                <h5 class="text-danger"><?php echo $row["price"]; ?></h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-info"
                                       value="Add to Cart">
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        ?>
		
		
		

        <div style="clear: both"></div>
        <h3 class="title2">Shopping Cart Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
            <tr>
                <th width="30%">Product Name</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["item_name"]; ?></td>
                            <td><?php echo $value["item_quantity"]; ?></td>
                            <td>Kshs. <?php echo $value["product_price"]; ?></td>
                            <td>
                                Kshs.<?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                            <td><a href="CartN.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span
                                        class="text-danger">Remove Item</span></a></td>

                        </tr>
                        <?php
                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <th align="right">Kshs. <?php echo number_format($total, 2); ?></th>
                            <td></td>
                        </tr>
						
						
                        <?php
		  
                    }
                ?>
				
            </table>
			<a href="#" class="button" name="checkout">Checkout</a>
        </div>

    </div>

<?php		
            //require("functions.php");	
          /* */
?>

</body>
</html>
