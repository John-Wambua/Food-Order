<?php
   function Connection(){
     $servername="localhost";
	 $username="root";
	 $password="";
	 $dbname="foodtypes"; 
	 
	 $conn=new mysqli($servername,$username,$password,$dbname);
	 if($conn->connect_error){
	 die("connection failed: " .$conn->connect_error);
     }
	 return $conn;
  }
     
	 function Close($conn){
		 $conn->close();
	 }
	 
	 function viewData($sql){
		 $conn=Connection();
		 $result = $conn->query($sql) or die($conn->error);
		 $rowdata=array();
		 while($row=$result->fetch_assoc()){
			 $rowdata[]=$row;
		 }
		 return $rowdata;	 
	 }
	 
	 function insertData($sql){
		 $conn=Connection();
		 if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
	      } 
	         else {
              echo "Error: " . $sql . "<br>" . $conn->error;
        }
	 }
	 
	 function updateDB($sql){
		 $conn=Connection();
		 if ($conn->query($sql) === TRUE) {
           echo "Record updated successfully";
	
	        } 
	        else {
          echo "Error: " . $sql . "<br>" . $conn->error;
         }
	 }
	 
	 function Delete1($sql){
		$conn=Connection();
		if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
     } else {
       echo "Error deleting record: " . $conn->error;
    } 
		
	 }
?>