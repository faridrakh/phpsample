<?php
    include 'header.php';
    session_start();
        
    if(isset($_SESSION['uid'])){
        header("location: profile.php");
    } 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Voba</title>
    </head>
    <body>
        
    </body>
</html>
