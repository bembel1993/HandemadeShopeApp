<?php
session_start();

$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "handmade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Handmade Shope</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/mycart.css">
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php
    include('header.php');
    ?>
    <!-- MY ORDERS -->
    <br><br> <br><br>
    <section class="shopping-cart dark">
        <div class="container">
            <div class="block-heading">
                <h2>My Orders</h2>
            </div>
            <?php
            $emailuser = $_SESSION['email'];
            $sql = "SELECT * 
                    FROM orders
                    WHERE emailuser = '$emailuser'";
            $result = $conn->query($sql); ?>
            <table id="tbl" class="table table-hover table-dark">
                <thead class="thead-dark">
                    <tr>

                        <th>Phone</th>
                        <th>Email</th>
                        <th>Photo Product</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                    <tr>

                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php

                        $emailuser = $_SESSION['email'];
                        $sql2 = "SELECT sum(totalprice) as sumprice 
                                 FROM orders
                                 WHERE emailuser = '$emailuser'";
                        $result2 = $conn->query($sql2);
                        if (!empty($result2) && $result2->num_rows > 0) {
                            foreach ($result2 as $row) {
                        ?>
                                <th><span class="price"><?php echo $row['sumprice']; ?></span></th>
                        <?php
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>

                    <?php if (!empty($result) && $result->num_rows > 0) {
                        $count = 0;
                        foreach ($result as $row) {
                            $count++;
                    ?>
                            <tr>

                                <td><?php echo $row['phoneuser']; ?></td>
                                <td><?php echo $row['emailuser']; ?></td>
                                <td><img src=<?php echo $row['photo']; ?> alt="" width="200" height="auto"></td>
                                <td><?php echo $row['nameprod']; ?></td>
                                <td><?php echo $row['qty']; ?></td>
                                <td><?php echo $row['totalprice']; ?></td>
                                <td>
                                    <a href="updateUser.php?id=
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-pencil">
                                    </a>
                                    &nbsp;&nbsp;

                                    <a href="create.php?action_type=delete&id=
                                <?php echo $row['id']; ?>" class="glyphicon glyphicon-remove">
                                    </a>
                                    <!--     &nbsp;&nbsp;
                            <a href="add.html" class="glyphicon glyphicon-plus">
                            </a>-->
                                </td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8">No Order(s) ...</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
    </main>
    <!---->
    <h2>
        <?php
        if (isset($_SESSION['name'])) {
            echo $_SESSION['name'];
            echo $_SESSION['id'];
        } ?>
        <h2>
            <br><br><br><br><br><br><br><br><br><br>


            <?php
            include('footer.php');
            ?>

            <!-- Bootstrap core JavaScript -->
            <script src="vendor/jquery/jquery.min.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


            <!-- Additional Scripts -->
            <script src="assets/js/custom.js"></script>
            <script src="assets/js/owl.js"></script>
            <script src="assets/js/slick.js"></script>
            <script src="assets/js/isotope.js"></script>
            <script src="assets/js/accordions.js"></script>


            <script language="text/Javascript">
                cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
                function clearField(t) { //declaring the array outside of the
                    if (!cleared[t.id]) { // function makes it static and global
                        cleared[t.id] = 1; // you could use true and false, but that's more typing
                        t.value = ''; // with more chance of typos
                        t.style.color = '#fff';
                    }
                }
            </script>
</body>

</html>