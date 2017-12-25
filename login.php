<?php
session_start();
// Include config file
require_once 'config.php';
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Please enter username.';
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Please enter your password.';
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT username, password FROM users WHERE username = ? AND password = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
          
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
        
            $param_username = $username;
            $param_password = $password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
              
                if(mysqli_stmt_num_rows($stmt) == 1){ 
                  session_start();
                  $_SESSION['username'] = $username;      
                  header("location: index.php");              
                } else{
                    
                    $username_err = 'No account found with that username.';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="reset.css">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <title>Tasty Recipes</title>
</head>
 
<body>

<ul class="menu">
  <li><?php

if (isset($_SESSION['usernamn'])){
  echo '<li><a class="active" href="logout.php">Logout</a></li>';
  }
  else{
  echo '<li><a class="active" href="login.php">Login</a></li>';
}
?></li>
  <li><a href="recipes.php">Recipes</a></li>
  <li><a href="calendar.php">Calendar</a></li>
</ul>      

<title>Tasty Recipes</title>
<h1><a href="index.php">Tasty Recipes</a></h1>
    <meta charset="UTF-8">
    <h2>Login</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
      <label><b>Username:</b><sup>*</sup></label>
      <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
      <span><?php echo $username_err; ?></span>
    </div>    
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
      <label><b>Password:</b><sup>*</sup></label>
      <input type="password" name="password" class="form-control">
      <span ><?php echo $password_err; ?></span>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Submit">
    </div>
    <br>
    <h4>Don't have an account?</h4>
    <li><h6><a href="register.php" class="form-control">Register here</a></h6></li>
    
  </form>

</body>
</html>
