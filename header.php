<?php
$servername = "localhost";
$username = "sqluser";
$password = "password";
$dbname = "handmade";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>

<header class="">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="indexMain.php">
        <h2>Handmade <em>Shope</em></h2>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.html">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Our Products</a>
          </li>
        <!--  <li class="nav-item">
            <a class="nav-link" href="about.php">About Us</a>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
          <li class="nav-item">
            <?php
            if (!isset($_SESSION['name'])) {
            ?>
              <a href="index.php">
                <i class="glyphicon glyphicon-user">
                </i>
              </a>
            <?php
            }
            ?>
          </li>

          <li class="nav-item">
            <?php
            if (isset($_SESSION['name'])) {
            ?>
              <a href="myCart.php">
                <i class="fa fa-shopping-cart">
                  <?php

                  $userId = $_SESSION['id'];
                  $sqlFromTable = "SELECT count(productId) AS sumProd 
                                   FROM cart 
                                   WHERE userId=$userId";
                  $result1 = $conn->query($sqlFromTable);
                  if (!empty($result1) && $result1->num_rows > 0) {
                    $row = $result1->fetch_assoc();
                    $sumProd = $row['sumProd'];
                  } elseif (empty($result1)) {
                    $sumProd = 0;
                  }
                  ?>
                  <span id="showincart" class="product-count"><?php echo $sumProd ?></span>
                </i>
              </a>
            <?php
            }
            ?>
          </li>

          <li class="nav-item">
            <?php
            if (isset($_SESSION['name'])) {
            ?>
              <a href="myorders.php">
                <i class="glyphicon glyphicon-list">
                </i>
              </a>
            <?php
            }
            ?>
          </li>

          <li class="nav-item">
            <?php
            if (isset($_SESSION['name'])) {
            ?>
              <a href="logout.php">
                <i class="glyphicon glyphicon-log-out">
                </i>
              </a>
            <?php
            }
            ?>
          </li>
        </ul>

      </div>

    </div>
  </nav>
</header>
<script type="text/javascript" src="script.js"></script>