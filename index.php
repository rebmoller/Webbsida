<?php
session_start();
$name=$_SESSION['username'];
?>


<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="reset.css">
   <link rel="stylesheet" type="text/css" href="styles.css">
   <title>Tasty Recipes</title>
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
  <li><a href="recipes.php">Recipes</a></li>
  <li><a href="calendar.php">Calendar</a></li>
</ul> 	

<h1><a href="index.php">Tasty Recipes</a></h1>

<div class="slideshow">
  <img class="mySlides" src="gratang.jpg" alt="Gratang">
  <img class="mySlides" src="linssoppa.jpg" alt="Linssoppa">
  <img class="mySlides" src="sallad.jpg" alt="Sommarsallad">
  <img class="mySlides" src="chokladgrot.jpg" alt="Chokladgrot">
  <div class="center">Don't know what to cook today?
  	<br><a href="calendar.html">Click here!</a>
  </div>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>