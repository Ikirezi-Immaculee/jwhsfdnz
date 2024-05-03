<?php
include 'db.php';
session_start();
if (!empty($_SESSION["firstname"])) {
    header("location:dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="log">
        <h1>login</h1>
        <form action=" " method="post">
            <input type="text" name="username" id=""placeholder="username">
            <input type="password" name="password" id=""placeholder="password">
            <input type="submit" name="login" value="login">
            <input type="reset" name="" value="reset">
        </form>
        <?php
        if(isset($_POST['login'])){
            $username=trim($_POST['username']);
            $password=trim($_POST['password']);
            $select="SELECT * FROM `user` WHERE 
            `username`= '$username' AND `password`='$password' ";
            $sql=$connect->query($select);
            if ($sql->num_rows>0) {
                $rows=$sql->fetch_assoc();
                $_SESSION["firstname"]=$rows["fname"];
                $_SESSION["lastname"]=$rows["lname"];
            header("location:dashboard.php");
            }
            else {
                echo  "login fail";
            }
        }
        ?>
        <a href="signupform.php">create new account</a>
    </div>
</body>
</html>