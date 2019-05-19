<?php
require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

session_start();
$conn = mysqli_connect(
    $_SERVER['DBHOST'],
    $_SERVER['DBUSER'],
    $_SERVER['DBPASSWORD'],
    $_SERVER['DBNAME']
) or die(mysqli_erro($mysqli));
?>