<?php
header("Content-Type:application/json");
require "data.php";
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    if (isset($_GET['name']) and !empty($_GET['name']) and $_GET['name'] == "all") {
        $product = get_all_product_price();
        if (empty($product)) {
            response(200, "Products Not Found", null);
        } else {
            response(200, "Products Found", $product);
        }
    } elseif (isset($_GET['name']) and !empty($_GET['name']) and $_GET['name'] != "all") {
        $product = get_price($_GET['name']);
        if (empty($product)) {
            response(200, "Product Not Found", null);
        } else {
            response(200, "Product Found", $product);
        }
    } else {
        response(400, "Invalid Request", null);
    }
} elseif ($method == "DELETE") {
    if (isset($_GET['name']) and !empty($_GET['name']) and $_GET['name'] != "all") {
        if (delete_product($_GET['name'])) {
            response(200, "Product deleted", true);
        } else {
            response(200, "Product Not Found", false);
        }
    } else {
        response(400, "Invalid Request", null);
    }

}

function response($status, $status_message, $data)
{
    header("HTTP/1.1 " . $status);
    $response['status'] = $status;
    $response['status_message'] = $status_message;
    $response['data'] = $data;
    $json_response = json_encode($response);
    echo $json_response;
}
