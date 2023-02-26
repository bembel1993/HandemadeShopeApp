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
  <title>Handmade shope</title>

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

  <!-- Page Content -->
  <div class="page-heading products-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>new arrivals</h4>
            <h2>handmade products</h2>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>All Products</h2>
          </div>
        </div>
        <?php
        $sql = "SELECT id, name, price, descrip, photo 
                    FROM products";
        $result = $conn->query($sql); ?>
        <?php if (!empty($result) && $result->num_rows > 0) {
          $count = 0;
          foreach ($result as $row) {
            $count++;
        ?>
            <div class="col-md-4">
              <form method="post" action="">
                <div class="product-item">
                  <?php $row['id']; ?>
                  <a href="#"><img src=<?php echo $row['photo']; ?> alt=""></a>
                  <div class="down-content">
                    <a href="#">
                      <h4><?php echo $row['name']; ?></h4>
                    </a>
                    <h6>$<?php echo $row['price']; ?></h6>
                    <p><?php echo $row['descrip']; ?></p>
                    <ul class="stars">
                      <li><i class=""></i></li>
                      <li><i class="glyphicon glyphicon-thumbs-up" style="color: green;"></i></li>
                      <li><i class=""></i></li>
                      <li><i class=""></i></li>
                      <li><i class=""></i></li>
                      <li><i class=""></i></li>
                      <li><i class="glyphicon glyphicon-thumbs-down"></i></li>
                      <li><i class=""></i></li>
                    </ul>
                    <span>
                      <form id="tocart">
                        <a href="addtocart.php?id=<?php echo $row['id']; ?>">
                          <button type="button" name="addToCart" class="btn btn-primary">
                            Add to cart
                          </button>
                        </a>
                      </form>
                    </span>
                  </div>
                </div>
                <form>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </div>


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