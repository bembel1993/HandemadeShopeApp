<?php
session_start();
//if(isset($_POST['addToCart'])){
$productId = $_GET['id'];
$userId = $_SESSION['id'];

//echo $productId;
//echo $userId;

$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "handmade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO cart (productId, userId) VALUES ('$productId', '$userId')";
            
if (mysqli_query($conn, $sql)) {

    header("Location: products.php");
}else{
    echo 'error';
}
$conn->close();
