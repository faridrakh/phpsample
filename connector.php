<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db = "voba";

$db_conn = new PDO("mysql:host={$host};dbname={$db}",$user,$pass);
$db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


include_once 'sql.php';

$sql = new sql($db_conn);

?>