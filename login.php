<?php
include('./dbconnect/database.php');
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = LogIn($db, $email, $password);
    if ($user) {
        session_start();
        $_SESSION['user'] = $user;
?>
        <script>
            alert("Login Successfully");
            window.location.href = 'homepage.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Login failed! Check your email or password")
        </script>
<?php
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
</head>

<body>
    <section class="loginForm">
        <form action="" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <label for="password">Mật Khẩu</label>
            <input type="password" name="password" id="password">
            <button class="btn" type="submit">Đăng Nhập</button>
        </form>
        <p><a href="./signup.php">Bạn không có tài khoản? Đăng ký ngay</a></p>
    </section>
</body>

</html>