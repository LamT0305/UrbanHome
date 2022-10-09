<?php
include("./database/database.php");
$products = getAllProdudct($db, $sofa1);

if ($_GET && $_GET["keyword"]) {
  $products = searchProducts($db, $_GET["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="./css/productStyle.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
</head>

<body>
  <section id="navbar">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid navbar-header">
        <a class="navbar-brand" href="./homepage.php">Urban Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <nav class="navbar navbar-light bg-light">
                <form class="form-inline" role="search" method="GET">
                  <input class="form-control mr-sm-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
              </nav>
            </li>
            <li class="nav-item">
              <img src="https://img.icons8.com/ios/32/000000/apple-phone.png" width="32px" height="32px" />
              <p class="des-about">
                Hotline: <br />
                1900.636.699
              </p>
            </li>
            <li class="nav-item">
              <img src="https://img.icons8.com/fluency-systems-regular/32/000000/user.png" width="32px" height="32px" />
              <p class="des-about" role="button">Đăng Nhập/ Đăng Ký</p>
            </li>
            <li class="nav-item">
              <img src="https://img.icons8.com/ios/32/000000/shopping-cart.png" width="32px" height="32px" />
              <p class="des-about" role="button">Giỏ hàng</p>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <section id="subnav">
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav subnav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="./homepage.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./products.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </section>
  <section id="banner">
    <div class="banner-details">

    </div>
  </section>
  <section id="filters">
    <p style="margin: 0;" role="button">Bộ Lọc</p>
    <h3>Tất Cả Sản Phẩm</h3>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Sắp xếp theo:
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
  </section>
  <section id="products">
    <div class="container">
      <div class="row">
        <?php
        for ($i = 0; $i < count($products); $i++) {
        ?>

          <div class="col">
            <div class="card" style="width: 18rem;">
              <img src="<?php echo $products[$i]['images'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="title"><?php echo $products[$i]['name'] ?></h5>
                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                <p class="price"><?php echo $products[$i]['price'] ?>đ</p>
                <a href="./products-detail.php?id=<?php echo $products[$i]['id']?>" class="btn btn-primary">View Product</a>
              </div>
            </div>
          </div>

        <?php
        }
        ?>
      </div>
    </div>



  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <!-- Footer -->
  <section class="footer">
    <hr>
    <footer class="text-center text-lg-start bg-white text-muted">
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                <i class="fas fa-gem me-3 text-secondary"></i>Company name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Products</h6>
              <p>
                <a href="#!" class="text-reset">Angular</a>
              </p>
              <p>
                <a href="#!" class="text-reset">React</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Vue</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Laravel</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
              <p>
                <a href="#!" class="text-reset">Pricing</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Settings</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Orders</a>
              </p>
              <p>
                <a href="#!" class="text-reset">Help</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
              <p>
                <i class="fas fa-home me-3 text-secondary"></i> New York, NY
                10012, US
              </p>
              <p>
                <i class="fas fa-envelope me-3 text-secondary"></i>
                info@example.com
              </p>
              <p>
                <i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88
              </p>
              <p>
                <i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89
              </p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025)">
        © 2021 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

  </section>
</body>

</html>