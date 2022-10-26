<?php
session_start();
if ($_SESSION && $_SESSION['user']) {
    $user = $_SESSION['user'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css//myProfile.css">
</head>

<body>
    <div class="background">
        <img src="https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1767&q=80" alt="">
        <div class="userProfile">
            <h1>User Profile:</h1>
            <p>User name:<?php echo $user['name'] ?></p>
            <p> Email:<?php echo $user['email'] ?></p>
            <p>Address:<?php echo $user['address'] ?></p>
        </div>
    </div>

</body>

</html>