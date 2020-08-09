<?php

include('../models/User.php');
include('../components/Db.php');

try{
    $db = Db::getConnection(true);
    if($db)
    {

        $result = $db->query("SELECT 1 FROM ".User::$TABLE_NAME." LIMIT 1");
        if($result)
        {
            echo "table ".User::$TABLE_NAME." already exist";
            die;
        }
    }
}
catch(PDOException $ex){

    if($ex->getCode() == '42S02')
    {
        $result = $db->query("CREATE TABLE `".User::$TABLE_NAME."` (
          `id` int NOT NULL,
          `email` varchar(55) NOT NULL,
          `login` varchar(55) NOT NULL,
          `password` varchar(55) NOT NULL,
          `name` varchar(55) NOT NULL
        );
        ALTER TABLE `".User::$TABLE_NAME."`
          ADD UNIQUE KEY `id` (`id`);
        ALTER TABLE `".User::$TABLE_NAME."`
          MODIFY `id` int NOT NULL AUTO_INCREMENT;
        COMMIT;
        ");
        echo "Table ".User::$TABLE_NAME." created";
    }
    else echo "Error ". $ex->getMessage();
}