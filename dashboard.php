<?php
session_start();

if (empty($_SESSION["firstname"])) {
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
     initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="head"><span id="user">
     <?php  
    echo $_SESSION["firstname"];
    ?></span>

    <h1>
        STORE MANAGEMENT SYSTEM
    </h1>
    <h4>WELCOME TO DASHBOARD</h4>
  </div>
  <div class="nav">
    <a href="dashboard.php">HOME</a>
    <a href="storein.php">STORE IN</a>
    <a href="storeout.php">STORE OUT</a>
    <a href="newproduct.php">NEW PRODUCT</a>
    <a href="report.php">REPORT</a>
    <a href="logout.php" id="logout">LOG OUT</a>    
  </div>
  <div class="main"></div>  
</body>
</html>