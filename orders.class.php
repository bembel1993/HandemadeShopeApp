<?php

class Order
{
    private $nameprod;
    private $nameuser;
    private $phoneuser;
    private $emailuser;
    private $photo;
    private $totalprice;
    private $qty;

    private $id;
    //error message
    public $successMessage;
    public $errorMessage;
    public $errorLogin;
    public $error;

    public $data = 0;

    //INSERT METHOD
    public function insertOrders($nameprod, $nameuser, $phoneuser, $emailuser, $photo, $totalprice, $qty)
    {

        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "handmade";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "INSERT INTO orders (nameprod, totalprice, photo, nameuser, emailuser, phoneuser, qty)
        VALUES ('$nameprod', '$totalprice', '$photo', '$nameuser', '$emailuser', '$phoneuser', '$qty')";

        if (mysqli_query($conn, $sql)) {
            header("location: myorders.php");
            exit();
        } else {
            echo "Error add record: " . mysqli_error($conn);
        }
        $conn->close();
    }
    //DELETE METHOD
    public function delete($id)
    {
        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "handmade";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM cart WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
            header("Location: myCart.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    //UPDATE METHOD
    public function update($id, $nameSurname, $password, $email, $number)
    {
        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "handmade";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE user 
                SET namesurname = '$nameSurname', password = '$password', email = '$email', number = '$number'
                WHERE id = '$id'";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            header("Location: index.php");
            echo $sql;
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
        $conn->close();
    }
}
