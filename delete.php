<?php

session_start();
require_once 'configcomments.php';
$name=$_SESSION['username'];
$id = $_GET["id"];

if (isset($_SESSION['username'])){
	
	$delete = mysqli_query($link, "DELETE FROM `comment` WHERE `comment`.`id` = $id");

}	

header('Location: pancakes.php');

?>