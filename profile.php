<?php
include 'header.php';
include 'connector.php';
session_start();
$id = $_SESSION['uid'];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!isset($_SESSION['uid'])){
    header("location: login.php");
}
else{
    echo '<br>';
    echo 'WELCOME USER ' . $id;
    echo '<br>';
    $row = $sql->getID($id);
    
    echo $row['email'];
    echo '<br>';echo '<br>';
    echo $row['password'];
    echo '<br>';echo '<br>';
    echo $row['firstname'];
    echo '<br>';echo '<br>';
    echo $row['lastname'];
    echo '<br>';echo '<br>';
    echo $row['dob'];
    echo '<br>';
}
?>
