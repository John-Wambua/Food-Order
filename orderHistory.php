<html>
<head>
<title>Order History</title>
 <style>
         body
		 {
			 font-family:sans-serif;
			 font-size:11px;
		 }
		 table{
			 width:70%;
		 }
		 table,th,td{
		     border:1px solid black;
			 border-collapse:collapse;
			 opacity:0.95;
		  }
		  th,td{
		     padding:10px;
			  text-align:center; 
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
    width: 17%; /* Four links of equal widths */
    text-align: center;
}



#navigation a.active {
    background-color: #4CAF50;
}
		 
		 
		  </style>
		  </head>
		  <body>
		  <?php
		  session_start();
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

		  <h1 style="text-align:center"></h1>
<table align="center">
      <tr>
	  <br><br><br><br><br>
	        <td id="head" colspan="4"><h1>Order History</h1></td>
	  </tr>
      <tr> 
	       <th>User ID</th>
	       <th>Date Of Order</th>
		   <th>Amount</th>
	  </tr>
<?php
require('functions.php');

   $userId= $_SESSION["id"];
   //echo $userId;

$sql ="SELECT user_id,date_created,amount FROM orders Where user_id='$userId'";
	$row=viewData($sql);
	//print_r($row);
	$rowLength=count($row);
	for($i=0;$i<$rowLength;$i++){
		$user_id= $row[$i]["user_id"];
		$date =$row[$i]["date_created"];
        $amt=$row[$i]["amount"];
		echo"<tr>
		       <td>$user_id</td>
		       <td>$date</td>
			   <td>$amt</td>
			   </tr>";
	}


?>
</table>
<br>
	
</body>
</html>