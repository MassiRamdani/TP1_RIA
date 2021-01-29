<?php
header("Content-Type:application/json");
require "data.php";
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    if (isset($_GET['name']) and !empty($_GET['name'])) {

        if ($_GET['name'] == "all") {
            $product = get_all_product_price();
            if (empty($product)) {
                response(200, "Products Not Found", null);
            } else {
                response(200, "Products Found", $product);
            }
        } else {
            $product = get_price($_GET['name']);
            
            if (empty($product)) {
                response(200, "Product Not Found", null);
            } else {
                response(200, "Product Found", $product);
            }

        }

    } else {
        response(400, "Invalid Request", null);
    }
} elseif ($method == "DELETE") {
    if (isset($_GET['name']) and !empty($_GET['name']) and $_GET['name'] != "all") {
        if (delete_product($_GET['name'])) {
            response(200, "Product deleted", true);
        } else {
            response(200, "Product Not deleted", false);
        }
    } else {
        response(400, "Invalid Request", null);
    }

} elseif ($method == "POST") {
    if ((isset($_POST['nom']) and !empty($_POST['nom']))) {
        $nom = $_POST['nom'];
        $date_up = $_POST['date_up'];
        $description = $_POST['description'];
        $prix = $_POST['prix'];

        $reponse = insertProduct($nom , $date_up, $description, $prix);
        if ($reponse) {
            response(200, "Product added", true);
        } else {
            response(200, "Product is not add", false);
        }
    } else {
        response(400, "Invalid Request", null);
    }

}elseif ($method == "PUT") {

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
