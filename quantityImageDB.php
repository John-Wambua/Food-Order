<?php

  require('functions.php');

$conn=Connection();

$type= $_POST["food"];
$price=$_POST["price"];

$filename=$_FILES['image']['name'];
$filetype=$_FILES['image']['type'];
 	 
	 $filepath="upload/" . $filename;
    $sql="INSERT INTO food(name,image,price)
     VALUES('$type','$filepath','$price')";


if(move_uploaded_file($_FILES['image']['tmp_name'],'upload/' .$filename)){
	insertData($sql);
	echo '<script>alert("New Item inserted successfully ")</script>';
    echo '<script>window.location="quantityTable.php"</script>';
}
	
		 insertData($sql);
	
	Close($conn);
	?>
