<?php
    include('./database/database.php');
    var_dump($_POST['id']);
    if($_POST["method"] == 'delete'){
        delete_cart_item($db, $_POST['id']);
    }
?>