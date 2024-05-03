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
    <title>storeout</title>
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
    <h4>WELCOME TO STORE OUT</h4>
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
    
        <h1>store out</h1>
        <form action="" method="post"> 
          <label for="">product name</label>
            <select name="pid" required class="select"> 
            <?php
            $query="SELECT * FROM product NATURAL JOIN storein";
            $rs=$connect->query($query);
            while ($data=$rs->fetch_assoc()) { ?>
            <option value="<?php echo $data['pid'];?>">
            <?php echo $data['pro_name'];?>
          </option>
            <?php
            }
            ?>
            </select>
            <input type="date" name="date" placeholder="date"required >
            <input type="text" name="quantity" id=""placeholder="quantity"required >
            <input type="submit" name="add" value="Add">
            <input type="reset" name="" value="reset">
        </form>
        <?php
        
       
        if(isset($_POST['add'])){
            $pid=trim($_POST['pid']);           
            $date=trim($_POST['date']);
            $quantity=trim($_POST['quantity']);
            $insert="INSERT INTO storeout
            VALUES ('$pid','$date','$quantity')";
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
          <th>date</th>
          <th>Product name</th>
          <th>price</th>
          <th>quantity</th>
          <th>total price</th>
        </tr>
<?php
$sql="SELECT * FROM storeout NATURAL JOIN product";
$result=$connect->query($sql);
if ($result->num_rows>0) {
  while ($row=$result->fetch_assoc()) {?>
    <tr>
      <td><?php echo $row['out_date'];?></td>
      <td><?php echo $row['pro_name'];?></td>
      <td><?php echo $row['price'];?></td> 
      <td><?php echo $row['quantity'];?></td> 
      <td><?php echo $row['price']*($row['quantity']);?></td>    </tr>
  <?php
  }
}?>

      </table>
    </div>
  </div>  
</body>
</html>