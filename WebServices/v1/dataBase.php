<?php

function get_value($value)
{
    require_once "dbConnect.php";
    $sql = "SELECT * FROM produits where nom=:nom";
    $stmt = $conn->prepare($sql);

    $stmt->execute(['nom' => $value]);
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetch();
    return $result;

}

function get_all_value()
{
    require_once "dbConnect.php";
    $sql = "SELECT * FROM produits";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    return $result;

}

function del_value($value)
{
   
    if (!empty(get_value($value))) {

        require_once "dbConnect.php";
        $sql = "DELETE FROM produits where nom=:nom";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom',  $value, PDO::PARAM_INT);  
        $stmt->execute();
        return true;
    } else {
        return false;
    }

}
function insert_value($value)
{
}
$conn = null;
