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
    $query = $db->query("SELECT * FROM `products` WHERE id = $id");
    $products = $query -> fetch(PDO::FETCH_ASSOC);
    return $products;
}
function addToCart($db, $quantity, $product_id){
    $query = $db -> query("INSERT INTO `cart_item` (`product_id`, `quantity`, `cart_id`) VALUES ($product_id, $quantity, 1)");
    $result = $query -> execute();
    return $result;
}
function get_cart_item($db){
    $query = $db -> query("SELECT * FROM `cart_item` WHERE cart_id=1");
    $cart_item = $query -> fetchAll(PDO::FETCH_ASSOC);
    $products = [];
    foreach($cart_item as $item){
        $product_id = $item['product_id'];
        $product = getElementByID($db, $product_id);
        $product['quantity'] = $item['quantity'];
        array_push($products, $product);
    }
    return $products;
}
function delete_cart_item($db, $id){
    $query = $db -> query("DELETE FROM `cart_item` WHERE `product_id` = $id");
    $result = $query -> execute();
    return $result;
}