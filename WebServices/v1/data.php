<?php
require "database.php";
function get_all_product_price()
{
    return get_all_value();
      
}

function get_price($name)
{
    return  get_value($name);
      
}

function delete_product($name)
{
    return  del_value($name);
      
}
function insertProduct($nom ,$date_up,$description,$prix)
{
    return  insert_value($nom,$date_up,$description,$prix);
      
}