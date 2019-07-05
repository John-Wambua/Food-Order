
<html>
<head>
<title>Products Database</title>
 <style>
         body
		 {
			 font-family:sans-serif;
			 font-size:11px;
		 }
		 table{
			 width:80%;
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
		  th{
			  background-color:#a70000;
			  color:white;
		  }
		  tr:nth-child(even)
		  {
			  background-color:#e8e8e8;
		  }
		   tr:nth-child(odd)
		  {
			  background-color:white;;
		  }
		  #head
		  {
			  background-color:#005cb7;
			  color:white;
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
 
		  <h1 style="text-align:center"></h1>
<table align="center">
      <tr>
	        <td id="head" colspan="5"><h1>Food Stuff Added To The Database</h1></td>
	  </tr>
      <tr> 
	       <th>Serial</th>
	       <th>Food Item</th>
		   <th>Image</th>
		   <th>Price</th>
		   <th>Edit Item</th>
	  </tr>
<?php
require('functions.php');
$sql ="SELECT * FROM food";
	$row=viewData($sql);
	//print_r($row);
	$rowLength=count($row);
	for($i=0;$i<$rowLength;$i++){
		$id= $row[$i]["id"];
		$type= $row[$i]["name"];
		$filepath=$row[$i]["image"];
        $price=$row[$i]["price"];
		echo"<tr>
		        <td>$id</td>
		       <td>$type</td>
			   <td><img src='$filepath' height='80' width='80'></td>
			   <td>$price</td>
			    <td><a href='editFoodItem.php?id=$id'>Edit</a></td>
			   </tr>";
	}


?>
</table>
<br>
	 <a href="logout.php">Logout</a>
<br>
<a href="quantityImageDB.html">Admin Upload</a>
<br><br>
<a href="quantityImage.php">Customer Order</a>
</body>
</html>