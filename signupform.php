<?php
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="log">
        <h1>signup</h1>
        <form action="" method="post">
            <input type="text" name="fname" placeholder="firstname"required>
            <input type="text" name="lname" placeholder="lastname"required >
            <input type="text" name="username" id=""placeholder="username"required >
            <input type="password" name="password" id=""placeholder="password" required >
            <input type="submit" name="signup" value="signup">
            <input type="reset" name="" value="reset">
        </form>
        <?php
        if(isset($_POST['signup'])){
            $username=trim($_POST['username']);
            $password=trim($_POST['password']);
            $username=trim($_POST['username']);
            $lname=trim($_POST['lname']);
            $fname=trim($_POST['fname']);
            $insert="INSERT INTO `user`(`user_id`, `fname`, `lname`, `password`, `username`) 
            VALUES ('','$fname','$lname','$password','$username') ";
            $sql=$connect->query($insert);
            if ($sql) {
               header('location:index.php');
            }
            else {
                echo  "creation failure";
            }
        } ?>
        <a href="index.php">login</a>
    </div>
</body>
</html>