<?php
// Initialize the session
if(isset($_POST["login"])){
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    //header("location:quantityImage.php");
    exit;
}
 
require_once "functions.php";
$conn =Connection();
 
    if(empty(trim($_POST["username"]))){

		 echo '<script>alert("Please enter username.")</script>';
         echo '<script>window.location="login.php"</script>';
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
   
		 echo '<script>alert("Please enter your password")</script>';
         echo '<script>window.location="login.php"</script>';
		
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){

        $sql = "SELECT * FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $usertypeid);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                          
                            
                             if($usertypeid == 1){
                                header("location: quantityImageDB.html");
                            }elseif($usertypeid == 2){
                                header("location: CartN.php");
                            }
							elseif($usertypeid == 3){
								header("location: quantityTable.php");
							}
                        }
                           else{
							echo '<script>alert("Invalid password! Please try again")</script>';
                            echo '<script>window.location="login.php"</script>';
							
                        }
                    }
                } else{
					 echo '<script>alert("No account found with that username.")</script>';
                     echo '<script>window.location="login.php"</script>';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        mysqli_stmt_close($stmt);
    }
    
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
<style>
body
{
    margin:0;
	padding:0;
	background:url(login-background.jpg);
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
</style>
    <meta charset="UTF-8">
    <title>Login</title>
    
</head>
<body>
    <div class="register-box">
        <h2>Log in Your Account </h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            <br><br>
                <input type="submit" class="btn btn-primary"name="login" value="Login">
        </form>
		<a href="register.php">Don't have an account? sign up</a> 
    </div>    
</body>
</html>