<?php 
require 'config/config.php';

if (isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
}
else {
  header("Location: register.php");
}

?>
<html>
<head>
	<title>Welcome to Swirlfeed</title>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
  
  <div class="top_bar">
    <div class="logo">
      <a href="index.php">Swirlfeed!</a>
    </div>
  </div>