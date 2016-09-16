<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'header.php';
include 'connector.php'
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Voba - Register</title>
    </head>
    <body>
        <table>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
            <tr>
                <td align="center">Email</td>
            </tr>
            <tr>
                <td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td align="center">Password</td>
            </tr>
            <tr>
                <td><input type="text" name="password"/></td>
            </tr>
            <tr>
                <td align="center">Confirm Password</td>
            </tr>
            <tr>
                <td><input type="text" name="cpassword"/></td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
            <tr>
                <td align="center"><input type="submit" name="register" value="Register"/></td>
            </tr>
            </form>
        </table>
    </body>
</html>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $sql->processinput($_POST['email']);
    $password = $sql->processinput($_POST['password']);
    
    $query = $sql->insert($email,$password);
    
    if($query == true) {
        header("location: login.php");
    }
    else {
        echo 'Error';
    }
}
?>

