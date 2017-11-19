<?php

session_start();
require_once 'configcomments.php';

unset($_SESSION["username"]);
session_destroy();
header("Location: index.php");

?>
