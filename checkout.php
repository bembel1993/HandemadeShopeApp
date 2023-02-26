<?php
session_start();

include('orders.class.php');

$qty = $_POST['qty'];
$nameuser1 = $_SESSION['name'];
$emailuser1 = $_SESSION['email'];
$phoneuser1 = $_SESSION['number'];

$userId = $_SESSION['id'];

$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "handmade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, 
               price, 
               descrip, 
               photo,
               cart.id 
        FROM products Left Join cart 
        ON products.id = cart.productId
        LEFT JOIN user ON user.id = cart.userId
        WHERE user.id = $userId";

$result = $conn->query($sql);

$stmt = $conn->prepare("INSERT INTO orders (nameprod, totalprice, photo, nameuser, emailuser, phoneuser, qty) 
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $price, $photo, $nameuser, $emailuser, $phoneuser, $qt);
foreach ($result as $row) {

  $name = $row['name'];
  $price = $row['price'];
  $photo = $row['photo'];
  $nameuser = $nameuser1;
  $emailuser = $emailuser1;
  $phoneuser = $phoneuser1;
  $qt = $qty;
  $stmt->execute();
}

foreach ($result as $row) {
  $sql2 = "DELETE FROM cart WHERE userId=$userId";
  if (mysqli_query($conn, $sql2)) {

    header("location: myorders.php");
    exit();
  } else {
    echo "Error";
  }
}

$conn->close();
/*
foreach ($result as $row) {
  
  echo $row['name'] . ' | ';
   echo $nameuser . ' | ';
   echo $phoneuser . ' | ';
   echo $emailuser . ' | ';
   echo $row['photo'] . ' | ';
   echo $row['price'] . ' | ';
   echo $qty . '<br><br>';
  $order = new Order();
  //$addorder = $order->insertOrders($row['name'], $nameuser, $phoneuser, $emailuser, $row['photo'], $row['price'], $qty);
}*/
