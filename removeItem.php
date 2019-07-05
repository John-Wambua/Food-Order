</style>
<title>Remove Item</title>
<link rel="stylesheet"type="text/css"href="">
  <link rel="stylesheet"type="text/css"href="">
	
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
	height:300px;
	background:rgba(0,0,0,0.5);
	color:#fff;
	top:50%;
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
.login-box input,select{
	width:100%;
	margin-bottom:20px;
	color:red;

}
.login-box select{
	height:40px;
	font-size:16px;
	outline:none;
	background:transparent;
}


</style>
	
</head>
<body>
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
		       <h1>Remove Food Items</h1>
			   
			   <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			  <label>Food Item</label><select  name="food">
			      
				  
				 <?php
				 require('functions.php');
	             
				 
				 $sql = "SELECT name FROM food";
            
				 $dbresult = viewData($sql);
				 for($x=0;$x<count($dbresult);$x++) {
					 foreach($dbresult[$x] as $key=>$value) {
						 echo "<option value='$value'>$value</option>";
					 }
				 }
				 
				                 
			   ?>
		     </select>
			<input type="submit"value="Remove" name="remove" style="font-size:20px;">
			 <br>
	 	
			 
			 </form>
		    </div>
		   </div>


<?php		
            if(isset($_POST['remove'])){
				if($_SERVER["REQUEST_METHOD"] == "POST") {
               
				$type= $_POST['food'];
                 echo "wassssgoooood fam";
                $sql="DELETE FROM food WHERE name='$type'";
                 Delete1($sql);
				   echo '<script>alert("Food item removed Successfully")</script>';
                   echo '<script>window.location="removeItem.php"</script>';
				 $conn->close();
				 
				}
			}
?>




	
	 
 </body>
 </html>