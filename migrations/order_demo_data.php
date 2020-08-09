<?php

const ROWS_COUNT = 100;

include('../components/Db.php');
include('../models/Order.php');



function generateRandomUserId()
{
   return rand(1, ROWS_COUNT);
}
function generateRandomPrice($min = 100, $max = 10000)
{
    return mt_rand ($min, $max);
}


try {


    $db = Db::getConnection(true);
    if ($db) {

        $result = $db->query("SELECT 1 FROM " . Order::$TABLE_NAME . " LIMIT 1");
        if ($result) {

            $rows = "";
            for ($i = 0; $i < ROWS_COUNT; $i++) {

                $user_id = generateRandomUserId();
                $price = generateRandomPrice();

                $row = "('" . $user_id . "', '" . $price ."')";
                if ($i != ROWS_COUNT - 1) $row .=",";


                $rows .= $row;

            }

            $a = $db->query("INSERT INTO " . Order::$TABLE_NAME . " (`user_id`, `price`) VALUES " . $rows);
            if ($a) {
                echo ROWS_COUNT . " row added to table " . Order::$TABLE_NAME;
            }

        }


    }
} catch (PDOException $ex) {
    echo "Error " . $ex->getMessage();
}