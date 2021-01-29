<?php

function get_value($value)
{
    require_once "dbConnect.php";
    $sql = "SELECT * FROM produits where nom LIKE  :nom";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':nom', "%$value%"  ,PDO::PARAM_STR);
    $stmt->execute();
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

    require_once "dbConnect.php";
    try
    { $sql = "DELETE FROM produits where nom=:nom";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $value, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (Exception $e) {
        return false;
    }

}
function insert_value($nom, $date_up, $description, $prix)
{
    require_once "dbConnect.php";
    try {
        $date = date("Y-m-d H:i:s");
        $sql = "INSERT INTO produits(nom,date_in,date_up,description,prix ) VALUES (
            :nom,
            :date_in,
            :date_up,
            :description,
            :prix)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindParam(':date_in', $date, PDO::PARAM_STR);
        $stmt->bindParam(':date_up', $date_up, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':prix', $prix, PDO::PARAM_STR);

        $stmt->execute();
        return true;
    } catch (Exception $e) {

        return false;
    }
}

$conn = null;
