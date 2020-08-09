<?php

const ROWS_COUNT = 100;
include('../components/Db.php');
include('../models/User.php');


function generateRandomLogin()
{
    $names = ["Aaran", "Aaren", "Abdihakim", "Abdirahman", "Abdisalam", "Abdul", "Abdul-Aziz", "Abdulbasir", "anas", "Alasdair", "Alastair", "Baillie", "Baley", "Balian", "Banan", "Barath", "Barkley", "Barney", "Baron", "Barrie", "Barry", "Bartlomiej", "Bartosz", "Basher", "Colm", "Colt", "Colton", "Colum", "Colvin", "Comghan", "Conal", "Conall", "Conan", "Conar", "Conghaile", "Conlan", "Conley", "Conli", "Conlin", "Conlly", "Conlon", "Conlyn", "Connal", "Connall", "Connan", "Connar", "Connel", "Connell", "Conner", "Connolly", "Connor", "Connor-David", "Conor", "Conrad", "Cooper", "Copeland", "Coray", "Corben", "Corbin", "Corey", "Corey-James", "Corey-Jay", "Cori", "Corie", "Corin", "Cormac", "Cormack", "Levi", "Levon", "Levy", "Lewie", "Lewin", "Lewis", "Lex", "Leydon", "Leyland", "Leylann", "Leyton", "Liall", "Liam", "Liam-Stephen", "Limo", "Lincoln", "Lincoln-John", "Lincon", "Linden", "Linton", "Lionel", "Lisandro", "Litrell", "Liyonela-Elam", "LLeyton", "Lliam", "Lloyd", "Lloyde", "Loche", "Lochlan", "Lochlann", "Lochlan-Oliver", "Lock", "Lockey"];
    return $names[rand(0, count($names) - 1)];
}
function generateRandomEmail()
{
    $emails = ['wainwrig@icloud.com', 'hampton@live.com', 'gospodin@aol.com', 'warrior@att.net', 'leakin@att.net', 'leslie@icloud.com', 'heroine@att.net', 'donev@sbcglobal.net', 'cliffordj@me.com', 'stakasa@me.com', 'ilyaz@verizon.net', 'rogerspl@icloud.com', 'mavilar@me.com', 'mcsporran@yahoo.com', 'arathi@mac.com', 'whimsy@outlook.com', 'wenzlaff@me.com', 'morain@hotmail.com', 'arathi@sbcglobal.net', 'flaviog@aol.com', 'presoff@sbcglobal.net', 'schwaang@icloud.com', 'ivoibs@msn.com', 'pappp@mac.com', 'anicolao@verizon.net', 'yxing@msn.com', 'mhouston@sbcglobal.net', 'luebke@live.com', 'campbell@icloud.com', 'mhanoh@msn.com', 'dburrows@optonline.net', 'rhialto@att.net', 'eidac@gmail.com', 'nwiger@sbcglobal.net', 'lbaxter@gmail.com', 'iamcal@msn.com', 'mpiotr@verizon.net', 'bdbrown@yahoo.com', 'wagnerch@comcast.net', 'formis@live.com', 'mhoffman@me.com', 'mosses@icloud.com', 'crusader@msn.com', 'magusnet@mac.com', 'plover@icloud.com', 'eimear@outlook.com', 'rfoley@mac.com', 'yamla@comcast.net', 'lbaxter@mac.com', 'raines@yahoo.com'];
    return $emails[rand(0, count($emails) - 1)];
}

function generateRandomUserId()
{
    return rand(1, ROWS_COUNT);
}

function generatePassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



try {


    $db = Db::getConnection(true);
    if ($db) {

        $result = $db->query("SELECT 1 FROM " . User::$TABLE_NAME . " LIMIT 1");
        if ($result) {

            $rows = "";
            for ($i = 0; $i < ROWS_COUNT; $i++) {

                $login = generateRandomLogin();
                $email = generateRandomEmail();
                $password = generatePassword();
                $name = generateRandomLogin() .' '. generateRandomLogin() .' '.generateRandomLogin()  ;

                $row = "('" . $login . "', '" . $email . "', '" . $password . "', '".$name."')";
                if ($i != ROWS_COUNT - 1) $row .=",";


                $rows .= $row;

            }

            $a = $db->query("INSERT INTO " . User::$TABLE_NAME . " (`login`, `email`,`password`, `name`) VALUES " . $rows);
            if ($a) {
                echo ROWS_COUNT . " row added to table " . User::$TABLE_NAME;
            }

        }


    }
} catch (PDOException $ex) {
    echo "Error " . $ex->getMessage();
}