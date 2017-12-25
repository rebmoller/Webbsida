<?php

session_start();
require_once 'configcomments.php';

$name=$_SESSION['username'];
$comment=$_POST['comment'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
	if($comment != ""){
		$insert=mysqli_query($link, "INSERT INTO comment (name,comment, recipe) VALUES ('$name', '$comment', 'veggieballs')");
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

<img class="vegobullar" src="vegobullar.jpeg" alt="Vegan Meatballs">


<h2>Vegan meatballs</h2>
<h3>Ingredients</h3>
<p>  2 cups lentils
 <br>   1/4 cup plus 2 tablespoons olive oil
 <br>   1 large onion
 <br>   2 carrots
 <br>   2 celery stalks
 <br>   1 garlic clove
 <br>   1 tablespoon chopped fresh thyme
 <br>   2 teaspoons salt
 <br>   3 tablespoons tomato paste
 <br>   8 ounces button mushrooms, wiped clean and sliced
 <br>   3 large eggs
 <br>   1/2 cup grated rennet-free parmesan cheese
 <br>   1/2 cup bread crumbs
 <br>   1/2cup chopped fresh parsley
 <br>   1/4 cup finely chopped walnuts
</p>
<br>
<h3>Instructions</h3>
<p>1. Combine the lentils and 2 quarts water in a medium stockpot and bring to a boil over high heat. Reduce the heat to low and simmer until the lentils are soft but not falling apart, about 25 minutes. Drain the lentils and allow to cool.

<br>2. Add 1/4 cup of the olive oil to a large frying pan and saute the onions, carrots, celery, garlic, thyme and salt over medium- high heat, stirring frequently, for about 10 minutes, until the vegetables are tender and just beginning to brown. Add the tomato paste and continue to cook, stirring constantly, for 3 minutes. Add the mushrooms and cook, stirring frequently, for 15 more minutes, or until all the liquid is absorbed. Transfer the mixture to a large bowl and allow to cool to room temperature.

<br>3. Add the eggs, Parmesan, bread crumbs, parsley and walnuts to the cooled vegetables and mix by hand until thoroughly incorporated. Place in the refrigerator for 25 minutes.

<br>4. Preheat oven to 400 degrees. Drizzle the remaining 2 tablespoons olive oil into a 9- x 13-inch baking dish and use your hand to evenly coat the entire surface. Set aside.

<br>5. Roll the mixture into round, golf ball size meatballs (about 1 1/2 inches), making sure to pack the vegetable mixture firmly. Place the balls in the prepared baking dish, allowing 1/4-inch of space between the balls and in even rows vertically and horizontally to form a grid.

<br>6. Roast for 30 minutes, or until the meatballs are firm and cooked through. Allow the meatballs to cool for 5 minutes in the baking dish before serving.

</p>
<br>
<br>
<h4>Comments</h4>
<hr>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

			<table>					
				<?php
				if (isset($_SESSION['username'])){

					echo '<h6>Write a comment</h6><textarea name="comment"></textarea> </td></tr><br/><input type="Submit" class="btn btn-primary" value="Submit"> ' . '<br/>';
				}else{
  					echo "<b>Login to comment</b>"; 
				}

					$query = "SELECT * FROM comment WHERE recipe = 'veggieballs' ORDER by ID DESC";
					$result = mysqli_query($link, $query); 
    
    				while ($row = mysqli_fetch_assoc($result)) {
    					$id = $row["id"];
     					$name = "<h4> ". $row["name"] ." </h4>";
    					$comment = "<h6> " . $row["comment"] . " </h6>";
    					$dellink = "<h6><a href='delete2.php?id=" . $id . "'>Delete<a/></h6>";

    					echo '<br/>' . '<p/>' .$name . '<p/>' . $comment . '<p/>' . $dellink . '</p>' ;

    				}
				?>

			</table>
		</form>

</body>
</html>