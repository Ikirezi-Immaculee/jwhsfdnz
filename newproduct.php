<?php
session_start();
include 'db.php';

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
  <div class="main">
    <div class="left">
    
        <h1>new product</h1>
        <form action="" method="post">
            <input type="text" name="pro_name" placeholder="product name"required minlength="3">
            <input type="text" name="price" placeholder="price"required minlength="3">
            <input type="text" name="manufacturer" id=""placeholder="manufacturer"required minlength="5">
            <input type="submit" name="add" value="Add">
            <input type="reset" name="" value="reset">
        </form>
        <?php
        
       
        if(isset($_POST['save'])){
            $p_name=trim($_POST['p_name']);
            $p_email=trim($_POST['p_email']);
            $p_phone=trim($_POST['p_phone']);
            $p_phone=trim($_POST['gender']);
            $p_gender=trim($_POST['manufacturer']);
            $insert="INSERT INTO participant 
            VALUES ('','$pname','$p_email','$p_phone','$p_gender')";
            $sql=$connect->query($insert);
            if ($sql) {
            echo "saving successfuly done";
            }
            else {
                echo  "saving fill, try again";
            }
        } ?>
    
    </div>
    <div class="right">
      <table>
        <tr>
          <th>Product name</th>
          <th>Price</th>
          <th>Manufacturer</th>
        </tr>
<?php
$sql="select* from product";
$result=$connect->query($sql);
if ($result->num_rows>0) {
  while ($row=$result->fetch_assoc()) {?>
    <tr>
      <td><?php echo $row['pro_name'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['manufacturer'];?></td>    </tr>
  <?php
  }
}?>

      </table>
    </div>
  </div>  
</body>
</html>