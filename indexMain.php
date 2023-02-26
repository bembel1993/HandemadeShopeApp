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
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01">
        <div class="text-content">
          <h4>Best Offer</h4>
          <h2>Author's, real handmade</h2>
        </div>

      </div>
      <div class="banner-item-02">
        <div class="text-content">
          <h4>Brilliant Work</h4>
          <h2>Get your best and quality products</h2>
        </div>
      </div>
      <div class="banner-item-03">
        <div class="text-content">
          <h4>Don't deny yourself</h4>
          <h2>Get the item you want</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->
  <h2>
    <?php
    if (isset($_SESSION['name'])) {
      echo $_SESSION['name'];
    } ?>
    <h2>
      <div class="latest-products">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Latest Products</h2>
                <a href="products.php">view all products <i class="fa fa-angle-right"></i></a>
              </div>
            </div>
            <?php
            $sql = "SELECT id, name, price, descrip, photo 
                    FROM products
                    ORDER BY id DESC LIMIT 3";
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
                          <form id = "tocart">
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

      <div class="best-features">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>About Handemade Shope</h2>
              </div>
            </div>
            <div class="col-md-6">
              <div class="left-content">
                <h4>Looking for the best products?</h4>
                <p>This is a unique product created from a highly environmentally friendly material,
                  without the addition of harmful impurities and exclusively by hand. <a rel="nofollow" href="https://templatemo.com/contact">Contact us</a> for more info.</p>
                <ul class="featured-list">
                  <li><a href="#">Genuine Leather</a></li>
                  <li><a href="#">Quality fittings</a></li>
                  <li><a href="#">Unique Design</a></li>
                  <li><a href="#">No intrusive logos</a></li>
                  <li><a href="#">Taking into account the individuality of each</a></li>
                </ul>
                <a href="about.html" class="filled-button">Read More</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="right-image">
                <img src="assets/images/feature-image.jpg" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="call-to-action">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="inner-content">
                <div class="row">
                  <div class="col-md-8">
                    <h4>Creative &amp; Unique <em>Handmade</em> Shope</h4>
                    <p>
                    </p>
                  </div>
                  <div class="col-md-4">
                    <a href="#" class="filled-button">Purchase Now</a>
                  </div>
                </div>
              </div>
            </div>
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