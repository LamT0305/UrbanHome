<?php
    include('./database/database.php');
    if($_POST){
        $name = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $confirmPwd1 = $_POST['ConfirmPwd'];
        if($password !== $confirmPwd1){
            ?>
            <script>
                alert('Password does not match!')
            </script>
            <?php
        }else
        {
            $result = sign_up($db, $name, $password, $email, $address);
            if($result){
                ?>
                <script>
                    alert("Sign up successfully!");
                    window.location.href='login.php'
                </script>
                <?php
            }else{
                ?>
                <script>
                    alert('Sign up failed!')
                </script>
                <?php
            }
        }
    };
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/singup.css">
</head>

<body>
    <section class="signUpForm">
        <form action="" method="POST">
            <label for="username">User name:</label>
            <input type="text" name="username" id="username" required class="text_input">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required class="text_input">
            <label for="ConfirmPwd">Confirm Password:</label>
            <input type="password" name="ConfirmPwd" id="ConfirmPwd" required class="text_input">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required class="text_input">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" required class="text_input">
            <button type="submit" class="btn">Sign Up</button>
        </form>
    </section>

</body>

</html>