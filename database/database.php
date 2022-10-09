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
    $products = $query -> fetchAll(PDO::FETCH_ASSOC);
    return $products;
}
