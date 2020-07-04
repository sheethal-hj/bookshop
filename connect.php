<?php

define('DB_SERVER','localhost');
define('DB_USERNAME','root');
define("DB_PASSWORD",'');
define("DB_DATABASE",'bookshop');

$link = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

// if($link==true){
//     echo "connection sucessful";
// }




?>