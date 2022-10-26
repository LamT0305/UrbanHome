<?php
include('./dbconnect/database.php');
$cart_item = get_cart_item($db);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./css/cart_item.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
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
                            <img src="https://img.icons8.com/ios/32/000000/apple-phone.png" width="32px" height="32px" />
                            <p class="des-about">
                                Hotline: <br />
                                1900.636.699
                            </p>
                        </li>
                        <li class="nav-item user">
                            <img src="https://img.icons8.com/fluency-systems-regular/32/000000/user.png" width="32px" height="32px" />
                            <?php
                            session_start();
                            if ($_SESSION && $_SESSION['user']) {
                                $user = $_SESSION['user']
                            ?>
                                <p style="margin: 0;"><a style="color: black;" href="./myProfile.php"><?php echo $user['name'] ?></>
                                </p>
                                <div class="logout">
                                    <button id="btn-log-out"><a href="logout.php">Logout</a></button>
                                </div>
                            <?php
                            } else {
                            ?>
                                <a class="des-about" href="./login.php" style="color:black;">Đăng Nhập/ Đăng Ký</a>
                            <?php
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <img src="https://img.icons8.com/ios/32/000000/shopping-cart.png" width="32px" height="32px" />
                            <a style="text-decoration: none; color:black;" href="./cart.php">Giỏ hàng</a>
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
    <h4 style="margin-left:30px;"><?php
                                    if (count($cart_item) == 0) {
                                        echo "Giỏ hàng: bạn chưa thêm đồ vào giỏ hàng!";
                                    } else {
                                        echo "Giỏ hàng: ";
                                    }
                                    ?></h4>
    <section class="show_item">
        <div class="row list-item">
            <form action="" method="POST">
                <?php
                for ($i = 0; $i < count($cart_item); $i++) {
                    $array[$i] = explode(",", $cart_item[$i]['image_1'])
                ?>
                    <div class="col item">
                        <div class="img-product">
                            <img src="<?php echo $array[$i][0] ?>" class="img-fluid" alt="Responsive image">
                        </div>
                        <div class="details">
                            <h5><?php echo $cart_item[$i]['name'] ?></h5>
                            <p>Price: <span id="price"><?php echo $cart_item[$i]['price'] ?></span></p>
                            <input type="number" name="quantity" id="quantity" value="<?php echo $cart_item[$i]['quantity'] ?>" onchange="onPress()">
                            <p>Tổng thanh toán: <span id="total"></span>đ</p>
                            <p>Mã Sản Phẩm: <span id="productId"><?php echo $cart_item[$i]['id'] ?></span></p>
                            <button type="submit" class="btn btn-secondary">Mua Ngay</button>
                        </div>
                        
                    </div>
                <?php
                }
                ?>
                <p>Total: <span id="totalMoney"></span>đ</p>
            </form>


        </div>
    </section>

    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script>;
    <script src="./js/cart.js"></script>

    <script src="./app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
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