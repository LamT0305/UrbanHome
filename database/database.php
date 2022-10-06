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
function get_Sofa_produdct($db, $sofa1)
{
    $query = $db->query("SELECT * FROM products WHERE category LIKE '%$sofa1%' ");
    $products_sofa = $query->fetchAll(PDO::FETCH_ASSOC);
    return $products_sofa;
}
function get_sofa_corner($db, $sofa_corner){
    $query = $db -> query("SELECT * FROM products WHERE category LIKE '%$sofa_corner%' ");
    $products_sofa_corner = $query -> fetchAll(PDO::FETCH_ASSOC);
    return $products_sofa_corner;
}
function get_lamp($db, $lamp){
    $query = $db -> query("SELECT * FROM products WHERE category LIKE '%$lamp%' ");
    $products_lamp = $query -> fetchAll(PDO::FETCH_ASSOC);
    return $products_lamp;
}
function searchProducts($db, $keyword){
    $query = $db -> query("SELECT * FROM products WHERE name LIKE '%$keyword%'");
    $products = $query -> fetchAll(PDO::FETCH_ASSOC);

    return $products;
    $keyword = "";
}
