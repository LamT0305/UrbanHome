<?php
$db_name = "urbanhome";
$username = "root";
$password = "mysql";
//create connection
$db = null;
$sofa1 = "sofa1";
$sofa_corner = 'sofa_corner';
$lamp = 'lamp';
try {
    $db = new PDO('mysql:host=localhost; dbname=' . $db_name . ';charset=utf8', $username, $password);
} catch (PDOException $e) {
    print "Error!" . $e->getMessage() . "<n/>";
    die();
}
function getAllProdudct($db)
{
    $query = $db->query("SELECT * FROM products");
    $products_sofa = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products_sofa;
}

function searchProducts($db, $keyword)
{
    $query = $db->query("SELECT * FROM products WHERE name LIKE '%$keyword%'");
    $products = $query->fetchAll(PDO::FETCH_ASSOC);

    return $products;
}
function getElementByID($db, $id)
{
    $query = $db->query("SELECT * FROM `product_details` WHERE id = $id");
    $products = $query->fetch(PDO::FETCH_ASSOC);
    return $products;
}
function getElementImagesByID($db, $id)
{
    $query = $db->query("SELECT image_1 FROM `product_details` WHERE id = $id");
    $products_img = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products_img;
}
function addToCart($db, $product_id, $quantity)
{
    $query = $db->prepare("INSERT INTO `cart_item` (`product_id`, `quantity`, `cart_id`) VALUES (:product_id, :quantity, :cart_id)");
    $result = $query->execute([
        "product_id" => $product_id,
        "quantity" => $quantity,
        "cart_id" => 1,
    ]);
    return $result;
}
function get_cart_item($db)
{
    $query = $db->query("SELECT * FROM `cart_item` WHERE cart_id=1");
    $cart_item = $query->fetchAll(PDO::FETCH_ASSOC);
    $products = [];
    foreach ($cart_item as $item) {
        $product_id = $item['product_id'];
        $product = getElementByID($db, $product_id);
        $product['quantity'] = $item['quantity'];
        array_push($products, $product);
    }
    return $products;
}
function delete_cart_item($db, $id)
{
    $query = $db->query("DELETE FROM `cart_item` WHERE `product_id` = $id");
    $result = $query->execute();
    return $result;
}
function update_cart_item($db, $cart_item_id, $new_quantity)
{
    $query = $db->prepare("UPDATE `cart_item` SET `quantity` = :quantity WHERE `product_id` = :id");

    $result = $query->execute([
        'quantity' => $new_quantity,
        'id' => $cart_item_id,
    ]);

    return $result;
}
function sign_up($db, $name, $password, $email, $address)
{
    $query = $db->prepare("INSERT INTO `user` (`name`, `password`, `email`, `address`) VALUES(:name, :password, :email, :address)");
    $result = $query->execute([
        "name" => $name,
        "password" => $password,
        "email" => $email,
        "address" => $address
    ]);
    return $result;
}
function LogIn($db, $email, $password)
{
    $query = $db->query("SELECT * FROM `user` WHERE email = '$email' AND password = '$password'");
    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
}
