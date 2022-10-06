<?php
require "classes/classDB.php";

define("CONFIG_LIVE", "0"); // 0: Test enviroment || 1: Live enviroment

if(CONFIG_LIVE == 0){
    $DB_SERVER = "localhost";
    $DB_NAME = "movie_webpage";
    $DB_USER = "root";
    $DB_PASS = "";
}else{
    $DB_SERVER = "hecamefromsporting_com_db";
    $DB_NAME = "movie";
    $DB_USER = "hecamefromspor.com";
    $DB_PASS = "Ge4FBDrbndx6";
}

$db = new db($DB_SERVER, $DB_NAME, $DB_USER, $DB_PASS);