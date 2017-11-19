<?php

session_start();
require_once 'configcomments.php';

$name=$_SESSION['username'];
$comment=$_POST['comment'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if($comment != ""){
		$insert=mysqli_query($link, "INSERT INTO comment (name,comment, recipe) VALUES ('$name', '$comment', 'pancakes')");
	}else{
		echo "Please fill out all the fields";
	}
}

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
  <li><a href="calendar.php">Calendar</a></li>
</ul> 	

<h1><a href="index.php">Tasty Recipes</a></h1>

<img class="pannkakor" src="pannkakor.jpg">

<h2>American Pancakes</h2>

<h3>Ingredients</h3>
<p>1 cup milk
<br>1 large egg
<br>2 tbsp melted butter or vegetable oil
<br>1 cup all-purpose flour
<br>2 tsp baking powder
<br>2 tbsp sugar
<br>1 pinch of salt
<br>Assorting toppings such as maple syrup, fresh berries, etc.
</p>
<br>
<h3>Instructions</h3>
<p>1. Preheat the oven to 90C, with a heatproof platter ready to keep cooked pancakes warm in the oven.
<br>2. In a small bowl, whisk together flour, sugar, baking powder, and salt. Set aside.
<br>3. In a medium bowl, whisk together milk, butter (or vegetable oil), and egg.
<br>4. Pour the dry ingredients to the milk mixture, and stir (do not overmix).
<br>5. Heat a large skillet or griddle over medium heat, and coat generously with vegetable oil.
<br>6. For each pancake, spoon 2 or 3 tablespoons of batter onto skillet. Cook until the surface of pancakes have some bubbles, about 1 minute. Flip carefully with a thin spatula, and cook until brown on the underside, 1 to 2 minutes more.
<br>7. Transfer to the heatproof platter, cover with foil and keep warm in the oven until serving. Serve warm, with desired topping such as maple syrup, fresh berries or banana slices.
</p>
<br>
<br>
<h4>Comments</h4>
<hr>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

			<table>					
				<?php
				if (isset($_SESSION['username'])){

					echo '<h6>Write a comment</h6><textarea name="comment"></textarea> </td></tr></br><input type="Submit" class="btn btn-primary" value="Submit"> ' . '<br/>';
				}else{
  					echo "<b>Login to comment</b>"; 
				}

					$query = "SELECT * FROM comment WHERE recipe = 'pancakes' ORDER by ID DESC";
					$result = mysqli_query($link, $query); 
    
    				while ($row = mysqli_fetch_assoc($result)) {
    					$id = $row["id"];
    					$name = "<h4> ". $row["name"] ." </h4>";
    					$comment = "<h6> " . $row["comment"] . " </h6>";
    					$dellink = "<h6><a href='delete.php?id=" . $id . "'>Delete<a/></h6>";
    					//echo "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>";

    					echo '<br/>' . '<p/>' .$name . '<p/>' . $comment . '<p/>' . $dellink . '</p>' ;;
    				}
				?>

			</table>
		</form>
</body>
</html>