
<!DOCTYPE HTML>
<html>
<head>
<style>
body{
	margin:0;
	padding:0;
	
	font-family:sans-serif;
}
.background-img{
    height:630px;
	background:url(adminImg.jpg);
	background-position:center;
	background-repeat:no repeat;
	background-size:cover;
	background-attachment:scroll;
	
}
.login-box{
	width:400px; 
	height:500px;
	background:rgba(0,0,0,0.5);
	color:#fff;
	top:65%;
	left:50%;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	padding:70px 30px;
}
.img{
	width:100px;
	height:100px;
	border-radius:50%;
	position:absolute;
	top:-50px;
	left:calc(50% - 50px);
}
h1{
	margin:0;
	padding:0 0 20px;
	text-align:center;
	font-size:22px;
}
.login-box label{
	margin: 0;
	padding: 0;
	font-weight:bold;
	font-size:20px;
	text-align:left;
}
.login-box input{
	width:100%;
	margin-bottom:20px;
}
.login-box input[type="text"]{
	border:none;
	border-bottom:1px solid #fff;
	background:transparent;
	outline:none;
	height:40px;
	color:#fff;
	font-size:16px;
}
.login-box select{
	height:40px;
	font-size:16px;
	outline:none;
	background:transparent;
	
	
}
.login-box input[type="submit"]{
	border:none;
	outline:none;
	height:40px;
	background:#fb2525;
	color:#fff;
	font-size:18px;
	border-radius:20px; 
}
.login-box input[type="submit"]:hover{
	 cursor:pointer;
	 background:#39dc79;
	 color:#000;
}
.login-box a{
	text-decoration:none;
	font-size:18px;
	color:#fff;
}
.login-box a:hover{
	color:#39dc79;
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
    width: 12%; /* Four links of equal widths */
    text-align: center;
}



#navigation a.active {
    background-color: #4CAF50;
}
h4{
	color:red;
}


</style>
<title>Edit Order status</title>
<link rel="stylesheet"type="text/css"href="">
  <link rel="stylesheet"type="text/css"href="">
	
</head>
<body>

<?php
	require('functions.php');
 
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "SELECT id, status FROM orders WHERE id = $id";
		$row = viewData($sql);
	}
 
	if(isset($_POST['update']))
	{  
		$status = $_POST['status'];
		$id = $_POST['id'];
		if($status==0||$status==1){
        $sql = "UPDATE orders SET status = $status WHERE id = $id";
        updateDB($sql);
		echo '<script>alert("Status updated successfully")</script>';
        echo '<script>window.location="orderTable.php"</script>';
	    $conn->close();
		}else{
	    echo '<script>alert("Invalid input")</script>';
        echo '<script>window.location="editStatus.php"</script>';
	    $conn->close();
		}
	}
 
?>

<?php
   session_start();
   $userName= $_SESSION["username"];
  echo"<div style='text-align:center;font-size:24px;font-weight:bold;color:black;'>Hello $userName</div>";

   ?> 
	
	<div id="navigation">
   
      <a href="quantityImageDB.html"><b>Home</a><b>
	  <a href="quantityTable.php"><b>View Products</a><b>
	  <a href="orderTable.php"><b> Orders</a><b>
	  <a href="removeItem.php"><b>Remove Items</a><b>
	   <a href="removeUser.php"><b>Remove user</a><b>
      <a href="logout.php"><b>Logout</a><b>
</div>
     
	<div class="background-img">

        <div class="login-box">
		  <img src="admin-logo.jpg" class="img">
		       <h1>Change Order Status</h1>
			   <h4><i>
                        0 - Order Successful(Default)<br>
                        1 - Pending order <br>
                        
                </h4></i>
			   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			    <label>Change Status</label><br>
				<input type="text" name="status" value="0">
			 <input type="hidden" name="id" value="<?php echo $row[0]["id"]; ?>">
			<input type="submit"value="Update" name="update"style="font-size:20px;">
			 <br>
	 	
			 
			 </form>
		   
		   </div>
		   </div>
		  
		   
		  <!-- <input type="text" name="status" value="<?php echo $row[0]["status"]; ?>"><br>-->
                        
 </body>
 </html>
 
 