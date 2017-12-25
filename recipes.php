<?php
session_start();
$name=$_SESSION['username'];
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="styles.css"> 
</head>

<body>

<ul class="menu">
  <li>
<?php

if (isset($_SESSION['username'])){
  echo '<li><a href="logout.php">Log out</a></li>';
  }
  else{
  echo '<li><a href="login.php">Log in</a></li>';
}
?>
  
</li>
  <li><a class="active" href="recipes.php">Recipes</a></li>
  <li><a href="calendar.php">Calendar</a></li>
</ul> 	

<h1><a href="index.php">Tasty Recipes</a></h1>

<h2>All recipes</h2>

<h3><a href="pancakes.php">American Pancakes</a></h3>
<h3><a href="veggieballs.php">Vegan Meatballs</a></h3>

</body>
</html>