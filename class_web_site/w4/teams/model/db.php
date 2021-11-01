
<?php

$ini = parse_ini_file( __DIR__ . '/dbconfig.ini');


$db = new PDO(  "mysql:host=" . $ini['ict.neit.edu'] . 
                ";port=" . $ini['5500'] . 
                ";dbname=" . $ini['se266_antonio'], 
                $ini['se266_antonio'], 
                $ini['antonio']);


$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




var_dump($db);
