
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
  echo '<li><a href="logout.php">Logout</a></li>';
  }
  else{
  echo '<li><a href="login.php">Login</a></li>';
}
?>
  
</li>
  <li><a href="recipes.php">Recipes</a></li>
  <li><a class="active" href="calendar.php">Calendar</a></li>
</ul>   

<h1><a href="index.php">Tasty Recipes</a></h1>

<div class="month">      
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>
      November<br>
      <span style="font-size:18px">2017</span>
    </li>
  </ul>
</div>

<ul class="weekdays">
  <li>Monday</li>
  <li>Tuesday</li>
  <li>Wednesday</li>
  <li>Thursday</li>
  <li>Friday</li>
  <li>Saturday</li>
  <li>Sunday</li>
</ul>

<ul class="days">  
  <li></li>
  <li></li>
  <li>1</li>
  <li>2</li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li><span class="active">8</span></li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li><a href="pancakes.php"><img class="pannkakor" src="pannkakor.jpg" alt="American Pancakes"></a></li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li><a href="veggieballs.php"><img class="vegobullar" src="vegobullar.jpeg" alt="Vegan Meatballs"></a></li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
</ul>

<body>
</html>