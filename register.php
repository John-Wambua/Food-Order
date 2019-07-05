<?php
    require('functions.php');
?>

<html>
<head>
<style>
body
{
    margin:0;
	padding:0;
	background:url(restaurant.jpg);
	background-position:center;
	background-repeat:no repeat;
	background-size:cover;
	background-attachment:scroll;
	height:450px;
	font-family:sans-serif;
}
.register-box{
	width:400px; 
	height:500px;
	background:rgba(0,0,0,0.5);
	color:#fff;
	top:50%;
	left:50%;
	position:absolute;
	transform:translate(-50%,-50%);
	box-sizing:border-box;
	padding:80px 40px;
}
h2{
	margin:0;
	padding:0 0 20px;
	color:#1E90FF;
	text-align:center;
}
.register-box p{
	padding:0;
	margin:0;
	font-weight:bold;
	color:#fff;
}
.register-box input,select{
	width:100%;
	margin-bottom:20px;
}
.register-box input[type="text"], .register-box input[type="password"]{
	border:none;
	border-bottom:1px solid #fff;
	background:transparent;
	outline:none;
	height:40px;
	color:#fff;
	font-size:16px;
}
.register-box select{
	height:40px;
	font-size:16px;
	outline:none;
	background:transparent;
}
.register-box input[type="submit"]{
	 border:none;
	 outline:none;
	 height:40px;
	 color:#fff;
	 font-size:16px;
     cursor:pointer;
	 background:rgb(255,38,126);
	 border-radius:20px;
}
.register-box input[type="submit"]:hover{
	color:#262626;
	}
.register-box a{
	text-decoration:none;
	font-size:16px;
	color:#fff;
}
.register-box a:hover{
	color:#262626;
}


</style>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet"type="text/css"href="register.css">

</head>
<body>
 <div class="register-box">
            <h2>Register as a new user</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            
			 <label>Username</label><br>
			 <input type="text" name="username"class="form-control">
			 <br>
			 <label>Password</label><br>
			 <input type="password" name="password"class="form-control">
			 <br><br>
			 <label>Usertype</label><br>
			 <select name="usertype"class="form-control"><br>
			 <?php
			    $sql="SELECT Usertype FROM usertype";
				$row=viewData($sql);
				$rowLength=count($row);
	            for($i=0;$i<$rowLength;$i++){
					echo"<br>";
					echo"<option value='".$row[$i]["Usertype"]."'>".$row[$i]["Usertype"]."</option>";
				}
			 
			 ?>
			 </select>
			<br><br>
                <input type="submit" class="btn btn-primary" name="register" value="Register"><br><br>
				<a href="#">Forgot Password</a><a style="float:right"href="login.php">already registered? Log in</a> 
			 
			 </form>
			 </div>
			 
			<?php
			    $conn=Connection();
				if(isset($_POST["register"])){
				 
				 //VALIDATE USERNAME
				  if(empty(trim($_POST["username"]))){
                    echo '<script>alert("Please enter username.")</script>';
                    echo '<script>window.location="register.php"</script>';
                  } else{
					  
					  $sql = "SELECT User_ID FROM users WHERE Username = ?";
                       if($stmt = mysqli_prepare($conn, $sql)){
						  mysqli_stmt_bind_param($stmt, "s", $param_username); 
                          
						  $param_username = trim($_POST["username"]);
					       if(mysqli_stmt_execute($stmt)){
            
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    //$username_err = "This username is already taken.";
					echo'<script type="text/javascript">alert("This username is already taken.");
					      window.location="register.php";</script>';
                } else{
                    $username = trim($_POST["username"]);
                }
                 } else{
                   echo "Oops! Something went wrong. Please try again later.";
                 }
               }
         
                   // Close statement
                 mysqli_stmt_close($stmt);
               }
			   
               //VALIDATE PASSWORD
			    if(empty(trim($_POST["password"]))){
                 $password_err = "Please enter a password.";     
                 } elseif(strlen(trim($_POST["password"])) < 6){
                 echo '<script>alert("Password must have atleast 6 characters!")</script>';
                echo '<script>window.location="register.php"</script>';
                  } else{
                  $password = trim($_POST["password"]);
                 }
				 
				 $usertype = $_POST["usertype"];
                  if($usertype == "Admin"){
                 $usertypeid = 1;
                  }elseif($usertype == "Client"){
                  $usertypeid = 2;
                  }else{
		           $usertypeid = 3;
	             }
    
				 
			   
				 if(empty($username_err) && empty($password_err)){
					 
				 $sql = "INSERT INTO users (username, password,user_type) VALUES (?, ?, ?)";	 
				  //insertData($sql);
				  
				 
				 if($stmt = mysqli_prepare($conn, $sql)){
					 mysqli_stmt_bind_param($stmt, "sss",$param_username, $param_password,$param_usertypeid); 
					 
					 $param_username = $username;
					 $param_password = password_hash($password, PASSWORD_DEFAULT);
					 //Creates Password hash
					 $param_usertypeid = $usertypeid;
					 
					  if(mysqli_stmt_execute($stmt)){
		
		               echo '<script>alert("You have Registered successfully...Proceed to log in.")</script>';
                      echo '<script>window.location="login.php"</script>';
				       //header("location:login.php");
                        } else{
                        echo "Something went wrong. Please try again later.";
                        }
                     }
					  mysqli_stmt_close($stmt);
                     }
					    mysqli_close($conn);
				}
                    
			
			?>
</body>
</html>