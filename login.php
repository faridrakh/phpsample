<?php
include 'header.php';
include 'connector.php';

session_start();
?>
<html>
    <head>
        <title>Voba - Login</title>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <label>Email :</label>
        <input name="email" placeholder="email@server.com" type="text">
        <label>Password :</label>
        <input name="password" placeholder="**********" type="password">
        <input name="login" type="submit" value=" Login ">
    </body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($sql->processinput($_POST['email'])) || empty($sql->processinput($_POST['password']))) {
        echo 'Fill Email or Password';
    }
    else {
        $email = $sql->processinput($_POST['email']);
        $password = $sql->processinput($_POST['password']);
        $row = $sql->login($email,$password);
        
        //if($row->rowCount() == 1) {
        if($row == true) {
            //$row = $rc->fetch(PDO::FETCH_ASSOC);
            //$_SESSION['uid'] = $row['uid'];
            header("location: profile.php");
        }else {
            echo 'Your Email or Password is invalid';
        }
        /*
        $query = "SELECT uid FROM users where email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        
        if($count == 1) {
            $_SESSION['uid'] = $row['uid'];
            
            header("location: profile.php");
        }else {
            echo 'Your Email or Password is invalid';
        }*/
        
    }
}
?>


