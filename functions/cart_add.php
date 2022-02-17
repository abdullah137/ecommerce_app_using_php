<?php 
$page = "shop";
require "../config/db.php";
require "../controllers/firstcalls.php";
$this_product['type'] = $_POST['product_type'];
$this_product['id'] = $_POST['product_id'];
$this_product['name'] = $_POST['product_name'];
$this_product['price'] = $_POST['product_price'];
$this_product['url'] = $_POST['product_url'];
$this_product['extras'] = "";
if(@$_SESSION['cart']) {
    $idExists = FALSE;
    foreach($_SESSION['cart'] as $key => $value) {
        if(@$value['id'] == @$this_product['id']) {
            $idofArray = $key;
            $idExists = TRUE;
        }
    }
    if($idExists == TRUE) {
        $_SESSION['cart'][$idofArray]['counttext'] = "items";
        $_SESSION['cart'][$idofArray]['count']++;
    }else {
        $this_product['count'] = 1;
        $this_product['counttext'] = "item";
        array_unshift($_SESSION['cart'], $this_product);
    }
}else {
    $this_product['count'] = 1;
    $this_product['counttext'] = "item";
    $_SESSION['cart'][] = $this_product;
}

echo json_encode($_SESSION['cart']);