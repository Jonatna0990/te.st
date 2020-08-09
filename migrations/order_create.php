<?php

include('../models/Order.php');
include('../components/Db.php');


try{
    $db = Db::getConnection(true);
    if($db)
    {

        $result = $db->query("SELECT 1 FROM ".Order::$TABLE_NAME." LIMIT 1");
        if($result)
        {
            echo "table ".Order::$TABLE_NAME." already exist";
            die;
        }
    }
}
catch(PDOException $ex){

    if($ex->getCode() == '42S02')
    {
        $result = $db->query("CREATE TABLE `".Order::$TABLE_NAME."` (
          `id` int NOT NULL,
          `user_id` int(11) NOT NULL,
          `price` int(11) NOT NULL
        );
        ALTER TABLE `".Order::$TABLE_NAME."`
          ADD UNIQUE KEY `id` (`id`);
        ALTER TABLE `".Order::$TABLE_NAME."`
          MODIFY `id` int NOT NULL AUTO_INCREMENT;
        COMMIT;
        ");
        echo "Table ".Order::$TABLE_NAME." created";
    }
    else echo "Error ". $ex->getMessage();
}