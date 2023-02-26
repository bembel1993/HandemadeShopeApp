<?php

class User
{
    private $nameSurname;
    private $passworduser;
    private $email;
    private $number;

    private $id;
    //error message
    public $successMessage;
    public $errorMessage;
    public $errorLogin;
    public $error;

    public $data = 0;

    //VALIDATION METHOD
    public function validationField($nameSurname, $passworduser, $email, $number)
    {
        $this->nameSurname = $nameSurname;
        $this->passworduser = $passworduser;
        $this->email = $email;
        $this->number = $number;

        if (empty($this->nameSurname)) {
            echo '<p style="color: red">Field Name Surname is empty</p>';
        } elseif (empty($this->passworduser)) {
            echo '<p style="color: red">Field Password is empty</p>';
        } elseif (empty($this->email)) {
            echo '<p style="color: red">Field Email Password is empty</p>';
        } elseif (empty($this->number)) {
            echo '<p style="color: red">Field Number is empty</p>';
        } elseif (!preg_match("#[a-z]+#", $this->nameSurname)) {
            echo '<p style="color: red">Name and Surname should be have letters</p>';
        } else {
            $this->insertUser($this->nameSurname, $this->passworduser, $this->email, $this->number);
        }
    }
    //INSERT METHOD
    public function insertUser($nameSurname, $passworduser, $email, $number)
    {

        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "handmade";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "INSERT INTO user (namesurname, password, email, number)
        VALUES ('$nameSurname', '$passworduser', '$email', '$number')";

        if (mysqli_query($conn, $sql)) {
            echo '<p style="color: green">Successfully registered.</p>';
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

    //LOGIN METHOD
    public function validationFieldLogin($email, $passworduser)
    {
        $this->passworduser = $passworduser;
        $this->email = $email;

        if (empty($this->email)) {
            echo '<p style="color: red">Field Login is empty</p>';
        } elseif (empty($this->passworduser)) {
            echo '<p style="color: red">Field Password is empty</p>';
        } else {
            $this->login($this->email, $this->passworduser);
        }
    }

    private function login($email, $passworduser)
    {
        session_start();

        $servername = "localhost";
        $username = "sqluser";
        $password = "password";
        $dbname = "handmade";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT id, namesurname, password, email, number 
                FROM user";

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            if (!empty($row)) {
                if ($row['email'] == $email && $row['password'] == $passworduser) {
                    session_start();
                    $_SESSION['name'] = $row['namesurname'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['number'] = $row['number'];
                    //     echo $_SESSION['name'];
                    header("location: indexMain.php");
                    exit();
                } else {
                    echo '<p style="color: red">Field Email or Password not correct</p>';
                }
            } else {
                echo '<p style="color: red">DB empty</p>';
            }
        }
    }
}
